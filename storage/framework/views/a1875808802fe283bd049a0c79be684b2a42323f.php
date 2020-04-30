
<?php $__env->startSection('breadcrumb'); ?>
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="<?php echo e(route('front.home')); ?>">Home</a></li>
                <li class='active'>Meidcine</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <?php echo e(Form::open(['route'=>'front.product.medicine.post'])); ?>

        <div class="form-group">
            <h3>Hello ! <?php echo e(Auth::guard('user')->user()->first_name . ' '. Auth::guard('user')->user()->last_name); ?></h3>
        </div>
        <div class="form-group">
            For request <button class="btn btn-link" type="submit">Click Here</button>
        </div>
        <?php echo e(Form::close()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>