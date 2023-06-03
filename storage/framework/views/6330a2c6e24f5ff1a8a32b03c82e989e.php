


<?php $__env->startSection('cssCategory_qr','css/dropdown-category.css'); ?>
    

<?php $__env->startSection('content'); ?>
    

<div class="container">
<div class= "container-fluid">
    <div class= "row">

       <div class ="col-2 primary">
             <div id="menu">
            <ul>
            <li><a href="cuahang.html"> <strong>Cửa Hàng</strong></a></li>
            <li><a href="cuahang.html"> <strong>Sản Phẩm</strong></a></li>
            <li><a href="contact.html"> <strong>Liên Hệ</strong></a></li>
            <li><a href="FAQS.html"> <strong>FAQS</strong></a></li>
            <li><a href="https://ngocaodat.blogspot.com/"> <strong>Cao Đạt (A C E)</strong></a></li>
            <li><a href="https://www.facebook.com/profile.php?id=100009215226161"> <strong>Đăng Công </strong></a></li>
            <li><a href="https://www.facebook.com/nguyen.manhtien.35380"> <strong>Mạnh Tiến </strong></a></li>
            <li><a href="https://www.facebook.com/tonton28.2001"> <strong>Văn Toàn </strong></a></li>
            </ul>
            </div>
           </div>
       <div class ="col-7 bg-white" style="height: 400px;">
              <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

                 <div class="carousel-indicators">
                       <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                       <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                       <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                 </div>

                 <div class="carousel-inner">
                   <div class="carousel-item active">
                         <img src="<?php echo e(asset('images/slide1.png')); ?>" class="d-block w-100" alt="..."  style="width: 732px; height: 400px;">
                       </div>
                   <div class="carousel-item" >
                         <img src="<?php echo e(asset('images/slide2.jpg')); ?>" class="d-block w-100" alt="..."  style="width: 732px; height: 400px;">
                   </div>
                       <div class="carousel-item">
                         <img src="<?php echo e(asset('images/slide3.jpg')); ?>" class="d-block w-100" alt="..."  style="width: 732px; height: 400px;">
                       </div>
                       <div class="carousel-item">
                         <img src="<?php echo e(asset('images/slide4.jpg')); ?>" class="d-block w-100" alt="..."  style="width: 732px; height: 400px;">
                       </div>
                 </div>
                 <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                       <span class="visually-hidden">Previous</span>
                 </button>
                 <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                       <span class="carousel-control-next-icon" aria-hidden="true"></span>
                       <span class="visually-hidden">Next</span>
                 </button>
              </div>
          </div>
           <div class ="col-3 bg-white">
              <img src="<?php echo e(asset('images/qc1.jpg')); ?>" style="height: 120px; width: 310px;">
               <img src="<?php echo e(asset('images/qc2.jpg')); ?>" style="height:120px; width: 310px; margin-top: 20px;">
               <img src="<?php echo e(asset('images/qc3.jpg')); ?>" style="height:120px; width: 310px; margin-top: 20px;">
           </div>
    </div>
</div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layoutWebs.ft', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('layoutWebs.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\DoAnBe2\resources\views/layoutWebs/category_qr.blade.php ENDPATH**/ ?>