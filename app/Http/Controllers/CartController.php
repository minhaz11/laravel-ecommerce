<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {

        $product =Product::find($id);

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

    public function viewCart()
    {
        return view('Frontend.viewCart_details');
    }

    public function removeCartItem($id)
    {
        Cart::remove($id);
        return back();
    }

    public function updateCartItem(Request $request,$id)
    {

        Cart::update($id,[
            'quantity' => [
                'relative' => false,
                'value' =>$request->quantity
            ],
          ]);

        return back();
    }
}
