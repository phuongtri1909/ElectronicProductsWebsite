<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thanh toán</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <link type="text/css" rel="stylesheet" href="{{ asset('css/order.css') }}" />

</head>

<body>
    @include('layoutWebs.header')

    <div class='container'>
        <div class="order">
            <div class='window'>
                <div class='order-info'>
                    <div class='order-info-content'>
                        <h2>Tiến hành đặt hàng</h2>

                        @foreach ($products as $product)
                            <div class='line'></div>
                            <table class='order-table'>
                                <tbody>
                                    <tr>
                                        <td><img src='{{ asset('images/' . $product->product_imageName) }}'
                                                class='full-width'>
                                        </td>
                                        <td>
                                            <br> <span class='thin'>{{ $product->productName }}</span>
                                           <br> <span class='thin small'> Số lượng: {{ $product->quantity }} <br><br></span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <div class='price'>{{ number_format($product->productPrice * $product->quantity, 0, '.', ',') }}
                                                Đ</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        @endforeach

                        <div class='total'>
                            <span style='float:left;'>
                                Tổng tiền:
                            </span>
                            <span style='float:right; text-align:right;'>
                                {{ number_format($total_money, 0, '.', ',') }} Đ
                            </span>
                        </div>

                    </div>

                </div>
                <div class='credit-info'>

                    <div class='credit-info-content'>

                        <img src='{{ asset('images\logo.png') }}' height='80' class='credit-card-image'
                            id='credit-card-image'>

                          
                        <form action="{{ route('confirmPayment') }}" method="POST">
                            @csrf
                            <div class="inputbox">

                                <input value="{{ old('fullName') }}" type="text" id="fullName" name="fullName"
                                    required autofocus>
                                <span class="textinput">Họ và tên</span>
                                @if ($errors->has('fullName'))
                                    <span class="textdanger">{{ $errors->first('fullName') }}</span>
                                @endif

                            </div>


                            <div class="inputbox">
                                <input value="{{ old('email') }}" type="email" id="email" name="email"
                                    required autofocus>
                                <span class="textinput">Địa chỉ email</span>
                                @if ($errors->has('email'))
                                    <span class="textdanger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>


                            <div class="inputbox">
                                <input value="{{ old('phone') }}" type="text" id="phone" name="phone"
                                    required autofocus>
                                <span class="textinput">Số điện thoại</span>
                                @if ($errors->has('phone'))
                                    <span class="textdanger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>


                            <div class="inputbox">
                                <input value="{{ old('address') }}" type="text" id="address" name="address"
                                    required autofocus>
                                <span class="textinput">Địa chỉ giao hàng</span>
                                @if ($errors->has('address'))
                                    <span class="textdanger">{{ $errors->first('address') }}</span>
                                @endif
                            </div>


                            <div class="inputbox">
                                <input value="{{ old('note') }}" type="text" id="note" name="note"
                                    required autofocus>
                                <span class="textinput">Ghi chú</span>
                                @if ($errors->has('note'))
                                    <span class="textdanger">{{ $errors->first('note') }}</span>
                                @endif
                            </div>

                            <input value="{{ $total_money }}" type="hidden" id="total_money" name="total_money">

                            <button class="pay-btn" type="submit">Mua hàng</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>

    </div>

    <script src="https://kit.fontawesome.com/51a2bee5af.js" crossorigin="anonymous"></script>
</body>

</html>
