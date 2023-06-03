<?php
    use App\Constants\UserConfirm;
    use App\Constants\AdminConfirm;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tất cả đơn hàng</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/all-order.css')); ?>" />
</head>

<body>
    <?php echo $__env->make('layoutWebs.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>#<?php echo e($order->order_id); ?></td>
                            <td><?php echo e($order->created_at); ?></td>
                            <td><?php echo e($order->fullName); ?></td>
                            <td> <?php echo e(number_format($order->totalMoney, 0, '.', ',')); ?> Đ</td>


                            <td>

                                <?php if($order->user_confirmed == UserConfirm::ChuaXacNhan): ?>
                                    <form method="post" action="<?php echo e(route('comfirm')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="order_id" value="<?php echo e($order->order_id); ?>">
                                        <input type="hidden" name="fullName" value="<?php echo e($order->fullName); ?>">

                                        <input type="hidden" name="email" value="<?php echo e($order->email); ?>">
                                        <button onclick="return confirm('Bạn có chắc chặn đặt đơn hàng này?')"
                                            class="status-button show-confirmation-btn" type="submit">Nhấn vào
                                            để xác nhận</button>
                                    </form>
                                <?php elseif($order->user_confirmed == UserConfirm::BanDaHuy): ?>
                                    <button class="status-button" type="submit">Đã hủy</button>
                                <?php elseif($order->user_confirmed == UserConfirm::DaXacNhan): ?>
                                    <?php if($order->admin_confirmed == AdminConfirm::ChuaXacNhan): ?>
                                        <button class="status-button" type="submit">Đang chờ xử lý</button>
                                    <?php elseif($order->admin_confirmed == AdminConfirm::DaXacNhan): ?>
                                        <button class="status-button" type="submit">Đã xác nhận sẽ sớm giao tới
                                            bạn</button>
                                    <?php elseif($order->admin_confirmed == AdminConfirm::AdminDaHuy): ?>
                                        <button class="status-button" type="submit">Admin đã hủy đơn hàng này</button>
                                    <?php endif; ?>
                                <?php endif; ?>

                            </td>

                            <?php if($order->user_confirmed == UserConfirm::ChuaXacNhan && $order->admin_confirmed == AdminConfirm::ChuaXacNhan): ?>
                                <td>

                                    <form method="post" action="<?php echo e(route('cancelOrder')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="order_id" value="<?php echo e($order->order_id); ?>">
                                        <button onclick="return confirm('Bạn có chắc chắn hủy đơn hàng này?')"
                                            class="status-button-cancel" type="submit">Hủy đơn</button>
                                        </form>
                                </td>
                            <?php endif; ?>


                            <td>
                                <form method="post" action="<?php echo e(route('orderDetail')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="order_id" value="<?php echo e($order->order_id); ?>">
                                    <button  class="detail-button" type="submit">Chi
                                        tiết</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                </tbody>
            </table>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/51a2bee5af.js" crossorigin="anonymous"></script>
</body>

</html>
<?php /**PATH E:\DoAnBe2\resources\views/website/all_order.blade.php ENDPATH**/ ?>