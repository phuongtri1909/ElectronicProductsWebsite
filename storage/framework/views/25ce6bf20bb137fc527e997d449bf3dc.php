<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đặt hàng</title>
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/comfirm.css')); ?>">
</head>

<body>
    <!-- Thêm mã HTML sau vào trang web của bạn để tạo một lớp mờ và một hộp xác nhận -->
    <div class="modal-overlay"></div>

    <div class="confirmation-box">
        <div class="close-btn"><a href="<?php echo e(route('orderDetail')); ?>">&times;</a></div>

        <p>Bạn hãy xác nhận đơn hàng để đặt hàng</p>


        <form action="<?php echo e(route('comfirm')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input hidden value="<?php echo e($order_id); ?>" id="order_id" name="order_id" required autofocus>
            <button class="confirm-btn">
                Xác nhận
            </button>
        </form>


    </div>


</body>

</html>
<?php /**PATH E:\DoAnBe2\resources\views/emails/comfirm.blade.php ENDPATH**/ ?>