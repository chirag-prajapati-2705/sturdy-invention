<?php $__env->startSection('content'); ?>
    <?php if(!empty($users)): ?>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tables</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        DataTables Advanced Tables
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr class="odd gradeX">
                                        <td><?php echo e($user->name); ?></td>
                                        <td><?php echo e($user->email); ?></td>
                                        <td><a class="btn btn-danger btn-xs btn btn-xs btn-danger delete-btn"
                                               href="<?php echo URL('admin/user/edit/'.$user->id); ?>">
                                                <i class="fa fa-edit" title="" data-placement="top"
                                                   data-toggle="tooltip"
                                                   data-original-title="Delete"></i>
                                            </a> <a class="btn btn-danger btn-xs btn btn-xs btn-danger delete-btn"
                                                    href="<?php echo URL('admin/user/destroy', $user->id); ?>">
                                                <i class="fa fa-trash" title="" data-placement="top"
                                                   data-toggle="tooltip"
                                                   data-original-title="Delete"></i>
                                            </a></td>
                                    </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>