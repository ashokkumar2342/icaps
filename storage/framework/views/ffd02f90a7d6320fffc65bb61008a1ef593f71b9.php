<?php $__env->startSection('content'); ?>
<div class="page-head">
    <h3>
        Dashboard
    </h3>
</div>
<!-- page head end-->

<!--body wrapper start-->
<div class="wrapper">
    <!--state overview start-->
    <div class="row state-overview">
        <div class="col-lg-3 col-sm-6">
            <section class="panel purple">
                <div class="symbol">
                    <i class="fa fa-send"></i>
                </div>
                <div class="value white">
                    <h1 class="timer" data-from="0" data-to="<?php echo e(App\MemberRequest::where('status','0')->count()); ?>"
                        data-speed="1000">
                        <!--320-->
                    </h1>
                    <p>Member Request</p>
                </div>
            </section>
        </div>
        <div class="col-lg-3 col-sm-6">
            <section class="panel ">
                <div class="symbol purple-color">
                    <i class="fa fa-tags"></i>
                </div>
                <div class="value gray">
                    <h1 class="purple-color timer" data-from="0" data-to="<?php echo e(App\User::has('member')->count()); ?>"
                        data-speed="1000">
                        <!--123-->
                    </h1>
                    <p>Active Member</p>
                </div>
            </section>
        </div>
        <div class="col-lg-3 col-sm-6">
            <section class="panel green">
                <div class="symbol ">
                    <i class="fa fa-user"></i>
                </div>
                <div class="value white">
                    <h1 class="timer" data-from="0" data-to="<?php echo e(App\User::doesntHave('member')->where('status','1')->count()); ?>"
                        data-speed="1000">
                    </h1>
                    <p>Active User</p>
                </div>
            </section>
        </div>
        <div class="col-lg-3 col-sm-6">
            <section class="panel">
                <div class="symbol green-color">
                    <i class="fa fa-user"></i>
                </div>
                <div class="value gray">
                    <h1 class="green-color timer" data-from="0" data-to="<?php echo e(App\User::where('status','0')->count()); ?>"
                        data-speed="3000">
                    </h1>
                    <p>Inactive User</p>
                </div>
            </section>
        </div>
    </div>
    <hr>
    <h3>Web Request</h3>
    <hr>
     <!--state alternative view start-->
            <div class="row state-overview state-alt">
                <?php if($count = App\Construction::where(['status'=>'0'])->count()): ?>
                <div class="col-lg-3 col-sm-6">
                    <section class="panel y-border">
                        <div class="symbol ">
                            <span class="bg-danger"><i class="fa"><?php echo e($count); ?></i></span>
                        </div>
                        <div class="value">
                            <h1>
                                Construction
                            </h1>
                            <p>Consultancy</p>
                        </div>
                    </section>
                </div>
                <?php endif; ?>
                <?php if($count = App\Educational::where(['status'=>'0'])->count()): ?>
                <div class="col-lg-3 col-sm-6">
                    <section class="panel y-border">
                        <div class="symbol ">
                            <span class="bg-danger"><i class="fa"><?php echo e($count); ?></i></span>
                        </div>
                        <div class="value">
                            <h1>
                                Educational
                            </h1>
                            <p>Consultancy</p>
                        </div>
                    </section>
                </div>
                <?php endif; ?>
                <?php if($count = App\Passport::where(['status'=>'0'])->count()): ?>
                <div class="col-lg-3 col-sm-6">
                    <section class="panel y-border">
                        <div class="symbol ">
                            <span class="bg-danger"><i class="fa"><?php echo e($count); ?></i></span>
                        </div>
                        <div class="value">
                            <h1>
                                Passport
                            </h1>
                            <p>Assistance</p>
                        </div>
                    </section>
                </div>
                <?php endif; ?>
                <?php if($count = App\Pan::where(['status'=>'0'])->count()): ?>
                <div class="col-lg-3 col-sm-6">
                    <section class="panel y-border">
                        <div class="symbol ">
                            <span class="bg-danger"><i class="fa "><?php echo e($count); ?></i></span>
                        </div>
                        <div class="value">
                            <h1>
                                Pan Card
                            </h1>
                            <p>Assistance</p>
                        </div>
                    </section>
                </div>
                <?php endif; ?>
                <?php if($count = App\Training::where(['status'=>'0'])->count()): ?>
                <div class="col-lg-3 col-sm-6">
                    <section class="panel y-border">
                        <div class="symbol ">
                            <span class="bg-danger"><i class="fa "><?php echo e($count); ?></i></span>
                        </div>
                        <div class="value">
                            <h1>
                                Training
                            </h1>
                            <p>Assistance</p>
                        </div>
                    </section>
                </div>
                <?php endif; ?>
                <?php if($count = App\Placement::where(['status'=>'0'])->count()): ?>
                <div class="col-lg-3 col-sm-6">
                    <section class="panel y-border">
                        <div class="symbol ">
                            <span class="bg-danger"><i class="fa "><?php echo e($count); ?></i></span>
                        </div>
                        <div class="value">
                            <h1>
                                Placement
                            </h1>
                            <p>Assistance</p>
                        </div>
                    </section>
                </div>
                <?php endif; ?>
                <?php if($count = App\Medicine::where(['status'=>'0'])->count()): ?>
                <div class="col-lg-3 col-sm-6">
                    <section class="panel y-border">
                        <div class="symbol ">
                            <span class="bg-danger"><i class="fa "><?php echo e($count); ?></i></span>
                        </div>
                        <div class="value">
                            <h1>
                                Medicine
                            </h1>
                            <p>Product</p>
                        </div>
                    </section>
                </div>
                <?php endif; ?>
               
                <?php if($count = App\Model\Catalog\Order::where(['status'=>'1'])->count()): ?>
                <div class="col-lg-3 col-sm-6">
                    <section class="panel y-border">
                        <div class="symbol ">
                            <span class="bg-danger"><i class="fa "><?php echo e($count); ?></i></span>
                        </div>
                        <div class="value">
                            <h1>
                                Order
                            </h1>
                            <p>Product</p>
                        </div>
                    </section>
                </div>
                <?php endif; ?>
                <?php if($count = App\TaxiBooking::where(['status'=>'0'])->count()): ?>
                <div class="col-lg-3 col-sm-6">
                    <section class="panel y-border">
                        <div class="symbol ">
                            <span class="bg-danger"><i class="fa "><?php echo e($count); ?></i></span>
                        </div>
                        <div class="value">
                            <h1>
                                Taxi Services
                            </h1>
                            <p>Services</p>
                        </div>
                    </section>
                </div>
                <?php endif; ?>
                <?php if($count = App\ItReturn::where(['status'=>'0'])->count()): ?>
                <div class="col-lg-3 col-sm-6">
                    <section class="panel y-border">
                        <div class="symbol ">
                            <span class="bg-danger"><i class="fa "><?php echo e($count); ?></i></span>
                        </div>
                        <div class="value">
                            <h1>
                                It Return
                            </h1>
                            <p>Seviceses</p>
                        </div>
                    </section>
                </div>
                <?php endif; ?>
                <?php if($count = App\Recharge::where(['status'=>'0'])->count()): ?>
                <div class="col-lg-3 col-sm-6">
                    <section class="panel y-border">
                        <div class="symbol ">
                            <span class="bg-danger"><i class="fa "><?php echo e($count); ?></i></span>
                        </div>
                        <div class="value">
                            <h1>
                                Recharge
                            </h1>
                            <p>Seviceses</p>
                        </div>
                    </section>
                </div>
                <?php endif; ?>
                <?php if($count = App\SalesTaxRegistration::where(['status'=>'0'])->count()): ?>
                <div class="col-lg-3 col-sm-6">
                    <section class="panel y-border">
                        <div class="symbol ">
                            <span class="bg-danger"><i class="fa "><?php echo e($count); ?></i></span>
                        </div>
                        <div class="value">
                            <h1>
                                Sales Tax Registration
                            </h1>
                            <p>Seviceses</p>
                        </div>
                    </section>
                </div>
                <?php endif; ?>
                <?php if($count = App\ServiceTaxRegistration::where(['status'=>'0'])->count()): ?>
                <div class="col-lg-3 col-sm-6">
                    <section class="panel y-border">
                        <div class="symbol ">
                            <span class="bg-danger"><i class="fa "><?php echo e($count); ?></i></span>
                        </div>
                        <div class="value">
                            <h1>
                                Service Tax Registration
                            </h1>
                            <p>Seviceses</p>
                        </div>
                    </section>
                </div>
                <?php endif; ?>
                <?php if($count = App\Dth::where(['status'=>'0'])->count()): ?>
                <div class="col-lg-3 col-sm-6">
                    <section class="panel y-border">
                        <div class="symbol ">
                            <span class="bg-danger"><i class="fa "><?php echo e($count); ?></i></span>
                        </div>
                        <div class="value">
                            <h1>
                                Dth Recharge
                            </h1>
                            <p>Seviceses</p>
                        </div>
                    </section>
                </div>
                <?php endif; ?>
                <?php if($count = App\UtilityBillPayment::where(['status'=>'0'])->count()): ?>
                <div class="col-lg-3 col-sm-6">
                    <section class="panel y-border">
                        <div class="symbol ">
                            <span class="bg-danger"><i class="fa "><?php echo e($count); ?></i></span>
                        </div>
                        <div class="value">
                            <h1>
                                Utility Bill Payment
                            </h1>
                            <p>Seviceses</p>
                        </div>
                    </section>
                </div>
                <?php endif; ?>
            </div>
            <!--state alternative view end-->
</div>
<!--body wrapper end-->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('js/jquery-countTo/jquery.countTo.js')); ?>"  type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        //countTo
        $('.timer').countTo();    
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>