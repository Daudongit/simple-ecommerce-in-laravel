<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
    
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="/"><img src="/assets/images/home/logo.png" alt="" /></a>
                    </div>
                    {{-- <div class="btn-group pull-right">
                    </div> --}}
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
                            <li><a href="/shop"><i class="fa fa-ticket"></i> Shop</a></li>
                            
                            <li><a href="/checkout"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            <li><a href="/contact"><i class="fa fa-comments"></i> Contact</a></li>
                            <li>
                                <a href="/cart">
                                    <i class="fa fa-shopping-cart"></i> 
                                    Cart 
                                    @if (Cart::instance('default')->count() > 0)
                                        <span class="badge cart-counter">{{Cart::instance('default')->count()}}</span>
                                    @endif
                                </a>
                            </li>
                            @if (Auth::guest())
                                <li><a href="/login"><i class="fa fa-lock"></i> Login</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
    
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="/wishlist?by={{auth()->user()->name}}"><i class="fa fa-star"></i> My Wishlist</a></li>
                                        <li><a href="/order?by={{auth()->user()->name}}"><i class="fa fa-truck"></i> My Order</a></li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                               <i class="fa fa-unlock"></i> Logout
                                            </a>
    
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="mainmenu pull-right">
                        <form class="form-inline" action="/shop" method="get">
                            <div class="price-rang form-group"><!--price-range-->
                                @php 
                                    $prices = '[1500,2500]';
                                    if(request('price')){
                                        $prices = explode(',',request('price'));
                                        $prices = '['.$prices[0].','.$prices[1].']';
                                    }
                                @endphp
                                <div class="wel text-center" style="padding-right:10px">
                                    <input type="text" class="span2" value="" name="price" 
                                        data-slider-min="1000" data-slider-max="5000" 
                                        data-slider-step="500" data-slider-value="{{$prices}}" id="sl2"><br/>
                                        <b class="pull-left">₦1000</b> <b class="pull-right">₦5000</b>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="search" 
                                    placeholder="What ?" value="{{request('search')}}">
                            </div>
                            <div class="form-group">
                                <label for="brand">Brand:</label>
                                <select class="form-control" name="brand">
                                    <option value="0">All</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->slug}}" 
                                            {{request('brand') == $brand->slug?'selected':''}}>
                                            {{$brand->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category">Category:</label>
                                <select class="form-control" name="category">
                                    <option value="0">All</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->slug}}" 
                                            {{request('category') == $category->slug?'selected':''}}>
                                            {{$category->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="bt btn-info" 
                                    style="height: 35px;border-radius:5%;">
                                    Search
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->