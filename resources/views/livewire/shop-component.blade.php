<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span></span></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

                <div class="wrap-shop-control">

                    <h6 class="shop-title"></h1>

                    <div class="wrap-right">

                        <div class="sort-item orderby ">
                            <select name="orderby" class="use-chosen" wire:model="sorting" >
                                <option value="default" selected="selected">Default sorting</option>
                                <option value="date">Sort by newness</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select>
                        </div>

                        

                        <div class="change-display-mode">
                            <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
                        </div>

                    </div>

                </div><!--end wrap shop control-->

                <style>
                    .product-wish{
                        position: absolute;
                        top: 10%;
                        left: 0;
                        z-index: 99;
                        right: 30px;
                        text-align: right;
                        padding-top: 0;
                    }
                    .product-wish .fa{
                        color: #cbcbcb;
                        font-size: 32px;
                    }
                    .product-wish .fa:hover{
                        color: #ff7007;
                    }
                   .fill-heart{
                    color:  #ff7003 !important; 
                   }

                </style>

                <div class="row">

                    <ul class="product-list grid-products equal-container">
                      @php 
                        $witems = Cart::instance('wishlist') -> content() -> pluck('id');
                      @endphp
                      @foreach ($products as $product)

                        <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                            <div class="product product-style-3 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{route('product.details',['slug'=> $product -> slug])}}" title="{{$product -> name}}">
                                        <figure><img src="{{asset('assets/images/products')}}/{{$product -> image}}" alt="{{$product -> name}}"></figure>
                                    </a>
                                </div>


                                <!--Add to cart-->


                                <div class="product-info">
                                    <a href="{{route('product.details',['slug'=> $product -> slug])}}" class="product-name"><span>{{$product -> name}}</span></a>
                                    <div class="wrap-price"><span class="product-price">${{$product -> regular_price}}</span></div>
                                    <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})">Add To Cart</a>
                                    <div class="product-wish">
                                        @if($witems -> contains($product -> id))
                                        <a href="#" wire:click.prevent="removeFromWishlist({{$product -> id}})"><i class="fa fa-heart fill-heart"></i></a>
                                        @else
                                        <a href="#" wire:click.prevent="addToWishlist({{$product->id}},'{{$product->name}}',{{$product->regular_price}})"><i class="fa fa-heart"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>

                        @endforeach

                    </ul>

                </div>

                <div class="wrap-pagination-info">
                    {{$products -> links()}}
               
                </div>
            </div><!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget mercado-widget categories-widget">
                    <h2 class="widget-title">All Categories</h2>
                    <div class="widget-content">
                        <ul class="list-category">
                             <p><h4>Electronics</h4></p>
                          <p><h4>Smart phone & Smart TV</h4></p>
                          <p><h4>Shose</h4></p>
                          <p><h4>Clothes</h4></p>
                          <p><h4>Toys</h4></p>  
                          <p>  </p>
                        </ul>
                    </div>
                </div>

                <div class="widget mercado-widget filter-widget price-filter">
                    <h2 class="widget-title">Price<span class="text-info">${{$min_price}} - ${{$max_price}}</span></h2>
                    <div class="widget-content" style="padding: 10px 5px 40px 5px;">
                        <div id="slider" wire:ignore></div>
                        
                    </div>
                </div><!-- filter Price-->

                
                
            </div><!--end sitebar-->

        </div><!--end row-->

    </div><!--end container-->

</main>

@push('scripts')

<script>
    var slider = document.getElementById('slider');
    noUiSlider.create(slider,{
        start : [1,1000],
        connect : true,
        range :{
            'min' : 1 ,
            'max' : 1000
        },
        pips:{
            mode : 'steps' ,
            stepped : true ,
            density :4
        }
    });

    slider.noUiSlider.on('update',function(value){
        @this.set('min_price',value[0]);
        @this.set('max_price',value[1]);
    });
</script>
@endpush