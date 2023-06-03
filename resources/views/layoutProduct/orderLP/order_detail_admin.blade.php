@php
    use App\Constants\UserConfirm;
    use App\Constants\AdminConfirm;
@endphp
<link type="text/css" rel="stylesheet" href="{{ asset('css/all-order.css') }}" />
@include('layouts.header_admin')
@include('layouts.sidebar')

<div id="content">
    @include('layouts.navbar')


    <div class="container-fluid">

        <div class="container">

            <div class="order_detail">
                <!-- Title -->
                <div class="d-flex justify-content-between align-items-center py-3">
                    <h3> Chi tiết đơn hàng</h3>
                </div>

                <!-- Main content -->
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Details -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="mb-3 d-flex justify-content-between">
                                    <div>
                                        <span class="me-3">Mã đơn hàng: #{{ $order->order_id }}</span>
                                        <span class="me-3">-</span>
                                        <span class="me-3">date: {{ $order->created_at }}</span>


                                       
                                        @if ($order->user_confirmed == UserConfirm::DaXacNhan)

                                            @if ($order->admin_confirmed == AdminConfirm::ChuaXacNhan)
                                               
                                                    <form method="post" action="{{ route('comfirmAdmin') }}">
                                                        @csrf
                                                        <input type="hidden" name="order_id"
                                                            value="{{ $order->order_id }}">
                                                        <input type="hidden" name="fullName"
                                                            value="{{ $order->fullName }}">
                                                        <input type="hidden" name="email"
                                                            value="{{ $order->email }}">
                                                        <button  onclick="return confirm('Đồng ý xác nhận?')" class="badge rounded-pill bg-info" type="submit">Nhấn vào
                                                            để xác nhận</button>
                                                    </form>
                                             

                                              
                                            @elseif($order->admin_confirmed == AdminConfirm::DaXacNhan)
                                                <span class="badge rounded-pill bg-info">Tiến hành giao hàng cho khách
                                                </span>
                                            @elseif($order->admin_confirmed == AdminConfirm::AdminDaHuy)
                                                <span class="badge rounded-pill bg-info">Đã hủy đơn hàng này
                                                </span>
                                            @endif
                                        @elseif($order->user_confirmed == UserConfirm::UserDaHuy)
                                            <span class="badge rounded-pill bg-info">User đã hủy
                                            </span>
                                        @endif



                                    </div>

                                </div>
                                <table class="table table-borderless">
                                    <tbody>

                                        @foreach ($order_products as $product)
                                            <tr>
                                                <td>
                                                    <div class="d-flex mb-2">
                                                        <div class="flex-shrink-0">
                                                            <img src="{{ asset('images/' . $product->product_imageName) }}"
                                                                alt="" width="35" class="img-fluid">
                                                        </div>
                                                        <div class="flex-lg-grow-1 ms-3">
                                                            <h6 class="small mb-0"><a
                                                                    href="{{ route('detailProduct', $productName = Str::slug($product->productName, '-')) }} "
                                                                    class="text-reset">{{ $product->productName }}</a>
                                                            </h6>
                                                            <span class="small">Số lượng:
                                                                {{ $product->product_quantity }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    {{ number_format($product->ProductPrice, 0, '.', ',') }}
                                                    Đ</td>
                                            </tr>
                                        @endforeach




                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2">Tổng tiền sản phẩm</td>
                                            <td class="text-end">{{ number_format($order->totalMoney, 0, '.', ',') }} Đ
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Phí vận chuyển</td>
                                            <td class="text-end">0 Đ</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Giảm giá</td>
                                            <td class="text-danger text-end">0 %</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Đã thanh toán</td>
                                            <td class="text-danger text-end">0 Đ</td>
                                        </tr>
                                        <tr class="fw-bold">
                                            <td colspan="2">Số tiền còn lại thanh toán:</td>
                                            <td class="text-end"> {{ number_format($order->totalMoney, 0, '.', ',') }}
                                                Đ
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- Payment -->

                    </div>
                    <div class="col-lg-4">
                        <!-- Customer Notes -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h6">Ghi chú :</h3>
                                <p>{{ $order->note }}.</p>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <!-- Shipping information -->
                            <div class="card-body">
                                <h3 class="h6">Thông tin khách hàng:</h3>
                                <strong>Họ và tên: </strong>
                                <span>{{ $order->fullName }}</span>
                                <hr>
                                <strong>Số điện thoại: </strong>
                                <span>{{ $order->phone }}</span>
                                <hr>
                                <strong>Email: </strong>
                                <span>{{ $order->email }}</span>
                                <hr>
                                <strong>Địa chỉ: </strong>
                                <span>{{ $order->address }} </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer_admin')
