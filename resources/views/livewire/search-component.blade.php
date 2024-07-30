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

                    <h1 class="shop-title">SAKURA STORE</h1>

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
                  @if($products -> count() > 0)
                <div class="row">

                    <ul class="product-list grid-products equal-container">
                      @foreach ($products as $product)

                        <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                            <div class="product product-style-3 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{route('product.details',['slug'=> $product -> slug])}}" title="{{$product -> name}}">
                                        <figure><img src="{{asset('assets/images/products')}}/{{$product -> image}}" alt="{{$product -> name}}"></figure>
                                    </a>
                                </div>
                             
                        @endforeach

                    </ul>

                </div>
                 @else 
                 <p style="padding-top:30px;">No Products</p>
                 @endif
                <div class="wrap-pagination-info">
                    {{$products -> links()}}
                <!--   <ul class="page-numbers">
                        <li><span class="page-number-item current" >1</span></li>
                        <li><a class="page-number-item" href="#" >2</a></li>
                        <li><a class="page-number-item" href="#" >3</a></li>
                        <li><a class="page-number-item next-link" href="#" >Next</a></li>
                    </ul>
                    <p class="result-count">Showing 1-8 of 12 result</p> -->
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
                        </ul>
                    </div>
                </div><!-- Categories widget-->
              
               

            </div><!--end sitebar-->

        </div><!--end row-->

    </div><!--end container-->

</main>

