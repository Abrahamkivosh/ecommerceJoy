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
                    <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categories</a></li>
                    <li class="breadcrumb-item active">Sub-Categories</li>
                    <a href="" class="btn btn-sm btn-outline-primary ml-2" data-toggle="modal"
                        data-target="#modal-subcategory">Add Sub-Category</a>
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
                    <img src="/storage/categories/{{$category->image}}" height="50" width="10%"
                                            alt="categories">
                    <div class="card-header">
                        <h3 class="card-title">{{$category->name}} Sub-categories</h3>
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
                                @foreach ($category->sub_categories as $subcategory)
                                <tr>
                                    <td>{{$subcategory->name}}</td>
                                    <td><img src="/storage/subcategories/{{$subcategory->image}}" height="50" width="25%"
                                        alt="{{$subcategory->name}}"></td>
                                    <td>
                                        <div class="row">
                                            <div class="mr-2">
                                                <a class="btn btn-sm btn-info"
                                                    href="{{route('subCategories.edit',$subcategory->id)}}">Edit</a>
                                            </div>
                                            <div>
                                                <form action="{{route('subCategories.destroy',$subcategory->id)}}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        onclick="return confirm('Are you sure you want to delete this record?');"
                                                        type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
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


{{-- create subcategory moddal --}}
<div class="modal fade" id="modal-subcategory">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Sub-Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('subCategories.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                  {{-- category id cupture --}}
                                  <input type="text" hidden name="category_id" value="{{$category->id}}">
                                </div>
                                <label for="category_name">Sub-Category Name</label>
                                <input type="text" name="name" class="form-control" id="category_name"
                                    placeholder="Enter name">
                        </div>
                        <div class="col-md-12 mt-2">
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
