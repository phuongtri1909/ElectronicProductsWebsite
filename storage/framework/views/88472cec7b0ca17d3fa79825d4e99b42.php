<div class="cotainer">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3 class="card-header text-center">Chọn danh mục sửa sản phẩm</h3>

            <form action="<?php echo e(route('editCategories')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group mb-3">
                    <label for="category">Danh mục</label>
                    <select class="form-select form-control" aria-label="Default select example" id="category"
                        name="category">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($value->id == $thisCategory): ?>
                                <option selected="selected" value="<?php echo e($value->id); ?>"><?php echo e($value->categoryName); ?>

                                </option>
                            <?php else: ?>
                                <option value="<?php echo e($value->id); ?>"><?php echo e($value->categoryName); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>

                </div>
                <input hidden value="<?php echo e($thisCategory); ?>"  id="idCategory" class="form-control"
                    name="idCategory" >
                    
                <input hidden value="<?php echo e($idProduct); ?>" id="idProduct" class="form-control"
                    name="idProduct" >

                <div class="d-grid mx-auto text-center">
                    <button type="submit" class="btn btn-outline-success ">Tiếp tục sửa</button>
                    <a href="<?php echo e(route('product.index')); ?>" class="btn btn-outline-secondary ">                 
                        <span class="text">Trở về</span>
                    </a>
                </div>
            </form>


        </div>
    </div>
</div>
<?php /**PATH E:\DoAnBe2\resources\views/layoutProduct/productLP/edit_selected_categories.blade.php ENDPATH**/ ?>