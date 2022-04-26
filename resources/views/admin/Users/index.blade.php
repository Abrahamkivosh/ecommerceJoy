@extends('layouts.adminapp')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Users Table</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">users</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">users </h4>
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>

                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td> {{$user->name}} </td>
                                    <td> {{ $user->email}} </td>
                                    <td> @if ($user->is_admin == 1)
                                        Admin
                                        @else
                                        Donor
                                        @endif </td>
                                    <td>
                                        <div class="row">
                                            <div>
                                                <a href="{{route('user.edit',$user->id)}}"> <i class="fa fa-eye"
                                                        aria-hidden="true">Edit</i> </a>
                                    </td>
                    </div>
                </div>


                </td>

                </tr>

                @endforeach


                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection
