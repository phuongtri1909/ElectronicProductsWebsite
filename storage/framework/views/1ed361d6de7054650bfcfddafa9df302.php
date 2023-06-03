<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>" />
</head>

<body>

    <?php echo $__env->make('layoutWebs.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <div class="box">
            <h2>Đăng nhập</h2>

            <form action="<?php echo e(route('confirmLogin')); ?>" method="POST">
                <?php echo csrf_field(); ?>


                <?php if(session('success')): ?>
                    <div class="  alert alert-danger">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <div class="inputbox">
                    <input value="<?php echo e(old('email')); ?>" type="email" id="email" name="email" required autofocus>
                    <span class="textinput">Nhập tài khoản gmail</span>
                    <?php if($errors->has('email')): ?>
                        <span class="textdanger"><?php echo e($errors->first('email')); ?></span>
                    <?php endif; ?>
                </div>

                <div class="inputbox">
                    <input value="<?php echo e(old('password')); ?>" type="password" id="password" name="password" required
                        autofocus>
                    <span class="textinput">Nhập mật khẩu</span>
                    <?php if($errors->has('password')): ?>
                        <span class="textdanger"><?php echo e($errors->first('password')); ?></span>
                    <?php endif; ?>
                </div>

                <div class="forgot_password"><a href="#">Bạn quên mật khẩu?</a></div>
                <button class="login_button" type="submit">Đăng nhập</button>

            </form>
            <div class="letter">hoặc</div>
            <div class="login_link">Bạn chưa có tài khoản? <a href="<?php echo e(route('registerUser')); ?>">đăng ký ngay</a></div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/51a2bee5af.js" crossorigin="anonymous"></script>
</body>

</html>
<?php /**PATH E:\DoAnBe2\resources\views/website/login.blade.php ENDPATH**/ ?>