<?php $__env->startSection('content'); ?>
<!--body wrapper start-->
<div class="wrapper">
    <div class="row">
	    <div class="col-sm-12">
	        <section class="panel">
	            <header class="panel-heading ">
	                Seller List
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
		                    <th>Mobile</th>
		                    <th>Email</th>
		                    <th width="100px">Status</th>
		                    <th width="100px">Custom</th>
		                </tr>
		            </thead>
		            <tbody>
		            <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                <tr>
		                	<td><?php echo e(@$sn=$sn+1); ?></td>
		                    <td><?php echo e($seller->created_at); ?></td>
		                    <td class="p-name"><?php echo e($seller->first_name); ?>  <?php echo e($seller->last_name); ?></td>
		                    <td ><?php echo e($seller->mobile); ?></td>
		                    <td ><?php echo e($seller->email); ?></td>
		                    <td>
		                        <button data-action="btnStatus" data-url="<?php echo e(route('admin.seller.status',$seller->id)); ?>"  class="label btn <?php echo e(($seller->status == 1) ?'btn-success':'btn-danger'); ?>"><?php echo e(($seller->status == 1)? 'Active' : 'Inactive'); ?></button>
		                    </td>
		                    <td>
		                        <a href="" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i>  </a>
		                        <a href="<?php echo e(route('admin.seller.edit',[$seller->id])); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>  </a>
		                       	<a data-action='reset-password' data-url="<?php echo e(route('admin.seller.password.reset',$seller->id)); ?>"  class="btn btn-warning btn-xs"><i class="fa fa-key"></i></a>
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