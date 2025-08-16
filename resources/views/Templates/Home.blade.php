<div id="page-content">
    <div class="slideshow slideshow-wrapper pb-section sliderFull">
        <div class="home-slideshow">
            <div class="slide">
                <div class="blur-up lazyload bg-size">
                    <img class="blur-up lazyload bg-img" data-src="{{ publicPath('themeAssets/demo/10.jpg' ) }}"
                        src="{{ publicPath('themeAssets/demo/10.jpg' ) }}" alt="Shop Our New Collection"
                        title="Shop Our New Collection" />
                    <div class="slideshow__text-wrap slideshow__overlay classic bottom">
                        <div class="slideshow__text-content bottom">
                            <div class="wrap-caption center">
                                <h2 class="h1 mega-title slideshow__title">Shop Our New Collection</h2>
                                <span class="mega-subtitle slideshow__subtitle">From Hight to low, classic or
                                    modern. We have you covered</span>
                                <span class="btn">Shop now</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="blur-up lazyload bg-size">
                    <img class="blur-up lazyload bg-img" data-src="{{ publicPath('themeAssets/demo/11.jpg' ) }}"
                        src="{{ publicPath('themeAssets/demo/11.jpg' ) }}" alt="Summer Bikini Collection"
                        title="Summer Langha Collection" />
                    <div class="slideshow__text-wrap slideshow__overlay classic bottom">
                        <div class="slideshow__text-content bottom">
                            <div class="wrap-caption center">
                                <h2 class="h1 mega-title slideshow__title">Summer Langha Collection</h2>
                                <span class="mega-subtitle slideshow__subtitle">Save up to 50% off this weekend
                                    only</span>
                                <span class="btn">Shop now</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-slider-product section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-header text-center">
                        <h2 class="h2">New Arrivals</h2>
                        <p>Browse the huge variety of our products</p>
                    </div>
                    <div class="tabs-listing">
                        <div class="tab_container">
                            <div class="tab_content grid-products">
                                <div class="productSlider">
                                    @foreach($product as $items)
                                    <div class="col-12 item">
                                        <!-- start product image -->
                                        <div class="product-image">
                                            <!-- start product image -->
                                            <a href="{{ route('single.post', ['post_type' => 'product', 'slug' => $items->slug]) }}">
                                                <!-- image -->
                                                @php
                                                $regularPrice = $items->main_price;
                                                $salePrice = $items->sale_price;
                                                $mainImage = $items->galleries->first()->image ?? $items->image;

                                                $discountPercent = 0;
                                                if ($regularPrice > 0 && $salePrice && $salePrice < $regularPrice) {
                                                    $youSave=$regularPrice - $salePrice;
                                                    $discountPercent=round(($youSave / $regularPrice) * 100);
                                                    }
                                                    @endphp
                                                    <img class="primary blur-up lazyload"
                                                    data-src="{{ publicPath( $items->image ) }}"
                                                    src="{{ publicPath( $items->image ) }}" alt="image"
                                                    title="product">
                                                    <!-- End image -->
                                                    <!-- Hover image -->
                                                    <img class="hover blur-up lazyload"
                                                        data-src="{{ publicPath( $mainImage ) }}"
                                                        src="{{ publicPath( $mainImage ) }}"
                                                        alt="image" title="product">
                                                    <!-- End hover image -->
                                                    <!-- product label -->


                                                    @if(!empty($items->sale_price) && $discountPercent > 0)
                                                    <div class="product-labels rectangular">
                                                        <span class="lbl on-sale">-{{$discountPercent}}%</span>
                                                        <span class="lbl pr-label1">new</span>
                                                    </div>
                                                    @endif
                                                    <!-- End product label -->
                                            </a>
                                            <!-- end product image -->

                                            <!-- countdown start -->
                                            <!-- <div class="saleTime desktop" data-countdown="2022/03/01"></div> -->
                                            <!-- countdown end -->

                                            <!-- Start product button -->
                                            <form class="variants add" action="#"
                                                onclick="window.location.href='cart.html'" method="post">
                                                <button class="btn btn-addto-cart" type="button" tabindex="0">Add To
                                                    Cart</button>
                                            </form>
                                            <div class="button-set">
                                                <div class="wishlist-btn">
                                                    <a class="wishlist add-to-wishlist" href="{{ route('single.post', ['post_type' => 'product', 'slug' => $items->slug]) }}">
                                                        <i class="icon anm anm-heart-l"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- end product button -->
                                        </div>
                                        <!-- end product image -->
                                        <!--start product details -->
                                        <div class="product-details text-center">
                                            <!-- product name -->
                                            <div class="product-name">
                                                <a href="{{ route('single.post', ['post_type' => 'product', 'slug' => $items->slug]) }}">{{$items->name}}</a>
                                            </div>
                                            <!-- End product name -->
                                            <!-- product price -->
                                            @if(!empty($items->sale_price) && $discountPercent > 0)
                                            <div class="product-price">
                                                <span class="old-price">{{$regularPrice}}</span>
                                                <span class="price">{{$salePrice}}</span>
                                            </div>
                                            @else
                                            <div class="product-price">
                                                <span class="price">{{$salePrice}}</span>
                                            </div>
                                            @endif

                                            <!-- End product price -->

                                            <div class="product-review">
                                                <i class="font-13 fa fa-star"></i>
                                                <i class="font-13 fa fa-star"></i>
                                                <i class="font-13 fa fa-star"></i>
                                                <i class="font-13 fa fa-star"></i>
                                                <i class="font-13 fa fa-star-o"></i>
                                            </div>
                                        </div>
                                        <!-- End product details -->
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Collection Tab slider-->

    <!--Collection Box slider-->
    <div class="collection-box section">
        <div class="container-fluid">
            <div class="collection-grid">
                <div class="collection-grid-item">
                    <a href="{{ url('lehenga') }}" class="collection-grid-item__link">
                        <img data-src="{{ publicPath('themeAssets/demo/1.png' ) }}"
                            src="{{ publicPath('themeAssets/demo/1.png' ) }}" alt="Fashion" class="blur-up lazyload" />
                        <div class="collection-grid-item__title-wrapper">
                            <h3 class="collection-grid-item__title btn btn--secondary no-border">Designer Lehengas</h3>
                        </div>
                    </a>
                </div>
                <div class="collection-grid-item">
                    <a href="{{ url('lehenga') }}" class="collection-grid-item__link">
                        <img class="blur-up lazyload" data-src="{{ publicPath('themeAssets/demo/3.png' ) }}"
                            src="{{ publicPath('themeAssets/demo/3.png' ) }}" alt="Cosmetic" />
                        <div class="collection-grid-item__title-wrapper">
                            <h3 class="collection-grid-item__title btn btn--secondary no-border">Best Fabric</h3>
                        </div>
                    </a>
                </div>
                <div class="collection-grid-item blur-up lazyloaded">
                    <a href="{{ url('lehenga') }}" class="collection-grid-item__link">
                        <img data-src="{{ publicPath('themeAssets/demo/4.png' ) }}" src="{{ publicPath('themeAssets/demo/4.png' ) }}"
                            alt="Bag" class="blur-up lazyload" />
                        <div class="collection-grid-item__title-wrapper">
                            <h3 class="collection-grid-item__title btn btn--secondary no-border">Printed Lehengas</h3>
                        </div>
                    </a>
                </div>
                <div class="collection-grid-item">
                    <a href="{{ url('lehenga') }}" class="collection-grid-item__link">
                        <img data-src="{{ publicPath('themeAssets/demo/2.png' ) }}"
                            src="{{ publicPath('themeAssets/demo/2.png' ) }}" alt="Accessories"
                            class="blur-up lazyload" />
                        <div class="collection-grid-item__title-wrapper">
                            <h3 class="collection-grid-item__title btn btn--secondary no-border">Hand work
                            </h3>
                        </div>
                    </a>
                </div>
                <div class="collection-grid-item">
                    <a href="{{ url('lehenga') }}" class="collection-grid-item__link">
                        <img data-src="{{ publicPath('themeAssets/demo/5.png' ) }}" src="{{ publicPath('themeAssets/demo/5.png' ) }}"
                            alt="Shoes" class="blur-up lazyload" />
                        <div class="collection-grid-item__title-wrapper">
                            <h3 class="collection-grid-item__title btn btn--secondary no-border">Panelled Lehenga</h3>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <!--End Collection Box slider-->

    <!--Logo Slider-->
    <div class="section logo-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="logo-bar">
                        <div class="logo-bar__item">
                            <img src="{{ publicPath('themeAssets/images/logo/brandlogo1.png') }}" alt="" title="" />
                        </div>
                        <div class="logo-bar__item">
                            <img src="{{ publicPath('themeAssets/images/logo/brandlogo2.png') }}" alt="" title="" />
                        </div>
                        <div class="logo-bar__item">
                            <img src="{{ publicPath('themeAssets/images/logo/brandlogo3.png') }}" alt="" title="" />
                        </div>
                        <div class="logo-bar__item">
                            <img src="{{ publicPath('themeAssets/images/logo/brandlogo4.png') }}" alt="" title="" />
                        </div>
                        <div class="logo-bar__item">
                            <img src="{{ publicPath('themeAssets/images/logo/brandlogo5.png') }}" alt="" title="" />
                        </div>
                        <div class="logo-bar__item">
                            <img src="{{ publicPath('themeAssets/images/logo/brandlogo6.png') }}" alt="" title="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Logo Slider-->

    <!--Featured Product-->
    <div class="product-rows section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-header text-center">
                        <h2 class="h2">Featured collection</h2>
                        <p>Our most popular products based on sales</p>
                    </div>
                </div>
            </div>
            <div class="grid-products">
                <div class="row">
                    @foreach($product as $items)
                    @php
                    $regularPrice = $items->main_price;
                    $salePrice = $items->sale_price;

                    $mainImage=$items->galleries->first()->image ?? $items->image;
                    $discountPercent = 0;
                    if ($regularPrice > 0 && $salePrice && $salePrice < $regularPrice) {
                        $youSave=$regularPrice - $salePrice;
                        $discountPercent=round(($youSave / $regularPrice) * 100);
                        }

                        @endphp

                        <div class="col-6 col-sm-6 col-md-4 col-lg-4 item grid-view-item style2">
                        <div class="grid-view_image">
                            <!-- start product image -->
                            <a href="{{ route('single.post', ['post_type' => 'product', 'slug' => $items->slug]) }}" class="grid-view-item__link">
                                <!-- image -->
                                <img class="grid-view-item__image primary blur-up lazyload"
                                    data-src="{{ publicPath($items->image) }}"
                                    src="{{ publicPath($items->image) }}"
                                    alt="{{ $items->name }}" title="{{ $items->name }}">
                                <!-- End image -->

                                <!-- Hover image -->
                                <img class="grid-view-item__image hover blur-up lazyload"
                                    data-src="{{ publicPath($mainImage) }}"
                                    src="{{ publicPath($mainImage) }}"
                                    alt="{{ $items->name }}" title="{{ $items->name }}">
                                <!-- End hover image -->

                                <!-- product label -->
                                @if(!empty($items->sale_price) && $discountPercent > 0)
                                <div class="product-labels rectangular">
                                    <span class="lbl on-sale">-{{$discountPercent}}%</span>
                                    <span class="lbl pr-label1">new</span>
                                </div>
                                @endif
                                <!-- End product label -->
                            </a>
                            <!-- end product image -->

                            <!--start product details -->
                            <div class="product-details hoverDetails text-center mobile">
                                <!-- product name -->
                                <div class="product-name">
                                    <a href="{{ route('single.post', ['post_type' => 'product', 'slug' => $items->slug]) }}">
                                        {{ $items->name }}
                                    </a>
                                </div>
                                <!-- End product name -->

                                <!-- product price -->
                                <div class="product-price">
                                    @if(!empty($items->sale_price) && $discountPercent > 0)
                                    <span class="old-price">{{ $regularPrice }}</span>
                                    <span class="price">{{ $salePrice }}</span>
                                    @else
                                    <span class="price">{{ $regularPrice }}</span>
                                    @endif
                                </div>
                                <!-- End product price -->

                                <!-- product button -->
                                <div class="button-set">
                                    <a href="javascript:void(0)" title="Quick View"
                                        class="quick-view-popup quick-view" data-toggle="modal"
                                        data-target="#content_quickview_{{$items->slug}}">
                                        <i class="icon anm anm-search-plus-r"></i>
                                    </a>
                                    <!-- Start add to cart -->
                                    <form class="variants add" action="#"
                                        onclick="window.location.href='cart.html'" method="post">
                                        <button class="btn cartIcon btn-addto-cart" type="button" tabindex="0">
                                            <i class="icon anm anm-bag-l"></i>
                                        </button>
                                    </form>
                                    <div class="wishlist-btn">
                                        <a class="wishlist add-to-wishlist" href="{{ route('single.post', ['post_type' => 'product', 'slug' => $items->slug]) }}">
                                            <i class="icon anm anm-heart-l"></i>
                                        </a>
                                    </div>
                                    <div class="compare-btn">
                                        <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                                            <i class="icon anm anm-random-r"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- end product button -->
                            </div>
                            <!-- End product details -->
                        </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

<!--Store Feature-->
<div class="store-feature section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="display-table store-info">
                    <li class="display-table-cell">
                        <i class="icon anm anm-truck-l"></i>
                        <h5>Free Shipping &amp; Return</h5>
                        <span class="sub-text">Free shipping on all US orders</span>
                    </li>
                    <li class="display-table-cell">
                        <i class="icon anm anm-dollar-sign-r"></i>
                        <h5>Money Guarantee</h5>
                        <span class="sub-text">30 days money back guarantee</span>
                    </li>
                    <li class="display-table-cell">
                        <i class="icon anm anm-comments-l"></i>
                        <h5>Online Support</h5>
                        <span class="sub-text">We support online 24/7 on day</span>
                    </li>
                    <li class="display-table-cell">
                        <i class="icon anm anm-credit-card-front-r"></i>
                        <h5>Secure Payments</h5>
                        <span class="sub-text">All payment are Secured and trusted.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

</div>