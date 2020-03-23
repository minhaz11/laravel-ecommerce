@extends('adminDashboard.adminDashboard')
@section('title')
   Trashed Products
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
<table class="table table-bordered table-hover table-responsive">
    <thead class="thead-dark">
      <tr>
        <th scope="col">SN</th>
        <th scope="col">Product Name</th>
        <th scope="col">Product Image</th>
        <th scope="col">Short Description</th>
        {{-- <th scope="col">long Description</th> --}}
        <th scope="col">Price</th>
        {{-- <th scope="col">Publication Status</th> --}}
        {{-- <th scope="col">Created at</th> --}}
        <th scope="col">Manage Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($pd as $product)
        <tr>
        <td scope="row">{{$loop->index+1}}</td>
        <td >{{$product->productName}}</td>
        <td > <img class="img-fluid img-thumbnail" style="width:150px; height:80px" src="{{asset('uploads')}}/product_image/{{$product->productImage}}" alt=""></td>
        <td>{{$product->shortDescription}}</td>
        {{-- <td>{{$product->longDescription}}</td> --}}
        <td>{{$product->Price}}</td>
        {{-- <td>{{$product->publication_status == 1 ? 'Published': 'Unpublished'}}</td> --}}
        {{-- <td>{{$product->created_at}}</td> --}}

            <td>
                <a href="{{route('restoreProduct', ['pd_id'=>$product->id])}}" class="btn btn-outline-primary"><i class="fas fa-redo-alt"></i></a>
                <a href="{{route('p_deleteProduct', ['pd_id'=>$product->id])}}" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                {{-- <a href="{{route('managePublication', ['pd_id'=>$product->id])}}" class="btn btn-outline-primary">{{$product->publication_status == 1 ? 'Unpublish' : 'Publish'}}</a> --}}
            </td>

          </tr>
        @endforeach


    </tbody>
  </table>
  <div class="text-center">{{ $pd->links() }}</div>

@endsection
