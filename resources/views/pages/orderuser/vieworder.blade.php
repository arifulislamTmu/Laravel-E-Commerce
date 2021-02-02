@extends('layouts.fontend_masert')
@section('content')
<div class="container">


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
                        <h2>My Order Details</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>My Order Details</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
<section class="py-5">
    <div class="row">
        @include('pages.orderuser.inc.sideBar')
        <div class="col-sm-8">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Order Details</h5>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Invoce No.</th>
                                    <th scope="col">Payment type</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Total</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#arif{{$orders->invoice_no }}</td>
                                        <td>{{ $orders->payment_type }}</td>
                                        <td>{{ $orders->sub_total }}</td>
                                        <td>{{ $orders->total }}</td>
                                     </tr>
                                </tbody>
                              </table>
                        </div>
                      </div>

                </div>
                <div class="col-lg-12 py-1">
                    <div class="card">
                        <div class="card-body">
                            <h5>Shipping Details</h5>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Shipping user Name</th>
                                    <th scope="col">Shipping Email</th>
                                    <th scope="col">Shipping Phone</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">State</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $shipping->shipping_first_name }}</td>
                                        <td>{{ $shipping->shipping_email }}</td>
                                        <td>{{ $shipping->shipping_phone }}</td>
                                        <td>{{ $shipping->address }}</td>
                                        <td>{{ $shipping->state }}</td>
                                     </tr>
                                </tbody>
                              </table>
                        </div>
                      </div>
                </div>
                <div class="col-lg-12 py-1">
                    <div class="card">
                        <div class="card-body">
                            <h5>Itam Details</h5>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Product code</th>
                                    <th scope="col">Product Image</th>
                                    <th scope="col">Product Quantity</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $orderItem as $itam )
                                     <tr>
                                        <td>{{ $itam->product->product_name }}</td>
                                        <td>{{ $itam->product->product_code }}</td>
                                        <td> <img style="width:100px;height:80px;" src="{{ asset( $itam->product->brand_image1 ) }}" alt=""></td>
                                        <td>{{ $itam->product_qty }}</td>
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
    </section>
</div>
@endsection
