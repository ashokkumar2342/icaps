
<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-3 " style="min-height: 300px">
			<?php echo $__env->make('user.include.side_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
		<div class="col-md-9" style="background-color: white; padding:30px">
			<?php echo $__env->make('user.include.member_request', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	
			
			<div class="col-md-12 table-responsive" >
				<h3 style="margin-bottom: 25px;padding-bottom: 10px;border-bottom: 1px solid #c6c6c6;"><strong>	Order Details</strong></h3>
				 
				 <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>                            
                                <th>Item</th>
                                <th>Amount</th>
                                <th>slot</th>
                                <th width="70px">Status</th>
                                <th width="120px">Custom</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($data->user && $data->user->id == Auth::guard('user')->user()->id): ?>
                                    <tr>                                     
                                        <td><?php echo e($data->created_at); ?></td>
                                        <td><?php echo e(count($data->orderItems)); ?></td>
                                        <td class="p-name"> <?php echo e($data->amount); ?></td>
                                        <td class="p-name"> <?php echo e($data->slot); ?></td>
                                        <td><span  class="label label-danger  label-xs"><?php echo e(isset($data->orderStatus->name) ? $data->orderStatus->name : 'pending'); ?></span>
                                        </td>
                                        <td>
                                            <a class="btn btn-xs btn-primary" title="cancel" href="<?php echo e(route('user.order.view',[$data->ukey])); ?>" class="icon"><i class="fa fa-eye"></i></a>
                                            <?php if($data->status == 1): ?>
                                                <a onclick="return confirm('Are you sure to cancel this order ?')" class="btn btn-danger btn-xs" title="cancel" href="<?php echo e(route('user.order.cancel',[$data->ukey])); ?>"><i class="fa fa-times"></i></a>   
                                            <?php endif; ?>                                      
                                        </td>                                 
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="row">
            <div class="col-md-12">
              
                <?php echo e($orders->links()); ?>

               
            </div>
        </div>			
		 	</div>

		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>