<?php
    use App\Constants\UserConfirm;
    use App\Constants\AdminConfirm;
?>
<link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/all-order.css')); ?>" />
<?php echo $__env->make('layouts.header_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div id="content">
    <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>#<?php echo e($order->order_id); ?></td>
                        <td><?php echo e($order->created_at); ?></td>
                        <td><?php echo e($order->fullName); ?></td>
                        <td> <?php echo e(number_format($order->totalMoney, 0, '.', ',')); ?> Đ</td>

                        <td>

                            <?php if($order->user_confirmed == UserConfirm::DaXacNhan && $order->admin_confirmed == AdminConfirm::ChuaXacNhan): ?>
                                <form method="post" action="<?php echo e(route('comfirmAdmin')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="order_id" value="<?php echo e($order->order_id); ?>">
                                    <input type="hidden" name="fullName" value="<?php echo e($order->fullName); ?>">
                                    <input type="hidden" name="email" value="<?php echo e($order->email); ?>">
                                    <button onclick="return confirm('Đồng ý xác nhận?')" class="status-button"
                                        type="submit"> xác nhận đơn hàng</button>
                                </form>
                            <?php elseif($order->user_confirmed == UserConfirm::DaXacNhan && $order->admin_confirmed == AdminConfirm::DaXacNhan): ?>
                                <button class="status-button">Tiến hành giao hàng cho khách</button>
                            <?php elseif($order->user_confirmed == UserConfirm::DaXacNhan && $order->admin_confirmed == AdminConfirm::AdminDaHuy): ?>
                                <button class="status-button" type="submit">Đã hủy đơn hàng này</button>
                            <?php endif; ?>

                        </td>

                        <?php if($order->admin_confirmed == AdminConfirm::ChuaXacNhan): ?>
                            <td>
                                <form method="post" action="<?php echo e(route('cancelOrderAdmin')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="order_id" value="<?php echo e($order->order_id); ?>">
                                    <input type="hidden" name="fullName" value="<?php echo e($order->fullName); ?>">
                                    <input type="hidden" name="email" value="<?php echo e($order->email); ?>">
                                    <button onclick="return confirm('Bạn có chắc chắn hủy đơn hàng này?')"
                                        class="status-button-cancel" type="submit">Hủy đơn</button>
                                </form>
                            </td>
                        <?php endif; ?>


                        <td>
                            <form method="post" action="<?php echo e(route('orderDetailAmin')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="order_id" value="<?php echo e($order->order_id); ?>">
                                <button class="detail-button" type="submit">Chi tiết</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



            </tbody>
        </table>

    </div>
</div>
<?php echo $__env->make('layouts.footer_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH E:\DoAnBe2\resources\views/layoutProduct/orderLP/all_order_admin.blade.php ENDPATH**/ ?>