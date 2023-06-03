<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Giỏ hàng</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>" />

    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/not-logged-in.css')); ?>" />
</head>

<body>
    <?php echo $__env->make('layoutWebs.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container">
        <div class="cart">

            <?php if(auth()->check()): ?>

                <?php if(count($products) != 0): ?>
                    <section class="h-100 h-custom" style="background-color: white;">
                        <div class="container py-5 h-100">
                            <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col-12">
                                    <div class="card card-registration card-registration-2"
                                        style="border-radius: 15px;">
                                        <div class="card-body p-0">
                                            <div class="row g-0">
                                                <div class="col-lg-8">
                                                    <div class="p-5">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-5">
                                                            <h1 class="tilte fw-bold mb-0 ">Giỏ Hàng</h1>
                                                            <?php if(session('Decrement')): ?>
                                                                <div class="  alert alert-danger">
                                                                    <?php echo e(session('Decrement')); ?>

                                                                </div>
                                                            <?php endif; ?>
                                                            <h6 class="mb-0 text-muted"><?php echo e($count); ?> sản phẩm
                                                            </h6>
                                                        </div>
                                                        <hr class="my-4">

                                                        <div
                                                            class="row mb-4 d-flex justify-content-between align-items-center">


                                                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                                    <img src="<?php echo e(asset('images/' . $product->product_imageName)); ?>"
                                                                        class="img-fluid rounded-3"
                                                                        alt="Cotton T-shirt">
                                                                </div>
                                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                                    <h6 class="text-muted"><?php echo e($product->productName); ?>

                                                                    </h6>
                                                                    
                                                                </div>
                                                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">


                                                                    <form action="<?php echo e(route('cartProductDecrease')); ?>"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        <?php echo csrf_field(); ?>
                                                                        <input hidden value="<?php echo e($product->id); ?>"
                                                                            type="text" id="product_id"
                                                                            class="form-control" name="product_id"
                                                                            required autofocus>
                                                                        <button class="btn btn-link px-2">
                                                                            
                                                                            <i class="fa-solid fa-minus"></i>
                                                                        </button>
                                                                    </form>

                                                                    <input id="form1" min="0" name="quantity"
                                                                        value="<?php echo e($product->quantity); ?>" type="number"
                                                                        class="form-control form-control-sm" />



                                                                    <form action="<?php echo e(route('cartProductAdd')); ?>"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        <?php echo csrf_field(); ?>
                                                                        <input hidden value="<?php echo e($product->id); ?>"
                                                                            type="text" id="product_id"
                                                                            class="form-control" name="product_id"
                                                                            required autofocus>
                                                                        <button class="btn btn-link px-2">
                                                                            
                                                                            <i class="fas fa-plus"></i>
                                                                        </button>
                                                                    </form>

                                                                </div>
                                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                                    <h6 class="mb-0">
                                                                        <?php echo e(number_format($product->productPrice * $product->quantity, 0, '.', ',')); ?>

                                                                        Đ </h6>
                                                                </div>

                                                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">


                                                                    <form method="post"
                                                                        action="<?php echo e(route('cartProductRemove')); ?>">
                                                                        <?php echo csrf_field(); ?>
                                                                        <input type="hidden" name="product_cart_id"
                                                                            value="<?php echo e($product->product_cart_id); ?>">
                                                                        <button class="text-muted" type="submit"><i
                                                                                class="fa-solid fa-trash"></i></button>
                                                                    </form>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                                        </div>

                                                        <hr class="my-4">

                                                        <div class="pt-5">
                                                            <h6 class="mb-0"><a href="<?php echo e(route('3TDL Store')); ?>"
                                                                    class=""><i
                                                                        class="fas fa-long-arrow-alt-left me-2"></i>Trở
                                                                    lại trang chủ</a></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 bg-grey">
                                                    <div class="p-5">
                                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Tóm lược</h3>
                                                        <hr class="my-4">

                                                        <div class="d-flex justify-content-between mb-4">
                                                            <h5 class="text-uppercase"><?php echo e($cart_total); ?> sản phẩm
                                                            </h5>
                                                            <h5><?php echo e(number_format($total_price_cart, 0, '.', ',')); ?> Đ
                                                            </h5>
                                                        </div>

                                                        <hr class="my-4">

                                                        <div class="d-flex justify-content-between mb-5">
                                                            <h5 class="text-uppercase">Tổng tiền</h5>
                                                            <h5><?php echo e(number_format($total_money, 0, '.', ',')); ?> Đ
                                                            </h5>
                                                        </div>



                                                        <a href="<?php echo e(route('order')); ?>" class="btn btn-primary"
                                                            id="liveToastBtn">Thanh
                                                            Toán</a>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php else: ?>
                    <div class="cart-header">
                        <div class="go-back">
                            <a href="<?php echo e(route('3TDL Store')); ?>">
                                <i class="fas fa-chevron-left"></i> Trở về
                            </a>
                        </div>
                        <h1>Giỏ hàng</h1>
                    </div>
                    <div class="cart-empty">
                        <i class="fa-solid fa-heart-crack" style="color: #e81717;"></i>
                        <h2>Bạn chưa có sản phẩm nào trong giỏ hàng</h2>
                        <p>Hãy quay trở lại trang chủ nào.</p>
                        <a href="<?php echo e(route('3TDL Store')); ?>" class="btn btn-primary">Trở về</a>
                    </div>

                <?php endif; ?>
            <?php else: ?>
                <div class="cart-header">
                    <div class="go-back">
                        <a href="<?php echo e(route('3TDL Store')); ?>">
                            <i class="fas fa-chevron-left"></i> Trở về
                        </a>
                    </div>
                    <h1>Giỏ hàng</h1>
                </div>

                <div class="cart-empty">
                    <i class="fa-solid fa-face-smile"></i>
                    <h2>Bạn chưa đăng nhập</h2>
                    <p>Hãy đăng nhập tài khoản của bạn để xem giỏ hàng của bạn.</p>
                    <a href="<?php echo e(route('loginUser')); ?>" class="btn btn-primary">Đăng nhập</a>
                </div>
            <?php endif; ?>

        </div>
    </div>



    <script src="https://kit.fontawesome.com/51a2bee5af.js" crossorigin="anonymous"></script>
</body>

</html>
<?php /**PATH E:\DoAnBe2\resources\views/website/cart.blade.php ENDPATH**/ ?>