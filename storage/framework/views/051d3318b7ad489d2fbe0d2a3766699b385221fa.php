<?php if(count($errors)>0): ?>
    <div class="row alert alert-danger">
        <div class="col-md-4 col-md-offset-4 error">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
<?php if(Session::has('message')): ?>
    <div class="row alert alert-success">
        <div class="col-md-4 col-md-offset-4">
            <?php echo e(Session::get('message')); ?>

        </div>
    </div>
<?php endif; ?>