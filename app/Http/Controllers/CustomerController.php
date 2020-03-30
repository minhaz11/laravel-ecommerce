<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

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
        return back();
    }
}
