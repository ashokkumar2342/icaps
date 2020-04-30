<?php $__env->startSection('content'); ?>
    <!--body wrapper start-->
<div class="wrapper">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <section class="panel">
                <header class="panel-heading ">
                    Taxi Service Request List
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
                            <th width="80px">Status</th>
                            <th width="80px">Custom</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $taxiservices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($data->user): ?>
                            <tr>
                                <td><?php echo e(@$sn=$sn+1); ?></td>
                                <td><?php echo e($data->created_at); ?></td>
                                <td class="p-name"><?php echo e(isset($data->user->first_name) ? $data->user->first_name : ' '); ?> <?php echo e(isset($data->user->last_name) ? $data->user->last_name : ' '); ?></td>
                                <td class="p-name"> <?php echo e(isset($data->user->mobile) ? $data->user->mobile : ' '); ?></td>
                                <td class="p-name"> <?php echo e(isset($data->user->email) ? $data->user->email : ' '); ?></td>
                                <td>
                                    <button data-action="btnStatus" data-url="<?php echo e(route('admin.services.taxiservice.status',$data->id)); ?>" data-parent="tr" class="label <?php echo e(($data->status == 1) ?'btn-success':'btn-danger'); ?> btn btn-xs"><?php echo e(($data->status == 1)? 'Done' : 'Pending'); ?></button>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.services.taxiservice.view',[$data->id])); ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>
                                    <?php if(Auth::guard('admin')->user()->permission == 1): ?>
                                        <a data-action="delete" data-parent="tr" data-url="<?php echo e(route('admin.services.taxiservice.delete',$data->id)); ?>"  class="btn btn-danger btn-xs" ><i class="fa fa-trash-o"></i></a>
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

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>