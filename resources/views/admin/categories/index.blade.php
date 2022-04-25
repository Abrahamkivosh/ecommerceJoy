@extends('layouts.adminapp')
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Categories</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Categories</li>
                    <a href="" class="btn btn-sm btn-outline-primary ml-2" data-toggle="modal"
                        data-target="#modal-default">Add Category</a>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All categories</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td><img src="/storage/categories/{{$category->image}}" height="50" width="25%"
                                            alt="categories"></td>
                                    <td>
                                        <div class="row">
                                            <div class="mr-2">
                                                <a class="btn btn-sm btn-outline-info"
                                                    href="{{route('categories.edit',$category->id)}}">Edit</a>
                                            </div>
                                            <div>
                                                <form action="{{route('categories.destroy',$category->id)}}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        onclick="return confirm('Are you sure you want to delete this record?');"
                                                        type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                                </form>
                                            </div>
                                            <div class="ml-2">
                                                <a href="{{route('categories.show',$category->id)}}" class="btn btn-sm btn-outline-success" >View</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->


{{-- create category moddal --}}
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="category_name">Category Name</label>
                                <input type="text" name="name" class="form-control" id="category_name"
                                    placeholder="Enter name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Select Image</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4" style="padding-left: 30%">
                        <button type="submit" class="btn btn-sm btn-info">Add</button>
                    </div>

                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection
