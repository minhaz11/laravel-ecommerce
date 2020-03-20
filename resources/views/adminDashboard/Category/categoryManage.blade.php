@extends('adminDashboard.adminDashboard')
@section('title')
   Manage Category
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
        <th scope="col">Category Name</th>
        <th scope="col">Category Description</th>
        <th scope="col">Publication Status</th>
        <th scope="col">Created at</th>
        <th scope="col">Manage Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
        <th scope="row">{{$loop->index+1}}</th>
        <th >{{$category->categoryName}}</th>
        <td>{{$category->description}}</td>
        <td>{{$category->publication_status == 1 ? 'Published': 'Unpublished'}}</td>
        <td>{{$category->created_at}}</td>

            <td>
                <a href="{{route('editCategory', ['cat_id'=>$category->id])}}" class="btn btn-outline-warning">Edit</a>
                <a href="{{route('deleteCategory', ['cat_id'=>$category->id])}}" class="btn btn-outline-danger">Delete</a>
                <a href="{{route('publicationManage', ['cat_id'=>$category->id])}}" class="btn btn-outline-primary">{{$category->publication_status == 1 ? 'Unpublish' : 'Publish'}}</a>
            </td>

          </tr>
        @endforeach


    </tbody>
  </table>
  <div class="text-center">{{ $categories->links() }}</div>

@endsection
