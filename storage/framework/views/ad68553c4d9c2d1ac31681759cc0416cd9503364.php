<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Create Category</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <?php echo e(Form::open(array('url' => 'admin/category','files' => true))); ?>

                    <?php echo e(csrf_field()); ?>

                    <div class="form-group<?php echo e($errors->has('category_name') ? ' has-error' : ''); ?>">
                        <label>Name</label>
                        <?php echo e(Form::input('text','category_name',Input::old('category_name'),['class'=>'form-control'])); ?>

                    </div>
                    <div class="form-group<?php echo e($errors->has('url') ? ' has-error' : ''); ?>">
                        <label>Url</label>
                        <?php echo e(Form::input('text','url',Input::old('url'),['class'=>'form-control'])); ?>

                    </div>
                    <div class="form-group">
                        <label>Select Parent Category</label>
                        <?php
                        $categories[null] = 'Please Select';

                        ?>
                        <?php echo e(Form::select('parent_category',$categories,'',['class'=>'form-control'])); ?>


                    </div>
                    <div class="form-group<?php echo e($errors->has('price') ? ' has-error' : ''); ?>">
                        <label>Description</label>
                        <?php echo e(Form::textarea('description',Input::old('description'),['class'=>'form-control'])); ?>

                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <?php echo e(Form::select('status',array('1'=>'Active','2'=>'In Active'),'',['class'=>'form-control'])); ?>

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