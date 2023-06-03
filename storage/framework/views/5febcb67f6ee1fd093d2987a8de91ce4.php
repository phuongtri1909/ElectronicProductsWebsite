<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('titleweb'); ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>"/>
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>"/>
    <link type="text/css" rel="stylesheet" href="<?php echo $__env->yieldContent('cssCategory_qr'); ?>"/>
</head>
<body>

    <?php echo $__env->yieldContent('content'); ?>

</body>
</html>
<?php echo $__env->make('layoutWebs.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\DoAnBe2\resources\views/layoutWebs/home.blade.php ENDPATH**/ ?>