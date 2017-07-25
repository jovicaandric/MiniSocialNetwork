<?php $__env->startSection('title'); ?>
    Account
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Your Account</h3></header>
            <form action="<?php echo e(route('account.save')); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="<?php echo e($user->firstname); ?>"
                           id="first_name">
                </div>
                <div class="form-group">
                    <label for="image">Image (only .jpg)</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
                <button type="submit" class="btn btn-primary">Save Acount</button>
                <input type="hidden" value="<?php echo e(Session::token()); ?>" name="_token">
            </form>
        </div>
    </section>
    <?php if(Storage::disk('local')->has($user->firstname.'-'.$user->id.'.jpg')): ?>
        <section class="row newpost">
            <div class="col-md-6 col-md-offset-3">
                <img src="<?php echo e(route('account.image',['filename'=>$user->firstname.'-'.$user->id.'.jpg'])); ?>" alt=""
                     class="img-responsive">
            </div>
        </section>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>