
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
				<h3 style="margin-bottom: 25px;padding-bottom: 10px;border-bottom: 1px solid #c6c6c6;"><strong>Comments</strong></h3>
				<div class="row">
					<div class="col-md-12  ">						 
						<?php echo e(Form::open(['route'=>['user.profile.review.update',$review->id],'method'=>'put'])); ?>

		               		   <div class="form-group clearfix"> 
		                   	       <div class="col-lg-12">
		                       		 <?php echo e(Form::textarea('comments',$review->comments,['class'=>'form-control required','rows'=>'2',])); ?>

		                        		<p class="text-danger"><?php echo e($errors->first('comments')); ?></p>
		                   		    </div>
		                		</div>	               
		                		<div class="form-group clearfix">
		                    		<button class="btn btn-primary pull-right" type="submit">Update</button>
		                		</div>
            			<?php echo e(Form::close()); ?>

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