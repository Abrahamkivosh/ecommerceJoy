@extends('layouts.adminapp')
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Orders</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Orders</li>
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
                        <h3 class="card-title">All Orders</h3>
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
                                @foreach ($orders as $order)
                                <tr>
                                    <td>{{$order->sub_category->category->name}}</td>
                                    <td>{{$order->sub_category->name}}</td>
                                    <td>{{$order->name}}</td>

                                    <td><img src="/storage/orders/{{$order->image}}" height="50" width="45%"
                                            alt="orders"></td>
                                    <td>{{$order->stock}}</td>
                                    <td>{{$order->price}}</td>
                                    <td>
                                        <div class="row">
                                            <div class="mr-2">
                                                <a class="btn btn-sm btn-info"
                                                    href="{{route('orders.edit',$order->id)}}">Edit</a>
                                            </div>
                                            <div>
                                                <form action="{{route('orders.destroy',$order->id)}}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        onclick="return confirm('Are you sure you want to delete this record?');"
                                                        type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </div>
                                            <div class="ml-2">
                                                <a href="{{route('orders.show',$order->id)}}" class="btn btn-sm btn-success" >View</a>
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
