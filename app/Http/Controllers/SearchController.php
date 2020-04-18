<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchProduct(Request $request)
    {
        $search = $request->get('search-product');
        $product = Product::where('productName','like','%'.$search.'%')->paginate(10);
        return view('Frontend.search',['product'=>$product]);
    }
}
