<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\SlideShow;
use App\FeaturedProduct;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index()
    {
        // $product = Product::where('publication_status',1)->orderBy('id','desc')->take(10)->get();
        $slides =  SlideShow::get();
        $featured = FeaturedProduct::get();
        $categories = Category::where('publication_status',1)->get();
        return view('Frontend.indexContent', compact('slides','categories','featured'));

    }

    public function productList($id)
    {

        $product = Product::where('cate_id', $id)->paginate(15);
        $allProduct = Product::all();
        $cat = Category::all();
        $name = Category::find($id);
        return view('Frontend.product_list',['product'=>$product, 'category'=>$cat,'catName'=>$name,'allProduct'=>$allProduct]);
    }

    public function productDetails($id)
    {
        $product = Product::find($id);
        $relatedProduct = Product::where('cate_id',$product->cate_id)->where('id','!=',$id)->get();
        return view('Frontend.product_details',['product'=>$product,'relatedProduct'=>$relatedProduct]);
    }
}
