<section class="cart_items">
    <div class="container">
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Product Image</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Qty</td>
                        <td class="total">Subtotal</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @if (Cart::instance('saveForLater')->count() > 0)
                        @foreach(Cart::instance('saveForLater')->content() as $cartItem)
                            <tr>
                                <td class="cart_product">
                                    <a href="#">
                                        <img src="{{asset('assets/images/product/similar_'.$cartItem->model->image.'.jpg')}}" 
                                            alt="{{$cartItem->model->name}}">
                                    </a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="#">{{$cartItem->model->name}}</a></h4>
                                    <p>{{$cartItem->model->details}}</p>
                                    <p class="save-for-later">
                                        <a href="/saveforlater/movetocart/{{$cartItem->rowId}}">
                                            <i class="fa fa-plus-square"></i> Move to Cart
                                        </a>
                                    </p>
                                </td>
                                <td class="cart_price">
                                    <p>₦{{$cartItem->model->price}}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <input class="cart_quantity_input" type="text" 
                                            name="quantity" value="{{$cartItem->qty}}" 
                                            autocomplete="off" size="2" readonly>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">
                                        ₦{{$cartItem->total}}
                                    </p>
                                </td>
                                <td class="cart_delete">
                                    <form action="/saveforlater/{{$cartItem->rowId}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="cart_quantity_delete">X</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="cart_men text-center">
                            <td colspan="5">
                                <h4>Save for later  is empty </h4>
                                {{-- <a class="btn btn-primary" href="/shop">click to shop</a> --}}
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</section>