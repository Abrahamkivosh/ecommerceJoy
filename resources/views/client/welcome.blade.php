@extends('layouts.client.app')
@section('content')

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="banner_slider owl-carousel">
                        @foreach ($topProducts as $product)
                            <div class="single_banner_slider">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="banner_text">
                                            <div class="banner_text_iner">
                                                <h1>{{ $product->name }}</h1>
                                                <p>{{ Str::limit($product->description, 50, '...') }}</p>
                                                <form action="{{ route('client.cart.add') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" value="{{ $product->id }}" name="id">
                                                    <input type="hidden" value="{{ $product->name }}" name="name">
                                                    <input type="hidden" value="{{ $product->price }}" name="price">
                                                    <input type="hidden" value="{{ $product->image }}" name="image">
                                                    <input type="hidden" value="1" name="quantity">
                                                    <button class=" btn_2 add_cart btn btn-success  ">Add To Cart</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-md-7 banner_img d-none  d-lg-block">
                                        <img class="mr-6" width="400" height="400" src="/storage/products/{{$product->image}}"
                                            alt="{{ $product->name }}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="slider-counter"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- feature_part start-->
    <section class="feature_part ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center">
                        <h2>Featured Category</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                @foreach ($categories as $category)
                    <div class="col-lg-6 col-sm-6">
                        <div class="single_feature_post_text">
                            <p>Premium Quality</p>
                            <h3>{{ $category->name }}</h3>

                            <a href="client/categories?category={{ $category->id }}" class="feature_btn">EXPLORE NOW
                                <i class="fas fa-play"></i></a>
                            <img src="/storage/products/{{$product->image}}" alt="{{ $category->name }}" width="400"  >
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </section>
    <!-- upcoming_event part start-->

    <!-- product_list start-->
    <section class="product_list section_padding">
        <div class="container">
            @foreach ($subCategories->take(3) as $subCategory)
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section_tittle text-center">
                            <h2 class="text text-capitalize">{{ $subCategory->name }} </h2>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center latest_product_inner">
                    @foreach ($subCategory->products->take(6) as $product)
                        <div class="col-lg-4 col-sm-6">
                            <div class="single_product_item">
                                <img src="/storage/products/{{$product->image}}" width="300" height="150" alt="">
                                <div class="single_product_text">
                                    <h4 class="text text-center text-capitalize ">{{ $product->name }}</h4>
                                    <h3 class="text text-center">Ksh {{ $product->price }}</h3>
                                    <form action="{{ route('client.cart.add') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $product->id }}" name="id">
                                        <input type="hidden" value="{{ $product->name }}" name="name">
                                        <input type="hidden" value="{{ $product->price }}" name="price">
                                        <input type="hidden" value="{{ $product->image }}" name="image">
                                        <input type="hidden" value="1" name="quantity">
                                        <button class="add_cart btn btn-success  ">Add To Cart</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- <div class="col-lg-12">
                <div class="pageination">
                    <nav aria-label="Page navigation example">
                        {{ $products->withQueryString()->links() }}
                    </nav>
                </div>
            </div> --}}
                </div>
            @endforeach


        </div>
    </section>

    <!-- product_list part start-->

    <!-- product_list part end-->
@endsection
