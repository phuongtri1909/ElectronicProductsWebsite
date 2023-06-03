<div class="cotainer">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3 class="card-header text-center">Sửa sản phẩm</h3>
          
            <form method="POST" action="<?php echo e(route('product.update', $idProduct)); ?>"  enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-group mb-3">
                    <label for="productCategory">Danh mục</label>
                    <select class="form-select form-control" aria-label="Default select example" id="productCategory"
                        name="productCategory">  
                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->categoryName); ?></option>
                    </select>
                </div>
    
                <div class="form-floating mb-3">
                    <label for="productName">Tên sản phẩm</label>
                    <input value="<?php echo e($product[0]->productName); ?>" type="text" placeholder="Tên sản phẩm" id="productName" class="form-control"
                        name="productName" required autofocus>
                    <?php if($errors->has('productName')): ?>
                        <span class="text-danger"><?php echo e($errors->first('productName')); ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group mb-3">
                    <label for="productPrice">Giá sản phẩm</label>
                    <input value="<?php echo e($product[0]->productPrice); ?>" type="number" placeholder="Gía sản phẩm" id="productPrice" class="form-control"
                        name="productPrice" required autofocus>
                    <?php if($errors->has('productPrice')): ?>
                        <span class="text-danger"><?php echo e($errors->first('productPrice')); ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group mb-3">
                    <label for="productManu">Hãng sản xuất</label>
                    <select class="form-select form-control" aria-label="Default select example" id="productManu"
                        name="productManu">
                        <?php $__currentLoopData = $manufacturers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($value->id == $product[0]->productManu): ?>
                        <option selected="selected" value="<?php echo e($value->id); ?>"><?php echo e($value->manufacturerName); ?></option>
                        <?php else: ?>
                        <option value="<?php echo e($value->id); ?>"><?php echo e($value->manufacturerName); ?></option>
                        <?php endif; ?>         
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                

                <div class="mb-3">
                    <label for="descriptionProduct" class="form-label">Mô tả sản phẩm</label>
                    <textarea class="form-control" id="descriptionProduct" name="descriptionProduct" rows="3"><?php echo e($product[0]->descriptionProduct); ?> </textarea>
                    <?php if($errors->has('descriptionProduct')): ?>
                        <span class="text-danger"><?php echo e($errors->first('descriptionProduct')); ?></span>
                    <?php endif; ?>
                </div>

                <label for="attributes">Các thuộc tính:</label>

                 <?php if($category->id == $idCategoryBefor): ?>
                 
                    <?php $__currentLoopData = $productAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="form-group mb-3">
                    <label for="attribute_<?php echo e($attribute->id); ?>"><?php echo e($attribute->propertiesName); ?></label>
                    <input value="<?php echo e($attribute->attribute_value); ?>" type="text" placeholder="<?php echo e($attribute->propertiesName); ?>" id="attribute_<?php echo e($attribute->id); ?>" class="form-control"
                        name="attributesBefore[<?php echo e($attribute->id); ?>]" required >
                    <?php if($errors->has('attribute_<?php echo e($attribute->attribute_id); ?>')): ?>
                        <span class="text-danger"><?php echo e($errors->first('')); ?></span>
                    <?php endif; ?>
                </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                 <?php else: ?>

                    <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="form-group mb-3">
                    <label for="attribute_<?php echo e($attribute->id); ?>"><?php echo e($attribute->propertiesName); ?></label>
                    <input type="text" placeholder="<?php echo e($attribute->propertiesName); ?>" id="attribute_<?php echo e($attribute->id); ?>" class="form-control"
                        name="attributesAfter[<?php echo e($attribute->id); ?>]" required >
                    <?php if($errors->has('propertiesValue')): ?>
                        <span class="text-danger"><?php echo e($errors->first('propertiesValue')); ?></span>
                    <?php endif; ?>
                </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                
                 
                <?php $__currentLoopData = $productAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="form-group mb-3">        
                    <input hidden  value="<?php echo e($attribute->id); ?>"type="text" placeholder="<?php echo e($attribute->propertiesName); ?>" id="attribute_<?php echo e($attribute->id); ?>" class="form-control"
                        name="attributes[<?php echo e($attribute->id); ?>]" required >
                </div>
                
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endif; ?>


                <div class="d-grid mx-auto text-center">

                    <button type="submit" class="btn btn-outline-success ">Sửa</button>

                    <a href="<?php echo e(route('product.index')); ?>" class="btn btn-outline-secondary ">                 
                        <span class="text">Hủy</span>
                    </a>
                </div>
            </form>


        </div>
    </div>
</div>
<?php /**PATH E:\DoAnBe2\resources\views/layoutProduct/productLP/edit_product.blade.php ENDPATH**/ ?>