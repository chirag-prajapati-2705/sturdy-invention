<?php if(Session::has('success')): ?>
    <div class="alert alert-<?php echo e(Session::get('flash_notification.level')); ?> page-alert custom-notification">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php printf((Session::get('success'))) ?> </div>
<?php endif; ?>
<?php if($errors->any()): ?>
    <div class="alert alert-danger display-hide page-alert custom-notification" style="display: block;">
        <button class="close" data-close="alert"></button>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p><?php echo e($error); ?> </p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>
<div class="alert ajax-request-alert  hidden">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <span class="alert-message"></span>
</div>