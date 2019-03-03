@extends('layout')
@section('title','Checkout Page')
@section('content')
    <section class="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Check out</li>
                </ol>
            </div><!--/breadcrums-->
            @include('pertial.flash')
            <div class="register-req">
                <p>Please complete the following form.......</p>
            </div><!--/register-req-->
            <form method="POST" action="/checkout">
                {{ csrf_field() }}
                <div class="shopper-informations">
                    <div class="row">
                        <div class="col-sm-12 clearfix">
                            <div class="bill-to">
                                <p>Bill To</p>
                                <div class="form-one">
                                    @if (auth()->user())
                                        <input type="email"  placeholder="Email*" name="email" 
                                            value="{{ auth()->user()->email }}" readonly>
                                    @else
                                        <input type="email"  placeholder="Email*" name="email" 
                                            value="{{ old('email') }}" required>
                                    @endif
                                    <input type="text" placeholder="Name*" name="name" value="{{ old('name') }}" required>
                                    <input type="text" placeholder="Address 1 *" name="address1" 
                                        value="{{ old('address1') }}" required>
                                    <input type="text" placeholder="Address 2" name="address2" 
                                        value="{{ old('address2') }}">
                                </div>
                                <div class="form-two">
                                    <input type="text" placeholder="City*" name="city" value="{{ old('city') }}" required>
                                    <input type="text" placeholder="Area" name="area" value="{{ old('area') }}" >
                                    <input type="text" placeholder="Phone *" name="phone" value="{{ old('phone') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="step-one">
                    <h2 class="heading">Payment </h2>
                </div>
                <div class="checkout-options">
                    <h3>Select Your Payment Method</h3>
                    <p></p>
                    <ul class="nav">
                        <li>
                            <label><input type="radio" value="hand-cash" name="payment_gateway"> Hand Cash</label>
                        </li>
                        <li>
                            <label>
                                <input type="radio" value="direct-bank-transfer" name="payment_gateway" disabled> Direct Bank Transfer
                            </label>
                        </li>
                        <li>
                            <label>
                                <input type="radio" value="check-payment" name="payment_gateway" disabled> Check Payment
                            </label>
                        </li>
                    </ul>
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">  Done  </button>
                    </div>
                </div><!--/checkout-options-->
            </form>
            <div class="review-payment">
                <h2>Order Review</h2>
            </div>
            @component('components.carts-table')
                @slot('row')
                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>Cart Sub Total</td>
                                    <td>₦{{Cart::total()}}</td>
                                </tr>
                                <tr>
                                    <td>Tax</td>
                                    <td>{{config('cart.tax')}}%</td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>Shipping Cost</td>
                                    <td>Free</td>										
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><span>₦{{Cart::subtotal()}}</span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                @endslot
            @endcomponent
        </div>
    </section> <!--/#cart_items-->
@endsection