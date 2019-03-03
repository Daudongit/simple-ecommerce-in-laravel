<div class="category-tab shop-details-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li><a href="#details" data-toggle="tab">Similar Products</a></li>
            <li class="active"><a href="#reviews" data-toggle="tab">Detail & Review</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade" id="details" >
            @foreach($similarProducts->take(4) as $similarPro)
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{asset('assets/images/product/product_'.$similarPro->image.'.jpg')}}" alt="{{$similarPro->name}}" />
                                <h2>₦{{$similarPro->price}}</h2>
                                <p>{{$similarPro->name}}</p>
                                <a href="/shop/{{$product->slug}}" class="btn btn-default add-to-cart">
                                    <i class="fa fa-shopping-cart"></i>Add to cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="tab-pane fade active in" id="reviews" >
            <div class="col-sm-12">
                <ul>
                    <li><a href=""><i class="fa fa-th-large"></i> {{$product->name}}</a></li>
                </ul>
                <p>{{$product->description}}</p>
                <p><b>Write Your Review</b></p>	
                <form action="#">
                    <span>
                        <input type="text" placeholder="Your Name"/>
                        <input type="email" placeholder="Email Address"/>
                    </span>
                    <textarea name="message" ></textarea>
                    <button type="submit" class="btn btn-default pull-right">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</div><!--/category-tab-->