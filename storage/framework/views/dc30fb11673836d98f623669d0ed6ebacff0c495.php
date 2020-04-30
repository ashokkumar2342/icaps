<?php $__env->startSection('content'); ?>

    <!--body wrapper start-->
    <div class="wrapper">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <section class="panel">
                    <header class="panel-heading ">
                        Order List
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
                                <th>Item</th>
                                <th>slot</th>
                                <th width="70px">Status</th>
                                <th width="70px">Custom</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($data->user): ?>
                                    <tr>
                                        <td><?php echo e(@$sn=$sn+1); ?></td>
                                        <td><?php echo e($data->created_at->format('d-M-Y / h:i')); ?></td>
                                        <td class="p-name"><?php echo e(isset($data->user->first_name) ? $data->user->first_name : ' '); ?> <?php echo e(isset($data->user->last_name) ? $data->user->last_name : ' '); ?></td>
                                        <td class="p-name"> <?php echo e(isset($data->user->mobile) ? $data->user->mobile : ' '); ?></td>
                                        <td><?php echo e(count($data->orderItems)); ?></td>
                                        <td class="p-name"> <?php echo e($data->slot); ?></td>

                                        
                                        <td>
                                            <?php if($data->status == 4 || $data->status == 1): ?>
                                            <button data-action="btnStatus" data-url="<?php echo e(route('admin.product.order.status',$data->id)); ?>" data-parent="tr" class="label <?php echo e(($data->status == 4) ?'btn-success':'btn-danger'); ?> btn btn-xs"><?php echo e(($data->status == 4)? 'Delivered' : 'Pending'); ?></button>
                                            <?php else: ?>
                                                <span class="label label-warning">canceled</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('admin.product.order.view',[$data->id])); ?>"  title="view" class="btn btn-primary btn-xs tooltips"><i class="fa fa-eye"></i></a>
                                            <a <?php echo e(($data->status == 2 || $data->status == 1)?'disabled':''); ?> href="<?php echo e(route('admin.product.order.cancel',$data->id)); ?>" title="Cancel" class="btn btn-warning btn-xs tooltips" ><i class="fa fa-times"></i></a>
                                            <?php if(Auth::guard('admin')->user()->permission == 1): ?>
                                                <a data-action="delete" title="Delete" data-parent="tr" data-url="<?php echo e(route('admin.product.order.delete',$data->id)); ?>"  class="btn btn-danger btn-xs tooltips" ><i class="fa fa-trash-o"></i></a>
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
    <!--body wrapper end-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>