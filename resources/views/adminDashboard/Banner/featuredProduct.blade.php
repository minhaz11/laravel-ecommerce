@extends('adminDashboard.adminDashboard')
@section('title')
Manage Sliders
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
        <form action="{{route('submittedFeatured')}}" method="post">
            @csrf
            <table class="table table-bordered table-hover table-responsive" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"><input type="submit"  class="deselect btn btn-outline-warning btn-sm" value="Deselect"></th>
                            <th scope="col">SN</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Product Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $product )
                        <tr>
                        <td scope="row"><input type="checkbox" name="ids[]" class="selectbox" value="{{$product->id}}"></td>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$product->productName}}</td>
                            <td>{{$product->category->categoryName}}</td>
                            <td><img class="img-fluid img-thumbnail" style="width:100px; height:110px"
                                    src="{{asset('uploads')}}/product_image/{{$product->productImage}}" alt=""></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
            <script>
                $('.selectbox').click(function(){
                    var total = $('selectbox:checked').length;
                    if(total>5){
                        alert('You can not select more than five')
                    }
                })
            </script>

        </div>
    </div>
</div>

@endsection
