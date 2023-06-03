@php
    use App\Constants\UserConfirm;
    use App\Constants\AdminConfirm;
@endphp
<link type="text/css" rel="stylesheet" href="{{ asset('css/all-order.css') }}" />
@include('layouts.header_admin')
@include('layouts.sidebar')

<div id="content">
    @include('layouts.navbar')
    <div class="container">

        <h1>Quản lý đơn hàng</h1>
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

                            @if ($order->user_confirmed == UserConfirm::DaXacNhan && $order->admin_confirmed == AdminConfirm::ChuaXacNhan)
                                <form method="post" action="{{ route('comfirmAdmin') }}">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{ $order->order_id }}">
                                    <input type="hidden" name="fullName" value="{{ $order->fullName }}">
                                    <input type="hidden" name="email" value="{{ $order->email }}">
                                    <button onclick="return confirm('Đồng ý xác nhận?')" class="status-button"
                                        type="submit"> xác nhận đơn hàng</button>
                                </form>
                            @elseif($order->user_confirmed == UserConfirm::DaXacNhan && $order->admin_confirmed == AdminConfirm::DaXacNhan)
                                <button class="status-button">Tiến hành giao hàng cho khách</button>
                            @elseif($order->user_confirmed == UserConfirm::DaXacNhan && $order->admin_confirmed == AdminConfirm::AdminDaHuy)
                                <button class="status-button" type="submit">Đã hủy đơn hàng này</button>
                            @endif

                        </td>

                        @if ($order->admin_confirmed == AdminConfirm::ChuaXacNhan)
                            <td>
                                <form method="post" action="{{ route('cancelOrderAdmin') }}">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{ $order->order_id }}">
                                    <input type="hidden" name="fullName" value="{{ $order->fullName }}">
                                    <input type="hidden" name="email" value="{{ $order->email }}">
                                    <button onclick="return confirm('Bạn có chắc chắn hủy đơn hàng này?')"
                                        class="status-button-cancel" type="submit">Hủy đơn</button>
                                </form>
                            </td>
                        @endif


                        <td>
                            <form method="post" action="{{ route('orderDetailAmin') }}">
                                @csrf
                                <input type="hidden" name="order_id" value="{{ $order->order_id }}">
                                <button class="detail-button" type="submit">Chi tiết</button>
                            </form>
                        </td>
                    </tr>
                @endforeach



            </tbody>
        </table>

    </div>
</div>
@include('layouts.footer_admin')
