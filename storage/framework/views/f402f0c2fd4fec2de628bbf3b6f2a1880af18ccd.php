<?php $__env->startSection('content'); ?>
        <div class="container">
            <div class="row">
                <div class="panel-heading">
                    <h1>Create New Product</h1>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php echo e(Form::model($category, array('method' => 'PATCH', 'route' => array('admin.category.update', $category->category_id),'files' => true))); ?>

                            <?php echo e(csrf_field()); ?>

                            <div class="form-group<?php echo e($errors->has('category_name') ? ' has-error' : ''); ?>">
                                <label>Name</label>
                                <?php echo e(Form::input('text','category_name',Input::old('category_name'),['class'=>'form-control'])); ?>

                                <?php if($errors->has('category_name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('category_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group<?php echo e($errors->has('url') ? ' has-error' : ''); ?>">
                                <label>Url</label>
                                <?php echo e(Form::input('text','url',Input::old('url'),['class'=>'form-control'])); ?>

                                <?php if($errors->has('url')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('sku')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <?php echo e(Form::select('status',array('1'=>'Active','2'=>'InActive'),'',['class'=>'form-control'])); ?>


                            </div>

                            <button type="submit" class="btn btn-primary">Submit Button</button>
                            <button type="reset" class="btn btn-primary">Reset Button</button>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                    <!-- /.row (nested) -->

                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>