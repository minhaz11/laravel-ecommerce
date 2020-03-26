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

<table class="table table-bordered table-hover table-responsive">
    <thead class="thead-dark">
      <tr>
        <th scope="col">SN</th>
        <th scope="col">Product Name</th>
        <th scope="col">Category Name</th>
        <th scope="col">Product Image</th>
        <th scope="col">Short Description</th>

        <th scope="col">Price</th>
        <th scope="col">Publication Status</th>
        {{-- <th scope="col">Created at</th> --}}
        <th scope="col">Manage Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
        <td scope="row">{{$loop->index+1}}</td>
        <td >{{$product->productName}}</td>
        <td>{{$product->category->categoryName}}</td>
        <td><img class="img-fluid img-thumbnail" style="width:150px; height:80px" src="{{asset('uploads')}}/product_image/{{$product->productImage}}" alt=""></td>
        <td>{{$product->shortDescription}}</td>

        <td>{{$product->Price}}</td>
        <td>{{$product->publication_status == 1 ? 'Published': 'Unpublished'}}</td>
        {{-- <td>{{$product->created_at}}</td> --}}

            <td>
                <a href="{{route('editProduct', ['pd_id'=>$product->id])}}" class="btn btn-outline-warning btn-sm"><i class="fas fa-edit"></i></a>
                <a href="{{route('deleteProduct', ['pd_id'=>$product->id])}}" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                <a href="{{route('managePublication', ['pd_id'=>$product->id])}}" class="btn btn-outline-primary btn-sm">
                    @if ($product->publication_status == 1)
                    <i class="fas fa-eye-slash"></i></a>
                    @else
                    <i class="fas fa-eye"></i>
                    @endif


            </td>

          </tr>
        @endforeach


    </tbody>
  </table>
  <div class="text-center">{{ $products->links() }}</div>

@endsection

Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam vitae voluptates suscipit dolores atque non voluptatum dolor quisquam earum quidem.
