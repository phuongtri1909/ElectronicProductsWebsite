<?php echo $__env->make('layouts.header_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                      <a class="btn btn-outline-success btn-sm" href=""> 
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
                            <th style="width: 2%">
                                Id
                            </th>
                            <th style="width: 18%">
                                Name
                            </th>
                            <th style="width: 8%">
                                Image
                            </th>
                            <th style="width: 32%;">
                                Description
                            </th>
                            <th style="width: 10%" class="text-center">
                                Price
                            </th>
                            <th style="width: 2%" class="text-center">
                                Feature
                            </th>
                            <th style="width: 2%" class="text-center">
                                Manu_id
                            </th>
                            <th style="width: 2%" class="text-center">
                                Type_id
                            </th>
                            <th style="width: 24%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td>
                                
                            </td>
                            <td>
                                <a>
                                    
                                </a>
                                <br />
                                <small>
                                    
                                </small>
                            </td>
                            <td>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        
                                    </li>
                                </ul>
                            </td>
                            <td nowrap style="overflow: hidden; text-overflow: ellipsis; max-width: 20ch;">
                                <!--style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"-->
                                    
                            </td>
                            <td class="project-state">
                                
                            </td>
                            <td class="project-state">
                                
                            </td>
                            <td class="project-state">
                                
                            </td>
                            <td class="project-state">
                                
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
                        
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->


</div>
<?php echo $__env->make('layouts.footer_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH E:\DoAnBe2\resources\views/layoutProduct/operating_SystemLP/all_operating_system.blade.php ENDPATH**/ ?>