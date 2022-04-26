@extends('layouts.adminapp')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Product</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('products.index')}}">Products</a></li>
                    <a class="btn btn-sm btn-outline-info ml-2" href=""  data-toggle="modal"
                    data-target="#modal-default">Add Images</a>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none"></h3>
                    <div class="col-12">
                        <img src="/storage/products/{{$product->image}}" class="product-image" alt="Product Image">
                    </div>
                    <div class="col-12 product-image-thumbs">
                        <div class="product-image-thumb active"><img src="/storage/products/{{$product->image}}"
                                alt="Product Image"></div>
                                @foreach ($product->images as $image)
                                <div class="product-image-thumb"><img src="/storage/images/{{$image->image}}" alt="Product Image"></div>
                                @endforeach

                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3">{{$product->name}}</h3>
                    <p>{{$product->description}}</p>
                    <hr>

                    <div class="bg-gray py-2 px-3 mt-4">
                        <h2 class="mb-0">
                            Ksh {{$product->price}}
                        </h2>
                    </div>

                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

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
                <form action="{{route('images.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="text" hidden value="{{$product->id}}" name="product_id" id="">
                                    <input type="file" multiple name="image[]" class="custom-file-input" id="exampleInputFile">
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

</section>
<!-- /.content -->

@endsection

