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
                                    <th>Customer Name</th>
                                    <th>Shipping Address</th>
                                    <th>Order Phone</th>
                                    <th>Status</th>
                                    <th>Delivery Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>{{$order->user->name}}</td>
                                    <td>{{$order->shipping_address}}</td>
                                    <td>{{$order->order_phone}}</td>
                                    <td>
                                        {{$order->status}}

                                        @if ($order->status =='pending')
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
                                    <td>
                                        <div class="row">
                                            <div class="mr-2">
                                                <a href="{{route('orders.show',$order->id)}}" class="btn btn-sm btn-outline-success" >View</a>
                                            </div>
                                            <div >
                                                <a class="btn btn-sm btn-outline-info"
                                                    href="{{route('orders.edit',$order->id)}}">Edit</a>
                                            </div>
                                            <div class="ml-2">
                                                <form action="{{route('orders.destroy',$order->id)}}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        onclick="return confirm('Are you sure you want to delete this record?');"
                                                        type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                                </form>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Shipping Address</th>
                                    <th>Order Phone</th>
                                    <th>Status</th>
                                    <th>Delivery Date</th>
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
