<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

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
            'publication_status'=> 'required'
        ]);

        $product = new Product;
        $product->productName = $request->productName;
        $product->cat_id = $request->category;
        $product->shortDescription = $request->shortDescription;
        $product->longDescription = $request->longDescription;
        $product->Price = $request->productPrice;
        $product->publication_status = $request->publication_status;
        $product->save();
        return back()->with('message', 'Product added successfully');
    }


    public function show()
    {
        $category = Category::all();
        $products = Product::paginate(10);
        return view('adminDashboard.Product.manageProduct',
        ['products'=> $products,
         'category' => $category

        ]);
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


        $product->productName = $request->productName;
        $product->cat_id = $request->category;
        $product->shortDescription = $request->shortDescription;
        $product->longDescription = $request->longDescription;
        $product->Price = $request->productPrice;
        $product->publication_status = $request->publication_status;
        $product->save();
        return back()->with('message', 'Product Updated successfully');
    }

    public function destroy($id)
    {
        $pd = Product::find($id);
        $pd->delete();
        return back()->with('message', 'Your desired Product is deleted successfully');
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
