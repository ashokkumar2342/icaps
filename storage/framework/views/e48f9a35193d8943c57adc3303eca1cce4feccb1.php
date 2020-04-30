<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.png')); ?>" type="image/png">

    <title><?php echo e(env('app.name','I-CAPS')); ?> :: Seller Panel</title>

    
       <?php echo $__env->yieldPushContent('links'); ?>
    <!--common style-->
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style-responsive.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/layout-theme-two.css')); ?>" rel="stylesheet">
    <!--switchery-->
    <link href="<?php echo e(asset('js/switchery/switchery.min.css')); ?>" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?php echo e(mix('css/seller.css')); ?>" rel="stylesheet" type="text/css" />
     <!--Data Table-->
    <link href="<?php echo e(asset('js/data-table/css/jquery.dataTables.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('js/data-table/css/dataTables.tableTools.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('js/data-table/css/dataTables.colVis.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('js/data-table/css/dataTables.responsive.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('js/data-table/css/dataTables.scroller.css')); ?>" rel="stylesheet">
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <?php echo $__env->yieldPushContent('links'); ?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo e(asset('js/html5shiv.js')); ?>"></script>
    <script src="<?php echo e(asset('js/respond.min.js')); ?>"></script>
    <![endif]-->
    <style type="text/css">
    fieldset {
    border: 1px groove #efefef !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  3px 3px 6px 2px #000;
            box-shadow:  3px 3px 6px 2px #aaa;
    }

    legend {
        font-size: 1.2em !important;
        font-weight: bold !important;
        text-align: left !important;
        border:none;
        padding: 0px 5px;
        width:auto;

    }
</style>
</head>

<body class="sticky-header ">
 <section>
   <?php echo $__env->make('seller.include.left-sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- body content start-->
    <div class="body-content" style="min-height: 1000px;">
        <?php echo $__env->make('seller.include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <!-- body content end-->
</section>
<script src="<?php echo e(mix('js/seller.js')); ?>"></script>

<!--Nice Scroll-->
<script src="<?php echo e(asset('js/jquery.nicescroll.js')); ?>" type="text/javascript"></script>

<!--right slidebar-->
<script src="<?php echo e(asset('js/slidebars.min.js')); ?>"></script>

<!--switchery-->
<script src="<?php echo e(asset('js/switchery/switchery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/switchery/switchery-init.js')); ?>"></script>
<!--Data Table-->
<script src="<?php echo e(asset('js/data-table/js/jquery.dataTables.min.js')); ?>"></script> 
<script src="<?php echo e(asset('js/data-table/js/bootstrap-dataTable.js')); ?>"></script>
<script src="<?php echo e(asset('js/data-table/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/data-table/js/dataTables.scroller.min.js')); ?>"></script>
<!--data table init-->
<script src="<?php echo e(asset('js/data-table-init.js')); ?>"></script>
<?php echo $__env->yieldPushContent('scripts'); ?>
<script src="<?php echo e(asset('js/scripts.js')); ?>"></script>
<?php echo $__env->make('components.alert.tostr', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>
