<?php $__env->startPush('links'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('js/bootstrap-datepicker/css/datepicker.css')); ?>"/>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- page head start-->
    <div class="page-head">
        <h3>Add Sub Member</h3>       
    </div>
    <!-- page head end-->

    <!--body wrapper start-->
    <div class="wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel">
                    <?php echo Form::open(['route'=>['admin.submember.add',$user->id]]); ?>

                        <input type="hidden" name="referer" value="<?php echo e(URL::previous()); ?>">
                        <input type="hidden" name="member_id" value="<?php echo e($user->member->id); ?>">
                        
                        <div class="col-md-8 col-md-offset-2">
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
                                    <?php echo e(Form::bsText('email','Email',['class'=>'control-label'],'',['class'=>'form-control'])); ?>

                                </div>
                                <div class="col-md-6">
                                    <?php echo e(Form::bsText('mobile','Mobile',['class'=>'control-label'],'',['class'=>'form-control'])); ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <?php echo e(Form::bsText('aadhar_card_no','Aadhar Card No',['class'=>'control-label'],'',['class'=>'form-control'])); ?>

                                </div>
                                <div class="col-md-6">
                                    <?php echo e(Form::label('dob','Date Of Birth',['class'=>'control-label'])); ?>


                                    <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="<?php echo e(date('d-m-Y')); ?>"  class="input-append date dpYears">
                                        <?php echo Form::text('date_of_birth',  '', ['size'=>'16', 'class'=>'form-control']); ?>

                                        <span class="input-group-btn add-on">
                                            <button class="btn btn-primary" style="height: 34px; padding-top: 9px" type="button"><i class="fa fa-calendar"></i></button>
                                        </span>
                                    </div>
                                    <p class="text-danger"><?php echo e($errors->first('date_of_birth')); ?></p>
                                </div>
                            </div>
                            <div class="row">                                
                                <div class="col-md-6">
                                    <?php echo Form::label('status', 'Is Active', ['class'=>'control-label']); ?>

                                    <?php echo Form::select('status', ['0' => 'no', '1' => 'yes'], null, ['class' => 'form-control']); ?>

                                    <?php if($errors->has('status')): ?><p class="text-danger"><?php echo e($errors->first('status')); ?></p> <?php endif; ?>
                                </div>    
                                <div class="col-md-6">
                                    <div class="form-group"><br>
                                        <div class="form-control">
                                             <?php echo e(Form::label('gender','Gender',['class'=>'control-label'])); ?>

                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <label style="cursor: pointer"><?php echo e(Form::radio('gender', '1')); ?> Male&nbsp;&nbsp;&nbsp;
                                            <label style="cursor: pointer;"><?php echo e(Form::radio('gender', '2')); ?> Female
                                        </div>
                                        <p class="text-danger"><?php echo e($errors->first('gender')); ?></p>
                                    </div>
                                </div>    
                            </div>   
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary pull-right">Add Sub Member</button>
                                </div>
                            </div>               
                        </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
    <!--body wrapper end-->

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('js/bootstrap-datepicker/js/bootstrap-datepicker.js')); ?>"></script>
<!--picker initialization-->
<script src="<?php echo e(asset('js/picker-init.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>