<?php $__env->startSection('content'); ?>
        <div class="container">
            <div class="row">
                <div class="panel-heading">
                  <h1>Create New User</h1>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php echo e(Form::open(array('url' => 'admin/user/store'))); ?>

                            <?php echo e(csrf_field()); ?>

                            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                <label>Name</label>
                                <?php echo e(Form::input('text','name',Input::old('name'),['class'=>'form-control'])); ?>

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <label>Email</label>
                                <?php echo e(Form::input('text','email',Input::old('email'),['class'=>'form-control'])); ?>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                <label>Password</label>
                                <?php echo e(Form::input('password','password','',['class'=>'form-control'])); ?>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group<?php echo e($errors->has('confirm_password') ? ' has-error' : ''); ?>">
                                <label>Confirm Password</label>
                                <?php echo e(Form::input('password','confirm_password','',['class'=>'form-control'])); ?>

                                <?php if($errors->has('confirm_password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('confirm_password')); ?></strong>
                                    </span>
                                <?php endif; ?>
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