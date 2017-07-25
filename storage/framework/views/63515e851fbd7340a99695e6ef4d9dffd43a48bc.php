<!doctype html>
<html>
<head>

    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo e(URL::to('src/css/main.css')); ?>">
    <script src="<?php echo e(URL::to('src/js/app.js')); ?>"></script>
</head>
<body>
<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container">
    <?php echo $__env->yieldContent('content'); ?>
</div>
</body>
</html>
