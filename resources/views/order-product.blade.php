@extends('layout')
@section('title','Order Product')
@section('content')
    <section class="cart_items">
        <div class="container">
            <h3>Ordered Products</h3>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Product Image</td>
                            <td class="description"></td>
                            <td class="price">Brand</td>
                            <td class="quantity">Quantity</td>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($products->count() > 0)
                            @foreach($products as $product)
                                <tr>
                                    <td class="cart_prorderoduct">
                                        <img src="{{asset('assets/images/product/similar_'.$product->image.'.jpg')}}" 
                                            alt="{{$product->name}}">
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href="#">{{$product->name}}</a></h4>
                                        <p>{{$product->details}}</p>
                                    </td>
                                    <td class="cart_price">
                                        <p>{{$product->brand->name}}</p>
                                    </td>
                                    <td class="cart_quantity">
                                        {{$product->pivot->quantity}}
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2">&nbsp;</td>
                                <td colspan="2">
                                    <table class="table table-condensed total-result">
                                        <tr>
                                            <td> Sub Total</td>
                                            <td>₦{{$order->billing_subtotal}}</td>
                                        </tr>
                                        <tr>
                                            <td>Tax</td>
                                            {{-- <td>{{config('cart.tax')}}%</td> --}}
                                            <td>{{$order->billing_tax}}</td>
                                        </tr>
                                        <tr class="shipping-cost">
                                            <td>Shipping Cost</td>
                                            <td>Free</td>										
                                        </tr>
                                        <tr>
                                            <td>Total</td>
                                            <td><span>₦{{$order->billing_total}}</span></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr class="cart_men text-center">
                                <td colspan="5">
                                    {{$products->render()}}
                                </td>
                            </tr>
                        @else
                            <tr class="cart_men text-center">
                                <td colspan="5">
                                    <h4>Order product table is empty</h4>
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