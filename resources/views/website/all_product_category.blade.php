<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $categoryName }}
        @if ($manufacturerName)
            - {{ $manufacturerName }}
        @endif
    </title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />

</head>

<body>
    @include('layoutWebs.header')


    <div class="search">
        <div class="container">

            @if (count($products) != 0)
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">{{ $categoryName }}
                            @if ($manufacturerName)
                                - {{ $manufacturerName }}
                            @endif

                        </h3>
                        <div class="section-nav mod-category">
                            <ul class="section-tab-nav tab-nav">
                                <li class="active btn"><a
                                        href="{{ route('categoryUser', $categoryName = Str::slug($categoryName, '-')) }}">Tất
                                        cả</a></li>
                                @if ($manufacturers != null)

                                    @foreach ($manufacturers as $manu)
                                        <li class="btn"><a
                                                href="{{ route('categoryByManufacturer', ['categoryName' => ($categoryName = Str::slug($categoryName, '-')), 'manufacturerName' => ($manufacturerName = Str::slug($manu->manufacturerName, '-'))]) }}">{{ $manu->manufacturerName }}</a>
                                        </li>
                                    @endforeach
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->


                <!-- store products -->
                <div class="row">

                    @foreach ($products as $product)
                        <!-- product -->
                        <div class="col-md-2 col-xs-6">
                            <div class="product">
                                <div class="product-img">

                                    <img src="{{ asset('images/' . $product->product_imageName) }}" alt="">
                                    <div class="product-label">
                                        {{-- <span class="sale">-30%</span> --}}
                                    </div>
                                </div>
                                <div class="product-body">

                                    <h3 class="product-name">
                                        <form>
                                            <a class="button"
                                                href="{{ route('detailProduct', $productName = Str::slug($product->productName, '-')) }}">
                                                {{ $product->productName }}</a>
                                        </form>
                                    </h3>

                                    <h4 class="product-price">
                                        {{ number_format($product->productPrice, 0, '.', ',') }}đ
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
                                                    @if ($favorite->product_id == $product->id)
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
                                        <form method="post" action="{{ route('favoriteProductRemove') }}">
                                            @csrf
                                            <input type="hidden" name="product_favorite_id"
                                                value="{{ $product_favorite_id }}">
                                            <button class="buttonHeart" type="submit"><i class="fa-solid fa-heart"
                                                    style="color: #e90707;"></i></button>
                                        </form>
                                    @else
                                        <form method="post" action="{{ route('favoriteProductAdd') }}">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button class="buttonHeart" type="submit"><i
                                                    class="fa-regular fa-heart"></i><span class="tooltipp">Yêu
                                                    thích</span></button>
                                        </form>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /product -->
                @endforeach
            @else
                <p style="text-align: center; font-size: 30px">không có sản phẩm nào</p>

        @endif

    </div>
    <div class="pagination">
        {{ $products->links() }}
    </div>

</div>
<!-- /store products -->


@include('layoutWebs.ft')

</body>

</html>
