@extends('layouts.client.app')
@section('title')
    Categories
@endsection

@section('content')
   <!--================Home Banner Area =================-->
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>REGISTER NOW</h2>
                            <p>Register <span>-</span>Be our member</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Category Product Area =================-->
  
   <section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form method="POST" class="row" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group col-md-4 ">
                        <input id="name" type="text"
                         class="form-control @error('name') is-invalid @enderror"
                          name="name" value="{{ old('name') }}"
                           required autocomplete="name" 
                             autofocus placeholder="name Address">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4 ">
                        <input id="email" type="email"
                         class="form-control @error('email') is-invalid @enderror"
                          name="email" value="{{ old('email') }}"
                           required autocomplete="email" 
                             autofocus placeholder="Email Address">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                   
                    {{--  5555555555555  --}}

                    <div class="form-group col-md-4 ">
                        <input id="phone" type="phone"
                         class="form-control @error('phone') is-invalid @enderror"
                          name="phone" value="{{ old('phone') }}"
                           required autocomplete="phone" 
                             autofocus placeholder="Phone Number">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class=" formg-group col-md-6">
                        <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class=" formg-group col-md-6">
                        <input id="password_confirmation" type="password" placeholder="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="password_confirmation">

                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12 flex d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-primary">
                                {{ __('Register now') }}
                            </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
   </section>
    <!--================End Category Product Area =================-->


@endsection
