<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tables</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Category
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Url</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($categories) && count($categories)>0): ?>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo e($category->category_name); ?></td>
                                        <td><?php echo e($category->url); ?></td>
                                        <td><?php echo e(($category->status==1)?'Active':"Inactive"); ?></td>
                                        <td><a class="btn btn-primary"
                                               href="<?php echo URL('admin/category/'.$category->category_id.'/edit/'); ?>">
                                                Edit
                                            </a>

                                            <?php echo e(Form::open(['method' => 'DELETE','route' => ['category.destroy',$category->category_id],'style'=>'display:inline'])); ?>

                                            <?php echo e(Form::submit('Delete', ['class' => 'btn btn-danger'])); ?>

                                            <?php echo e(Form::close()); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4">
                                        <center>No Result Found!</center>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>