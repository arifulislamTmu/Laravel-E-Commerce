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
                        <h2>My order</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>My Order</span>
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
          <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>

                        <th scope="col">Invoce No.</th>
                        <th scope="col">Payment type</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $item)
                        <tr>
                            <td>#arif{{ $item->invoice_no }}</td>
                            <td>{{ $item->payment_type }}</td>
                            <td>{{ $item->sub_total }}</td>
                            <td>{{ $item->total }}</td>
                            <td><a class="btn btn-danger btn-sm" href="{{ url('order/view/'.$item->id) }}">View</a></td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>

            </div>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection
