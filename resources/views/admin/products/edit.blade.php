@extends('layouts.adminapp')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Products</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('products.index')}}">Products</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Add Product</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @livewire('add-product')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" name="name" value="{{$product->name}}" class="form-control"  id="product_name"
                                    placeholder="Enter name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_price">Price</label>
                                <input type="text" name="price" value="{{$product->price}}" class="form-control" id="product_price"
                                    placeholder="Enter price">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_weight">Weight</label>
                                <input type="text" name="weight" value="{{$product->weight}}" class="form-control" id="product_weight"
                                    placeholder="Enter weight">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="custom-file mt-4">
                                    <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Product Image  <span style="color: red">*</span></label>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_stock">Stock</label>
                                <input type="text" name="stock" value="{{$product->stock}}" class="form-control" id="product_stock"
                                    placeholder="Enter stock">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category_name">Description</label>
                                <textarea name="description" class="form-control"  id="" cols="30" rows="3">{{$product->description}}</textarea>
                            </div>
                        </div>
                    </div>
                    <button style="margin-left:40%" type="submit" class="btn btn-outline-info">Submit</button>


                </form>

            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
