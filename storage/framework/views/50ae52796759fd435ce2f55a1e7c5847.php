<!-- HEADER -->
<?php
    use App\Constants\UserType;
?>
<header>


    <!-- MAIN HEADER -->
    <div id="header">
        <div class="container">
            <div class="row">

                <div class="col-md-2">
                    <div class="header-logo">
                        <a href="<?php echo e(route('3TDL Store')); ?>" class="logo">
                            <img src="<?php echo e(asset('images/logo.png')); ?>" alt="">
                        </a>
                    </div>
                </div>


                <div class="col-md-5">

                    <div class="header-ctn">

                        <div class="bg-nav-hover">
                            <a href="<?php echo e(route('allOrder')); ?>">
                                <i class="fa-regular fa-chart-bar"></i>
                                <span>Đơn hàng của tôi</span>
                            </a>
                        </div>



                        <div>
                            <div class="header-search">
                                <form action="<?php echo e(route('search')); ?>" method="GET">
                                    <input class="input" type="text" id="search-input" name="keyword"
                                        placeholder="Tìm kiếm...">
                                    <button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </form>
                            </div>
                        </div>



                    </div>
                </div>

                <div class="col-5 ">
                    <div class="header-ctn">

                        <div class="bg-nav-hover">
                            <a href="<?php echo e(route('orderLookup')); ?>">
                                <i class="fa-solid fa-truck-fast"></i>
                                <span>Tra cứu mua hàng</span>

                            </a>

                        </div>

                        <div class="bg-nav-hover">
                            <a href="<?php echo e(route('productCart')); ?>">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Giỏ hàng của tôi</span>
                                <div class="qty">
                                    <?php if(session('cart')): ?>
                                        <?php echo e(session('cart')); ?>

                                    <?php else: ?>
                                        0
                                    <?php endif; ?>
                                </div>
                            </a>
                        </div>

                        <div class="bg-nav-hover">
                            <a href="<?php echo e(route('productFavorite')); ?>">
                                <i class="fa-solid fa-heart"></i>
                                <span>Sản phẩm yêu thích</span>
                            </a>
                        </div>

                        <?php if(auth()->check()): ?>
                            <div class="bg-nav ">
                                <a href="<?php echo e(route('signout')); ?>">
                                    <i class="fa-solid fa-user"></i>
                                    <span><?php echo e(auth()->user()->fullName); ?></span>
                                </a>
                            </div>
                        <?php else: ?>
                            <div class="bg-nav ">
                                <a href="<?php echo e(route('loginUser')); ?>">
                                    <i class="fa-solid fa-user"></i>
                                    <span>Đăng nhập</span>
                                </a>
                            </div>
                        <?php endif; ?>


                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

</header>
<?php /**PATH E:\DoAnBe2\resources\views/layoutWebs/header.blade.php ENDPATH**/ ?>