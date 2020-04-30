<div class="form-group">
    <?php echo Form::labelHtml($name, $label, $labelAttr); ?>

    <?php echo e(Form::password($name, array_merge(['class' => 'form-control'], $inputAttr))); ?>

    <div class="text-danger"><?php echo e($errors->first($name)); ?></div>
</div>