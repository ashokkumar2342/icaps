
<?php $__env->startSection('content'); ?>
    <!-- page head start-->
    <div class="page-head">
        <h3>
            User 
        </h3>
        
    </div>
    <!-- page head end-->

    <!--body wrapper start-->
    <div class="wrapper">
         <div class="row">
                <div class="col-lg-6  col-md-offset-3">
                    <section class="panel">
                        <header class="panel-heading">
                            <h3>User Registration</h3>
                        </header>
                        <div class="panel-body">
                            <?php echo e(Form::open(['route'=>'admin.user.new.post'])); ?>

                                <div class="form-group clearfix">
                                    <?php echo e(Form::label('first_name','First Name',['class'=>'col-lg-3 control-label'])); ?>

                                    <div class="col-lg-9">
                                        <?php echo e(Form::text('first_name','',['class'=>'form-control required'])); ?>

                                        <p class="text-danger"><?php echo e($errors->first('first_name')); ?></p>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <?php echo e(Form::label('last_name','Last Name',['class'=>'col-lg-3 control-label'])); ?>

                                    <div class="col-lg-9">
                                        <?php echo e(Form::text('last_name','',['class'=>'form-control required'])); ?>

                                        <p class="text-danger"><?php echo e($errors->first('last_name')); ?></p>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <?php echo e(Form::label('mobile','Mobile',['class'=>'col-lg-3 control-label'])); ?>

                                    <div class="col-lg-9">
                                        <?php echo e(Form::text('mobile','',['class'=>'form-control required'])); ?>

                                        <p class="text-danger"><?php echo e($errors->first('mobile')); ?></p>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <?php echo e(Form::label('email','Email',['class'=>'col-lg-3 control-label'])); ?>

                                    <div class="col-lg-9">
                                        <?php echo e(Form::email('email','',['class'=>'form-control required'])); ?>

                                        <p class="text-danger"><?php echo e($errors->first('email')); ?></p>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary pull-right" type="submit">Create User</button>
                                    </div>                                    
                                </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </section>
                </div>
            </div>
      

    </div>
    <!--body wrapper end-->

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>

<script src="<?php echo e(asset('js/jquery.validate.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/form-validation-init.js')); ?>" type="text/javascript"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>