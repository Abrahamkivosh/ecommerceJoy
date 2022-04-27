@extends('layouts.adminapp')
@section('content')

<!-- Content Header (Page header) -->
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Zetu Furniture</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">

                    <span class="info-box-icon bg-info"><i class=" fa fa-shopping-cart"></i></span>
                    <a href="{{route('orders.index')}}">
                        <div class="info-box-content">
                            <span class="info-box-text">Orders</span>
                            @if (Auth::user()->is_admin==1)
                            <span class="info-box-number">{{$ordersCount}}</span>
                            @else
                            <span class="info-box-number">{{Auth::user()->orders->count()}}</span>
                            @endif
                        </div>
                    </a>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            </a>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="far fa-user"></i></span>
                    @if (Auth::user()->is_admin==1)
                    <a href="{{route('orders.index')}}">
                    <div class="info-box-content">
                      <span class="info-box-text">Users</span>
                      <span class="info-box-number">{{$usersCount}}</span>
                      @else
                      <a href="{{route('user.edit',Auth::user()->id)}}">
                      <div class="info-box-content">
                      <span class="info-box-text">User</span>
                      <span class="info-box-number">1</span>
                      @endif
                    </div>
                    </a>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="far fa-list-alt"></i></span>
                    <a href="{{route('products.index')}}">
                    <div class="info-box-content">
                        <span class="info-box-text">Products</span>
                        <span class="info-box-number">{{$productsCount}}</span>
                    </div>
                    </a>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Reviews</span>
                        <span class="info-box-number">{{$reviewsCount}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Latest Orders</h3>

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
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Shipping Address</th>
                                        <th>Status</th>
                                        <th>Delivery Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    @if (Auth::user()->is_admin==1)
                                    <tr>
                                        <td><a href="#">{{$order->id}}</a></td>
                                        <td>{{$order->shipping_address}}</td>
                                        <td> @if ($order->status =='pending')
                                            <span class="badge badge-warning">Pending</span>
                                            @elseif($order->status =='rejected')
                                            <span class="badge badge-danger">Rejected</span>
                                            @elseif ($order->status =='approved')
                                            <span class="badge badge-success">Approved</span>
                                            @elseif ($order->status =='delivered')
                                            <span class="badge badge-info">Delivered</span>
                                            @endif
                                        </td>
                                        <td>{{$order->delivery_date}}</td>
                                    </tr>
                                    @elseif (Auth::user()->id == $order->user->id)
                                    <tr>
                                        <td><a href="#">{{$order->id}}</a></td>
                                        <td>{{$order->shipping_address}}</td>
                                        <td> @if ($order->status =='pending')
                                            <span class="badge badge-warning">Pending</span>
                                            @elseif($order->status =='rejected')
                                            <span class="badge badge-danger">Rejected</span>
                                            @elseif ($order->status =='approved')
                                            <span class="badge badge-success">Approved</span>
                                            @elseif ($order->status =='delivered')
                                            <span class="badge badge-info">Delivered</span>
                                            @endif
                                        </td>
                                        <td>{{$order->delivery_date}}</td>
                                    </tr>

                                    @endif

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <a href="{{route('orders.index')}}" class="btn btn-sm btn-outline-info float-right">View All
                            Orders</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recently Added Products</h3>

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
                    <div class="card-body p-0">
                        <ul class="products-list product-list-in-card pl-2 pr-2">
                            @foreach ($products as $product)
                            <li class="item">
                                <div class="product-img">
                                    <img src="/storage/products/{{$product->image}}" alt="Product Image"
                                        class="img-size-50">
                                </div>
                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">{{$product->name}}
                                        <span class="badge badge-warning float-right">{{$product->price}}</span></a>
                                    <span class="product-description">
                                        {{ Str::limit($product->description,50) }}
                                    </span>
                                </div>
                            </li>

                            @endforeach
                            <!-- /.item -->
                        </ul>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                        <a href="{{route('products.index')}}" class="uppercase">View All Products</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
