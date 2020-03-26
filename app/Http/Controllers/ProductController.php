<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{

    public function index()
    {

    }


    public function create()
    {
        $category = Category::where('publication_status',1)->get();
        return view('adminDashboard.Product.createProduct', ['category'=> $category]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'productName'=> 'required',
            'category'=> 'required',
            'shortDescription' => 'required',
            'longDescription' => 'required',
            'productPrice' => 'required|integer',
            'publication_status'=> 'required',
            'productImage' => 'required'
        ]);

        $fileName = $request->file('productImage')->getClientOriginalName();
        if($request->hasFile('productImage')){
            Image::make($request->file('productImage'))->save(public_path().'/uploads/product_image/'.$fileName);
        }

        $product = new Product;
        $product->productName = $request->productName;
        $product->cate_id = $request->category;
        $product->shortDescription = $request->shortDescription;
        $product->longDescription = $request->longDescription;
        $product->Price = $request->productPrice;
        $product->productImage =$fileName;
        $product->publication_status = $request->publication_status;
        $product->save();
        return back()->with('message', 'Product added successfully');
    }


    public function show()
    {

        $products = Product::paginate(10);

        return view('adminDashboard.Product.manageProduct',
        ['products'=> $products]);
    }


    public function edit($id)
    {
        $product = Product::find($id);
        $cat = Category::where('publication_status',1)->get();
        return view('adminDashboard.Product.productUpdate', ['pd' => $product, 'category'=>$cat]);
    }


    public function update(Request $request, $id)
    {
        $product= Product::find($id);
        $request->validate([
            'productName'=> 'required',
            'category'=> 'required',
            'shortDescription' => 'required',
            'longDescription' => 'required',
            'productPrice' => 'required|integer',
            'publication_status'=> 'required'
        ]);

        $fileName = $request->file('productImage')->getClientOriginalName();
        if($request->hasFile('productImage')){
            unlink(public_path().'/uploads/product_image/'.$product->productImage);
            Image::make($request->file('productImage'))->save(public_path().'/uploads/product_image/'.$fileName);
        }

        $product->productName = $request->productName;
        $product->cate_id = $request->category;
        $product->shortDescription = $request->shortDescription;
        $product->longDescription = $request->longDescription;
        $product->Price = $request->productPrice;
        $product->productImage =$fileName;
        $product->publication_status = $request->publication_status;
        $product->save();
        return back()->with('message', 'Product Updated successfully');
    }

    public function destroy($id)
    {
        $pd = Product::find($id);
        $pd->delete();
        return back()->with('message', 'Your desired Product is trashed successfully');
    }

    public function showTrashed(){
       $product = Product::onlyTrashed()->paginate(10);
       return view('adminDashboard.Product.trashedProduct',['pd'=>$product]);
    }

    public function restore($id){
         Product::withTrashed()
         ->where('id', $id)
         ->restore();
          return back()->with('message', 'Your desired Product is restored successfully');
     }

     public function forceDelete($id){
        $pd = new Product;

        $pd->withTrashed()->where('id', $id)->forceDelete();
        // unlink(public_path().'/uploads/product_image/'.$pd->productImage);


         return back()->with('message', 'Your desired Product is deleted permanently');
     }

    public function publicationManage($id){

        $message ="";
    $publication =  Product::find($id);
     if($publication->publication_status == 1){
         $publication->publication_status = 0;
         $publication->save();
         $message = " is Unpublished successfully";
     } else{
         $publication->publication_status = 1;
         $publication->save();
         $message = " is Published successfully";

     }
     return back()->with('message', $publication->productName . $message);
 }


}
