<?php

namespace App\Http\Controllers;

use Mail;
use Session;
use App\Customer;
use App\Shipping;
use Illuminate\Http\Request;
use App\Mail\customerMailNotification;

class CustomerController extends Controller
{
    public function index()
    {
        return view('Customer.signUp');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'last_name'=> 'required',
            'email' => 'required',
            'phone' => 'required',
            'pwd' => 'required',
            'address'=>'required'
        ]);
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->last_name= $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->password = $request->pwd;
        $customer->address = $request->address;
        $customer->save();
        Session::put(['id'=> $customer->id]);
        // Mail::to($customer->email)->send(new customerMailNotification($customer));
         return redirect()->route('shippingInfo');
    }

    public function shippingInfo()
    {
        $customer = Customer::find(Session::get('id'));
        return view('Frontend.shippingInfo',['customer'=>$customer]);
    }
    public function storeShippingInfo(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email' => 'required',
            'phone' => 'required',
            'Address'=>'required'
        ]);
        $shipping = new Shipping;
        $shipping->name = $request->name;
        $shipping->email = $request->email;
        $shipping->phone = $request->phone;
        $shipping->address = $request->Address;
        $shipping->save();
        return view('Frontend.payment');

    }
}
