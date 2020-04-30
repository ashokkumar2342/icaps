
<?php $__env->startSection('breadcrumb'); ?>
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="<?php echo e(route('front.home')); ?>">Home</a></li>
                <li class='active'>Apply For Training</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-8 col-md-offset-2 col-sm-12 sign-in-page">
        <h4 class="checkout-subtitle">Training</h4>
        <hr>
        <?php echo e(Form::open(['route'=>'front.assistance.training.post','class'=>'cmxform'])); ?>

            <div class="form-group clearfix">
                <?php echo Form::label('apply_for', 'Apply For', ['class'=>'control-label col-lg-2']); ?>

                <div class="col-md-10">
                    <?php echo Form::select('apply_for',
                        [
                           'Full Stack Web Development' => 'Full Stack Web Development',
                           'Mobile App Development' => 'Mobile App Development',
                           'Sales &amp; Marketing' => 'Sales &amp; Marketing',
                           'Graphic Designer' => 'Graphic Designer',
                           'Call Centre Training/BPO' => 'Call Centre Training/BPO',
                           'MS Office' => 'MS Office',
                           'Retail Management' => 'Retail Management',
                           'MTS' => 'MTS',
                        ]
                     , null, ['class'=>'form-control','placeholder'=>'please pick a menu','required']); ?>

                    <p class="text-danger"><?php echo e($errors->first('apply_for')); ?></p>
                </div>
            </div>                   
             <div class="form-group clearfix">
                <?php echo e(Form::label('message','Message',['class'=>'col-lg-2 control-label'])); ?>

                <div class="col-lg-10">
                   <?php echo Form::textarea('message', '', ['class'=>'form-control','rows'=>'5','style'=>'resize:none;']); ?>

                <?php echo $errors->has('message')?$errors->first('message'):''; ?>

                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary pull-right" type="submit">Submit</button>
            </div>
        <?php echo e(Form::close()); ?>        
    </div>  
        </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>