<?php $__env->startSection('content'); ?>
    <!--body wrapper start-->
<div class="wrapper">
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading ">
                    Member Request List
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
                            <th>User Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th width="100px">Status</th>
                            <th width="100px">Custom</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($member->UserDetails): ?>
                            <tr>
                                <td><?php echo e(@$sn=$sn+1); ?></td>
                                <td><?php echo e($member->created_at); ?></td>
                                <td><?php echo e(isset($member->UserDetails->first_name) ? $member->UserDetails->first_name : ' '); ?> <?php echo e(isset($member->UserDetails->last_name) ? $member->UserDetails->last_name : ' '); ?></td>
                                <td class="p-name"> <?php echo e(isset($member->UserDetails->mobile) ? $member->UserDetails->mobile : ' '); ?></td>
                                <td class="p-name"> <?php echo e(isset($member->UserDetails->email) ? $member->UserDetails->email : ' '); ?></td>
                                <td>
                                    <span class="label label-<?php echo e(($member->userDetails->status == 1)?'success':'danger'); ?>"><?php echo e(($member->userDetails->status == 1)? 'Active' : 'Inactive'); ?></span>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.user.view',$member->user_id)); ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i>  </a>
                                    <a href="<?php echo e(route('admin.member.request.edit',[$member->user_id])); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
                                    <button data-action="delete" data-parent="tr" data-url="<?php echo e(route('admin.member.request.delete',$member->id)); ?>"  class="btn btn-danger btn-xs" ><i class="fa fa-trash-o"></i></button>
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