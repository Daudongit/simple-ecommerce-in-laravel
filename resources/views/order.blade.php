@extends('layout')
@section('title','Order Page')
@section('content')
    <section class="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Billing Name</td>
                            <td class="price">Phone Number</td>
                            <td class="quantity">Payment Gateway</td>
                            <td class="total">Price</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($orders->count() > 0)
                            @foreach($orders as $order)
                                <tr>
                                    <td class="cart_product">
                                        <h4>{{$order->billing_name}}</h4>
                                        <p>{{$order->billing_address1}}</p>
                                    </td>
                                    <td class="cart_price">
                                        <p>{{$order->billing_phone}}</p>
                                    </td>
                                    <td class="cart_quantity">
                                        {{$order->payment_gateway}}
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">
                                            ₦{{$order->billing_total}}
                                        </p>
                                    </td>
                                    <td class="cart_delete">
                                        <a href="/order/{{$order->id}}" class="btn btn-primary">
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="cart_men text-center">
                                <td colspan="5">
                                    {{$orders->render()}}
                                </td>
                            </tr>
                        @else
                            <tr class="cart_men text-center">
                                <td colspan="5">
                                    <h4>Order table is empty</h4>
                                    <a class="btn btn-primary" href="/shop">Start shopping</a>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection