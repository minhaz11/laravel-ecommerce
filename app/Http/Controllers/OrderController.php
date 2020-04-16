<?php

namespace App\Http\Controllers;

use App\Order;
use App\anageOrder;
use App\Order_details;
use Illuminate\Http\Request;
use PDF;

class OrderController extends Controller
{

    public function index()
    {
        $order = Order::paginate(15);
        return view('adminDashboard.Order.orderManage',['orders'=>$order]);
    }


    public function orderDetails($id)
    {
        $orderDetails = Order::find($id);
        $productInfo = Order_details::where('order_id',$orderDetails->id)->get();
        return view('adminDashboard.Order.orderDetails' ,['orderDetails'=>$orderDetails,'productInfo'=>$productInfo]);
    }


    public function seeInvoice($id)
    {
        $orderDetails = Order::find($id);
        $productInfo = Order_details::where('order_id',$orderDetails->id)->get();
        return view('adminDashboard.Order.seeInvoice' ,['orderDetails'=>$orderDetails,'productInfo'=>$productInfo]);
    }


    public function downloadInvoice($id)
    {
        $orderDetails = Order::find($id);
        $productInfo = Order_details::where('order_id',$orderDetails->id)->get();

        $pdf = PDF::loadView('adminDashboard.Order.dwnInvoice',compact('orderDetails','productInfo'));

        return $pdf->download($orderDetails->customers->name.' '.$orderDetails->customers->last_name.'_bill_invoice.pdf');
    }


}
