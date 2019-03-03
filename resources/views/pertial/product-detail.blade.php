<div class="product-details"><!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <img src="/assets/images/product/detail_{{$product->image}}.jpg" 
                alt="{{$product->name}}" />
            <h3>ZOOM</h3>
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">
            
              <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    @foreach($similarProducts->chunk(3) as $similarChunk)
                        <div class="item {{$loop->first?'active':''}}">
                            @foreach($similarChunk as $similarProduct)
                                    <a href="/shop/{{$similarProduct->slug}}">
                                        <img src="{{asset('assets/images/product/similar_'.$similarProduct->image.'.jpg')}}" 
                                            alt="{{$similarProduct->name}}">
                                    </a>
                            @endforeach
                        </div>
                    @endforeach
                </div>
              <!-- Controls -->
              <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
              </a>
              <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
              </a>
        </div>
    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="/assets/images/banner/new.jpg" class="newarrival" alt="" />
            <h2>{{$product->details}}</h2>
            <p>View: {{$product->view_count}}</p>
            <img src="/assets/images/banner/rating.png" alt="" />
            <form action="/cart/{{$product->slug}}" method="POST">
                {{ csrf_field() }}
                <span>
                    <span>₦{{$product->price}}</span>
                    <label>Quantity:</label>
                    <input type="text" value="1"  name="quantity"/>
                    <input type="hidden" value="{{$product->quantity}}"  name="product_quantity"/>
                    <button type="submit" class="btn btn-fefault cart">
                        <i class="fa fa-shopping-cart"></i>
                        Add to cart
                    </button>
                </span>
            </form>
            <p><b>Availability:</b> In Stock</p>
            <p><b>Condition:</b> New</p>
            <p><b>Brand:</b> {{$product->brand->name}}</p>
            <a href=""><img src="/assets/images/banner/share.png" class="share img-responsive"  alt="" /></a>
        </div><!--/product-information-->
    </div>
</div><!--/product-details-->