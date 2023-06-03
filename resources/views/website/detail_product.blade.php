<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/detail.css') }}" />

</head>

<body>

    @include('layoutWebs.header')

    @foreach ($product as $item)
        <div class="container">

            <div class="detail">
                <div class="main">
                    <div class="row">
                        <div class="col-5 text-center bg-white" style="margin-top: 15px;">
                            <h3>{{ $item->productName }}</h3>
                        </div>
                    </div>
                    <hr>
                    <div class="container-fluid" style="margin-top:20px">
                        <div class="row">
                            <div class="col-sm-4 bg-white">

                                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">


                                    <div class="carousel-indicators">

                                        <button type="button" data-bs-target="#carouselExampleCaptions"
                                            data-bs-slide-to="0" class="active" aria-current="true"
                                            aria-label="Slide 1"></button>

                                        @for ($i = 1; $i < count($product_image); $i++)
                                            <button type="button" data-bs-target="#carouselExampleCaptions"
                                                data-bs-slide-to="{{ $i }}"
                                                aria-label="Slide {{ $i }}"></button>
                                        @endfor

                                    </div>

                                    <div class="carousel-inner">

                                        @foreach ($product_image as $image)
                                            @if ($loop->first)
                                                <div class="carousel-item active">
                                                    <img src="{{ asset('images/' . $image->product_imageName) }}"
                                                        class="d-block w-100 imgDetail" alt="...">
                                                </div>
                                            @else
                                                <div class="carousel-item">
                                                    <img src="{{ asset('images/' . $image->product_imageName) }}"
                                                        class="d-block w-100 imgDetail" alt="...">
                                                </div>
                                            @endif
                                        @endforeach

                                    </div>

                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>

                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>

                                </div>

                            </div>
                            <div class="col-sm-4 bg-white" style="padding-left: 10px;">

                                <h4 style="color: red; font-family:tahoma ;">
                                    {{ number_format($item->productPrice, 0, '.', ',') }}đ</h4>

                                <s>18.990.000 đ</s>

                                {{-- <div class="btn-toolbar" style="padding-top:15px;">

                                    <button type="button" class="btn btn-light btnPrice">256GB <h6>19.200.000 đ</h6>
                                    </button>

                                    <button type="button" class="btn btn-light btnPrice"
                                        style="margin-left: 15px;">128GB <h6>
                                            16.490.000 đ
                                        </h6></button>
                                    <button type="button" class="btn btn-light btnPrice"
                                        style="margin-left: 15px;">64GB
                                        <h6>
                                            15.000.000 đ
                                        </h6>
                                    </button>
                                </div> --}}

                                <div class="box-product-promotion">
                                    <div
                                        class="box-product-promotion-header is-flex p-2 has-text-weight-semibold is-align-items-center">
                                        <div class="icon"><svg height="15" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M152 0H154.2C186.1 0 215.7 16.91 231.9 44.45L256 85.46L280.1 44.45C296.3 16.91 325.9 0 357.8 0H360C408.6 0 448 39.4 448 88C448 102.4 444.5 115.1 438.4 128H480C497.7 128 512 142.3 512 160V224C512 241.7 497.7 256 480 256H32C14.33 256 0 241.7 0 224V160C0 142.3 14.33 128 32 128H73.6C67.46 115.1 64 102.4 64 88C64 39.4 103.4 0 152 0zM190.5 68.78C182.9 55.91 169.1 48 154.2 48H152C129.9 48 112 65.91 112 88C112 110.1 129.9 128 152 128H225.3L190.5 68.78zM360 48H357.8C342.9 48 329.1 55.91 321.5 68.78L286.7 128H360C382.1 128 400 110.1 400 88C400 65.91 382.1 48 360 48V48zM32 288H224V512H80C53.49 512 32 490.5 32 464V288zM288 512V288H480V464C480 490.5 458.5 512 432 512H288z">
                                                </path>
                                            </svg>
                                            <p>Khuyến mãi</p>
                                        </div>

                                    </div>
                                    <div class="box-product-promotion-content px-2 pt-2 show-all">
                                        <div class="is-flex is-align-content-center my-2">
                                            <p
                                                class="box-product-promotion-number has-text-primary-light has-background-danger-dark">
                                                1</p> <a href=""
                                                class="box-product-promotion-detail mx-1 has-text-black button__promotion">Ưu
                                                đãi
                                                Phòng chờ hạng thương gia
                                                <span>(Xem chi tiết)</span></a>
                                        </div>
                                        <div class="is-flex is-align-content-center my-2">
                                            <p
                                                class="box-product-promotion-number has-text-primary-light has-background-danger-dark">
                                                2</p> <a href=""
                                                class="box-product-promotion-detail mx-1 has-text-black button__promotion">Nhận
                                                ngay
                                                ưu đãi YouTube Premium dành cho chủ sở hữu Samsung Galaxy
                                                <span>(Xem chi tiết)</span></a>
                                        </div>
                                        <div class="is-flex is-align-content-center my-2">
                                            <p
                                                class="box-product-promotion-number has-text-primary-light has-background-danger-dark">
                                                3</p> <a href=""
                                                class="box-product-promotion-detail mx-1 has-text-black button__promotion">Tặng
                                                Sim
                                                4G Mobifone siêu data 500GB/Tháng - Miễn phí 12 tháng (Giá tốt liên hệ
                                                hotline:
                                                1800.2097)
                                                <span>(Xem chi tiết)</span></a>
                                        </div>
                                        <div class="is-flex is-align-content-center my-2">
                                            <p
                                                class="box-product-promotion-number has-text-primary-light has-background-danger-dark">
                                                4</p> <a href=""
                                                class="box-product-promotion-detail mx-1 has-text-black button__promotion">Giảm
                                                ngay
                                                3.000.000đ khi tham gia thu cũ đổi mới - Giá thu tốt nhất thị trường
                                                <span>(Xem chi tiết)</span></a>
                                        </div>
                                        <div class="is-flex is-align-content-center my-2">
                                            <p
                                                class=" box-product-promotion-number has-text-primary-light has-background-danger-dark">
                                                5</p> <a href="#800k"
                                                class="box-product-promotion-detail mx-1 has-text-black button__promotion">Giảm
                                                ngay
                                                800.000đ khi thanh toán qua VNPAY
                                                <span>(Xem chi tiết)</span></a>
                                        </div>
                                        <!---->
                                        <!---->
                                    </div>
                                </div>


                                <div class="row">

                                    <div class="col-md-8">


                                        <form action="{{ route('cartProductBye') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input hidden value="{{ $item->id }}" type="text" id="product_id"
                                                class="form-control" name="product_id" required autofocus>
                                                <button class="btn btn-timeOrder btn-danger btn-lg "
                                                style="width: 273px;margin-top: 10px;" \>
                                                <h6 style="color: black;">MUA NGAY
                                                </h6>
                                                <span style=" font-size: 12px; ">(Giao
                                                    hàng nhanh)</span>
                                            </button>
                                        </form>

                                        

                                    </div>
                                    <div class="col-md-4">

                                        <form action="{{ route('cartProductAdd') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input hidden value="{{ $item->id }}" type="text" id="product_id"
                                                class="form-control" name="product_id" required autofocus>
                                            <button class="btn  btn-light btnCar" \>
                                                <i class="fa-solid fa-cart-plus iCar"></i>
                                            </button>
                                        </form>


                                    </div>
                                </div>



                            </div>

                            <div class=" col-sm-3 bg-white">
                                <table class="technicalInfo table table-striped">
                                    <tbody>
                                        <thead>
                                            <tr>
                                                <h3>Thông số kĩ thuật</h3>
                                            </tr>
                                        </thead>

                                        @foreach ($productAttributes as $value)
                                            <tr>
                                                <td>{{ $value->attributteName }}</td>
                                                <td>{{ $value->attributeValue }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="content" style="margin-top: 50px;">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-8 bg-white">
                                <div class="cps-block-content" style="max-height: 100000px;">
                                    <div class="ksp-content p-2 mb-2">
                                        <h2 class="ksp-title has-text-centered">ĐẶC ĐIỂM NỔI BẬT</h2>
                                        <div>
                                            <ul>
                                                <li>{{ $item->descriptionProduct }}</li>

                                            </ul>
                                        </div>
                                    </div>

                                    <div class="cps-block-content_btn-showmore" style="display: none;"><a
                                            class="btn-show-more button__content-show-more">
                                            Xem thêm &emsp;<div><svg xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 448 512" width="10" height="10">
                                                    <path
                                                        d="M224 416c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L224 338.8l169.4-169.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-192 192C240.4 412.9 232.2 416 224 416z">
                                                    </path>
                                                </svg></div></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div style="background: #F6f7f7; margin-top: 50px;"></div>
    @include('layoutWebs.ft')
</body>

</html>
