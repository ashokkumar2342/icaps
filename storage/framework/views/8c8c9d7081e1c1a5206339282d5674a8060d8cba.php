<?php $__env->startSection('content'); ?>
<!--body wrapper start-->

<div class="wrapper">
    <div class="row">
	    <div class="col-sm-12">
	        <section class="panel">
	            <header class="panel-heading ">
	                User List
	                <span class="tools pull-right">
	                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
	                    <a class="t-close fa fa-times" href="javascript:;"></a>
	                </span>
	            </header>
	            <table class="table responsive-data-table data-table">
		            <thead>
		                <tr>
		                    <th>Sn &nbsp;&nbsp;</th>
		                    <th>Date</th>
		                    <th>Name</th>
		                    <th>Email</th>
		                    <th>Mobile</th>
		                    <th>Member</th>
		                    <th width="100px">Status</th>
		                    <th width="120px">Custom</th>
		                </tr>
		            </thead>
		            <tbody>
		            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                <tr>
		                    <td><?php echo e(@$sn=$sn+1); ?></td>
		                    <td><?php echo e($user->created_at); ?></td>
		                    <td class="p-name"><?php echo e($user->first_name); ?>  <?php echo e($user->last_name); ?></td>
		                    <td ><?php echo e($user->email); ?></td>
		                    <td ><?php echo e($user->mobile); ?></td>
		                    <td><?php echo ($user->member_status == 1)? '<span class="label label-success">Member</span>' :'<a href="'.route('admin.member.request.edit',$user->id).'" class="label label-danger btn btn-xs">Non Member</a>'; ?></td>
		                    <td>
		                        <button data-action="btnStatus" data-url="<?php echo e(route('admin.user.status',$user->id)); ?>"  class="label btn <?php echo e(($user->status == 1) ?'btn-success':'btn-danger'); ?>"><?php echo e(($user->status == 1)? 'Active' : 'Inactive'); ?></button>
		                    </td>
		                    <td>
		                        <a href="<?php echo e(route('admin.user.view',[$user->id])); ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>
		                        <a href="<?php echo e(route('admin.user.edit',[$user->id])); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
		                        <a data-action='reset-password' data-url="<?php echo e(route('admin.user.password.reset',$user->id)); ?>"  class="btn btn-warning btn-xs"><i class="fa fa-key"></i></a>
		                    </td>
		                </tr>
		            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		            </tbody>
	            </table>
	        </section>
	    </div>

	</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>