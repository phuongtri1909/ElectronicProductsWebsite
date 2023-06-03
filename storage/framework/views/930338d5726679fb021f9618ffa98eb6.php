<div class="cotainer">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3 class="card-header text-center">Sửa hãng sản xuất</h3>
            <form action="<?php echo e(route('updateManufacturer.admin', $manufacturer->id)); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('put'); ?>
                <div class="form-group mb-3">
                    <input value="<?php echo e($manufacturer['manufacturerName']); ?>" type="text" placeholder="Tên hãng sản xuất" id="manufacturerName" class="form-control"
                        name="manufacturerName" required autofocus>
                    <?php if($errors->has('manufacturerName')): ?>
                        <span class="text-danger"><?php echo e($errors->first('manufacturerName')); ?></span>
                    <?php endif; ?>
                </div>

                <div class="d-grid mx-auto text-left">                 
                    <button type="submit" class="btn btn-outline-success ">Sửa</button>
                    <a href="<?php echo e(route('manufacturer')); ?>" class="btn btn-outline-secondary ">                 
                        <span class="text">Trở về</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH E:\DoAnBe2\resources\views/layoutProduct/manufacturerLP/edit_manufacturer.blade.php ENDPATH**/ ?>