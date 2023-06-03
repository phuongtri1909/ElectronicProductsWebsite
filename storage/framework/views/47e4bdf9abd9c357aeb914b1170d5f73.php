<div class="cotainer">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3 class="card-header text-center">Thêm Thuộc Tính</h3>
            <form action="<?php echo e(route('properties.store')); ?>" method="POST" >
                <?php echo csrf_field(); ?>
                <div class="form-group mb-3">
                    <input type="text" placeholder="Tên thuộc tính" id="propertiesName" class="form-control"
                        name="propertiesName" required autofocus>
                    <?php if($errors->has('propertiesName')): ?>
                        <span class="text-danger"><?php echo e($errors->first('propertiesName')); ?></span>
                    <?php endif; ?>
                </div>
                
                <div class="form-group mb-3">
                    <label for="category">Danh mục</label>
                    <select class="form-select form-control" aria-label="Default select example" id="category"
                        name="category">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->categoryName); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>
                </div>

                <div class="d-grid mx-auto text-left">                 
                    <button type="submit" class="btn btn-outline-success ">Thêm</button>
                    <a href="<?php echo e(route('properties.index')); ?>" class="btn btn-outline-secondary ">                 
                        <span class="text">Trở về</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH E:\DoAnBe2\resources\views/layoutProduct/propertiesLP/create_properties.blade.php ENDPATH**/ ?>