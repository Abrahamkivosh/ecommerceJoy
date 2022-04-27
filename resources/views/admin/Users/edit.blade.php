@extends('layouts.adminapp')
@section('content')

<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Profile</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30"> <img src="/storage/user/{{$user->image}}" class="img-circle" width="150" />
                        <h4 class="card-title m-t-10">{{$user->name}}</h4>
                        <h6 class="card-subtitle">
                            @if ($user->is_admin==1)
                            Admin
                            @else
                            Customer
                            @endif
                        </h6>
                    </center>
                </div>
                <div>
                    <hr>
                </div>
                <div class="card-body"> <small class="text-muted">Email address </small>
                    <h6>{{$user->email}}</h6>
                </div>
                <div class="mb-2 ml-2">
                    <form action="{{ route('user.delete',$user->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button style="margin-left: 3%"
                            onclick="return confirm('Are you sure you want to delete this User?')"
                            class="btn btn-sm btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="settings" role="tabpanel">
                        <div class="card-body">
                            <form action="{{route('user.update',$user->id)}}" method="post"
                                enctype="multipart/form-data" class="form-horizontal form-material">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="col-md-12">Full Name</label>
                                            <div class="col-md-12">
                                                <input type="text" name="name" value="{{ $user->name }}"
                                                    class="form-control" placeholder="Enter Username">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="example-email" class="col-md-12">Email</label>
                                            <div class="col-md-12">
                                                <input type="email" value="{{$user->email}}"
                                                    class="form-control form-control-line" name="email"
                                                    id="example-email">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="example-email" class="col-md-12">Role</label>

                                        <select name="is_admin" id="" class="form-control">
                                            <option selected value="{{$user->is_admin}}">
                                                @if ($user->is_admin == 1)
                                                Admin
                                                @else
                                                Customer
                                                @endif
                                            </option>
                                           @if (Auth::user()->is_admin==1)
                                           <option value="1">Admin</option>
                                           @endif
                                            <option value="0">Customer</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Image</label>
                                            <input type="file" name="image" class="form-control" src="" alt="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Current Password <span style="color: red;">*</span> </label>
                                                <input type="password" name="old_password" class="form-control"
                                                    placeholder="Enter number">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{ __('New Password') }}</label>
                                                <input type="password" name="password" value=""
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    placeholder="Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{ __('Confirm password') }}</label>
                                                <input type="password" name="password_confirmation" value=""
                                                    class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <button class="btn btn-success">Update Profile</button>
                                            </div>
                                        </div>
                                    </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Column -->
    </div>
</div>

@endsection
