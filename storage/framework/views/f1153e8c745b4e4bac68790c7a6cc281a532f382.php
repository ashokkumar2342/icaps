
<?php $__env->startSection('content'); ?>

    <body class="cnt-home">
        <!-- ============================================== HEADER ============================================== -->


<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="<?php echo e(route('front.home')); ?>">Home</a></li>
                <li class='active'>Login</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page col-md-6 col-sm-6 col-md-offset-3">
            <div class="row">
                <!-- Sign-in -->            
                

                <!-- create a new account -->
                <div class="col-md-12 create-new-account">

                    <h4 class="checkout-subtitle">Create a new account</h4>
                    <?php echo form::open(['route'=>'user.register.post','class'=>'register-form outer-top-xs','role'=>'form']); ?>

                        <?php echo e(Form::bsText('first_name','First Name  <span>*</span>',['class'=>'info-title'],'',['class'=>'form-control unicase-form-control text-input'])); ?>

                        <?php echo e(Form::bsText('last_name','Last Name  <span>*</span>',['class'=>'info-title'],'',['class'=>'form-control unicase-form-control text-input'])); ?>

                        <?php echo e(Form::bsText('mobile','Phone Number  <span>*</span>',['class'=>'info-title'],'',['class'=>'form-control unicase-form-control text-input'])); ?>

                        <?php echo e(Form::bsEmail('email','Email Address ',['class'=>'info-title'],'',['class'=>'form-control unicase-form-control text-input'])); ?>

                        <?php echo e(Form::bsPassword('password','Password <span>*</span>',['class'=>'info-title'],['class'=>'form-control unicase-form-control text-input'])); ?>

                         <?php echo e(Form::bsPassword('password_confirmation','Confirm Password <span>*</span>',['class'=>'info-title'],['class'=>'form-control unicase-form-control text-input'])); ?>

                          <p class="pull-right">Already have an account ? <a href="<?php echo e(route('user.login.form')); ?>">Click here</a></p>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
                    <?php echo form::close(); ?>

                </div>  
                <!-- create a new account -->          
             </div><!-- /.row -->
        </div><!-- /.sigin-in-->
    </div><!-- /.container -->
    <div class="clearfix"><br><br></div>
</div><!-- /.body-content -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layout.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>