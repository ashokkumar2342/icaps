<?php $__env->startComponent('mail::message'); ?>
# Welcome <?php echo e($user->name); ?>


Email verification mail
<?php $__env->startComponent('mail::panel'); ?>
<?php echo e($user->email); ?>

<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('mail::button', ['url' => route('user.email.verification.token.get',[$user->token])]); ?>
Verify Account
<?php echo $__env->renderComponent(); ?>


Thanks,<br>
<?php echo e(config('app.name')); ?>


<br>
<?php echo $__env->renderComponent(); ?>
