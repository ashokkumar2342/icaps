
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
						<?php echo Form::open(['route'=>'user.profile.review.post']); ?>

								<div class="form-group clearfix">
                                    
                                    <div class="col-lg-12">
                                       <?php echo Form::textarea('comments', '', ['class'=>'form-control','rows'=>'2','style'=>'resize:none;']); ?>

                                    <p class="text-danger"><?php echo e($errors->first('comments')); ?></p>
                                     
                                    </div>
                                </div>	
								<div class="clearfix">
									<div class="form-group clearfix  text-right">
										<button class="btn btn-primary">Post</button>
									</div>
								</div>
								
							
						<?php echo Form::close(); ?>

					</div>
				</div>					
		 	</div>
		 	<section class="panel">
	    <header class="panel-heading ">
	         
	    </header>
		    <table class="table">
		        <thead>
		            <tr>
		                <th>Date/Time</th>
		                <th>User Name</th>                                                                

		                <th>Review</th>                                
		                
		                <th colspan="2">Action</th>
		                 
		            </tr>
		        </thead>
		        <tbody>
		            <?php $__currentLoopData = $review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                <?php if($data->user): ?>
		                    <tr>
		                        <td><?php echo e($data->created_at); ?></td>
		                        <td><?php echo e($data->first_name); ?></td>
		                        <td><?php echo e($data->comments); ?></td>		                        
		                        <td class="romove-item">
			                        <?php if($data->user->id == Auth::guard('user')->user()->id): ?>
				                        <div class="dropdown">
										    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog ">
										    <span class="caret"></span>
										    </i></a>
										    <ul class="dropdown-menu">							       
										      <li><a href="<?php echo e(route('user.profile.review.edit',[$data->id])); ?>"  ><i class="fa fa-pencil"></i> Edit</a> </a></li>
										      <li><a href="<?php echo e(route('user.profile.review.delete',$data->id)); ?>"><i class="fa fa-trash-o"></i> Delete</a>
		                                        </li>
										    </ul>
										</div>
									<?php endif; ?>                                        
                                </td>

		                                                      
		                    </tr>
		                <?php endif; ?>
		            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		        </tbody>
		    </table>
		</section>
		</div>
		 
	
	</div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>