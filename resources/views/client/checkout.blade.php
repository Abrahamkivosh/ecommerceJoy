@extends('layouts.client.app')
@section('content')
      <!--================Home Banner Area =================-->
  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Products Checkout</h2>
              <p>Home <span>-</span> Shop Single</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!--================Checkout Area =================-->
  <section class="checkout_area padding_top">
    <div class="container">
      <div class="returning_customer">
        <div class="check_title">
          <h2>
            Returning Customer?
            <a href="{{ route('login') }}">Click here to login</a>
          </h2>
        </div>
        <p>
          If you have shopped with us before, please enter your details in the
          boxes below. If you are a new customer, please create Account with Us and  proceed to the
          Billing & Shipping section.
        </p>
        @guest
             <form class="row contact_form" action="{{ route('login') }}" method="post" novalidate="novalidate">
            @include('includes.messages')
          <div class="col-md-6 form-group p_star">
            <input type="text" class="form-control" id="name" name="name" value=" " />
            <span class="placeholder" data-placeholder="Username or Email"></span>
          </div>
          <div class="col-md-6 form-group p_star">
            <input type="password" class="form-control" id="password" name="password" value="" />
            <span class="placeholder" data-placeholder="Password"></span>
          </div>
          <div class="col-md-12 form-group">
            <button type="submit" value="submit" class="btn_3">
              log in
            </button>
            <div class="creat_account">
              <input type="checkbox" id="f-option" name="selector" />
              <label for="f-option">Remember me</label>
            </div>
            <a class="lost_pass" href="#">Lost your password?</a>
          </div>
        </form>
        @endguest

      </div>
      @livewire('lipa-checkout')
    </div>
  </section>
  <!--================End Checkout Area =================-->
@endsection
@push('custom-scripts')
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
           $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Accept':"application/json"
        }
    });

        $("#proceedToMpesa").on("click", function (event) {
            event.preventDefault();

            var name = $("#nameBIlling").val()
            var phone = $("#phone").val()
            var shipping_address = $("#shipping_address").val()
            var sendData = {
                name , phone , shipping_address
            }
            $.ajax({
            type: "POST",
            url: "{{ route('client.checkout.pay') }}" ,
            data: sendData ,
            success: function (response) {
                alert(response)
            }

        });


        });
    </script>
@endpush
