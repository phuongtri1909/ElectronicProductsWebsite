<!-- SIDEBAR -->
<div id="sidebar">
    <a href="#" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">AdminHub</span>
    </a>
    <ul class="side-menu top">
        <li class="active">
            <a href="#">
                <i class='bx bxs-dashboard' ></i>
                <span class="text">Quản lý sản phẩm</span>
            </a>
        </li>
        <li>
           
           <a href="<?php echo e(route('product.index')); ?>">
                <i class='bx bxs-shopping-bag-alt' ></i>
                <span class="text">Tất cả sản phẩm</span>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('category')); ?>">
                <i class='bx bxs-doughnut-chart' ></i>
                <span class="text">Danh mục</span>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('manufacturer')); ?>">
               <i class="bx bi-bounding-box-circles"></i>
                <span class="text">Hãng sản xuất</span>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('properties.index')); ?>">
                <i class='bx bxs-group' ></i>
                <span class="text">Thuộc Tính</span>
            </a>
        </li>
    </ul>
    <ul class="side-menu">
        <li>
            <a href="<?php echo e(route('allOrderAdmin')); ?>">
                <i class='bx bxs-cog' ></i>
                <span class="text">Quản lý đơn hàng</span>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('signout')); ?>" class="logout">
                <i class='bx bxs-log-out-circle' ></i>
                <span class="text">Đăng Xuất</span>
            </a>
        </li>
    </ul>
</div>
<!-- SIDEBAR --><?php /**PATH E:\DoAnBe2\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>