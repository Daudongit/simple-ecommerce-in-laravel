@extends('layout')
@section('title','Wishlist Page')
@section('content')
    <section class="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li class="active">Wishlist </li>
                </ol>
            </div>
            @include('pertial.flash')
            @include('pertial.wishlist-table')
        </div>
    </section> <!--/#cart_items-->
@endsection