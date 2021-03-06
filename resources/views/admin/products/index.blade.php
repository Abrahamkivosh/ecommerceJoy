@extends('layouts.adminapp')
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>products</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">products</li>
                    @if (Auth::user()->is_admin==1)
                    <a href="{{route('products.create')}}" class="btn btn-sm btn-outline-primary ml-2">Add product</a>

                    @endif
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All products</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Sub-Category</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->sub_category->category->name}}</td>
                                    <td>{{$product->sub_category->name}}</td>
                                    <td>{{$product->name}}</td>

                                    <td><img src="/storage/products/{{$product->image}}" height="50" width="45%"
                                            alt="products"></td>
                                    <td>{{$product->stock}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>
                                        <div class="row">
                                            @if (Auth::user()->is_admin==1)
                                            <div class="mr-2">
                                                <a class="btn btn-sm btn-outline-info"
                                                    href="{{route('products.edit',$product->id)}}">Edit</a>
                                            </div>
                                            <div>
                                                <form action="{{route('products.destroy',$product->id)}}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        onclick="return confirm('Are you sure you want to delete this record?');"
                                                        type="submit"
                                                        class="btn btn-sm btn-outline-danger">Delete</button>
                                                </form>
                                            </div>

                                            @endif
                                            <div class="ml-2">
                                                <a href="{{route('products.show',$product->id)}}"
                                                    class="btn btn-sm btn-outline-success">View</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Category</th>
                                    <th>Sub-Category</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Stock</th>
                                    <th>Price</th>
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

@endsection
