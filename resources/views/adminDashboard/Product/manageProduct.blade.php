@extends('adminDashboard.adminDashboard')
@section('title')
   Manage Products
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
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">SN</th>
        <th scope="col">Product Name</th>
        <th scope="col">Catagory Name</th>
        <th scope="col">Short Description</th>
        <th scope="col">long Description</th>
        <th scope="col">Price</th>
        <th scope="col">Publication Status</th>
        <th scope="col">Created at</th>
        <th scope="col">Manage Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
        <td scope="row">{{$loop->index+1}}</td>
        <td >{{$product->productName}}</td>
        {{-- <td >{{$product->cat_id == $product->category->id ? $product->category->categoryName : ''}}</td> --}}
        <td>{{$product->shortDescription}}</td>
        <td>{{$product->longDescription}}</td>
        <td>{{$product->Price}}</td>
        <td>{{$product->publication_status == 1 ? 'Published': 'Unpublished'}}</td>
        <td>{{$product->created_at}}</td>

            <td>
                <a href="{{route('editProduct', ['pd_id'=>$product->id])}}" class="btn btn-outline-warning">Edit</a>
                <a href="{{route('deleteProduct', ['pd_id'=>$product->id])}}" class="btn btn-outline-danger">Delete</a>
                <a href="{{route('managePublication', ['pd_id'=>$product->id])}}" class="btn btn-outline-primary">{{$product->publication_status == 1 ? 'Unpublish' : 'Publish'}}</a>
            </td>

          </tr>
        @endforeach


    </tbody>
  </table>
  <div class="text-center">{{ $products->links() }}</div>

@endsection
