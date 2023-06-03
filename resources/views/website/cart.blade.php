<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Giỏ hàng</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/not-logged-in.css') }}" />
</head>

<body>
    @include('layoutWebs.header')

    <div class="container">
        <div class="cart">

            @if (auth()->check())

                @if (count($products) != 0)
                    <section class="h-100 h-custom" style="background-color: white;">
                        <div class="container py-5 h-100">
                            <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col-12">
                                    <div class="card card-registration card-registration-2"
                                        style="border-radius: 15px;">
                                        <div class="card-body p-0">
                                            <div class="row g-0">
                                                <div class="col-lg-8">
                                                    <div class="p-5">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-5">
                                                            <h1 class="tilte fw-bold mb-0 ">Giỏ Hàng</h1>
                                                            @if (session('Decrement'))
                                                                <div class="  alert alert-danger">
                                                                    {{ session('Decrement') }}
                                                                </div>
                                                            @endif
                                                            <h6 class="mb-0 text-muted">{{ $count }} sản phẩm
                                                            </h6>
                                                        </div>
                                                        <hr class="my-4">

                                                        <div
                                                            class="row mb-4 d-flex justify-content-between align-items-center">


                                                            @foreach ($products as $product)
                                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                                    <img src="{{ asset('images/' . $product->product_imageName) }}"
                                                                        class="img-fluid rounded-3"
                                                                        alt="Cotton T-shirt">
                                                                </div>
                                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                                    <h6 class="text-muted">{{ $product->productName }}
                                                                    </h6>
                                                                    {{-- <h6 class="text-black mb-0">Màu đỏ</h6> --}}
                                                                </div>
                                                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">


                                                                    <form action="{{ route('cartProductDecrease') }}"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <input hidden value="{{ $product->id }}"
                                                                            type="text" id="product_id"
                                                                            class="form-control" name="product_id"
                                                                            required autofocus>
                                                                        <button class="btn btn-link px-2">
                                                                            {{-- onclick="this.parentNode.querySelector('input[type=number]').stepUp()"> --}}
                                                                            <i class="fa-solid fa-minus"></i>
                                                                        </button>
                                                                    </form>

                                                                    <input id="form1" min="0" name="quantity"
                                                                        value="{{ $product->quantity }}" type="number"
                                                                        class="form-control form-control-sm" />



                                                                    <form action="{{ route('cartProductAdd') }}"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <input hidden value="{{ $product->id }}"
                                                                            type="text" id="product_id"
                                                                            class="form-control" name="product_id"
                                                                            required autofocus>
                                                                        <button class="btn btn-link px-2">
                                                                            {{-- onclick="this.parentNode.querySelector('input[type=number]').stepUp()"> --}}
                                                                            <i class="fas fa-plus"></i>
                                                                        </button>
                                                                    </form>

                                                                </div>
                                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                                    <h6 class="mb-0">
                                                                        {{ number_format($product->productPrice * $product->quantity, 0, '.', ',') }}
                                                                        Đ </h6>
                                                                </div>

                                                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">


                                                                    <form method="post"
                                                                        action="{{ route('cartProductRemove') }}">
                                                                        @csrf
                                                                        <input type="hidden" name="product_cart_id"
                                                                            value="{{ $product->product_cart_id }}">
                                                                        <button class="text-muted" type="submit"><i
                                                                                class="fa-solid fa-trash"></i></button>
                                                                    </form>
                                                                </div>
                                                            @endforeach


                                                        </div>

                                                        <hr class="my-4">

                                                        <div class="pt-5">
                                                            <h6 class="mb-0"><a href="{{ route('3TDL Store') }}"
                                                                    class=""><i
                                                                        class="fas fa-long-arrow-alt-left me-2"></i>Trở
                                                                    lại trang chủ</a></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 bg-grey">
                                                    <div class="p-5">
                                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Tóm lược</h3>
                                                        <hr class="my-4">

                                                        <div class="d-flex justify-content-between mb-4">
                                                            <h5 class="text-uppercase">{{ $cart_total }} sản phẩm
                                                            </h5>
                                                            <h5>{{ number_format($total_price_cart, 0, '.', ',') }} Đ
                                                            </h5>
                                                        </div>

                                                        <hr class="my-4">

                                                        <div class="d-flex justify-content-between mb-5">
                                                            <h5 class="text-uppercase">Tổng tiền</h5>
                                                            <h5>{{ number_format($total_money, 0, '.', ',') }} Đ
                                                            </h5>
                                                        </div>



                                                        <a href="{{ route('order') }}" class="btn btn-primary"
                                                            id="liveToastBtn">Thanh
                                                            Toán</a>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @else
                    <div class="cart-header">
                        <div class="go-back">
                            <a href="{{ route('3TDL Store') }}">
                                <i class="fas fa-chevron-left"></i> Trở về
                            </a>
                        </div>
                        <h1>Giỏ hàng</h1>
                    </div>
                    <div class="cart-empty">
                        <i class="fa-solid fa-heart-crack" style="color: #e81717;"></i>
                        <h2>Bạn chưa có sản phẩm nào trong giỏ hàng</h2>
                        <p>Hãy quay trở lại trang chủ nào.</p>
                        <a href="{{ route('3TDL Store') }}" class="btn btn-primary">Trở về</a>
                    </div>

                @endif
            @else
                <div class="cart-header">
                    <div class="go-back">
                        <a href="{{ route('3TDL Store') }}">
                            <i class="fas fa-chevron-left"></i> Trở về
                        </a>
                    </div>
                    <h1>Giỏ hàng</h1>
                </div>

                <div class="cart-empty">
                    <i class="fa-solid fa-face-smile"></i>
                    <h2>Bạn chưa đăng nhập</h2>
                    <p>Hãy đăng nhập tài khoản của bạn để xem giỏ hàng của bạn.</p>
                    <a href="{{ route('loginUser') }}" class="btn btn-primary">Đăng nhập</a>
                </div>
            @endif

        </div>
    </div>



    <script src="https://kit.fontawesome.com/51a2bee5af.js" crossorigin="anonymous"></script>
</body>

</html>
