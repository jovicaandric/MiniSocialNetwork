<?php $__env->startSection('title'); ?>
    Welcome
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        <div class="col-md-6">
            <form action="<?php echo e(route('signup')); ?>" method="post">
                <h3>Sign Up</h3>
                <div class="form-group <?php echo e($errors->has('email')?'has-error':''); ?>">
                    <label for="email">E-Mail</label>
                    <input class="form-control " type="text" name="email" id="email" value="<?php echo e(Request::old('email')); ?>">
                </div>
                <div class="form-group <?php echo e($errors->has('firstname')?'has-error':''); ?>">
                    <label for="firstname">Firstname</label>
                    <input class="form-control" type="text" name="firstname" id="firstname" value="<?php echo e(Request::old('firstname')); ?>">
                </div>
                <div class="form-group <?php echo e($errors->has('password')?'has-error':''); ?>">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
            </form>
        </div>
        <div class="col-md-6">
            <h3>Sign In</h3>
            <form action="<?php echo e(route('signin')); ?>" method="post">
                <div class="form-group <?php echo e($errors->has('email')?'has-error':''); ?>">
                    <label for="email">E-Mail</label>
                    <input class="form-control" type="text" name="email" id="email" value="<?php echo e(Request::old('email')); ?>">
                </div>
                <div class="form-group <?php echo e($errors->has('password')?'has-error':''); ?>">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>