<?php $__env->startSection('content'); ?>
    <!--body wrapper start-->
<div class="wrapper">
    <div class="row">
	    <div class="col-sm-12">
	        <section class="panel">
	            <header class="panel-heading ">
	                Member List
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
		                    <th>Customer Id</th>
		                    <th>Name</th>
		                    <th>Type</th>                        
		                    <th>Mobile</th>
		                    <th>DOB</th>
		                    <th width="100px">Status</th>
		                    <th width="130px">Custom</th>
		                </tr>
		            </thead>
		            <tbody>
			            <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			            <?php if($member->user): ?>
	                    <tr>
	                        <td><?php echo e(@$sn=$sn+1); ?></td>
	                        <td><?php echo e($member->user->created_at); ?></td>
	                        <td><?php echo e($member->user->customer_id); ?></td>
	                        <td class="p-name"><?php echo e($member->user->first_name); ?>  <?php echo e($member->user->last_name); ?></td>
	                        <td><?php if($member->member_type == 0): ?><?php echo e('free'); ?><?php elseif($member->member_type == 1): ?><?php echo e('Red'); ?><?php elseif($member->member_type == 2): ?><?php echo e('Green'); ?><?php elseif($member->member_type == 1): ?><?php echo e('Blue'); ?><?php endif; ?></td>
	                        <td ><?php echo e($member->user->mobile); ?></td>
	                        <td><?php echo e(($member->user->dob)?date('d-m-Y',strtotime($member->user->dob)):''); ?></td>
	                        
	                        <td>
	                            <button data-action="btnStatus" data-url="<?php echo e(route('admin.member.status',$member->user->id)); ?>" data-parent="tr" class="label <?php echo e(($member->user->status == 1) ?'btn-success':'btn-danger'); ?> btn btn-xs"><?php echo e(($member->user->status == 1)? 'Active' : 'Inactive'); ?></button>
	                        </td>
	                        <td>
	                            <a href="<?php echo e(route('admin.member.view',[$member->user->id])); ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>
	                            <a href="<?php echo e(route('admin.member.edit',[$member->user->id])); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
	                            <a data-action='reset-password' data-url="<?php echo e(route('admin.member.password.reset',$member->user->id)); ?>"  class="btn btn-warning btn-xs"><i class="fa fa-key"></i></a>
	                            <?php if(Auth::guard('admin')->user()->permission == 1): ?>
	                            <button data-action="delete" data-parent="tr" data-url="<?php echo e(route('admin.member.delete',$member->id)); ?>"  class="btn btn-danger btn-xs" ><i class="fa fa-trash-o"></i></button>
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
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
function deleteData(url){
	alert(url);
}
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>