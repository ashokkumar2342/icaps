<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.png')); ?>" type="image/png">
    <title>I-caps :: seller :: login</title>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <!-- Base Styles -->
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style-responsive.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(mix('css/seller.css')); ?>" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo e(asset('js/html5shiv.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/respond.min.js')); ?>"></script>
    <![endif]-->


</head>

    <body class="login-body">

        <div class="login-logo">
            <img src="<?php echo e(asset('seller_asset/img/login-logo.png')); ?>" alt=""/>
        </div>
        
        <h2 class="form-heading">seller login</h2>
        <div class="container log-row">
            <?php echo Form::open(['route'=>'seller.login.post','class'=>'form-signin']); ?>

                <div class="login-wrap">
                    <?php echo Form::hidden('referrer', Request::get('referrer') , []); ?>

                    <?php echo form::text('username','',['class'=>'form-control','placeholder'=>'Email or Phone', 'autofocus']); ?>

                    <div style="margin-top: -15px" class="text-danger"><?php echo $errors->first('username'); ?></div><br>
                    <?php echo form::password('password',['class'=>'form-control','placeholder'=>'Password', 'autofocus']); ?>

                    <div style="margin-top: -15px" class="text-danger"><?php echo e($errors->first('password')); ?></div><br>
                    <label class="checkbox-custom check-success">
                        <input type="checkbox" name="remember" value="remember-me" id="checkbox1"> <label for="checkbox1">Remember me</label>
                        <a class="pull-right" data-toggle="modal" href="#forgotPass"> Forgot Password?</a>
                    </label>
                    <button class="btn btn-lg btn-success btn-block" type="submit">LOGIN</button>
                </div>
            <?php echo Form::close(); ?>

      </div>
      
<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="forgotPass" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo Form::open(['route'=>'seller.forgetPassword.post','role'=>'form']); ?>

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot Password ?</h4>
            </div>
            <div class="modal-body">
                <p>Enter your e-mail address below to reset your password.</p>
                <?php echo Form::email('email','',['class'=>'form-control placeholder-no-fix', 'placeholder'=>'Enter your registerd email id', 'autocomplete'=>'off']); ?>


            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button type="submit" class="btn btn-success" type="button">Submit</button>
            </div>
            <?php echo Form::close(); ?>

        </div>
</div>
<!-- modal -->

<!--jquery-1.10.2.min-->
<script src="<?php echo e(mix('js/seller.js')); ?>"></script>
<?php echo $__env->make('seller.include.tostr', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>

</html>
