@extends('adminDashboard.adminDashboard')
@section('title')
   Orders Details
@endsection
@section('mainPage')
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mb-4">
                <h1 class="text-center text-info">Order Info for this Order</h1>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Order no</th>
                        <td>{{ $orderDetails->id}}</td>
                    </tr>
                    <tr>
                        <th>Total Price</th>
                        <td>${{ $orderDetails->total_price}}</td>
                    </tr>
                    <tr>
                        <th>Payment Type</th>
                        <td>{{ $orderDetails->payment_type}}</td>
                    </tr>
                    <tr>
                        <th>Order Status</th>
                        <td>{{ $orderDetails->order_status}}</td>
                    </tr>
                    <tr>
                        <th>Payment Status</th>
                        <td>{{ $orderDetails->payment_status}}</td>
                    </tr>
                    <tr>
                        <th>Order Date</th>
                        <td>{{\Carbon\Carbon::parse($orderDetails->created_at)->format('d/m/Y')}}</td>
                    </tr>
                </table><hr>

                <h1 class="text-center text-info mt-5">Customer Info for this Order</h1>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Name</th>
                        <td>{{$orderDetails->customers->name.' '.$orderDetails->customers->last_name}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$orderDetails->customers->email}}</td>
                    </tr>
                    <tr>
                        <th>Phone no</th>
                        <td>{{$orderDetails->customers->phone}}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{$orderDetails->customers->address}}</td>
                    </tr>
                    <tr>
                        <th>Registered date</th>
                        <td>{{\Carbon\Carbon::parse($orderDetails->customers->created_at)->format('d/m/Y')}}</td>
                    </tr>
                </table><hr>
                <h1 class="text-center text-info mt-5">Shipping Info for this Order</h1>
                <table class="table table-bordered table-striped">
                    <tr>
                        <tr>
                            <th>Name</th>
                            <td>{{$orderDetails->shipping->name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$orderDetails->shipping->email}}</td>
                        </tr>
                        <tr>
                            <th>Phone no</th>
                            <td>{{$orderDetails->shipping->phone}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{$orderDetails->shipping->address}}</td>
                        </tr>
                        <tr>
                            <th>Shipping date date</th>
                            <td>{{\Carbon\Carbon::parse($orderDetails->shipping->created_at)->format('d/m/Y')}}</td>
                        </tr>
                    </tr>
                </table>
                <h1 class="text-center text-info mt-5">Product Info for this Order</h1>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">SN</th>
                        <th scope="col">Product Id</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Image</th>
                        <th scope="col">Product Price</th>
                        <th scope="col">Product Quantity</th>
                        <th scope="col">Total Price</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($productInfo as $item)
                        <tr>
                        <td scope="row">{{$loop->index+1}}</td>
                        <td >{{$item->product_id}}</td>
                        <td >{{$item->product_name}}</td>
                        <td ><img class="img-fluid img-thumbnail" style="width:150px; height:80px" src="{{asset('uploads/product_image')}}/{{$item->product_image}}" alt=""></td>
                        <td >${{$item->product_price}}</td>
                        <td >{{$item->product_quantity}}</td>
                        <td >${{$item->product_price*$item->product_quantity}}</td>
                         </tr>
                        @endforeach
                    </tbody>

                  </table>
                  <h3 class="text-center text-danger">Total Price: <span class="text-secondary">${{$orderDetails->total_price}}</span></h3>
            </div>
        </div>
    </div>
        </div>
    </div>
</div>
@endsection
