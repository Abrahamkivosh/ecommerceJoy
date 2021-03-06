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
                            <h2>Shop Category</h2>
                            <p>Home <span>-</span> Shop Category</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Category Product Area =================-->
    <section class="cat_product_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Browse Categories</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    @foreach ($categories as $category)
                                    <li>
                                        <a  href="/client/categories?category={{  $category->id  }}">{{ $category->name }}</a>
                                        <span>({{ $category->products_count }})</span>
                                    </li>
                                    @endforeach


                                </ul>
                            </div>
                        </aside>

                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Product filters</h3>
                            </div>
                            <div class="widgets_inner">
                                @foreach ($categories as $category)
                                <ul class="list">
                                    @foreach ($category->sub_categories as $subcategory)
                                        <li>
                                        <a href="#">{{ $subcategory->name }}</a>
                                    </li>
                                    @endforeach

                                </ul>

                                @endforeach


                            </div>
                        </aside>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product_top_bar d-flex justify-content-between align-items-center">
                                <div class="single_product_menu">
                                    <p><span>{{ $products->count() }} </span> Product Found</p>
                                </div>
                                <div class="single_product_menu d-flex">
                                    <h5>short by : </h5>
                                    <form action="{{ route('client.categories') }}" method="get">
                                        @csrf
                                        <select name="sort" >
                                            <option data-display="Select">name</option>
                                            <option value="1">price</option>
                                            <option value="2">product</option>
                                        </select>
                                    </form>

                                </div>
                                <div class="single_product_menu d-flex">
                                    <h5>show :</h5>
                                    <div class="top_pageniation">
                                        <ul>
                                            <li>1</li>
                                            <li>2</li>
                                            <li>3</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="single_product_menu d-flex">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="search"
                                            aria-describedby="inputGroupPrepend">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"><i
                                                    class="ti-search"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center latest_product_inner">
                        @foreach ($products as $product)
                        <div class="col-lg-4 col-sm-6">
                            <div class="single_product_item">
                                <a href="{{ route('client.product', $product) }}">
                                <img src="/storage/products/{{$product->image}}" alt="">
                            </a>
                                <div class="single_product_text">
                                    <h4>{{ $product->name }}</h4>
                                    <h3>{{ $product->price }}</h3>
                                    <form action="{{ route('client.cart.add') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $product->id }}" name="id">
                                        <input type="hidden" value="{{ $product->name }}" name="name">
                                        <input type="hidden" value="{{ $product->price }}" name="price">
                                        <input type="hidden" value="{{ $product->image }}"  name="image">
                                        <input type="hidden" value="1" name="quantity">
                                        <button class="add_cart btn btn-success btn-block ">Add To Cart</button>
                                    </form>

                                </div>
                            </div>
                        </div>

                        @endforeach

                        <div class="col-lg-12">
                            <div class="pageination">
                                <nav aria-label="Page navigation example">
                                    {{ $products->withQueryString()->links() }}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->


@endsection
