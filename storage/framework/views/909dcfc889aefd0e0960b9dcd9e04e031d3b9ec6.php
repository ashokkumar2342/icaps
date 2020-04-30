

<!-- Main Content -->
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Email Verification Form</div>
                <div class="panel-body">
                    <?php echo Form::open(['route'=>'user.email.verification.post', 'class'=>'form-group form-horizontal']); ?>

                        <div class="form-group">
                            <?php echo Form::label('email', 'Email', ['class'=>'col-md-4 control-label']); ?>

                            <div class="col-md-6">
                                <?php echo Form::email('email', '', ['class'=>'form-control']); ?>

                                <?php if($errors->has('email')): ?>
                                    <span class="text-danger">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('password', 'Password', ['class'=>'col-md-4 control-label']); ?>

                            <div class="col-md-6">
                                <?php echo Form::password('password', ['class'=>'form-control']); ?>

                                <?php if($errors->has('password')): ?>
                                    <span class="text-danger">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Link
                                </button>
                            </div>
                        </div>
                    <?php echo Form::close(); ?>

                   
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>