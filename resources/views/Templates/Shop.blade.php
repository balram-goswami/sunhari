<div id="page-content">
    <!--Collection Banner-->
    <div class="collection-header" style="margin-bottom: 30px;">
        <div class="collection-hero">
            <div class="collection-hero__image"><img class="blur-up lazyload"
                    data-src="{{ publicPath('themeAssets//images/cat-women2.jpg') }}"
                    src="{{ publicPath('themeAssets//images/cat-women2.jpg') }}" alt="Women" title="Women" /></div>
            <div class="collection-hero__title-wrapper">
                <h1 class="collection-hero__title page-width">{{$post->post_title}}</h1>
            </div>
        </div>
    </div>
    <!--End Collection Banner-->

    <div class="container">
        <div class="row">
            <!--Sidebar-->
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar filterbar">
                <div class="closeFilter d-block d-md-none d-lg-none"><i class="icon icon anm anm-times-l"></i></div>
                <div class="sidebar_tags">
                    <!--Categories-->
                    <div class="sidebar_widget categories filter-widget">
                        <div class="widget-title">
                            <h2>Categories</h2>
                        </div>
                        <div class="widget-content">
                            <ul class="sidebar_categories">
                                <li class="level1 sub-level"><a href="#;" class="site-nav">Clothing</a>
                                    <ul class="sublinks">
                                        <li class="level2"><a href="#;" class="site-nav">Men</a></li>
                                        <li class="level2"><a href="#;" class="site-nav">Women</a></li>
                                        <li class="level2"><a href="#;" class="site-nav">Child</a></li>
                                        <li class="level2"><a href="#;" class="site-nav">View All Clothing</a></li>
                                    </ul>
                                </li>
                                <li class="level1 sub-level"><a href="#;" class="site-nav">Jewellery</a>
                                    <ul class="sublinks">
                                        <li class="level2"><a href="#;" class="site-nav">Ring</a></li>
                                        <li class="level2"><a href="#;" class="site-nav">Neckalses</a></li>
                                        <li class="level2"><a href="#;" class="site-nav">Eaarings</a></li>
                                        <li class="level2"><a href="#;" class="site-nav">View All Jewellery</a>
                                        </li>
                                    </ul>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    <!--Categories-->
                    <!--Price Filter-->
                    <div class="sidebar_widget filterBox filter-widget">
                        <div class="widget-title">
                            <h2>Price</h2>
                        </div>
                        <form action="#" method="post" class="price-filter">
                            <div id="slider-range"
                                class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p class="no-margin"><input id="amount" type="text"></p>
                                </div>
                                <div class="col-6 text-right margin-25px-top">
                                    <button class="btn btn-secondary btn--small">filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--End Price Filter-->
                    <!--Size Swatches-->
                    <div class="sidebar_widget filterBox filter-widget size-swacthes">
                        <div class="widget-title">
                            <h2>Size</h2>
                        </div>
                        <div class="filter-color swacth-list">
                            <ul>
                                <li><span class="swacth-btn checked">X</span></li>
                                <li><span class="swacth-btn">XL</span></li>
                                <li><span class="swacth-btn">XLL</span></li>
                                <li><span class="swacth-btn">M</span></li>
                                <li><span class="swacth-btn">L</span></li>
                                <li><span class="swacth-btn">S</span></li>
                                <li><span class="swacth-btn">XXXL</span></li>
                                <li><span class="swacth-btn">XXL</span></li>
                                <li><span class="swacth-btn">XS</span></span></li>
                            </ul>
                        </div>
                    </div>
                    <!--End Size Swatches-->
                    <!--Color Swatches-->
                    <div class="sidebar_widget filterBox filter-widget">
                        <div class="widget-title">
                            <h2>Color</h2>
                        </div>
                        <div class="filter-color swacth-list clearfix">
                            <span class="swacth-btn black"></span>
                            <span class="swacth-btn white checked"></span>
                            <span class="swacth-btn red"></span>
                            <span class="swacth-btn blue"></span>
                            <span class="swacth-btn pink"></span>
                            <span class="swacth-btn gray"></span>
                            <span class="swacth-btn green"></span>
                            <span class="swacth-btn orange"></span>
                            <span class="swacth-btn yellow"></span>
                            <span class="swacth-btn blueviolet"></span>
                            <span class="swacth-btn brown"></span>
                            <span class="swacth-btn darkGoldenRod"></span>
                            <span class="swacth-btn darkGreen"></span>
                            <span class="swacth-btn darkRed"></span>
                            <span class="swacth-btn dimGrey"></span>
                            <span class="swacth-btn khaki"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">
                <div class="category-description">
                    <h3>{!! $post->post_content !!}</h3>
                </div>
                <hr>
                <div class="productList">
                    <!--Toolbar-->
                    <button type="button" class="btn btn-filter d-block d-md-none d-lg-none"> Product
                        Filters</button>
                    <div class="toolbar">
                        <div class="filters-toolbar-wrapper">
                            <div class="row">
                                <div
                                    class="col-4 col-md-4 col-lg-4 filters-toolbar__item collection-view-as d-flex justify-content-start align-items-center">
                                    <a href="shop-left-sidebar.html" title="Grid View"
                                        class="change-view change-view--active">
                                        <img src="{{ publicPath('themeAssets//images/grid.jpg') }}" alt="Grid" />
                                    </a>
                                    <a href="shop-listview.html" title="List View" class="change-view">
                                        <img src="{{ publicPath('themeAssets//images/list.jpg') }}" alt="List" />
                                    </a>
                                </div>
                                <div
                                    class="col-4 col-md-4 col-lg-4 text-center filters-toolbar__item filters-toolbar__item--count d-flex justify-content-center align-items-center">
                                    <span class="filters-toolbar__product-count">Showing: 22</span>
                                </div>
                                <div class="col-4 col-md-4 col-lg-4 text-right">
                                    <div class="filters-toolbar__item">
                                        <label for="SortBy" class="hidden">Sort</label>
                                        <select name="SortBy" id="SortBy"
                                            class="filters-toolbar__input filters-toolbar__input--sort">
                                            <option value="title-ascending" selected="selected">Sort</option>
                                            <option>Best Selling</option>
                                            <option>Alphabetically, A-Z</option>
                                            <option>Alphabetically, Z-A</option>
                                            <option>Price, low to high</option>
                                            <option>Price, high to low</option>
                                            <option>Date, new to old</option>
                                            <option>Date, old to new</option>
                                        </select>
                                        <input class="collection-header__default-sort" type="hidden" value="manual">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--End Toolbar-->

                    <div class="grid-products grid--view-items">
                        <div class="row">
                            @foreach ($products as $items)
                            <div class="col-6 col-sm-6 col-md-4 col-lg-4 item">
                                <!-- start product image -->
                                <div class="product-image">
                                    <!-- start product image -->
                                    <a href="{{ route('single.post', ['post_type' => 'product', 'slug' => $items->slug]) }}">
                                        <!-- image -->
                                        <img class="primary blur-up lazyload"
                                            data-src="{{ publicPath($items->image) }}"
                                            src="{{ publicPath($items->image) }}"
                                            alt="image" title="product">
                                        <!-- End image -->
                                        <!-- Hover image -->
                                        <img class="hover blur-up lazyload"
                                            data-src="{{ publicPath($items->image) }}"
                                            src="{{ publicPath($items->image) }}"
                                            alt="image" title="product">
                                        <!-- End hover image -->
                                        <!-- product label -->
                                        <div class="product-labels rectangular"><span
                                                class="lbl on-sale">-16%</span>
                                            <span class="lbl pr-label1">new</span>
                                        </div>
                                        <!-- End product label -->
                                    </a>
                                    <!-- <button class="btn btn-addto-cart" type="button">Buy Now</button> -->
                                    <div class="button-set">
                                        <a href="javascript:void(0)" title="Quick View"
                                            class="quick-view-popup quick-view" data-toggle="modal"
                                            data-target="#content_quickview_{{ $items->slug }}">
                                            <i class="icon anm anm-search-plus-r"></i>
                                        </a>
                                        <div class="wishlist-btn">
                                            <a class="wishlist add-to-wishlist" href="#"
                                                title="Add to Wishlist">
                                                <i class="icon anm anm-heart-l"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="modal fade quick-view-popup" id="content_quickview_{{ $items->slug }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div id="ProductSection-product-template" class="product-template__container prstyle1">
                                                        <div class="product-single">
                                                            <!-- Start model close -->
                                                            <a href="javascript:void()" data-dismiss="modal" class="model-close-btn pull-right"
                                                                title="close"><span class="icon icon anm anm-times-l"></span></a>
                                                            <!-- End model close -->
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                    <div class="product-details-img">
                                                                        <div class="pl-20">
                                                                            <img src="{{ publicPath($items->image) }}"
                                                                                alt="" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                    <div class="product-single__meta">
                                                                        <h2 class="product-single__title">{{$items->name}}</h2>
                                                                        <div class="prInfoRow">
                                                                            <div class="product-stock"> <span class="instock ">In Stock</span>
                                                                                <span class="outstock hide">Unavailable</span>
                                                                            </div>
                                                                            <div class="product-sku">SKU: <span class="variant-sku">{{$items->sku}}</span>
                                                                            </div>
                                                                        </div>
                                                                        <p class="product-single__price product-single__price-product-template">
                                                                            <span class="visually-hidden">Regular price</span>
                                                                            <s id="ComparePrice-product-template"><span class="money">{{$items->main_price}}</span></s>
                                                                            <span
                                                                                class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                                                                <span id="ProductPrice-product-template"><span
                                                                                        class="money">{{$items->sale_price}}</span></span>
                                                                            </span>
                                                                        </p>
                                                                        <div class="product-single__description rte">
                                                                            {{$items->short_description}}
                                                                        </div>

                                                                        <form method="post" action="http://annimexweb.com/cart/add"
                                                                            id="product_form_10508262282" accept-charset="UTF-8"
                                                                            class="product-form product-form-product-template hidedropdown"
                                                                            enctype="multipart/form-data">
                                                                            <div class="swatch clearfix swatch-0 option1" data-option-index="0">
                                                                                <div class="product-form__item">
                                                                                    <label class="header">Color: <span
                                                                                            class="slVariant">Red</span></label>
                                                                                    <div data-value="Red" class="swatch-element color red available">
                                                                                        <input class="swatchInput" id="swatch-0-red" type="radio"
                                                                                            name="option-0" value="Red">
                                                                                        <label class="swatchLbl color medium rectangle" for="swatch-0-red"
                                                                                            style="background-image:url({ publicPath('themeAssets/images/product-detail-page/variant1-1.jpg') }});"
                                                                                            title="Red"></label>
                                                                                    </div>
                                                                                    <div data-value="Blue" class="swatch-element color blue available">
                                                                                        <input class="swatchInput" id="swatch-0-blue" type="radio"
                                                                                            name="option-0" value="Blue">
                                                                                        <label class="swatchLbl color medium rectangle"
                                                                                            for="swatch-0-blue"
                                                                                            style="background-image:url({ publicPath('themeAssets/images/product-detail-page/variant1-2.jpg') }});"
                                                                                            title="Blue"></label>
                                                                                    </div>
                                                                                    <div data-value="Green" class="swatch-element color green available">
                                                                                        <input class="swatchInput" id="swatch-0-green" type="radio"
                                                                                            name="option-0" value="Green">
                                                                                        <label class="swatchLbl color medium rectangle"
                                                                                            for="swatch-0-green"
                                                                                            style="background-image:url({ publicPath('themeAssets/images/product-detail-page/variant1-3.jpg') }});"
                                                                                            title="Green"></label>
                                                                                    </div>
                                                                                    <div data-value="Gray" class="swatch-element color gray available">
                                                                                        <input class="swatchInput" id="swatch-0-gray" type="radio"
                                                                                            name="option-0" value="Gray">
                                                                                        <label class="swatchLbl color medium rectangle"
                                                                                            for="swatch-0-gray"
                                                                                            style="background-image:url({ publicPath('themeAssets/images/product-detail-page/variant1-4.jpg') }});"
                                                                                            title="Gray"></label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <!-- Product Action -->
                                                                            <div class="product-action clearfix">
                                                                                <div class="product-form__item--quantity">
                                                                                    <div class="wrapQtyBtn">
                                                                                        <div class="qtyField">
                                                                                            <a class="qtyBtn minus" href="javascript:void(0);"><i
                                                                                                    class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                                                                            <input type="text" id="Quantity" name="quantity"
                                                                                                value="1" class="product-form__input qty">
                                                                                            <a class="qtyBtn plus" href="javascript:void(0);"><i
                                                                                                    class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product-form__item--submit">
                                                                                    <button type="button" name="add"
                                                                                        class="btn product-form__cart-submit">
                                                                                        <span>Add to cart</span>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                            <!-- End Product Action -->
                                                                        </form>
                                                                        <div class="display-table shareRow">
                                                                            <div class="display-table-cell">
                                                                                <div class="wishlist-btn">
                                                                                    <a class="wishlist add-to-wishlist" href="#"
                                                                                        title="Add to Wishlist"><i class="icon anm anm-heart-l"
                                                                                            aria-hidden="true"></i> <span>Add to
                                                                                            Wishlist</span></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--End-product-single-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                    <div class="product-price">
                                        <span class="old-price">{{$items->main_price}}</span>
                                        <span class="price">{{$items->sale_price}}</span>
                                    </div>
                                    <!-- End product price -->

                                    <div class="product-review">
                                        <i class="font-13 fa fa-star"></i>
                                        <i class="font-13 fa fa-star"></i>
                                        <i class="font-13 fa fa-star"></i>
                                        <i class="font-13 fa fa-star-o"></i>
                                        <i class="font-13 fa fa-star-o"></i>
                                    </div>

                                </div>
                                <!-- End product details -->
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <hr class="clear">
                <div class="pagination">
                    <ul>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li class="next"><a href="#"><i class="fa fa-caret-right"
                                    aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
