<?php $__env->startSection('content'); ?>
    <?php echo e(Form::open(array('url' => 'admin/product/store','files' => true))); ?>

    <?php echo e(csrf_field()); ?>

    <div id="tabs">
        <ul>
            <li><a href="#general">General</a></li>
            <li><a href="#category">Category</a></li>
            
        </ul>

        <div id="general">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <input type="hidden" name="category_name" id="category_name" value="">

                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label>Name</label>
                            <?php echo e(Form::input('text','name',Input::old('name'),['class'=>'form-control'])); ?>

                        </div>
                        <div class="form-group<?php echo e($errors->has('sku') ? ' has-error' : ''); ?>">
                            <label>Sku</label>
                            <?php echo e(Form::input('text','sku',Input::old('sku'),['class'=>'form-control'])); ?>

                        </div>
                        <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
                            <label>Image</label>
                            <?php echo e(Form::file('image')); ?>

                        </div>
                        <div class="form-group<?php echo e($errors->has('price') ? ' has-error' : ''); ?>">
                            <label>price</label>
                            <?php echo e(Form::input('text','price',Input::old('price'),['class'=>'form-control'])); ?>

                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <?php echo e(Form::select('status',array('1'=>'Active','2'=>'InActive'),'',['class'=>'form-control'])); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="category">
            <div id="tree">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($category->parent_id==0): ?>
                        <ul>
                            <li category="<?php echo $category->category_id;?>"
                                id="folder_<?php echo ++$key;?>"><?php echo e($category->category_name); ?>

                                <?php endif; ?>
                                <?php if(count($category->children) >0): ?>
                                    <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <ul>
                                            <li category="<?php echo $children->category_id;?>"
                                                id="child_<?php echo ++$k;?>"><?php echo e($children->category_name); ?></li>
                                        </ul>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </li>
                        </ul>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <div class="" style="margin-top:15px;">
        <button type="submit" class="btn btn-primary">Submit Button</button>
        <button type="reset" class="btn btn-primary">Reset Button</button>
    </div>

    <?php echo e(Form::close()); ?>

    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>