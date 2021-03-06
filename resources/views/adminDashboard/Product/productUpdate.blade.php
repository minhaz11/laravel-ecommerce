@extends('adminDashboard.adminDashboard')
@section('title')
Update Product
@endsection
@section('mainPage')


<form method="POST" action="{{route('updateProduct',['id'=> $pd->id])}}" name="productForm" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group row">
                    <label for="" class="col-md-2 col-form-label">Name :</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="productName" value="{{$pd->productName}}"
                            placeholder="Product name...">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Category :</label>
                    <div class="col-sm-10">
                        <select name="category" id="" class="form-control">

                            <option value="">--Select Category--</option>
                            @foreach ($category as $item)
                            <option value="{{$item->id}}">{{$item->categoryName}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Short Description:</label>
                    <div class="col-sm-10">
                        <textarea name="shortDescription" class="form-control" id="" cols="30" rows="5"
                            placeholder="Put some description about this product...">{{$pd->shortDescription}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Long Description:</label>
                    <div class="col-sm-10">
                        <textarea name="longDescription" class="form-control" id="article-ckeditor" cols="30" rows="10"
                            placeholder="Put some description about this product...">{{$pd->longDescription}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-2 col-form-label">Price :</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="productPrice" value="{{$pd->Price}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-2 col-form-label">Product image :</label>
                    <div class="col-md-10">
                        <img class="img-fluid img-thumbnail" style="width:150px; height:80px" src="{{asset('uploads')}}/product_image/{{$pd->productImage}}" alt="">
                    <input type="file" class="form-control" name="productImage" value="{{$pd->productImage}}">
                    </div>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Publication Status</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="publication_status" id="gridRadios1"
                                    value="1" {{$pd->publication_status == 1 ? 'checked' : ''}}>
                                <label class="form-check-label" for="gridRadios1">
                                    Publish
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="publication_status" id="gridRadios2"
                                    value="0" {{$pd->publication_status == 1 ? '' : 'checked'}}>
                                <label class="form-check-label" for="gridRadios2">
                                    Unpublish
                                </label>
                            </div>

                        </div>
                    </div>
                </fieldset>

                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!--flashing category added message-->
                @if(session('message'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong class="text-success">{{session('message')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <!--flashing validation error message-->
                @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show">
                    <ul class="text-danger">
                        @foreach ($errors->all() as $error)
                        <li> <small> {{ $error }}</small></li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
        </div>

    </div>
</form>

<script>
    document.forms['productForm'].elements['category'].value = {{$pd->cat_id}} ;
</script>


@endsection
