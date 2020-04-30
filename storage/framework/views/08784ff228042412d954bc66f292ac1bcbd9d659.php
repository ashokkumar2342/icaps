<?php $__env->startSection('content'); ?>
    <!-- page head start-->
    <div class="page-head">
        <h3>
            User Details
        </h3>
      
    </div>
    <!-- page head end-->

    <!--body wrapper start-->
    <div class="wrapper">
        <div class="row">
            <div class="col-md-8  col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <a class="btn btn-link  btn-sm pull-right" href="<?php echo e(route('admin.user.edit',[$user->id])); ?>">Edit</a>
                            </div> 
                            <div class="clearfix"><br><br></div>
                            <div class="col-md-12 clearfix">
                                <table class="table">
                                    <tr>
                                        <th>First Name :</th><td><?php echo e($user->first_name); ?></td>
                                        <th>Last Name :</th><td><?php echo e($user->last_name); ?></td></tr>
                                    <tr>
                                         <th>Date Of Birth</th><td><?php echo e(date('d-m-Y',strtotime($user->dob))); ?></td>
                                         <th>Gender</th><td><?php echo e(($user->gender == 1)?'Male':($user->gender == 0)?'Female':''); ?></td>
                                    </tr>
                                    <tr>
                                         <th>Mobile</th><td><?php echo e($user->mobile); ?></td>
                                         <th>Email</th><td><?php echo e($user->email); ?></td>
                                    </tr>
                                     
                                </table>
                                                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-warning">
                    <?php $__currentLoopData = $user->address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php 
                            @$sn +=1;
                         ?>
                        <div class="panel-heading"> <?php echo e(($user->address_id == $address->id)?'Default Address':'Address '.$sn); ?> </div>
                            <div class="panel-body">
                                <div class="row">
                                <div class="col-md-12">
                                    <?php echo e($address->street); ?>

                                </div><!-- /* col -->
                            </div><!-- /* row -->
                        </div><!-- /* panel body -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div><!-- /* col -->
            </div>
        </div>
    </div>
    <!--body wrapper end-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>