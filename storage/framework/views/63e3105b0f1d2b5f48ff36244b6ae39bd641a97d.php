
<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-3 " style="min-height: 300px">
			<?php echo $__env->make('user.include.side_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
		<div class="col-md-9" style="background-color: white; padding:30px">
			<?php echo $__env->make('user.include.member_request', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	
			
			<div class="col-md-12" >
				<h3 style="margin-bottom: 25px;padding-bottom: 10px;border-bottom: 1px solid #c6c6c6;"><strong>	Account Information</strong></h3>
				<div class="row">
					<div class="col-md-6">
						<p style="font-size: 16px;"> <b>Contact Information</b> </p>
				 		<h5> <?php echo e($user->first_name); ?>

				 		<?php echo e($user->last_name); ?></h5>
				 		<h5><?php echo e($user->email); ?></h5>
				 		<p><a href="<?php echo e(route('user.profile.edit')); ?>">Edit</a> | <a href="<?php echo e(route('user.password.change')); ?>">Change Password</a></p>
					</div>
					<?php 
                     $profile = route('user.image.profile.view',[Auth::guard('user')->user()->profile_pic]);
                 ?>
					<div class="col-md-6">
						<div id="showImg">
							<p style="font-size: 16px;"><b>Profile Image</b></p>
							<div style="height: 100px; width: 100px; background-color: #eee;">
								<img width="100" height="100px" src="<?php echo e((Auth::guard('user')->user()->profile_pic)? $profile : asset('profile-img/user.png')); ?>">
							</div>
							 
							<a href="javascript:;">Change Image</a>
						</div>
						<div id="changeImg" class="hidden">
							<?php echo Form::open(['route'=>'user.profilepic.update','files'=>true]); ?>

								<div class="col-md-7">
									<?php echo Form::file('profile_pic', ['class'=>'form-control']); ?>

									
								</div>
								<div class="col-md-5"><button type="submit" class="btn btn-primary">Change</button> </div>
								<p class="text-danger"><?php echo e($errors->first('profile_pic')); ?></p>
								<div class="col-md-12"><br><a href="javascript:;">Cancel</a></div>
								
							<?php echo Form::close(); ?>

						</div>
					</div>
				</div>			
		 	</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#showImg').on('click','a',function(){
			$('#showImg').hide();
			$('#changeImg').removeClass('hidden');
		});
		$('#changeImg').on('click','a',function(){
			$('#changeImg').addClass('hidden');
			$('#showImg').show();
		});
		<?php if($errors->has('profile_pic')): ?>
		$('#showImg').hide();
		$('#changeImg').removeClass('hidden');
		<?php endif; ?>
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('front.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>