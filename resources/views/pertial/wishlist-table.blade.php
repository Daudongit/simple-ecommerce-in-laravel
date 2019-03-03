<h3>Wishlist</h3>
<div class="table-responsive cart_info">
    <table class="table table-condensed">
        <thead>
            <tr class="cart_menu">
                <td class="image">Product Image</td>
                <td class="description"></td>
                <td class="price">Price</td>
                <td class="quantity"></td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @if ($products->count() > 0)
                @foreach($products as $product)
                    <tr>
                        <td class="cart_product">
                            <a href="#">
                                <img src="{{asset('assets/images/product/similar_'.$product->image.'.jpg')}}" 
                                    alt="{{$product->name}}">
                            </a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="#">{{$product->name}}</a></h4>
                            <p>{{$product->details}}</p>
                        </td>
                        <td class="cart_price">
                            <p>₦{{$product->price}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <form action="/cart/{{$product->slug}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{$product->quantity}}"  
                                        name="product_quantity"/>
                                    <input type="hidden" value="yes"  
                                        name="wishlist"/>
                                    <input class="cart_quantity_input" type="text" 
                                        name="quantity" value="1" 
                                        autocomplete="off" size="2">
                                    <button class="cart_quantity_down" type="submit">
                                        Add To Cart 
                                    </button>
                                </form>
                            </div>
                        </td>
                        <td class="cart_delete">
                            <form action="/wishlist/{{$product->slug}}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="cart_quantity_delete">X</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr class="cart_men text-center">
                    <td colspan="5">
                        {{$products->render()}}
                    </td>
                </tr>
            @else
                <tr class="cart_men text-center">
                    <td colspan="5">
                        <h4>Your wishlist is empty</h4>
                        <a class="btn btn-primary" href="/shop">continue</a>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>