
<div class="container">

    <div class="head-title">
        <div class="left">
            <div class="breadcrumb">
                <h1>Quản lý sản phẩm</h1>
            </div>
            <ul class="breadcrumb">

                <a href="<?php echo e(route('admin')); ?>">
                    <li>Home</li>
                </a>

                <li><i class='bx bx-chevron-right'></i></li>

                <li> <a class="active" href="<?php echo e(route('admin')); ?>"><?php echo e($pageName); ?></a> </li>

            </ul>
        </div>

    </div>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">

                <div class="row">
                    <div class="col-sm-11">
                        <h3 class="card-title"><?php echo e($pageName); ?></h3>
                    </div>
                    <div class="col-sm-1">
                        <a class="btn btn-outline-success btn-sm"
                            href="<?php echo e(route('adminPageId', 6 /*id trang addCategory*/)); ?>">
                            <i class="bi bi-plus-square-dotted"></i>
                        </a>

                    </div>
                </div>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 18%">
                                Id danh mục
                            </th>
                            <th style="width: 18%">
                                Tên danh mục
                            </th>

                            <th style="width: 24%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($value['id']); ?>

                                </td>
                                <td>
                                    <a>
                                        <?php echo e($value['categoryName']); ?>

                                    </a>
                                    <br />
                                    <small>
                                        <?php echo e($value['created_at']); ?>

                                    </small>
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-outline-info btn-sm" href="">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a class="btn btn-outline-danger btn-sm" href="">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->


</div>


<?php echo $__env->make('layouts.footerAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.headerAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\DoAnBe2\resources\views/layoutProduct/allCategorys.blade.php ENDPATH**/ ?>