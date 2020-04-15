<?php

namespace App\Http\Controllers;

use App\Order;
use App\anageOrder;
use App\Order_details;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $order = Order::all();
        return view('adminDashboard.Order.orderManage',['orders'=>$order]);
    }


    public function orderDetails($id)
    {
        $orderDetails = Order::find($id);
        $productInfo = Order_details::where('order_id',$orderDetails->id)->get();
        return view('adminDashboard.Order.orderDetails' ,['orderDetails'=>$orderDetails,'productInfo'=>$productInfo]);
    }


    public function store(Request $request)
    {

    }


    public function show(anageOrder $anageOrder)
    {
        //
    }


    public function edit(anageOrder $anageOrder)
    {
        //
    }


    public function update(Request $request, anageOrder $anageOrder)
    {
        //
    }


    public function destroy(anageOrder $anageOrder)
    {
        //
    }
}
