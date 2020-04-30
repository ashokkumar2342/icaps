<?php $__env->startPush('links'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('js/bootstrap-datepicker/css/datepicker.css')); ?>"/>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- page head start-->
    <div class="page-head">
        <h3>Member Registration</h3>
        
    </div>
    <!-- page head end-->

    <!--body wrapper start-->
    <div class="wrapper">
        <div class="row">
            <div class="col-lg-8  col-md-offset-2">                  
                <?php echo e(Form::open(['route'=>['admin.member.new.post']])); ?>

                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="col-lg-3">
                                        <div class="radio-custom radio-primary">
                                            <input type="radio"  <?php echo (old('member_type')==0) ?'checked'  : ''; ?> value="0"   name="member_type" id="default">
                                            <label for="default">Free</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="radio-custom radio-danger">
                                            <input type="radio" value="1"   name="member_type" <?php echo (old('member_type')==1) ?'checked'  : ''; ?> id="danger">
                                            <label for="danger">Red</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="radio-custom radio-success">
                                            <input type="radio" value="2"   name="member_type" <?php echo (old('member_type')==2) ?'checked'  : ''; ?> id="success">
                                            <label for="success">Green</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                       <div class="radio-custom radio-info">
                                            <input type="radio" value="3"   name="member_type" <?php echo (old('member_type')==3) ?'checked'  : ''; ?> id="infor">
                                            <label for="infor">Blue</label>
                                        </div>
                                    </div>
                                    <p class="text-danger"><?php echo e($errors->first('member_type')); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>                   
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <?php echo e(Form::bsText('first_name','First Name',['class'=>'control-label'],'',['class'=>'form-control'])); ?>

                        </div>                    
                        <div class="col-md-6">
                            <?php echo e(Form::bsText('last_name','Last Name',['class'=>'control-label'],'',['class'=>'form-control'])); ?>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <br>
                                <div class="form-control">
                                     <?php echo e(Form::label('gender','Gender',['class'=>'control-label'])); ?>

                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <label style="cursor: pointer"><?php echo e(Form::radio('gender', '1')); ?> Male&nbsp;&nbsp;&nbsp;
                                    <label style="cursor: pointer;"><?php echo e(Form::radio('gender', '2')); ?> Female
                                </div>
                                <p class="text-danger"><?php echo e($errors->first('gender')); ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo e(Form::label('dob','Date Of Birth',['class'=>'control-label'])); ?>


                                <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="<?php echo e(date('d-m-Y')); ?>"  class="input-append date dpYears">
                                     <?php echo Form::text('date_of_birth',  '' , ['size'=>'16', 'class'=>'form-control']); ?>

                                    <span class="input-group-btn add-on" style="padding:5">
                                        <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <?php echo e(Form::bsText('membership_card_no','Membership Card ',['class'=>'control-label'],'',['class'=>'form-control'])); ?>

                        </div>
                        
                        <div class="col-md-6">
                            <?php echo e(Form::bsText('aadhar_card_no','Aadhar card',['class'=>'control-label'],'',['class'=>'form-control'])); ?>

                        </div>
                    </div>
                    <div class="row">
                         <div class="col-md-6">
                            <?php echo e(Form::bsText('mobile','Mobile',['class'=>'control-label'],'',['class'=>'form-control'])); ?>

                        </div>
                        <div class="col-md-6">
                            <?php echo e(Form::bsText('referred_by','Referred By',['class'=>'control-label'],'',['class'=>'form-control'])); ?>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo e(Form::bsText('email','Email',['class'=>'control-label'],'',['class'=>'form-control'])); ?>

                        </div>
                    </div>
                    
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo e(Form::label('address','Address',['class'=>'control-label'])); ?>

                                <?php echo e(Form::text('address','',['class'=>'form-control'])); ?>

                            </div>
                            <p class="text-danger"><?php echo e($errors->first('address')); ?></p>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo e(Form::label('street_address','Street Address',['class'=>'control-label'])); ?>

                                <?php echo e(Form::text('street_address','',['class'=>'form-control'])); ?>

                            </div>
                            <p class="text-danger"><?php echo e($errors->first('street_address')); ?></p>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo e(Form::label('landmark','Landmark',['class'=>'control-label'])); ?>

                                <?php echo e(Form::text('landmark','',['class'=>'form-control'])); ?>

                            </div>
                            <p class="text-danger"><?php echo e($errors->first('landmark')); ?></p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-success">Create Account</button>
                        </div>
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