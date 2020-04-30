
<!-- Main Content -->
<?php $__env->startSection('content'); ?>
<div class="container" id="app">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <router-view></router-view>            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>