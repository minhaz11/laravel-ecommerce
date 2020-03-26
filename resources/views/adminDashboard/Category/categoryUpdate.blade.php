@extends('adminDashboard.adminDashboard')
@section('title')
Update Category
@endsection
@section('mainPage')


<form method="POST" action="{{route('updateCategory', ['cat_id'=>$edit->id])}}" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="form-group row">
                    <label for="" class="col-md-2 col-form-label">Name :</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="categoryName" value="{{$edit->categoryName}}"
                            placeholder="Category name...">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Description :</label>
                    <div class="col-sm-10">
                        <textarea name="description" class="form-control" id="" cols="30" rows="10"
                            placeholder="Put some description about this category...">{{$edit->description}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-2 col-form-label">Category Image :</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control" name="categoryImage" placeholder="Category image...">
                    </div>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Publication Status</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="publication_status" id="gridRadios1"
                                    value="{{$edit->publication_status}}"
                                    {{$edit->publication_status == 1 ? 'checked' : ''}}>
                                <label class="form-check-label" for="gridRadios1">
                                    Publish
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="publication_status" id="gridRadios2"
                                    value="{{$edit->publication_status}}"
                                    {{$edit->publication_status == 1 ? '' : 'checked'}}>
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
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
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
                        <li>{{ $error }}</li>
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


@endsection
