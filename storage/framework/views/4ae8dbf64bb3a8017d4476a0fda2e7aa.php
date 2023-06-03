<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sản phẩm bạn yêu thích</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>" />

    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/slick.css')); ?>" />

    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/not-logged-in.css')); ?>" />

</head>

<body>
    <?php echo $__env->make('layoutWebs.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container">
        <div class="favorite">

            <?php if(auth()->check()): ?>

                <?php if(count($products) != 0): ?>
                    <!-- row -->
                    <div class="row">

                        <!-- section title -->
                        <div class="col-md-12">
                            <div class="section-title">

                                <h3 class="title">Sản phẩm bạn yêu thích</h3>

                                

                            </div>
                        </div>
                        <!-- /section title -->

                        <!-- Products tab & slick -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="products-tabs">

                                    <!-- tab -->
                                    <div id="tab1" class="tab-pane active">
                                        <div class="products-slick" data-nav="#slick-nav-1">


                                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <!-- product -->
                                                <div class="product">
                                                    <div class="product-img">
                                                        <img src="<?php echo e(asset('images/' . $product->product_imageName)); ?>"
                                                            alt="">
                                                        <div class="product-label">
                                                            <span class="sale">-30%</span>
                                                            <span class="new">NEW</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-body">

                                                        <h3 class="product-name">
                                                            <a class="button" href="<?php echo e(route('detailProduct', $productName = Str::slug($product->productName, '-'))); ?>"> <?php echo e($product->productName); ?></a>
                                                        </h3>

                                                        <h4 class="product-price">
                                                            <?php echo e(number_format($product->productPrice, 0, '.', ',')); ?> đ
                                                             </h4>
                                                        <div class="product-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>

                                                    </div>

                                                </div>
                                                <!-- /product -->
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                           




                                        </div>

                                    </div>
                                    <!-- /tab -->


                                </div>
                            </div>
                        </div>
                        <!-- Products tab & slick -->
                    </div>
                <?php else: ?>
                <div class="cart-header">
                    <div class="go-back">
                        <a href="<?php echo e(route('3TDL Store')); ?>">
                            <i class="fas fa-chevron-left"></i> Trở về
                        </a>
                    </div>
                    <h1>Sản phẩm yêu thích</h1>
                </div>
                    <div class="cart-empty">
                        <i class="fa-solid fa-heart-crack"></i>
                        <h2>Bạn chưa yêu thích sản phẩm nào</h2>
                        <p>Hãy quay trở lại trang chủ nào.</p>
                        <a href="<?php echo e(route('3TDL Store')); ?>" class="btn btn-primary">Trở về</a>
                    </div>
                <?php endif; ?>
                <!-- /row -->
            <?php else: ?>
                <div class="cart-header">
                    <div class="go-back">
                        <a href="<?php echo e(route('3TDL Store')); ?>">
                            <i class="fas fa-chevron-left"></i> Trở về
                        </a>
                    </div>
                    <h1>Sản phẩm yêu thích</h1>
                </div>

                <div class="cart-empty">
                    <i class="fa-solid fa-face-smile"></i>
                    <h2>Bạn chưa đăng nhập</h2>
                    <p>Hãy đăng nhập tài khoản của bạn để xem sản phẩm bạn đã yêu thích.</p>
                    <a href="<?php echo e(route('loginUser')); ?>" class="btn btn-primary">Đăng nhập</a>
                </div>

            <?php endif; ?>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/51a2bee5af.js" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/slick.min.js')); ?>"></script>

    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>



</body>

</html>
<?php /**PATH E:\DoAnBe2\resources\views/website/favorite_product.blade.php ENDPATH**/ ?>