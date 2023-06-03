<div class="cotainer">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3 class="card-header text-center">Thêm sản phẩm</h3>
            <form action="#" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group mb-3">
                    <input type="text" placeholder="Tên sản phẩm" id="productName" class="form-control"
                        name="productName" required autofocus>
                    <?php if($errors->has('productName')): ?>
                        <span class="text-danger"><?php echo e($errors->first('productName')); ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group mb-3">
                    <input type="text" placeholder="Gía sản phẩm" id="productPrice" class="form-control"
                        name="productPrice" required autofocus>
                    <?php if($errors->has('productPrice')): ?>
                        <span class="text-danger"><?php echo e($errors->first('productPrice')); ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group mb-3">
                    <select class="form-select form-control" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="sel2" class="form-label">Danh sách nhiều lựa chọn</label>
                    <select class="form-select form-control" id="sel2" name="sellist2" aria-label="Default select example">
						<optgroup label="Tên nhóm">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</optgroup>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <input multiple type="file" placeholder="image" id="image" class="form-control"
                        name="image" required>
                    <?php if($errors->has('image')): ?>
                        <span class="text-danger"><?php echo e($errors->first('image')); ?></span>
                    <?php endif; ?>
                </div>

                <div class="d-grid mx-auto text-center">
                    <button type="submit" class="btn btn-outline-success ">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH E:\DoAnBe2\resources\views/layoutProduct/productLP/add_product.blade.php ENDPATH**/ ?>