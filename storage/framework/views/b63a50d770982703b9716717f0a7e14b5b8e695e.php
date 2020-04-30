
<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-3 " style="min-height: 300px">
			<?php echo $__env->make('user.include.side_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
		<div class="col-md-9" style="background-color: white; padding:30px">
			<?php echo $__env->make('user.include.member_request', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>			
			<div class="col-md-12" >
				<h3 style="margin-bottom: 25px;padding-bottom: 10px;border-bottom: 1px solid #c6c6c6;"><strong>	Change Password</strong></h3>
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						 <?php echo Form::open(['route'=>'user.changepassword.update','method'=>'put']); ?>

                                <div class="form-group">
                                    <?php echo Form::label('current_password', 'Old Password', ['class'=>'control-label']); ?>

                                    <?php echo Form::password('current_password', ['class'=>'form-control']); ?>

                                    <?php if($errors->has('current_password')): ?><p class="text-danger"><?php echo e($errors->first('current_password')); ?></p><?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <?php echo Form::label('new_password', 'New Password', ['class'=>'control-label']); ?>

                                    <?php echo Form::password('new_password', ['class'=>'form-control']); ?>

                                    <?php if($errors->has('new_password')): ?><p class="text-danger"><?php echo e($errors->first('new_password')); ?></p><?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <?php echo Form::label('new_password_confirmation', 'New Password Confirm', ['class'=>'control-label']); ?>

                                    <?php echo Form::password('new_password_confirmation', ['class'=>'form-control']); ?>

                                </div>
                                <div class="form-group">
                                   <button class="btn btn-primary" type="submit">Change Password</button>
                                </div>
                            <?php echo Form::close(); ?>

					</div>
				</div>				
		 	</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>