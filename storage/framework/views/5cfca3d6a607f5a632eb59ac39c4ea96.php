<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thanh toán</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>" />

    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/order.css')); ?>" />

</head>

<body>
    <?php echo $__env->make('layoutWebs.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class='container'>
        <div class="order">
            <div class='window'>
                <div class='order-info'>
                    <div class='order-info-content'>
                        <h2>Tiến hành đặt hàng</h2>

                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class='line'></div>
                            <table class='order-table'>
                                <tbody>
                                    <tr>
                                        <td><img src='<?php echo e(asset('images/' . $product->product_imageName)); ?>'
                                                class='full-width'>
                                        </td>
                                        <td>
                                            <br> <span class='thin'><?php echo e($product->productName); ?></span>
                                           <br> <span class='thin small'> Số lượng: <?php echo e($product->quantity); ?> <br><br></span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <div class='price'><?php echo e(number_format($product->productPrice * $product->quantity, 0, '.', ',')); ?>

                                                Đ</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <div class='total'>
                            <span style='float:left;'>
                                Tổng tiền:
                            </span>
                            <span style='float:right; text-align:right;'>
                                <?php echo e(number_format($total_money, 0, '.', ',')); ?> Đ
                            </span>
                        </div>

                    </div>

                </div>
                <div class='credit-info'>

                    <div class='credit-info-content'>

                        <img src='<?php echo e(asset('images\logo.png')); ?>' height='80' class='credit-card-image'
                            id='credit-card-image'>

                          
                        <form action="<?php echo e(route('confirmPayment')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="inputbox">

                                <input value="<?php echo e(old('fullName')); ?>" type="text" id="fullName" name="fullName"
                                    required autofocus>
                                <span class="textinput">Họ và tên</span>
                                <?php if($errors->has('fullName')): ?>
                                    <span class="textdanger"><?php echo e($errors->first('fullName')); ?></span>
                                <?php endif; ?>

                            </div>


                            <div class="inputbox">
                                <input value="<?php echo e(old('email')); ?>" type="email" id="email" name="email"
                                    required autofocus>
                                <span class="textinput">Địa chỉ email</span>
                                <?php if($errors->has('email')): ?>
                                    <span class="textdanger"><?php echo e($errors->first('email')); ?></span>
                                <?php endif; ?>
                            </div>


                            <div class="inputbox">
                                <input value="<?php echo e(old('phone')); ?>" type="text" id="phone" name="phone"
                                    required autofocus>
                                <span class="textinput">Số điện thoại</span>
                                <?php if($errors->has('phone')): ?>
                                    <span class="textdanger"><?php echo e($errors->first('phone')); ?></span>
                                <?php endif; ?>
                            </div>


                            <div class="inputbox">
                                <input value="<?php echo e(old('address')); ?>" type="text" id="address" name="address"
                                    required autofocus>
                                <span class="textinput">Địa chỉ giao hàng</span>
                                <?php if($errors->has('address')): ?>
                                    <span class="textdanger"><?php echo e($errors->first('address')); ?></span>
                                <?php endif; ?>
                            </div>


                            <div class="inputbox">
                                <input value="<?php echo e(old('note')); ?>" type="text" id="note" name="note"
                                    required autofocus>
                                <span class="textinput">Ghi chú</span>
                                <?php if($errors->has('note')): ?>
                                    <span class="textdanger"><?php echo e($errors->first('note')); ?></span>
                                <?php endif; ?>
                            </div>

                            <input value="<?php echo e($total_money); ?>" type="hidden" id="total_money" name="total_money">

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
<?php /**PATH E:\DoAnBe2\resources\views/website/order.blade.php ENDPATH**/ ?>