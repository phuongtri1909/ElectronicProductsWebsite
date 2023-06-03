<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e($categoryName); ?>

        <?php if($manufacturerName): ?>
            - <?php echo e($manufacturerName); ?>

        <?php endif; ?>
    </title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>" />

</head>

<body>
    <?php echo $__env->make('layoutWebs.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <div class="search">
        <div class="container">

            <?php if(count($products) != 0): ?>
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title"><?php echo e($categoryName); ?>

                            <?php if($manufacturerName): ?>
                                - <?php echo e($manufacturerName); ?>

                            <?php endif; ?>

                        </h3>
                        <div class="section-nav mod-category">
                            <ul class="section-tab-nav tab-nav">
                                <li class="active btn"><a
                                        href="<?php echo e(route('categoryUser', $categoryName = Str::slug($categoryName, '-'))); ?>">Tất
                                        cả</a></li>
                                <?php if($manufacturers != null): ?>

                                    <?php $__currentLoopData = $manufacturers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="btn"><a
                                                href="<?php echo e(route('categoryByManufacturer', ['categoryName' => ($categoryName = Str::slug($categoryName, '-')), 'manufacturerName' => ($manufacturerName = Str::slug($manu->manufacturerName, '-'))])); ?>"><?php echo e($manu->manufacturerName); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->


                <!-- store products -->
                <div class="row">

                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- product -->
                        <div class="col-md-2 col-xs-6">
                            <div class="product">
                                <div class="product-img">

                                    <img src="<?php echo e(asset('images/' . $product->product_imageName)); ?>" alt="">
                                    <div class="product-label">
                                        
                                    </div>
                                </div>
                                <div class="product-body">

                                    <h3 class="product-name">
                                        <form>
                                            <a class="button"
                                                href="<?php echo e(route('detailProduct', $productName = Str::slug($product->productName, '-'))); ?>">
                                                <?php echo e($product->productName); ?></a>
                                        </form>
                                    </h3>

                                    <h4 class="product-price">
                                        <?php echo e(number_format($product->productPrice, 0, '.', ',')); ?>đ
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
                                                    <?php if($favorite->product_id == $product->id): ?>
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
                                        <form method="post" action="<?php echo e(route('favoriteProductRemove')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="product_favorite_id"
                                                value="<?php echo e($product_favorite_id); ?>">
                                            <button class="buttonHeart" type="submit"><i class="fa-solid fa-heart"
                                                    style="color: #e90707;"></i></button>
                                        </form>
                                    <?php else: ?>
                                        <form method="post" action="<?php echo e(route('favoriteProductAdd')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                            <button class="buttonHeart" type="submit"><i
                                                    class="fa-regular fa-heart"></i><span class="tooltipp">Yêu
                                                    thích</span></button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /product -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <p style="text-align: center; font-size: 30px">không có sản phẩm nào</p>

        <?php endif; ?>

    </div>
    <div class="pagination">
        <?php echo e($products->links()); ?>

    </div>

</div>
<!-- /store products -->


<?php echo $__env->make('layoutWebs.ft', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php /**PATH E:\DoAnBe2\resources\views/website/all_product_category.blade.php ENDPATH**/ ?>