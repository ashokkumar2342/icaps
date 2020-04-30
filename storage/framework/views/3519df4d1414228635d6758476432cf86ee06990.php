
<?php $__env->startSection('content'); ?>


    <!--body wrapper start-->
    <div class="wrapper">
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-sm" data-toggle="collapse" data-target="#createColor">Create color</button>
        <div id="createColor" class="collapse <?php echo e(($errors->first())?'in':''); ?> row">
            <div class="panel panel-default col-md-6 col-md-offset-3 ">
                <div class="panel-body">
                <?php echo Form::open(['route'=>'admin.color.post']); ?>

                     <div class="form-group">
                        <?php echo Form::label('name', 'Name', ['class'=>'control-label']); ?>

                        <?php echo Form::text('name', '', ['class'=>'form-control']); ?>

                        <div class="text-danger"><?php echo e($errors->first('name')); ?></div>
                    </div>
                    <div class="form-group">
                        <?php echo Form::label('code', 'Code', ['class'=>'control-label']); ?>

                        <div class="input-group colorpicker-default colorpicker-component">
                            <input type="text"  value="<?php echo e(old('code')); ?>" name="color" class="form-control">
                            <span class="input-group-addon"><i></i></span>
                        </div>
                        <div class="text-danger"><?php echo e($errors->first('code')); ?></div>
                    </div>
                    <button type="submit" class="btn btn-primary" >Create</button>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
        <!-- Modal -->
      
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"></h3>
            </div>
            <div class="panel-body">
                 <table class="table responsive-data-table data-table">
                    <thead>
                        <tr>
                            <th>Id &nbsp;&nbsp;</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Color</th>
                            <th width="130px">Custom</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($color->id); ?></td>
                            <td><?php echo e($color->created_at->format('d-m-y')); ?></td>
                            <td><?php echo e($color->name); ?></td>
                            <td><?php echo e($color->code); ?></td>
                            <td><button style="background: <?php echo e($color->code); ?>;padding: 10px; border: none"></button></td>
                            <td>
                                <a href="<?php echo e(route('admin.color.edit',['id'=>$color->id])); ?>"  class="btn btn-primary btn-xs" ><i class="fa fa-pencil"></i></a>
                                <?php if(Auth::guard('admin')->user()->permission == 1): ?>
                                    <a data-action="delete" data-parent="tr" data-url="<?php echo e(route('admin.color.delete',$color->id)); ?>"  class="btn btn-danger btn-xs" ><i class="fa fa-trash-o"></i></a>
                                <?php endif; ?> 
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>      
    </div>
    <!--body wrapper end-->
    
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')); ?>"></script>
    <script type="text/javascript">
        $('.colorpicker-default').colorpicker({
            color: '#AA3399',
            format: 'hex'
        });
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('links'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('js/bootstrap-colorpicker/css/colorpicker.css')); ?>"/>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>