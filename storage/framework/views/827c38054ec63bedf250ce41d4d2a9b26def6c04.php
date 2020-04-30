
<?php $__env->startSection('content'); ?>
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
      
        <div class="sign-in-page col-md-4 col-sm-4 col-md-offset-4">
            <div class="row">
                <!-- Sign-in -->            
                <div class="col-md-12 sign-in">
                
                    <h4 class="">Sign in <span style="font-size: 0.7em" class="pull-right">Don't have an account ?<a href="<?php echo e(route('user.register.form')); ?>">Click Here</a></span></h4>
                    
                    <?php echo Form::open(['route'=>'user.login.post','class'=>'register-form outer-top-xs','role'=>'form']); ?>

                        <div class="form-group">
                            <?php echo Form::hidden('referrer', Request::get('referrer') , []); ?>

                            <?php echo form::text('username','',['class'=>'form-control unicase-form-control text-input','placeholder'=>'Mobile / Customer Id / Email id', 'autofocus']); ?>

                            <div class="text-danger"><?php echo $errors->first('username'); ?></div>
                        </div>
                        <div class="form-group">
                     
                            <?php echo form::password('password',['class'=>'form-control unicase-form-control text-input','placeholder'=>'Password', 'autofocus']); ?>

                            <div class="text-danger"><?php echo e($errors->first('password')); ?></div>
                        </div>
                        <div class="radio outer-xs">
                            <label>
                                <input type="checkbox" name="remember" id="optionsRadios2" value="option2">Remember me!
                            </label>
                            <a href="<?php echo e(route('password.reset.form')); ?>" data-toggle="modal" class="forgot-password pull-right">Forgot your Password ?</a>  
                            
                        </div>
                        
                            <button class="btn-upper btn-block btn btn-primary checkout-page-button" type="submit">LOGIN</button>

                    <?php echo Form::close(); ?> 
                    
                    
                </div>
                <!-- Sign-in -->
    
             </div><!-- /.row -->
        </div><!-- /.sigin-in-page-->

    </div><!-- /.container -->
    <div class="clearfix"><br><br></div>
</div><!-- /.body-content -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>