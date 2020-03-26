<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // return $request->all();
        $product =Product::find($request->product_id);

        Cart::add([
            'id' => $product->id,
            'name' => $product->productName,
            'price' => $product->Price,
            'quantity' => $request->product_quantity,
            'attributes' => [
                'productImage'=>$product->productImage
            ]
        ]);

        return back();
    }
}
