<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>3TDL Store</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/slick.css')); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/slick-theme.css')); ?>" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/nouislider.min.css')); ?>" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>">

    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>" />

    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/dropdown-category.css')); ?>" />

</head>

<body>

    <?php echo $__env->make('layoutWebs.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <div class="category-qr">
                <div class="row">
                    <div class="col-2 primary">
                        <div id="menu-category">
                            <ul class="ul-menu">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="li-menu">
                                        <a
                                            href="<?php echo e(route('categoryUser', $categoryName = Str::slug($category->categoryName, '-'))); ?>"><strong><?php echo e($category->categoryName); ?></strong></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>

                    <div class="col-7 bg-white" style="height: 400px;">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                                    aria-label="Slide 4"></button>
                            </div>

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="<?php echo e(asset('images/slide1.png')); ?>" class="d-block w-100 img-slide"
                                        alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?php echo e(asset('images/slide2.jpg')); ?>" class="d-block w-100 img-slide"
                                        alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?php echo e(asset('images/slide3.jpg')); ?>" class="d-block w-100 img-slide"
                                        alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?php echo e(asset('images/slide4.jpg')); ?>" class="d-block w-100 img-slide"
                                        alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-3 bg-white">
                        <img class="img_qr" src="<?php echo e(asset('images/qc1.jpg')); ?>">
                        <img class="img_qr qr2" src="<?php echo e(asset('images/qc2.jpg')); ?>">
                        <img class="img_qr qr2" src="<?php echo e(asset('images/qc3.jpg')); ?>">
                    </div>
                </div>

            </div>

            <?php $__currentLoopData = $product_by_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- row -->
                <div class="row">

                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($category->id == $product): ?>
                                    <h3 class="title"><?php echo e($category->categoryName); ?></h3>

                                    <?php $__currentLoopData = $manufacturer_by_category[$category->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manufacturer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="section-nav">
                                            <ul class="section-tab-nav tab-nav">
                                                <li class="active btn"><a 
 href="<?php echo e(route('categoryByManufacturer', ['categoryName' => ($categoryName = Str::slug($category->categoryName, '-')), 'manufacturerName' => ($manufacturerName = Str::slug($manufacturer->manufacturerName, '-'))])); ?>"><?php echo e($manufacturer->manufacturerName); ?></a></li>
                                            </ul>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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


                                        <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <!-- product -->
                                            
                                            <div class="product">
                                                <div class="product-img">
                                                    <img src="<?php echo e(asset('images/' . $item->product_imageName)); ?>"
                                                        alt="">
                                                    <div class="product-label">
                                                        
                                                        <span class="new">NEW</span>
                                                    </div>
                                                </div>
                                                <div class="product-body">

                                                    <h3 class="product-name">
                                                        <a class="button"
                                                            href="<?php echo e(route('detailProduct', $productName = Str::slug($item->productName, '-'))); ?>">
                                                            <?php echo e($item->productName); ?></a>
                                                    </h3>

                                                    <h4 class="product-price">
                                                        <?php echo e(number_format($item->productPrice, 0, '.', ',')); ?>đ
                                                         </h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>

                                                    <div class="product-btns">

                                                        <?php echo e($checkHeart = false); ?>

                                                        <?php echo e($product_favorite_id = ''); ?>

                                                        <?php if(auth()->check()): ?>
                                                            <?php if($product_favorite->count() != 0): ?>
                                                                <?php $__currentLoopData = $product_favorite; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $favorite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if($favorite->product_id == $item->id): ?>
                                                                        <?php
                                                                            $checkHeart = true;
                                                                            $product_favorite_id = $favorite->id;
                                                                        ?>
                                                                    <?php break; ?>

                                                                <?php else: ?>
                                                                    <?php echo e($checkHeart = false); ?>

                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <?php echo e($checkHeart = false); ?>

                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <?php echo e($checkHeart = false); ?>

                                                    <?php endif; ?>


                                                    <?php if($checkHeart == true): ?>
                                                        <form method="post"
                                                            action="<?php echo e(route('favoriteProductRemove')); ?>">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="product_favorite_id"
                                                                value="<?php echo e($product_favorite_id); ?>">
                                                            <button class="buttonHeart" type="submit"><i
                                                                    class="fa-solid fa-heart"
                                                                    style="color: #e90707;"></i></button>
                                                        </form>
                                                    <?php else: ?>
                                                        <form method="post"
                                                            action="<?php echo e(route('favoriteProductAdd')); ?>">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="product_id"
                                                                value="<?php echo e($item->id); ?>">
                                                            <button class="buttonHeart" type="submit"><i
                                                                    class="fa-regular fa-heart"></i><span
                                                                    class="tooltipp">Yêu
                                                                    thích</span></button>
                                                        </form>
                                                    <?php endif; ?>
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
            <!-- /row -->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->




<?php echo $__env->make('layoutWebs.ft', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH E:\DoAnBe2\resources\views/website/home.blade.php ENDPATH**/ ?>