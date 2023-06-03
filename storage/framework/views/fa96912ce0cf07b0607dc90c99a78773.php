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
    <title>Tra cứu đơn hàng</title>


    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/order_lookup.css')); ?>" />

</head>

<body>
    <?php echo $__env->make('layoutWebs.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <div class="order_lookup">
            <div class="box">
                <h1 class="search-order">Tra cứu đơn hàng</h1>

                <form class="box-search" action="<?php echo e(route('searchResults')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <label class="pad" for="order-id">Mã đơn hàng:</label>
                    <input class="pad input-pad" type="text" id="order_id" name="order_id" required>
                    <br>
                    <button class="btn-order" type="submit">Tra cứu</button>
                </form>

            </div>

            <?php if($order): ?>
                <div class="order-details">
                    <h2>Thông tin đơn hàng</h2>
                    <p><strong>Mã đơn hàng: #</strong> <?php echo e($order->order_id); ?></p>
                    <p><strong>Tên khách hàng:</strong> <?php echo e($order->fullName); ?></p>
                    <p><strong>Địa chỉ giao hàng:</strong> <?php echo e($order->address); ?></p>
                    <p><strong>Sản phẩm:</strong>

                        <?php $__currentLoopData = $order_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <br> <?php echo e($product->productName); ?> - số lượng: <?php echo e($product->product_quantity); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </p>
                    <p><strong>Số lượng:</strong><?php echo e($order->product_quantity); ?></p>
                    <p><strong>Giá:</strong> <?php echo e(number_format($order->totalMoney, 0, '.', ',')); ?>đ</p>
                    <p><strong>Trạng thái đơn hàng:</strong>
                        <?php if($order->user_confirmed == UserConfirm::ChuaXacNhan): ?>
                            Đơn người dùng chưa xác nhận
                        <?php elseif($order->user_confirmed == UserConfirm::BanDaHuy): ?>
                            Đã hủy
                        <?php elseif($order->user_confirmed == UserConfirm::DaXacNhan): ?>
                            <?php if($order->admin_confirmed == AdminConfirm::ChuaXacNhan): ?>
                                Đang chờ xử lý
                            <?php elseif($order->admin_confirmed == AdminConfirm::DaXacNhan): ?>
                                Đã xác nhận sẽ sớm giao tới
                                bạn
                            <?php elseif($order->admin_confirmed == AdminConfirm::AdminDaHuy): ?>
                                Admin đã hủy đơn hàng này
                            <?php endif; ?>
                        <?php endif; ?>
                    </p>
                </div>
            <?php endif; ?>


        </div>
    </div>
    <?php echo $__env->make('layoutWebs.ft', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH E:\DoAnBe2\resources\views/website/order_lookup.blade.php ENDPATH**/ ?>