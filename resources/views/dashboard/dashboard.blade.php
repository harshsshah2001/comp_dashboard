{{-- @include('dashboard.header') --}}


@extends('dashboard.header')

@section('content')

    <!-- SLIDER -->
    <div class="rev_slider_wrapper fullwidthbanner-container">
        <div id="rev-slider2" class="rev_slider fullwidthabanner">
            <ul>

                <!-- Slide 1 -->
                @foreach($sliders as $slide)
                    <li data-transition="random">

                        <!-- Main Image -->
                        <img src="{{ asset('storage/' . $slide->sliderimage) }}">

                        <!-- If heading exists -->
                        @if($slide->sliderheading)
                            <div class="tp-caption tp-resizeme text-6e6 font-weight-500 letter-spacing-08"
                                data-x="['left','left','left','center']" data-hoffset="['7','7','7','0']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['-122','-122','-122','-122']"
                                data-fontsize="['18','18','18','18']" data-lineheight="['36','36','36','36']" data-width="full"
                                data-height="none" data-whitespace="normal" data-transform_idle="o:1;"
                                data-transform_in="y:[100%];s:2000;e:Power4.easeInOut;"
                                data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;" data-mask_in="x:0px;y:[100%];"
                                data-mask_out="x:inherit;y:inherit;" data-start="700" style="color: {{ $slide->headingcolor }}">
                                {{ $slide->sliderheading }}
                            </div>
                        @endif

                        <!-- If sub heading exists -->
                        @if($slide->slidersubheading)
                            <div class="tp-caption tp-resizeme text-333 font-weight-500 letter-spacing-3"
                                data-x="['left','left','left','center']" data-hoffset="['7','7','7','0']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['-62','-62','-62','-62']"
                                data-fontsize="['72','72','72','46']" data-lineheight="['80','80','80','50']" data-width="full"
                                data-height="none" data-whitespace="normal" data-transform_idle="o:1;"
                                data-transform_in="y:[100%];s:2000;e:Power4.easeInOut;"
                                data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;" data-mask_in="x:0px;y:[100%];"
                                data-mask_out="x:inherit;y:inherit;" data-start="1000" style="color: {{ $slide->subheadingcolor }}">
                                {{ $slide->slidersubheading }}
                            </div>
                        @endif

                        <!-- If description exists -->
                        @if($slide->sliderdescription)
                            <div class="tp-caption tp-resizeme text-6e6 font-weight-300" data-x="['left','left','left','center']"
                                data-hoffset="['7','7','7','0']" data-y="['middle','middle','middle','middle']"
                                data-voffset="['3','3','3','3']" data-fontsize="['20','20','20','20']"
                                data-lineheight="['48','48','48','48']" data-width="full" data-height="none"
                                data-whitespace="normal" data-transform_idle="o:1;"
                                data-transform_in="y:[100%];s:2000;e:Power4.easeInOut;"
                                data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;" data-mask_in="x:0px;y:[100%];"
                                data-mask_out="x:inherit;y:inherit;" data-start="1000"
                                style="color: {{ $slide->descriptioncolor }}">
                                {{ $slide->sliderdescription }}
                            </div>
                        @endif

                        <!-- If button text exists -->
                        @if($slide->buttontext)
                            <div class="tp-caption" data-x="['left','left','left','center']" data-hoffset="['7','7','7','0']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['72','72','72','72']"
                                data-width="full" data-height="none" data-whitespace="normal" data-transform_idle="o:1;"
                                data-transform_in="y:[100%];s:2000;e:Power4.easeInOut;"
                                data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;" data-mask_in="x:0px;y:[100%];"
                                data-mask_out="x:inherit;y:inherit;" data-start="1000">

                                <a href="{{ $slide->buttonlink ?? '#' }}" class="themesflat-button has-padding-36 has-shadow"
                                    style="background-color: {{ $slide->buttonbgcolor }}">
                                    <span>{{ $slide->buttontext }}</span>
                                </a>

                            </div>
                        @endif

                    </li>
                @endforeach

                <!-- /End Slide 1 -->

            </ul>
        </div>
    </div>
    <!-- END SLIDER -->

    <!-- IMAGE BOX -->
    <section class="flat-row row-image-box">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="wrap-carousel-box">
                        <div class="flat-image-box flat-carousel-box has-arrows arrow-center bg-transparent offset-62 offset-v-24 style-1 data-effect div-h22 clearfix"
                            data-auto="true" data-column="3" data-column2="2" data-column3="1" data-gap="30">

                            <div class="owl-carousel owl-theme">

                                @foreach ($imageboxs as $imagebox)
                                    <div class="item data-effect-item">
                                        <div class="inner">
                                            <div class="thumb">

                                                <!-- DYNAMIC IMAGE -->
                                                <img src="{{ asset('storage/' . $imagebox->image) }}"
                                                    alt="{{ $imagebox->imageboxtitle }}">

                                                <!-- DYNAMIC TITLE -->
                                                <div class="elm-btn">
                                                    <a href="#" class="themesflat-button bg-white width-150">
                                                        {{ $imagebox->imageboxtitle }}
                                                    </a>
                                                </div>

                                                <div class="overlay-effect bg-color-1"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div> <!-- /.owl-carousel  -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- END IMAGE BOX -->

    <!-- PRODUCT -->
    <section class="flat-row row-product-project shop-collection">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-section margin-bottom-41">
                        <h2 class="title">Shop Collection</h2>
                    </div>

                    @php
                        function getChildren($all, $parentTitle)
                        {
                            return $all->filter(function ($item) use ($parentTitle) {
                                return is_string($item->parentCategory)
                                    && strtolower(trim($item->parentCategory)) === strtolower(trim($parentTitle));
                            })->values();
                        }

                        $mainCategories = $allcategories->filter(function ($item) {
                            return $item->parentCategory === null || trim((string) $item->parentCategory) === "";
                        })->values();
                    @endphp

                    @php
                        function getProductsByCategory($products, $categoryTitle)
                        {
                            return $products->filter(function ($item) use ($categoryTitle) {
                                return strtolower(trim($item->category)) === strtolower(trim($categoryTitle));
                            })->values();
                        }
                    @endphp

                    <ul class="flat-filter style-1 text-center max-width-682 clearfix category-dropdown">

                        @foreach ($mainCategories as $category)

                            @php
                                $children = getChildren($allcategories, $category->categoryTitle);
                                $hasChildren = $children->count() > 0;
                                $mainProducts = getProductsByCategory($allproducts, $category->categoryTitle);
                            @endphp

                            <li class="dropdown">

                                <a href="#">
                                    {{ $category->categoryTitle }}
                                    @if($hasChildren || $mainProducts->count() > 0)
                                        <span class="arrow-right">▸</span>
                                    @endif
                                </a>

                                {{-- SUBMENU START --}}
                                @if($hasChildren || $mainProducts->count() > 0)
                                    <ul class="dropdown-menu">

                                        {{-- PRODUCTS directly under main category --}}
                                        @foreach ($mainProducts as $prod)
                                            <li><a href="#">{{ $prod->productname }}</a></li>
                                        @endforeach

                                        {{-- CHILD CATEGORIES --}}
                                        @foreach ($children as $child)
                                            @php
                                                $subChildren = getChildren($allcategories, $child->categoryTitle);
                                                $childHasChildren = $subChildren->count() > 0;
                                                $childProducts = getProductsByCategory($allproducts, $child->categoryTitle);
                                            @endphp

                                            <li class="dropdown-submenu">

                                                <a href="#">
                                                    {{ $child->categoryTitle }}
                                                    @if($childHasChildren || $childProducts->count() > 0)
                                                        <span class="arrow-right">▸</span>
                                                    @endif
                                                </a>

                                                <ul class="dropdown-menu">

                                                    {{-- SUB-CATEGORIES --}}
                                                    @foreach ($subChildren as $sub)
                                                        <li><a href="#">{{ $sub->categoryTitle }}</a></li>
                                                    @endforeach

                                                    {{-- PRODUCTS inside subcategory --}}
                                                    @foreach ($childProducts as $prod)
                                                        <li><a href="#">{{ $prod->productname }}</a></li>
                                                    @endforeach

                                                </ul>
                                            </li>
                                        @endforeach

                                    </ul>
                                @endif
                                {{-- SUBMENU END --}}

                            </li>

                        @endforeach

                    </ul>

                    <div class="divider h40"></div>
                    <div class="product-content product-fourcolumn clearfix">
                        <ul class="product style2 clearfix">
                            @foreach ($allproducts as $products)

                                <li class="product-item ">
                                    <div class="product-thumb clearfix">
                                        <a href="#">
                                            <img src="{{ asset('storage/' . $products->image) }}" alt="image"
                                                style="width:1920px; height:200px; object-fit:cover;">

                                        </a>
                                    </div>
                                    <div class="product-info clearfix">
                                        <span class="product-title">{{ $products->productname }}</span>
                                        <div class="price">
                                            <ins>
                                                <span class="amount">{{ $products->saleprice }}</span>
                                            </ins>
                                        </div>
                                        <ul class="flat-color-list width-14">
                                            <li>
                                                <a href="#" class="red"></a>
                                            </li>
                                            <li>
                                                <a href="#" class="blue"></a>
                                            </li>
                                            <li>
                                                <a href="#" class="black"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="add-to-cart text-center">
                                        <a href="#">ADD TO CART</a>
                                    </div>
                                    <a href="#" class="like"><i class="fa fa-heart-o"></i></a>
                                </li>

                            @endforeach


                        </ul>

                        {{-- <div class="elm-btn text-center">
                            <a href="#" class="themesflat-button outline ol-accent margin-top-8">LOAD MORE</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END PRODUCT -->

    <!-- COUNTDOWN -->
    <div class="flat-row row-countdown no-padding">
        <div class="container-fluid">
            <div class="row equal sm-equal-auto">
                <div class="col-md-6 half-background style-1">

                </div>
                <div class="col-md-6  bg-section bg-color-f5f">
                    <div class="flat-content-box clearfix" data-margin="0 0 0 8px" data-mobilemargin="0 0 0 0">
                        <div class="flat-countdown-wrap text-center">
                            <div class="inner">
                                <div class="divider h120 clearfix"></div>
                                <h2 class="heading font-size-40 line-height-48">Deal Of The Week</h2>
                                <p class="desc font-size-18 font-weight-400 line-height-48">Special Discount Limited Time
                                    Only</p>
                                <div class="divider h42 clearfix"></div>
                                <div class="wrap-countdown no-margin-bottom">
                                    <div class="countdown style-1"></div>
                                </div>
                                <div class="divider h120 clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END COUNTDOWN -->

    <!-- PRODUCT NEW -->
    <section class="flat-row row-best-sale">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-section margin-bottom-43">
                        <h2 class="title">
                            Best Sale
                        </h2>
                    </div>
                    <div class="product-content product-fivecolumn clearfix">
                        <ul class="product style3">
                            <li class="product-item">
                                <div class="product-thumb clearfix">
                                    <a href="#">
                                        <img src="{{ asset('dashboard/images/shop/sh-5/pexels-catscoming-367915 - Copy.jpg') }}"
                                            alt="image">
                                    </a>
                                    <span class="new sale">Sale</span>
                                </div>
                                <div class="product-info clearfix">
                                    <span class="product-title">Faux shearling aviator<br> jacket</span>
                                    <div class="price">
                                        <del>
                                            <span class="regular">$130.00</span>
                                        </del>
                                        <ins>
                                            <span class="amount">$100.00</span>
                                        </ins>
                                    </div>
                                </div>
                                <div class="add-to-cart text-center">
                                    <a href="#">ADD TO CART</a>
                                </div>
                                <a href="#" class="like"><i class="fa fa-heart-o"></i></a>
                            </li>
                            <li class="product-item">
                                <div class="product-thumb clearfix">
                                    <a href="#">
                                        <img src="{{ asset('dashboard/images/shop/sh-5/pexels-freestockpro-2837005.jpg') }}"
                                            alt="image">
                                    </a>
                                    <span class="new">New</span>
                                </div>
                                <div class="product-info clearfix">
                                    <span class="product-title">Cotton White Underweaer Block Out Edition</span>
                                    <div class="price">
                                        <ins>
                                            <span class="amount">$100.00</span>
                                        </ins>
                                    </div>
                                    <ul class="flat-color-list">
                                        <li>
                                            <a href="#" class="red"></a>
                                        </li>
                                        <li>
                                            <a href="#" class="blue"></a>
                                        </li>
                                        <li>
                                            <a href="#" class="black"></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="add-to-cart text-center">
                                    <a href="#">ADD TO CART</a>
                                </div>
                                <a href="#" class="like"><i class="fa fa-heart-o"></i></a>
                            </li>
                            <li class="product-item">
                                <div class="product-thumb clearfix">
                                    <a href="#">
                                        <img src="{{ asset('dashboard/images/shop/sh-5/pexels-catscoming-367915 - Copy.jpg') }}"
                                            alt="image">
                                    </a>
                                    <span class="new">New</span>
                                </div>
                                <div class="product-info clearfix">
                                    <span class="product-title">Hood wool blend duffle<br> coat</span>
                                    <div class="price">
                                        <ins>
                                            <span class="amount">$130.00</span>
                                        </ins>
                                    </div>
                                </div>
                                <div class="add-to-cart text-center">
                                    <a href="#">ADD TO CART</a>
                                </div>
                                <a href="#" class="like"><i class="fa fa-heart-o"></i></a>
                            </li>
                            <li class="product-item">
                                <div class="product-thumb clearfix">
                                    <a href="#">
                                        <img src="{{ asset('dashboard/images/shop/sh-5/pexels-vince-2147491 - Copy.jpg') }}"
                                            alt="image">
                                    </a>
                                    <span class="new sale">Sale</span>
                                </div>
                                <div class="product-info clearfix">
                                    <span class="product-title">Slim-fit patterned suit<br> blazer</span>
                                    <div class="price">
                                        <del>
                                            <span class="regular">$170.00</span>
                                        </del>
                                        <ins>
                                            <span class="amount">$139.00</span>
                                        </ins>
                                    </div>
                                </div>
                                <div class="add-to-cart text-center">
                                    <a href="#">ADD TO CART</a>
                                </div>
                                <a href="#" class="like"><i class="fa fa-heart-o"></i></a>
                            </li>
                            {{-- <li class="product-item">
                                <div class="product-thumb clearfix">
                                    <a href="#">
                                        <img src="{{ asset('dashboard/images/shop/sh-5/pexels-catscoming-367915.jpg') }}"
                                            alt="image">
                                    </a>
                                    <span class="new sale">Sale</span>
                                </div>
                                <div class="product-info clearfix">
                                    <span class="product-title">Cotton cashmereblend<br> cardigan</span>
                                    <div class="price">
                                        <del>
                                            <span class="regular">$130.00</span>
                                        </del>
                                        <ins>
                                            <span class="amount">$100.00</span>
                                        </ins>
                                    </div>
                                    <ul class="flat-color-list">
                                        <li>
                                            <a href="#" class="red"></a>
                                        </li>
                                        <li>
                                            <a href="#" class="blue"></a>
                                        </li>
                                        <li>
                                            <a href="#" class="black"></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="add-to-cart text-center">
                                    <a href="#">ADD TO CART</a>
                                </div>
                                <a href="#" class="like"><i class="fa fa-heart-o"></i></a>
                            </li> --}}
                        </ul><!-- /.product -->
                    </div><!-- /.product-content -->
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
    <!-- END PRODUCT NEW -->

    <!-- ICON BOX -->
    <section class="flat-row row-icon-box style-1 bg-section bg-color-f5f">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="flat-icon-box icon-left w55 circle bg-white style-1 clearfix">
                        <div class="inner no-margin  flat-content-box " data-margin="0 0 0 0" data-mobilemargin="0 0 0 0">
                            <div class="icon-wrap">
                                <i class="fa fa-truck"></i>
                            </div>
                            <div class="text-wrap">
                                <h5 class="heading letter-spacing--1"><a href="#">Free Shipping</a></h5>
                                <p class="desc">Apply order over $99</p>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col-md-3 -->
                <div class="col-md-3">
                    <div class="flat-icon-box icon-left w55 circle bg-white style-1 clearfix">
                        <div class="inner flat-content-box" data-margin="0 0 0 7px" data-mobilemargin="0 0 0 0">
                            <div class="icon-wrap">
                                <i class="fa fa-money"></i>
                            </div>
                            <div class="text-wrap">
                                <h5 class="heading letter-spacing--1"><a href="#">Cash On Delivery</a></h5>
                                <p class="desc">Internet Trend To Repeat</p>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col-md-3 -->
                <div class="col-md-3">
                    <div class="flat-icon-box icon-left w55 circle bg-white style-1 clearfix">
                        <div class="inner flat-content-box" data-margin="0 0 0 46px" data-mobilemargin="0 0 0 0">
                            <div class="icon-wrap">
                                <i class="fa fa-gift"></i>
                            </div>
                            <div class="text-wrap">
                                <h5 class="heading letter-spacing--1"><a href="#">Gift For All</a></h5>
                                <p class="desc">Gift When Subscribe</p>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col-md-3 -->
                <div class="col-md-3">
                    <div class="flat-icon-box icon-left w55 circle bg-white style-1 clearfix">
                        <div class="inner flat-content-box" data-margin="0 0 0 62px" data-mobilemargin="0 0 0 0">
                            <div class="icon-wrap">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <div class="text-wrap">
                                <h5 class="heading letter-spacing--1"><a href="#">Opening All Week</a></h5>
                                <p class="desc">6.00 am - 17.00pm</p>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col-md-3 -->
            </div>
        </div>
    </section>
    <!-- END ICON BOX -->

    <!-- NEW LATEST -->
    <section class="flat-row row-new-latest style-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-section margin-bottom-51">
                        <h2 class="title">New Latest</h2>
                    </div>
                    <div class="new-latest-wrap">
                        <div class="flat-new-latest post-wrap flat-carousel-box style4 data-effect clearfix"
                            data-auto="false" data-column="3" data-column2="2" data-column3="1" data-gap="30">
                            <div class="owl-carousel owl-theme">
                                <article class="post clearfix">
                                    <div class="featured-post data-effect-item">
                                        <img src="{{ asset('dashboard/images/blog/pexels-jang-1001773.jpg') }}" alt="image">
                                        <div class="overlay-effect bg-overlay-black opacity02"></div>
                                    </div>
                                    <div class="content-post">
                                        <ul class="meta-post">
                                            <li class="date">
                                                Oct 08, 2018
                                            </li>
                                            <li class="author">
                                                <a href="#"> By Admin</a>
                                            </li>
                                        </ul><!-- /.meta-post -->
                                        <div class="title-post">
                                            <h2><a href="blog-detail.html">The Most Classic, Unexpected, and Hottest Tech
                                                    Gifts of 2018</a></h2>
                                        </div><!-- /.title-post -->
                                        <div class="entry-post">
                                            <div class="more-link">
                                                <a href="blog-detail.html">Continue Reading </a>
                                            </div>
                                        </div>
                                    </div><!-- /.content-post -->
                                </article><!-- /.post -->
                                <article class="post clearfix ">
                                    <div class="featured-post data-effect-item">
                                        <img src="{{ asset('dashboard/images/blog/pexels-vince-2147491 - Copy.jpg') }}"
                                            alt="image">
                                        <div class="overlay-effect bg-overlay-black opacity02"></div>
                                    </div>
                                    <div class="content-post">
                                        <ul class="meta-post">
                                            <li class="date">
                                                Oct 08, 2018
                                            </li>
                                            <li class="author">
                                                <a href="#"> By Admin</a>
                                            </li>
                                        </ul><!-- /.meta-post -->
                                        <div class="title-post">
                                            <h2><a href="blog-detail.html">Elizabeth Sulcer Is the Woman Behind Your
                                                    Favorite Street Style Looks</a></h2>
                                        </div><!-- /.title-post -->
                                        <div class="entry-post">
                                            <div class="more-link">
                                                <a href="blog-detail.html">Continue Reading </a>
                                            </div>
                                        </div>
                                    </div><!-- /.content-post -->
                                </article><!-- /.post -->
                                <article class="post clearfix">
                                    <div class="featured-post data-effect-item">
                                        <img src="{{asset('dashboard/images/blog/pexels-valeriya-1833349 (1) - Copy.jpg')}}"
                                            alt="image">
                                        <div class="overlay-effect bg-overlay-black opacity02"></div>
                                    </div>
                                    <div class="content-post">
                                        <ul class="meta-post">
                                            <li class="date">
                                                Oct 08, 2018
                                            </li>
                                            <li class="author">
                                                <a href="#"> By Admin</a>
                                            </li>
                                        </ul><!-- /.meta-post -->
                                        <div class="title-post">
                                            <h2><a href="blog-detail.html">The Victoria's Secret x Balmain Collabo- ration
                                                    Is Everything You Wanted It To Be</a></h2>
                                        </div><!-- /.title-post -->
                                        <div class="entry-post">
                                            <div class="more-link">
                                                <a href="blog-detail.html">Continue Reading </a>
                                            </div>
                                        </div>
                                    </div><!-- /.content-post -->
                                </article><!-- /.post -->
                                <article class="post clearfix">
                                    <div class="featured-post data-effect-item">
                                        <img src="{{asset('dashboard/images/blog/pexels-fariphotography-803963.jpg')}}"
                                            alt="image">
                                        <div class="overlay-effect bg-overlay-black opacity02"></div>
                                    </div>
                                    <div class="content-post">
                                        <ul class="meta-post">
                                            <li class="date">
                                                Oct 08, 2018
                                            </li>
                                            <li class="author">
                                                <a href="#"> By Admin</a>
                                            </li>
                                        </ul><!-- /.meta-post -->
                                        <div class="title-post">
                                            <h2><a href="blog-detail.html">The Most Classic, Unexpected, and Hottest Tech
                                                    Gifts of 2018</a></h2>
                                        </div><!-- /.title-post -->
                                        <div class="entry-post">
                                            <div class="more-link">
                                                <a href="blog-detail.html">Continue Reading </a>
                                            </div>
                                        </div>
                                    </div><!-- /.content-post -->
                                </article><!-- /.post -->
                                <article class="post clearfix">
                                    <div class="featured-post data-effect-item">
                                        <img src="{{ asset('dashboard/images/blog/pexels-catscoming-1907244 - Copy.jpg') }}"
                                            alt="image">
                                        <div class="overlay-effect bg-overlay-black opacity02"></div>
                                    </div>
                                    <div class="content-post">
                                        <ul class="meta-post">
                                            <li class="date">
                                                Oct 08, 2018
                                            </li>
                                            <li class="author">
                                                <a href="#"> By Admin</a>
                                            </li>
                                        </ul><!-- /.meta-post -->
                                        <div class="title-post">
                                            <h2><a href="blog-detail.html">Elizabeth Sulcer Is the Woman Behind Your
                                                    Favorite Street Style Looks</a></h2>
                                        </div><!-- /.title-post -->
                                        <div class="entry-post">
                                            <div class="more-link">
                                                <a href="blog-detail.html">Continue Reading </a>
                                            </div>
                                        </div>
                                    </div><!-- /.content-post -->
                                </article><!-- /.post -->
                                <article class="post clearfix">
                                    <div class="featured-post data-effect-item">
                                        <img src="{{asset('dashboard/images/blog/pexels-valeriya-1833349 (1) - Copy.jpg')}}"
                                            alt="image">
                                        <div class="overlay-effect bg-overlay-black opacity02"></div>
                                    </div>
                                    <div class="content-post">
                                        <ul class="meta-post">
                                            <li class="date">
                                                Oct 08, 2018
                                            </li>
                                            <li class="author">
                                                <a href="#"> By Admin</a>
                                            </li>
                                        </ul><!-- /.meta-post -->
                                        <div class="title-post">
                                            <h2><a href="blog-detail.html">The Victoria's Secret x Balmain Collabo- ration
                                                    Is Everything You Wanted It To Be</a></h2>
                                        </div><!-- /.title-post -->
                                        <div class="entry-post">
                                            <div class="more-link">
                                                <a href="blog-detail.html">Continue Reading </a>
                                            </div>
                                        </div>
                                    </div><!-- /.content-post -->
                                </article><!-- /.post -->
                            </div><!-- /.owl-carousel -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- END NEW LATEST -->
    <section class="flat-row mail-chimp">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="text">
                        <h3>Sign up for Send Newsletter</h3>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="subscribe clearfix">
                        <form action="#" method="post" accept-charset="utf-8" id="subscribe-form">
                            <div class="subscribe-content">
                                <div class="input">
                                    <input type="email" name="subscribe-email" placeholder="Your Email">
                                </div>
                                <div class="button">
                                    <button type="button">SUBCRIBE</button>
                                </div>
                            </div>
                        </form>
                        <ul class="flat-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul><!-- /.flat-social -->
                    </div><!-- /.subscribe -->
                </div>
            </div>
        </div>
    </section><!-- /.mail-chimp -->



@endsection
