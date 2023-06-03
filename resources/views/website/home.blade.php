<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>3TDL Store</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css') }}" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <link type="text/css" rel="stylesheet" href="{{ asset('css/dropdown-category.css') }}" />

</head>

<body>

    @include('layoutWebs.header')


    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <div class="category-qr">
                <div class="row">
                    <div class="col-2 primary">
                        <div id="menu-category">
                            <ul class="ul-menu">
                                @foreach ($categories as $category)
                                    <li class="li-menu">
                                        <a
                                            href="{{ route('categoryUser', $categoryName = Str::slug($category->categoryName, '-')) }}"><strong>{{ $category->categoryName }}</strong></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="col-7 bg-white" style="height: 400px;">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                                    aria-label="Slide 4"></button>
                            </div>

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('images/slide1.png') }}" class="d-block w-100 img-slide"
                                        alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('images/slide2.jpg') }}" class="d-block w-100 img-slide"
                                        alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('images/slide3.jpg') }}" class="d-block w-100 img-slide"
                                        alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('images/slide4.jpg') }}" class="d-block w-100 img-slide"
                                        alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-3 bg-white">
                        <img class="img_qr" src="{{ asset('images/qc1.jpg') }}">
                        <img class="img_qr qr2" src="{{ asset('images/qc2.jpg') }}">
                        <img class="img_qr qr2" src="{{ asset('images/qc3.jpg') }}">
                    </div>
                </div>

            </div>

            @foreach ($product_by_category as $product => $value)
                <!-- row -->
                <div class="row">

                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            @foreach ($categories as $category)
                                @if ($category->id == $product)
                                    <h3 class="title">{{ $category->categoryName }}</h3>

                                    @foreach ($manufacturer_by_category[$category->id] as $manufacturer)
                                        <div class="section-nav">
                                            <ul class="section-tab-nav tab-nav">
                                                <li class="active btn"><a 
 href="{{ route('categoryByManufacturer', ['categoryName' => ($categoryName = Str::slug($category->categoryName, '-')), 'manufacturerName' => ($manufacturerName = Str::slug($manufacturer->manufacturerName, '-'))]) }}">{{ $manufacturer->manufacturerName }}</a></li>
                                            </ul>
                                        </div>
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- /section title -->

                    <!-- Products tab & slick -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="products-tabs">

                                <!-- tab -->
                                <div id="tab1" class="tab-pane active">
                                    <div class="products-slick" data-nav="#slick-nav-1">


                                        @foreach ($value as $item)
                                            <!-- product -->
                                            {{-- {{ dd($item->id) }} --}}
                                            <div class="product">
                                                <div class="product-img">
                                                    <img src="{{ asset('images/' . $item->product_imageName) }}"
                                                        alt="">
                                                    <div class="product-label">
                                                        {{-- <span class="sale">-30%</span> --}}
                                                        <span class="new">NEW</span>
                                                    </div>
                                                </div>
                                                <div class="product-body">

                                                    <h3 class="product-name">
                                                        <a class="button"
                                                            href="{{ route('detailProduct', $productName = Str::slug($item->productName, '-')) }}">
                                                            {{ $item->productName }}</a>
                                                    </h3>

                                                    <h4 class="product-price">
                                                        {{ number_format($item->productPrice, 0, '.', ',') }}đ
                                                        {{-- <del> class="product-old-price">$990.00</del> --}} </h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>

                                                    <div class="product-btns">

                                                        {{ $checkHeart = false }}
                                                        {{ $product_favorite_id = '' }}
                                                        @if (auth()->check())
                                                            @if ($product_favorite->count() != 0)
                                                                @foreach ($product_favorite as $favorite)
                                                                    @if ($favorite->product_id == $item->id)
                                                                        @php
                                                                            $checkHeart = true;
                                                                            $product_favorite_id = $favorite->id;
                                                                        @endphp
                                                                    @break

                                                                @else
                                                                    {{ $checkHeart = false }}
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            {{ $checkHeart = false }}
                                                        @endif
                                                    @else
                                                        {{ $checkHeart = false }}
                                                    @endif


                                                    @if ($checkHeart == true)
                                                        <form method="post"
                                                            action="{{ route('favoriteProductRemove') }}">
                                                            @csrf
                                                            <input type="hidden" name="product_favorite_id"
                                                                value="{{ $product_favorite_id }}">
                                                            <button class="buttonHeart" type="submit"><i
                                                                    class="fa-solid fa-heart"
                                                                    style="color: #e90707;"></i></button>
                                                        </form>
                                                    @else
                                                        <form method="post"
                                                            action="{{ route('favoriteProductAdd') }}">
                                                            @csrf
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $item->id }}">
                                                            <button class="buttonHeart" type="submit"><i
                                                                    class="fa-regular fa-heart"></i><span
                                                                    class="tooltipp">Yêu
                                                                    thích</span></button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /product -->
                                    @endforeach

                                </div>

                            </div>
                            <!-- /tab -->
                        </div>

                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        @endforeach



    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->


{{-- <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Top selling</h4>
                        <div class="section-nav">
                            <div id="slick-nav-3" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-3">
                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./images/product07.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del>
                                    </h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./images/product08.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del>
                                    </h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./images/product09.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del>
                                    </h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>

                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./images/product01.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del>
                                    </h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./images/product02.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del>
                                    </h4>
                                </div>
                            </div>
                            <!-- /product widget -->
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./images/product03.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del>
                                    </h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Top selling</h4>
                        <div class="section-nav">
                            <div id="slick-nav-4" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-4">
                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./images/product04.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del>
                                    </h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./images/product05.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del>
                                    </h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./images/product06.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del>
                                    </h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>

                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./images/product07.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del>
                                    </h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./images/product08.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del>
                                    </h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./images/product09.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del>
                                    </h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>
                    </div>
                </div>

                <div class="clearfix visible-sm visible-xs"></div>

            
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION --> --}}

@include('layoutWebs.ft')
</body>

</html>
