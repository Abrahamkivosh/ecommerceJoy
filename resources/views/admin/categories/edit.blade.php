@extends('layouts.adminapp')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Category Update</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categories</a></li>
                    <li class="breadcrumb-item active">Update</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Update Category</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- /.card-header -->
                <form action="{{route('categories.update',$category->id)}}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category_name">Category Name</label>
                                <input type="text" name="name" value="{{$category->name}}" class="form-control"
                                    id="category_name" placeholder="Enter category">
                            </div>

                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <label for="image">Image </label>

                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="image">
                                    <label class="custom-file-label" for="exampleInputFile">Select Image</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4" style="padding-left: 30%">
                            <button type="submit" class="btn btn-sm btn-info">Update</button>
                        </div>
                        <!-- /.form-group -->
                    </div>

                </form>
                <!-- /.row -->
            </div>
        </div>

    </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
