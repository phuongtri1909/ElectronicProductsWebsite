@php
    use App\Constants\UserConfirm;
    use App\Constants\AdminConfirm;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tra cứu đơn hàng</title>


    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/order_lookup.css') }}" />

</head>

<body>
    @include('layoutWebs.header')
    <div class="container">
        <div class="order_lookup">
            <div class="box">
                <h1 class="search-order">Tra cứu đơn hàng</h1>

                <form class="box-search" action="{{ route('searchResults') }}" method="post">
                    @csrf
                    <label class="pad" for="order-id">Mã đơn hàng:</label>
                    <input class="pad input-pad" type="text" id="order_id" name="order_id" required>
                    <br>
                    <button class="btn-order" type="submit">Tra cứu</button>
                </form>

            </div>

            @if ($order)
                <div class="order-details">
                    <h2>Thông tin đơn hàng</h2>
                    <p><strong>Mã đơn hàng: #</strong> {{ $order->order_id }}</p>
                    <p><strong>Tên khách hàng:</strong> {{ $order->fullName }}</p>
                    <p><strong>Địa chỉ giao hàng:</strong> {{ $order->address }}</p>
                    <p><strong>Sản phẩm:</strong>

                        @foreach ($order_products as $product)
                           <br> {{ $product->productName  }} - số lượng: {{ $product->product_quantity }}
                        @endforeach
                    </p>
                    <p><strong>Số lượng:</strong>{{ $order->product_quantity }}</p>
                    <p><strong>Giá:</strong> {{ number_format($order->totalMoney, 0, '.', ',') }}đ</p>
                    <p><strong>Trạng thái đơn hàng:</strong>
                        @if ($order->user_confirmed == UserConfirm::ChuaXacNhan)
                            Đơn người dùng chưa xác nhận
                        @elseif($order->user_confirmed == UserConfirm::BanDaHuy)
                            Đã hủy
                        @elseif($order->user_confirmed == UserConfirm::DaXacNhan)
                            @if ($order->admin_confirmed == AdminConfirm::ChuaXacNhan)
                                Đang chờ xử lý
                            @elseif($order->admin_confirmed == AdminConfirm::DaXacNhan)
                                Đã xác nhận sẽ sớm giao tới
                                bạn
                            @elseif($order->admin_confirmed == AdminConfirm::AdminDaHuy)
                                Admin đã hủy đơn hàng này
                            @endif
                        @endif
                    </p>
                </div>
            @endif


        </div>
    </div>
    @include('layoutWebs.ft')
</body>

</html>
