{{-- @include('dashboard.header') --}}


@extends('dashboard.header')

@section('content')


    <style>
        .custom-countdown {
            display: flex;
            justify-content: center;
            gap: 30px;
        }

        .custom-countdown .num {
            display: block !important;
            font-size: 48px;
            font-weight: bold;
            color: #ff3b3b;
        }

        .custom-countdown .label {
            margin-top: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #555;
            letter-spacing: 1px;
        }
    </style>
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
                            <div class="tp-caption tp-resizeme text-333 font-weight-500 letter-spacing-7"
                                data-x="['left','left','left','center']" data-hoffset="['7','7','7','0']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['-62','-62','-62','-62']"
                                data-fontsize="['34','34','34','24']" data-lineheight="['80','80','80','50']" data-width="full"
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

    <!-- PRODUCT -->
    @php use Illuminate\Support\Str; @endphp

    <section class="flat-row row-product-project shop-collection">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="title-section margin-bottom-41">
                        <h2 class="title">Shop Collection</h2>
                    </div>

                    @php
                        // Get ONLY main categories (those without parent)
                        $mainCategories = $allcategories->filter(function ($item) {
                            return $item->parentCategory === null || trim($item->parentCategory) === "";
                        })->values();
                    @endphp

                    <!-- SIMPLE CATEGORY MENU (NO DROPDOWN) -->
                    <ul class="flat-filter style-1 text-center max-width-682 clearfix category-dropdown">
                        @foreach ($mainCategories as $category)
                            <li>
                                <a href="#" class="category-filter" data-filter="{{ Str::slug($category->categoryTitle) }}">
                                    {{ $category->categoryTitle }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <!-- PRODUCT GRID -->
                    <div class="divider h40"></div>
                    <div class="product-content product-fourcolumn clearfix">
                        <ul class="product style2 clearfix">

                            @foreach ($allproducts as $products)

                                @php
                                    // Find category row by matching the title stored in products.category
                                    $cat = $allcategories->firstWhere('categoryTitle', $products->category);

                                    if ($cat && $cat->parentCategory) {
                                        // If subcategory → use parent category TITLE
                                        $mainCat = $cat->parentCategory;
                                    } else {
                                        // Already a main category
                                        $mainCat = $products->category;
                                    }

                                    $catSlug = Str::slug($mainCat);
                                @endphp

                                <li class="product-item" data-category="{{ $catSlug }}">

                                    <div class="product-thumb clearfix">
                                        <a href="#">
                                            <img src="{{ asset('storage/' . $products->image) }}" alt="image"
                                                style="width:100%; height:200px; object-fit:cover;">
                                        </a>
                                    </div>

                                    <div class="product-info clearfix">
                                        <span class="product-title">{{ $products->productname }}</span>

                                        <div class="price">
                                            @if ($products->saleprice && $products->saleprice < $products->price)
                                                <del>
                                                    <span class="regular">${{ $products->price }}</span>
                                                </del>
                                                <ins>
                                                    <span class="amount" style="color:#ff0000;">${{ $products->saleprice }}</span>
                                                </ins>
                                            @else
                                                <ins>
                                                    <span class="amount">${{ $products->price }}</span>
                                                </ins>
                                            @endif
                                        </div>

                                        <ul class="flat-color-list width-14">
                                            <li><a href="#" class="red"></a></li>
                                            <li><a href="#" class="blue"></a></li>
                                            <li><a href="#" class="black"></a></li>
                                        </ul>
                                    </div>

                                    <div class="add-to-cart text-center">
                                        <a href="#">ADD TO CART</a>
                                    </div>

                                    <a href="#" class="like"><i class="fa fa-heart-o"></i></a>
                                </li>

                            @endforeach

                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            const categoryLinks = document.querySelectorAll(".category-filter");
            const products = document.querySelectorAll(".product-item");

            // DEFAULT: SHOW FIRST CATEGORY
            if (categoryLinks.length > 0) {
                let defaultCategory = categoryLinks[0].getAttribute("data-filter");

                products.forEach(product => {
                    let productCategory = product.getAttribute("data-category");

                    product.style.display =
                        productCategory === defaultCategory ? "block" : "none";
                });
            }

            // ON CLICK
            categoryLinks.forEach(link => {
                link.addEventListener("click", function (e) {
                    e.preventDefault();

                    let category = this.getAttribute("data-filter");

                    products.forEach(product => {
                        let productCategory = product.getAttribute("data-category");

                        product.style.display =
                            productCategory === category ? "block" : "none";
                    });
                });
            });

        });
    </script>


    <style>
        /* SPACE BETWEEN PRODUCT CARDS */
        .product-content.product-fourcolumn ul.product.style2>li.product-item {
            padding: 0 15px !important;
            /* horizontal spacing */
            margin-bottom: 25px !important;
            /* vertical spacing */
            box-sizing: border-box !important;
        }
    </style>

    <!-- END PRODUCT -->



    <!-- COUNTDOWN -->
    <div class="flat-row row-countdown no-padding">
        <div class="container-fluid">
            <div class="row equal sm-equal-auto">

                <!-- LEFT SIDE IMAGE (col-6) -->
                <div class="col-md-6 p-0">
                    <img src="{{ asset('storage/' . $countdowns->image) }}" alt="Countdown Image"
                        style="width:100%; height: 535px; object-fit:cover;">
                </div>

                <!-- RIGHT SIDE COUNTDOWN (col-6) -->
                <div class="col-md-6 bg-section bg-color-f5f">
                    <div class="flat-content-box clearfix" data-margin="0 0 0 8px" data-mobilemargin="0 0 0 0">
                        <div class="flat-countdown-wrap text-center">
                            <div class="inner">
                                <div class="divider h120 clearfix"></div>

                                <h2 class="heading font-size-40 line-height-48">
                                    {{ $countdowns->title ?? 'Deal Of The Week' }}
                                </h2>

                                <p class="desc font-size-18 font-weight-400 line-height-48">
                                    {{ $countdowns->subtitle ?? 'Special Discount Limited Time Only' }}
                                </p>

                                <div class="divider h42 clearfix"></div>

                                <div class="wrap-countdown no-margin-bottom">
                                    <div class="custom-countdown" id="mainCountdown"
                                        data-end="{{ \Carbon\Carbon::parse($countdowns?->end_datetime)->toIso8601String() }}">

                                        <div class="countdown-box">
                                            <span class="num" id="days">00</span>
                                            <span class="label">DAYS</span>
                                        </div>

                                        <div class="countdown-box">
                                            <span class="num" id="hours">00</span>
                                            <span class="label">HOURS</span>
                                        </div>

                                        <div class="countdown-box">
                                            <span class="num" id="minutes">00</span>
                                            <span class="label">MINUTES</span>
                                        </div>

                                        <div class="countdown-box">
                                            <span class="num" id="seconds">00</span>
                                            <span class="label">SECONDS</span>
                                        </div>

                                    </div>
                                </div>

                                <div class="divider h30 clearfix"></div>
                                <a href="#" class="grab-btn" style="
                                    display:inline-block;
                                    background:#ff4d4d;
                                    color:#fff;
                                    padding:12px 28px;
                                    font-size:18px;
                                    font-weight:600;
                                    border-radius:6px;
                                    text-decoration:none;
                                    transition:0.3s;
                                ">
                                    Grab It
                                </a>

                                <div class="divider h120 clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    </div>


    <style>
        .grab-btn:hover {
            background: #e63939;
            color: #fff;


        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            const container = document.getElementById("mainCountdown");
            if (!container) return;

            const endTime = container.getAttribute("data-end");

            const daysEl = document.getElementById("days");
            const hoursEl = document.getElementById("hours");
            const minutesEl = document.getElementById("minutes");
            const secondsEl = document.getElementById("seconds");
            console.log("End Time:", endTime);
            console.log("Parsed Date:", new Date(endTime));

            function updateTimer() {
                const now = new Date().getTime();
                const end = new Date(endTime).getTime();
                const diff = end - now;

                if (diff <= 0) {
                    daysEl.textContent = "00";
                    hoursEl.textContent = "00";
                    minutesEl.textContent = "00";
                    secondsEl.textContent = "00";
                    return;
                }

                const d = Math.floor(diff / (1000 * 60 * 60 * 24));
                const h = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const m = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                const s = Math.floor((diff % (1000 * 60)) / 1000);

                daysEl.textContent = d.toString().padStart(2, "0");
                hoursEl.textContent = h.toString().padStart(2, "0");
                minutesEl.textContent = m.toString().padStart(2, "0");
                secondsEl.textContent = s.toString().padStart(2, "0");
            }

            updateTimer();
            setInterval(updateTimer, 1000);
        });
    </script>


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
