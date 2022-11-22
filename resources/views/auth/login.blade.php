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
                            <h2>LOGIN NOW</h2>
                            <p>Login <span>-</span>You can access your portal here</p>
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
                <form method="POST" class="row" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group col-md-6 ">
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

                    <div class=" formg-group col-md-6">
                        <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                    </div>

                    <div class="col-md-4">

                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                       
                    </div>
                </form>
            </div>
        </div>
    </div>
   </section>
    <!--================End Category Product Area =================-->


@endsection
