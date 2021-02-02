@extends('layouts.fontend_masert')
@section('content')

<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All Categories</span>
                    </div>
                    <ul>
                        @php
                            $categorys = App\category::where('ststus',1)->latest()->get();
                        @endphp
                        @foreach ($categorys as $row)
                        <li><a href="#">{{ $row->category_name }}</a></li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('fontend') }}/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Wishlist Page</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Wishlist Page</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->

<section class="shoping-cart spad">
    <div class="container">
        @if(session('remove'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong class="">{{session('remove')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(session('successs'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong class="">{{session('successs')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Add Cart</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>

                    @foreach ($wishlist as $cat )

                            <tr>
                                <td class="shoping__cart__item">
                                    <img style="width:80px;height:60px;" src="{{ asset($cat->product->brand_image1) }}">
                                    <h5>{{ ($cat->product->product_name) }}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    ${{ ($cat->product->product_price) }}
                                </td>
                                <td class="shoping__cart__price">
                                    <form action="{{ url('Cart/Product/'.$cat->product->id) }}" method="POST">
                                        @csrf
                                     <input type="hidden" name="price" value="{{ ($cat->product->product_price) }}">
                                     <button class="btn btn-success">Add Cart</button>
                                 </form>
                                </td>

                                <td class="shoping__cart__item__close">
                                   <a href="{{ url('wishlist/product/delete/'.$cat->id) }}"><span class="icon_close"></span></a>
                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- Shoping Cart Section End -->

@endsection
