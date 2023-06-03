<?php
    use App\Constants\UserConfirm;
    use App\Constants\AdminConfirm;
?>
<link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/all-order.css')); ?>" />
<?php echo $__env->make('layouts.header_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div id="content">
    <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


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
                                        <span class="me-3">Mã đơn hàng: #<?php echo e($order->order_id); ?></span>
                                        <span class="me-3">-</span>
                                        <span class="me-3">date: <?php echo e($order->created_at); ?></span>


                                       
                                        <?php if($order->user_confirmed == UserConfirm::DaXacNhan): ?>

                                            <?php if($order->admin_confirmed == AdminConfirm::ChuaXacNhan): ?>
                                               
                                                    <form method="post" action="<?php echo e(route('comfirmAdmin')); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="order_id"
                                                            value="<?php echo e($order->order_id); ?>">
                                                        <input type="hidden" name="fullName"
                                                            value="<?php echo e($order->fullName); ?>">
                                                        <input type="hidden" name="email"
                                                            value="<?php echo e($order->email); ?>">
                                                        <button  onclick="return confirm('Đồng ý xác nhận?')" class="badge rounded-pill bg-info" type="submit">Nhấn vào
                                                            để xác nhận</button>
                                                    </form>
                                             

                                              
                                            <?php elseif($order->admin_confirmed == AdminConfirm::DaXacNhan): ?>
                                                <span class="badge rounded-pill bg-info">Tiến hành giao hàng cho khách
                                                </span>
                                            <?php elseif($order->admin_confirmed == AdminConfirm::AdminDaHuy): ?>
                                                <span class="badge rounded-pill bg-info">Đã hủy đơn hàng này
                                                </span>
                                            <?php endif; ?>
                                        <?php elseif($order->user_confirmed == UserConfirm::UserDaHuy): ?>
                                            <span class="badge rounded-pill bg-info">User đã hủy
                                            </span>
                                        <?php endif; ?>



                                    </div>

                                </div>
                                <table class="table table-borderless">
                                    <tbody>

                                        <?php $__currentLoopData = $order_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex mb-2">
                                                        <div class="flex-shrink-0">
                                                            <img src="<?php echo e(asset('images/' . $product->product_imageName)); ?>"
                                                                alt="" width="35" class="img-fluid">
                                                        </div>
                                                        <div class="flex-lg-grow-1 ms-3">
                                                            <h6 class="small mb-0"><a
                                                                    href="<?php echo e(route('detailProduct', $productName = Str::slug($product->productName, '-'))); ?> "
                                                                    class="text-reset"><?php echo e($product->productName); ?></a>
                                                            </h6>
                                                            <span class="small">Số lượng:
                                                                <?php echo e($product->product_quantity); ?></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    <?php echo e(number_format($product->ProductPrice, 0, '.', ',')); ?>

                                                    Đ</td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2">Tổng tiền sản phẩm</td>
                                            <td class="text-end"><?php echo e(number_format($order->totalMoney, 0, '.', ',')); ?> Đ
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
                                            <td class="text-end"> <?php echo e(number_format($order->totalMoney, 0, '.', ',')); ?>

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
                                <p><?php echo e($order->note); ?>.</p>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <!-- Shipping information -->
                            <div class="card-body">
                                <h3 class="h6">Thông tin khách hàng:</h3>
                                <strong>Họ và tên: </strong>
                                <span><?php echo e($order->fullName); ?></span>
                                <hr>
                                <strong>Số điện thoại: </strong>
                                <span><?php echo e($order->phone); ?></span>
                                <hr>
                                <strong>Email: </strong>
                                <span><?php echo e($order->email); ?></span>
                                <hr>
                                <strong>Địa chỉ: </strong>
                                <span><?php echo e($order->address); ?> </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('layouts.footer_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH E:\DoAnBe2\resources\views/layoutProduct/orderLP/order_detail_admin.blade.php ENDPATH**/ ?>