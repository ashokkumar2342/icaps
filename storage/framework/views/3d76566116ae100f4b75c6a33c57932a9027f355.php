
<?php $__env->startPush('links'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-md-6 col-md-offset-3" style="min-height: 300px">
		<router-view></router-view>
		
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>