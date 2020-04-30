<?php $__env->startPush('links'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('js/bootstrap-datepicker/css/datepicker.css')); ?>"/>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- page head start-->
    <div class="page-head">
        <h3>
            User Edit
        </h3>
        
    </div>
    <!-- page head end-->

    <!--body wrapper start-->
    <div class="wrapper">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <?php echo e(Form::open(['route'=>['admin.user.update', $user->id]])); ?>                
                <div class="row clearfix">
                    <div class="col-md-6">
                        <?php echo e(Form::bsText('first_name','First Name',['class'=>'control-label'],$user->first_name,['class'=>'form-control'])); ?>

                    </div>
                    <div class="col-md-6">
                        <?php echo e(Form::bsText('last_name','Last Name',['class'=>'control-label'],$user->last_name,['class'=>'form-control'])); ?>

                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <br>
                            <div class="form-control">
                                 <?php echo e(Form::label('gender','Gender',['class'=>'control-label'])); ?>

                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <label style="cursor: pointer"><input type="radio" name="gender" value="1" <?php echo e(@($user->gender == 1)?'checked':''); ?> > Male </label>&nbsp;&nbsp;&nbsp;
                                <label style="cursor: pointer;"><input type="radio" name="gender" value="2" <?php echo e(@($user->gender == 2)?'checked':''); ?>> Female</label>
                                <p class="text-danger"><?php echo e($errors->first('gender')); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo e(Form::label('dob','Date Of Birth',['class'=>'control-label'])); ?>

                            <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="<?php echo e(($user->dob)?date('d-m-Y', strtotime($user->dob)):date('d-m-Y')); ?>"  class="input-append date dpYears">
                                <input type="text" value="<?php echo e(($user->dob)?date('d-m-Y', strtotime($user->dob)):''); ?>"  name="date_of_birth"  size="16" class="form-control">
                                <span class="input-group-btn add-on" style="margin-right: 30px; ">
                                    <button style="height: 34px" class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                                </span>
                                <p class="text-danger"><?php echo e($errors->first('dob')); ?></p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-12">
                        <?php echo e(Form::bsText('mobile','Mobile',['class'=>'control-label'], $user->mobile ,['class'=>'form-control'])); ?>

                    </div>
                </div>
                <div class="row clearfix">
                     <div class="col-md-12">
                        <?php echo e(Form::bsEmail('email','Email',['class'=>'control-label'], $user->email ,['class'=>'form-control'])); ?>

                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php echo e(Form::label('address','Address',['class'=>'control-label'])); ?>

                            <?php echo e(Form::text('address',@$user->default_address->address,['class'=>'form-control'])); ?>

                        </div>
                        <p class="text-danger"><?php echo e($errors->first('address')); ?></p>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php echo e(Form::label('street_address','Street Address',['class'=>'control-label'])); ?>

                            <?php echo e(Form::text('street_address',@$user->default_address->street,['class'=>'form-control'])); ?>

                        </div>
                        <p class="text-danger"><?php echo e($errors->first('street_address')); ?></p>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php echo e(Form::label('landmark','Landmark',['class'=>'control-label'])); ?>

                            <?php echo e(Form::text('landmark',@$user->default_address->landmark,['class'=>'form-control'])); ?>

                        </div>
                        <p class="text-danger"><?php echo e($errors->first('landmark')); ?></p>
                    </div>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-success">Update</button>
                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
        
    </div>
    <!--body wrapper end-->

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('js/bootstrap-datepicker/js/bootstrap-datepicker.js')); ?>"></script>
<!--picker initialization-->
<script src="<?php echo e(asset('js/picker-init.js')); ?>"></script>
 
<script src="<?php echo e(asset('js/jquery.validate.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/form-validation-init.js')); ?>" type="text/javascript"></script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>