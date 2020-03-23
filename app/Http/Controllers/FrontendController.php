<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index(){
        $product = Product::where('publication_status',1)->get();
     $categories = Category::where('publication_status',1)->get();
        return view('Frontend.indexContent', compact('product','categories'));

    }

    public function productList($id)
    {
        // $product = Product::where('cat_id', $id)->get();
        // $cat = Category::find($id);
        return view('Frontend.product_list');
    }
}
