<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') | Ecommerce</title>

    <link rel="icon" href="{{ asset('client/img/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('client/css/bootstrap.min.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('client/css/animate.css') }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('client/css/owl.carousel.min.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('client/css/all.css') }}">
    <!-- nice select CSS -->
    <link rel="stylesheet" href="{{ asset('client/css/nice-select.css') }}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('client/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/themify-icons.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('client/css/magnific-popup.css') }}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{ asset('client/css/slick.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('client/css/style.css') }}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{ asset('client/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/price_rangs.css') }}">
    @livewireStyles
    <style>
        #message {
            z-index: 1000;
            top: 40%;
            position: absolute;
            text-align: center;
            align-content: center;


        }

    </style>
</head>
@include('includes.messages')

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg text-white navbar-dark bg-dark">
                        <a class="navbar-brand" href="{{route('client.index')}}"> <img src="{{asset('/admin/dist/img/logo1.png')}}" height="80" width="200%" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('client.index') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('client.categories') }}">Categories</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex">
                            <div class="dropdown  ">
                                <a  style="color: white;"  class="dropdown-toggle float-left" href="#" id="navbarDropdown3" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cart-plus"> {{ Cart::getTotalQuantity() }} Cart </i>
                                </a>
                                <div class="dropdown-menu " style="margin-right: 30%" aria-labelledby="navbarDropdown">
                                    <div class="single_product">
                                        <div class="list-group">
                                            @forelse (Cart::getContent()->toArray() as $item)
                                                <a href="#"
                                                    class="list-group-item list-group-item-action ">{{ $item['name'] }}</a>
                                            @empty
                                                <span class="text text-primary text-center text-bold">
                                                    Cart is Empty
                                                </span>
                                            @endforelse

                                            <a class="btn btn-success btn-block mt-2"
                                                href="{{ route('client.cart') }}"> View Cart </a>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

    </header>
    <!-- Header part end-->

    @yield('content')

    <!-- subscribe_area part start-->
    {{-- <section class="subscribe_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="subscribe_area_text text-center">
                        <h5>Join Our Newsletter</h5>
                        <h2>Subscribe to get Updated
                            with new offers</h2>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="enter email address"
                                aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <a href="#" class="input-group-text btn_2" id="basic-addon2">subscribe now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--::subscribe_area part end::-->

    <!-- subscribe_area part start-->

    <!--::subscribe_area part end::-->

    <!--::footer_part start::-->
    <footer class="footer_part">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Top Product Categories</h4>
                        <ul class="list-unstyled">
                            @foreach ($categories as $category)
                            <li><a href="">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Our Brands</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Gedi</a></li>
                            <li><a href="">Morocco</a></li>
                            <li><a href="">Jaipur</a></li>
                            <li><a href="">Madrid</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="single_footer_part">
                        <h4>Newsletter</h4>

                        <div id="mc_embed_signup">
                            <form target="_blank"
                                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                method="get" class="subscribe_form relative mail_part">
                                <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address"
                                    class="placeholder hide-on-focus" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = ' Email Address '">
                                <button type="submit" name="submit" id="newsletter-submit"
                                    class="email_icon newsletter-submit button-contactForm">subscribe</button>
                                <div class="mt-10 info"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="copyright_part">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="copyright_text">
                            <P class="float-right">

                                 &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>  Odds & Ends Kenya.
                            </P>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <script src="{{ asset('client/js/jquery-1.12.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ asset('client/js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('client/js/bootstrap.min.js') }}"></script>
    <!-- easing js -->
    <script src="{{ asset('client/js/jquery.magnific-popup.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ asset('client/js/swiper.min.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ asset('client/js/masonry.pkgd.js') }}"></script>
    <!-- particles js -->
    <script src="{{ asset('client/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.nice-select.min.js') }}"></script>
    <!-- slick js -->
    <script src="{{ asset('client/js/slick.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('client/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('client/js/contact.js') }}"></script>
    <script src="{{ asset('client/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.form.js') }}"></script>
    <script src="{{ asset('client/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('client/js/mail-script.js') }}"></script>
    <script src="{{ asset('client/js/stellar.js') }}"></script>
    <script src="{{ asset('client/js/price_rangs.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('client/js/custom.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @stack('custom-scripts')
    @livewireScripts
</body>

</html>
