<?php

namespace App\Http\Controllers;

use Mail;
use Session;
use Cart;
use App\Order;
use App\Customer;
use App\Shipping;
use App\Order_details;
use Illuminate\Http\Request;
use App\Mail\customerMailNotification;

class CustomerController extends Controller
{
    public function index()
    {
        if(Session::get('customer_id')){
           return redirect()->route('confirmShipping');
    }
     else{
        return view('Customer.signUp');
    }

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
        $customer->password = bcrypt($request->pwd);
        $customer->address = $request->address;
        $customer->save();
        Session::put(['customer_id'=> $customer->id]);
        // Mail::to($customer->email)->send(new customerMailNotification($customer));
         return redirect()->route('shippingInfo');
    }

    public function shippingInfo()
    {
        $customer = Customer::find(Session::get('customer_id'));
        return view('Frontend.shippingInfo',['customer'=>$customer]);
    }

    public function confirmShipping()
    {
        return view('Frontend.confirmShipping');
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
        Session::put(['shipping_id'=> $shipping->id]);
        return view('Frontend.payment');

    }



    public function saveOrder(Request $request)
    {
        if($request->payment_type=='cash')
        {
            $order = new Order;
            $order->customer_id = Session::get('customer_id');
            $order->shipping_id = Session::get('shipping_id');
            $order->total_price = Cart::getSubTotal();
            $order->payment_type = $request->payment_type;
            $order->save();


            $contents = Cart::getContent();
        foreach ($contents as $content)
        {
            $ordeDetails = new Order_details;
            $ordeDetails->order_id =$order->id;
            $ordeDetails->product_id = $content->id;
            $ordeDetails->product_name = $content->name;
            $ordeDetails->product_image = $content->attributes->productImage;
            $ordeDetails->product_price = $content->price;
            $ordeDetails->product_quantity = $content->quantity;
            $ordeDetails->save();
        }

        }
        elseif($request->payment_type=='paypal'){
            $order = new Order;
            $order->customer_id = Session::get('customer_id');
            $order->shipping_id = Session::get('shipping_id');
            $order->total_price = Cart::getSubTotal();
            $order->payment_type = $request->payment_type;
            $order->save();


            $contents = Cart::getContent();
        foreach ($contents as $content)
        {
            $ordeDetails = new Order_details;
            $ordeDetails->order_id =$order->id;
            $ordeDetails->product_id = $content->id;
            $ordeDetails->product_name = $content->name;
            $ordeDetails->product_image = $content->attributes->productImage;
            $ordeDetails->product_price = $content->price;
            $ordeDetails->product_quantity = $content->quantity;
            $ordeDetails->save();
        }
            return redirect('/payment');
        }
        Cart::clear();
        return redirect()->route('orderConfirmed');
    }

    public function logout()
    {
        session()->forget('customer_id','shipping_id');
        return redirect()->route('index');
    }

    public function login(Request $request)
    {
        $customer = Customer::where('email', $request->email)->first();
        if($customer){
            if(password_verify($request->pwd, $customer->password)){
                Session::put(['customer_id'=> $customer->id]);
                Session::put(['customer_name'=> $customer->name.' '.$customer->last_name]);
                if(Cart::isEmpty()){
                    return redirect()->route('index');
                } else{ return redirect()->route('confirmShipping');}

            } else {
                return back()->with('error','Email or Password is not matching, please try again.');
            }
        } else{
            return back()->with('error','Email or Password is not matching, please try again.');
        }
    }
}
