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
    <title>Tất cả đơn hàng</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/all-order.css') }}" />
</head>

<body>
    @include('layoutWebs.header')
    <div class="container">
        <div class="all-order">
            <h1>Tất cả đơn hàng của tôi</h1>
            <table>
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Khách hàng</th>
                        <th>Số tiền</th>
                        <th>Tình trạng</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($orders as $order)
                        <tr>
                            <td>#{{ $order->order_id }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->fullName }}</td>
                            <td> {{ number_format($order->totalMoney, 0, '.', ',') }} Đ</td>


                            <td>

                                @if ($order->user_confirmed == UserConfirm::ChuaXacNhan)
                                    <form method="post" action="{{ route('comfirm') }}">
                                        @csrf
                                        <input type="hidden" name="order_id" value="{{ $order->order_id }}">
                                        <input type="hidden" name="fullName" value="{{ $order->fullName }}">

                                        <input type="hidden" name="email" value="{{ $order->email }}">
                                        <button onclick="return confirm('Bạn có chắc chặn đặt đơn hàng này?')"
                                            class="status-button show-confirmation-btn" type="submit">Nhấn vào
                                            để xác nhận</button>
                                    </form>
                                @elseif($order->user_confirmed == UserConfirm::BanDaHuy)
                                    <button class="status-button" type="submit">Đã hủy</button>
                                @elseif($order->user_confirmed == UserConfirm::DaXacNhan)
                                    @if ($order->admin_confirmed == AdminConfirm::ChuaXacNhan)
                                        <button class="status-button" type="submit">Đang chờ xử lý</button>
                                    @elseif($order->admin_confirmed == AdminConfirm::DaXacNhan)
                                        <button class="status-button" type="submit">Đã xác nhận sẽ sớm giao tới
                                            bạn</button>
                                    @elseif($order->admin_confirmed == AdminConfirm::AdminDaHuy)
                                        <button class="status-button" type="submit">Admin đã hủy đơn hàng này</button>
                                    @endif
                                @endif

                            </td>

                            @if ($order->user_confirmed == UserConfirm::ChuaXacNhan && $order->admin_confirmed == AdminConfirm::ChuaXacNhan)
                                <td>

                                    <form method="post" action="{{ route('cancelOrder') }}">
                                        @csrf
                                        <input type="hidden" name="order_id" value="{{ $order->order_id }}">
                                        <button onclick="return confirm('Bạn có chắc chắn hủy đơn hàng này?')"
                                            class="status-button-cancel" type="submit">Hủy đơn</button>
                                        </form>
                                </td>
                            @endif


                            <td>
                                <form method="post" action="{{ route('orderDetail') }}">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{ $order->order_id }}">
                                    <button  class="detail-button" type="submit">Chi
                                        tiết</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach



                </tbody>
            </table>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/51a2bee5af.js" crossorigin="anonymous"></script>
</body>

</html>
