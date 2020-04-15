@extends('adminDashboard.adminDashboard')
@section('title')
   Manage Orders
@endsection
@section('mainPage')
@if(session('message'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <strong class="text-primary">{{session('message')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead class="thead-dark">
      <tr>
        <th scope="col">SN</th>
        <th scope="col">Customer Name</th>
        <th scope="col">Total Price</th>
        <th scope="col">Order Date</th>
        <th scope="col">Payment Type</th>
        <th scope="col">Payment Status</th>
        <th scope="col">Order Status</th>
        <th scope="col">Manage Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
        <td scope="row">{{$loop->index+1}}</td>
        <td >{{$order->customers->name.' '.$order->customers->last_name}}</td>
        <td>{{$order->total_price}}</td>
        <td>{{$order->created_at}}</td>
        <td>{{$order->payment_type}}</td>
        <td>{{$order->payment_status}}</td>
        <td>{{$order->order_status}}</td>

            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                <a title="Order details" href="{{route('orderDetails', ['id'=>$order->id])}}" class="btn btn-outline-info btn-sm"><i class="fas fa-info"></i></a>
                {{-- <a href="{{route('deleteProduct', ['pd_id'=>$product->id])}}" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                <a href="{{route('managePublication', ['pd_id'=>$product->id])}}" class="btn btn-outline-primary btn-sm">
                    @if ($product->publication_status == 1)
                    <i class="fas fa-eye-slash"></i></a>
                    @else
                    <i class="fas fa-eye"></i>
                    @endif --}}

                </div>
            </td>

          </tr>
        @endforeach


    </tbody>
  </table>
  {{-- <div class="text-center">{{ $products->links() }}</div> --}}
        </div>
        </div>
</div>
  @endsection


