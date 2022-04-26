@extends('layouts.adminapp')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Order</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('orders.index')}}">Orders</a></li>
                <li class="breadcrumb-item active">Order details</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">


              <!-- Main content -->
              <div class="invoice p-3 mb-3">
                <!-- title row -->
                <!-- info row -->
                <div class="row invoice-info">
                  <div class="col-sm-4 invoice-col">
                    From
                    <address>
                      <strong>{{$order->user->name}}</strong><br>
                      Phone: {{$order->user->phone}}<br>
                      Email:  {{$order->user->email}} <br>
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    {{-- To
                    <address>
                      <strong>John Doe</strong><br>
                      795 Folsom Ave, Suite 600<br>
                      San Francisco, CA 94107<br>
                      Phone: (555) 539-1037<br>
                      Email: john.doe@example.com
                    </address> --}}
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    <b>Order </b><br>
                    <br>
                    <b>Order ID:</b>  {{$order->id}}<br>
                    <b>Delivery Date:</b>  {{$order->delivery_date}}<br>
                    <b>Ordered at:</b> {{$order->created_at}}
                  </div>
                  <!-- /.col -->
                </div>
                <br>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                  <div class="col-12 table-responsive">
                    <table class="table table-striped">
                      <thead>
                      <tr>
                        <th>Category</th>
                        <th>Sub-Category</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                      </tr>
                      </thead>
                      <tbody>
                          @foreach ($order->order_details as $detail)

                          <tr>
                            <td>{{$detail->product->sub_category->category->name}}</td>
                            <td>{{$detail->product->sub_category->name}}</td>
                            <td>{{$detail->product->name}}</td>
                            <th>{{$detail->product->price}}</th>
                            <td>{{$detail->quantity}}</td>
                            <td> Ksh {{ $detail->quantity * $detail->product->price}}</td>
                          </tr>
                          @endforeach

                      </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">

                    <div class="col-6">
                        <p class="lead">Amount Payable</p>

                        <div class="table-responsive">
                          <table class="table">
                            <tr>
                              <th style="width:50%">Total:</th>
                              <td>
                                  {{$order->amount}}
                              </td>
                          </table>
                        </div>
                      </div>
                      <!-- /.col -->

                  <!-- accepted payments column -->
                  <div class="col-6 ">
                    <p class="lead">Actions:</p>
                    <div class="row">
                        <form action="">
                            <button class="btn mr-2 btn-sm btn-outline-dark">Pending</button>
                        </form>
                        <form action="">
                            <button class="btn mr-2 btn-sm btn-outline-info">Delivered</button>
                        </form>
                        <form action="">
                            <button class="btn mr-2 btn-sm btn-outline-warning">Reject</button>
                        </form>
                        <form action="">
                            <button class="btn mr-2 btn-sm btn-outline-success">Approved</button>
                        </form>
                        <form action="">
                            <button class="btn mr-2 btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </div>

                  </div>
                  <!-- /.col -->

                </div>
              </div>
              <!-- /.invoice -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

@endsection
