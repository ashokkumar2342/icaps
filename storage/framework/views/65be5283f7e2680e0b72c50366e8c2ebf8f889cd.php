<!DOCTYPE html>
<html>
<head>
	<title><?php echo $__env->yieldContent('title','i-caps'); ?></title>
	<?php echo $__env->make('front.include.link', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<link href="<?php echo e(asset('js/toastr-master/toastr.css')); ?>" rel="stylesheet" type="text/css" />
	<?php echo $__env->yieldPushContent('links'); ?>
</head>
<body>
<?php echo $__env->make('front.include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('front.include.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldPushContent('scripts'); ?>
    <script src="<?php echo e(asset('js/toastr-master/toastr.js')); ?>"></script>
    <?php echo $__env->make('components.alert.tostr', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('front.include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>