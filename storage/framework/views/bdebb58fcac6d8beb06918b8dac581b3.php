

<div class="cotainer">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3 class="card-header text-center">Thêm sản phẩm</h3>

            <?php if(session('errorCreate')): ?>
            <div class="  alert alert-danger">
                <?php echo e(session('errorCreate')); ?>

            </div>
        <?php endif; ?>
        
            <form action="<?php echo e(route('product.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
             
                <div class="form-group mb-3">
                    <label for="productCategory">Danh mục</label>
                    <select class="form-select form-control" aria-label="Default select example" id="productCategory"
                        name="productCategory"> 
                       
                            <option value="<?php echo e($categories->id); ?>"><?php echo e($categories->categoryName); ?></option>
                    </select>
                </div>
    
                <div class="form-floating mb-3">
                    <label for="productName">Tên sản phẩm</label>
                    <input type="text" placeholder="Tên sản phẩm" id="productName" class="form-control"
                        name="productName" required autofocus>
                    <?php if($errors->has('productName')): ?>
                        <span class="text-danger"><?php echo e($errors->first('productName')); ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group mb-3">
                    <label for="productPrice">Giá sản phẩm</label>
                    <input value="<?php echo e(old('productPrice')); ?> " type="number" placeholder="Gía sản phẩm" id="productPrice" class="form-control"
                        name="productPrice" required autofocus>
                    <?php if($errors->has('productPrice')): ?>
                        <span class="text-danger"><?php echo e($errors->first('productPrice')); ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group mb-3">
                    <label for="productManu">Hãng sản xuất</label>
                    <select class="form-select form-control" aria-label="Default select example" id="productManu"
                        name="productManu">
                        <?php $__currentLoopData = $manufacturer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->manufacturerName); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="productImage">Hình ảnh</label>
                    <input multiple type="file" id="productImage" class="form-control" name="productImage[]" required>
                    <?php if($errors->has('productImage')): ?>
                        <span class="text-danger"><?php echo e($errors->first('productImage')); ?></span>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="descriptionProduct" class="form-label">Mô tả sản phẩm</label>
                    <textarea value="<?php echo e(old('descriptionProduct')); ?> "class="form-control" id="descriptionProduct" name="descriptionProduct" rows="3"></textarea>
                    <?php if($errors->has('descriptionProduct')): ?>
                        <span class="text-danger"><?php echo e($errors->first('descriptionProduct')); ?></span>
                    <?php endif; ?>
                </div>

                <label for="attributes">Các thuộc tính:</label>
                <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="form-group mb-3">
                    <label for="attribute_<?php echo e($attribute->id); ?>"><?php echo e($attribute->propertiesName); ?></label>
                    <input type="text" placeholder="<?php echo e($attribute->propertiesName); ?>" id="attribute_<?php echo e($attribute->id); ?>" class="form-control"
                        name="attributes[<?php echo e($attribute->id); ?>]" required >
                    <?php if($errors->has('propertiesValue')): ?>
                        <span class="text-danger"><?php echo e($errors->first('propertiesValue')); ?></span>
                    <?php endif; ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                


                <div class="d-grid mx-auto text-center">
                    <button type="submit" class="btn btn-outline-success ">Thêm</button>
                </div>
            </form>


        </div>
    </div>
</div>
<?php /**PATH E:\DoAnBe2\resources\views/layoutProduct/productLP/create_Product.blade.php ENDPATH**/ ?>