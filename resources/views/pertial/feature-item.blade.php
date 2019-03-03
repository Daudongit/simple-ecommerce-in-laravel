<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Features Items</h2>
    @include('pertial.flash')
    @foreach ($products as $product)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="/assets/images/product/product_{{$product->image}}.jpg" 
                            alt="{{$product->name}}" />
                        <h2>₦{{$product->price}}</h2>
                        <p>{{$product->details}}</p>
                        <a href="/shop/{{$product->slug}}" class="btn btn-default add-to-cart">
                            <i class="fa fa-shopping-cart"></i>Add to cart
                        </a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>₦{{$product->price}}</h2>
                            <p>{{$product->detail}}</p>
                            <a href="/shop/{{$product->slug}}" class="btn btn-default add-to-cart">
                                <i class="fa fa-shopping-cart"></i>Add to cart
                            </a>
                        </div>
                    </div>
                    @if ($product->status == 1)
                        <img src="/assets/images/product/new.png" class="new" alt="" />
                    @endif
                    @if ($product->status == 2)
                        <img src="/assets/images/product/sale.png" class="new" alt="" />
                    @endif
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        @if (!Auth::guest())
                            <li>
                                <a href="#"
                                    onclick="event.preventDefault();
                                        document.getElementById('wishlist-form{{$product->id}}').submit();">
                                    <i class="fa fa-plus-square"></i>Add to wishlist
                                </a>
                                <form id="wishlist-form{{$product->id}}" 
                                    action="{{ route('wishlist.store',$product->slug) }}" 
                                    method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endif
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
</div><!--features_items-->