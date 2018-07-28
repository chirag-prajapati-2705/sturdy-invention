<?php
/**
 * Created by PhpStorm.
 * User: Chirag-Chiku
 * Date: 1/28/2017
 * Time: 10:25 PM
 */
?>

<?php $__env->startSection('content'); ?>
<!--banner-->
<div class="banner">
    <div class="col-sm-3 banner-mat">
        <img class="img-responsive" src="<?php echo e(URL::asset('front/images/ba1.jpg')); ?>" alt="">
    </div>
    <div class="col-sm-6 matter-banner">
        <div class="slider">
            <div class="callbacks_container">
                <ul class="rslides" id="slider">
                    <?php if(!empty($banners)): ?>
                        <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <img src="<?php echo e(URL::asset('uploads/'.$banner->image)); ?>" alt="">
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </div>
    <div class="col-sm-3 banner-mat">
        <img class="img-responsive" src="<?php echo e(URL::asset('front/images/ba.jpg')); ?>" alt="">
    </div>
    <div class="clearfix"></div>
</div>
<!--//banner-->
<?php echo $__env->make("home.recent",['products'=>$products], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>