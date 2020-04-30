<?php $__env->startPush('links'); ?>
 <!--bootstrap picker-->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('js/bootstrap-datepicker/css/datepicker.css')); ?>"/>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-3 " style="min-height: 300px">
			<?php echo $__env->make('user.include.side_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
		<div class="col-md-9" style="background-color: white; padding:30px">
			<?php echo $__env->make('user.include.member_request', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	
			
			<div class="col-md-12" >
				<h3 style="margin-bottom: 25px;padding-bottom: 10px;border-bottom: 1px solid #c6c6c6;"><strong>Edit your personal information</strong></h3>
				<div class="row">
				    <div class="text-danger"><?php echo e($errors->first()); ?></div>
					<div class="col-md-10 col-md-offset-1 ">
						<?php echo Form::open(['route'=>'user.profile.update','method'=>'put']); ?>

								<div class="form-group clearfix">
									<?php echo Form::label('first_name', 'First name :', ['class'=>'control-label col-md-4']); ?>

									<div class="col-md-8">
										<?php echo Form::text('first_name', $user->first_name, ['class'=>'form-control']); ?>

										<p class="text-danger"><?php echo e($errors->first('first_name')); ?></p>
									</div>
									
								</div>
								<div class="form-group clearfix">
									<?php echo Form::label('last_name', 'Last name :', ['class'=>'control-label col-md-4']); ?>

									<div class="col-md-8">
										<?php echo Form::text('last_name', $user->last_name, ['class'=>'form-control']); ?>

										<div class="text-danger"><?php echo e($errors->first('last_name')); ?></div>
									</div>
								</div>
								<div class="form-group clearfix">
									<?php echo Form::label('gender', 'Gender :', ['class'=>'control-label col-md-4']); ?>

									<div class="col-md-8">
										<div>
										    <?php echo Form::radio('gender', '1', ($user->gender == 1)?'checked':'', []); ?>  male &nbsp;&nbsp;&nbsp;&nbsp;
										    <?php echo Form::radio('gender', '2', ($user->gender == 2)?'checked':'', []); ?>  female
										</div>
										<div class="text-danger"><?php echo e($errors->first('gender')); ?></div>
									</div>
									
									
								</div>
								<div class="form-group clearfix">
									<?php echo Form::label('date_of_birth', 'Date of Birth :', ['class'=>'control-label col-md-4']); ?>

									<div class="col-md-8">
										<div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="<?php echo e(($user->dob)?date('d-m-Y',strtotime($user->dob)):date('d-m-Y')); ?>"  class="input-append date dpYears">
	                                        <input type="text" readonly="" name="date_of_birth" id="date_of_birth" value="<?php echo e(($user->dob)?date('d-m-Y',strtotime($user->dob)):date('d-m-Y')); ?>" size="16" class="form-control">
	                                          <span class="input-group-btn add-on" style="float: right;margin-top:-36px;margin-right:30px;">
	                                            <button style="padding:9px;padding-right:10;padding-left:10px" class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
	                                          </span>
	                                    </div>
	                                    <div class="text-danger"><?php echo e($errors->first('date_of_birth')); ?></div>
									</div>
								</div>
								<div class="clearfix"><br><br></div>
								<div class="form-group clearfix col-md-offset-2 text-center">
									<button class="btn btn-primary">Update</button>
								</div>
							
						<?php echo Form::close(); ?>

					</div>
				</div>					
		 	</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<!--picker initialization-->
<script src="<?php echo e(asset('js/picker-init.js')); ?>"></script>
<!--bootstrap picker-->
<script type="text/javascript" src="<?php echo e(asset('js/bootstrap-datepicker/js/bootstrap-datepicker.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('front.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>