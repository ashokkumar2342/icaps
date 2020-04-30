<?php $__env->startSection('content'); ?>
    <!-- page head start-->
    <div class="page-head">
        <h3>Member details</h3>
    </div>
    <!-- page head end-->

    <!--body wrapper start-->
    <div class="wrapper">
        <div class="row">
        <div class="col-md-12">
                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#details">Member Details</a></li>
                  <li><a data-toggle="tab" href="#subMember">Sub Members</a></li>
                  <li><a data-toggle="tab" href="#address">Address</a></li>
                </ul>

                <div class="tab-content panel">
                    <div id="details" class="tab-pane fade in active  panel-body">
                        <div class="col-md-12">
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">Membership Type </div>
                                        <div class="col-md-8"> : &nbsp;&nbsp; 
                                            <?php if($user->member->member_type == 0): ?>
                                                <?php echo e('Free'); ?>

                                            <?php elseif($user->member->member_type == 1): ?>
                                                <?php echo e('Red'); ?>

                                            <?php elseif($user->member->member_type == 2): ?>
                                                <?php echo e('Green'); ?>

                                            <?php elseif($user->member->member_type == 3): ?>
                                                <?php echo e('Blue'); ?>

                                            <?php endif; ?>
                                         </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">Registered Time </div>
                                        <div class="col-md-8"> : &nbsp;&nbsp; <?php echo e($user->member->created_at); ?> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"><br></div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">First Name </div>
                                        <div class="col-md-8"> : &nbsp;&nbsp; <?php echo e($user->first_name); ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">Last Name </div>
                                        <div class="col-md-8"> : &nbsp;&nbsp; <?php echo e($user->last_name); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"><br></div>
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">Mobile </div>
                                        <div class="col-md-8"> : &nbsp;&nbsp; <?php echo e($user->mobile); ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">Email </div>
                                        <div class="col-md-8"> : &nbsp;&nbsp; <?php echo e($user->email); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"><br></div>
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">Gender </div>
                                        <div class="col-md-8"> : &nbsp;&nbsp; <?php echo e(($user->gender==1)?'Male':($user->gender==2)?'Female':''); ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">Date Of Birth </div>
                                        <div class="col-md-8"> : &nbsp;&nbsp; <?php echo e(($user->dob)? date('d-m-Y',strtotime($user->dob)):''); ?></div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="clearfix"><br></div>
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">Membership Card </div>
                                        <div class="col-md-8"> : &nbsp;&nbsp; <?php echo e($user->membership_card_no); ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">Adhar Card </div>
                                        <div class="col-md-8"> : &nbsp;&nbsp; <?php echo e($user->aadhar_card_no); ?></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="clearfix"><br></div>
                        </div><!-- /* col -->
                    </div>
                    <div id="subMember" class="tab-pane fade ">
                        <section class="panel-body">
                            <div class="panel-heading clearfix">Sub Member List <a href="<?php echo e(route('admin.submember.form',$user->id)); ?>" class="btn btn-primary pull-right">Add More</a></div>
                            <table class="table responsive-data-table data-table">
                                <thead>
                                    <tr>
                                        <th>Sn &nbsp;&nbsp;</th>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Mobile</th>                                
                                        <th>Email</th>
                                        <th width="100px">Custom</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $user->member->subMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subMember): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(@$sn2 +=1); ?></td>
                                        <td><?php echo e($subMember->created_at->format('d-M-Y')); ?></td>
                                        <td><?php echo e($subMember->first_name.' '.$subMember->last_name); ?></td>
                                        <td><?php echo e($subMember->mobile); ?></td>
                                        <td><?php echo e($subMember->email); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('admin.submember.view',[$subMember->id])); ?>"  title="view" class="btn btn-primary btn-xs tooltips"><i class="fa fa-eye"></i></a>
                                            <a href="<?php echo e(route('admin.submember.edit',[$subMember->id])); ?>"  title="view" class="btn btn-info btn-xs tooltips"><i class="fa fa-pencil"></i></a>
                                            <a data-action="delete" title="Delete" data-parent="tr" data-url="<?php echo e(route('admin.submember.delete',$subMember->id)); ?>"  class="btn btn-danger btn-xs tooltips" ><i class="fa fa-trash-o"></i></a>

                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </section>
                    </div>
                    <div id="address" class="tab-pane fade">
                        <?php $__currentLoopData = $user->address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php 
                                @$sn +=1;
                             ?>
                            <div class="panel-heading"> <?php echo e(($user->address_id == $address->id)?'Default Address':'Address '.$sn); ?> </div>
                                <div class="panel-body">
                                    <div class="row">
                                    <?php if($address->address): ?>
                                    <div class="col-md-12">
                                       <?php echo e($address->address); ?>

                                    </div><!-- /* col -->
                                    <?php endif; ?>
                                    <?php if($address->street): ?>
                                    <div class="col-md-12">
                                        Street: <?php echo e($address->street); ?>

                                    </div><!-- /* col -->
                                    <?php endif; ?>
                                    <?php if($address->landmark): ?>
                                    <div class="col-md-12">
                                        Landmark <?php echo e($address->landmark); ?>

                                    </div><!-- /* col -->
                                    <?php endif; ?>
                                </div><!-- /* row -->
                            </div><!-- /* panel body -->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
           
        </div><!-- /* row -->
    </div><!-- /* wrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>