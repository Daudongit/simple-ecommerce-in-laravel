<div class="brands_products"><!--brands_products-->
    <h2>Brands</h2>
    <div class="brands-name">
        <ul class="nav nav-pills nav-stacked">
            @foreach ($brands as $brand)
                <li>
                    <a href="/shop?brand={{$brand->slug}}"> 
                        <span class="pull-right">({{$brand->products_count}})</span>
                        {{$brand->name}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div><!--/brands_products-->