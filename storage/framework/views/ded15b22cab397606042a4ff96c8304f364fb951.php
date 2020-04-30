
<?php $__env->startSection('content'); ?>
  

    <!--body wrapper start-->
    <div class="wrapper">
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#unitCreate">Create Unit</button>

        <!-- Modal -->
        <div id="unitCreate" class="modal fade " role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <?php echo Form::open(['route'=>'admin.unit.post']); ?>

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            
                                <div class="form-group">
                                    <?php echo Form::label('name', 'Name', ['class'=>'control-label']); ?>

                                    <?php echo Form::text('name', '', ['class'=>'form-control']); ?>

                                    <div class="text-danger"><?php echo e($errors->first('name')); ?></div>
                                </div>
                                <div class="form-group">
                                    <?php echo Form::label('unit', 'Unit', ['class'=>'control-label']); ?>

                                    <?php echo Form::text('unit', '', ['class'=>'form-control']); ?>

                                    <div class="text-danger"><?php echo e($errors->first('unit')); ?></div>
                                </div>
                                <div class="form-group">
                                    <?php echo Form::label('weight', 'In Weight', ['class'=>'control-label']); ?>

                                    <?php echo Form::select('weight', ['0'=>'No','1'=>'Yes'],null, ['class'=>'form-control']); ?>

                                    <div class="text-danger"><?php echo e($errors->first('unit')); ?></div>
                                </div>
                                <div class="form-group">
                                    <?php echo Form::label('calculation', 'calculation', ['class'=>'control-label']); ?>

                                    <?php echo Form::text('calculation', '', ['class'=>'form-control']); ?>

                                    <div class="text-danger"><?php echo e($errors->first('calculation')); ?></div>
                                </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Create</button>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div><!-- /Model -->  
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
                            <th>Unit</th>
                            <th>In Weight</th>
                            <th>Calculation</th>
                            <th width="130px">Custom</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($unit->id); ?></td>
                            <td><?php echo e($unit->created_at->format('d-m-y')); ?></td>
                            <td><?php echo e($unit->name); ?></td>
                            <td><?php echo e($unit->alias); ?></td>
                            <td><?php echo ($unit->weight == 1)?'<b class="text-success">Yes</b>':'<b class="text-danger">No</b>'; ?></td>
                            <td><?php echo e($unit->calculation); ?></td>
                            <td>
                                <a href="<?php echo e(route('admin.unit.edit',['id'=>$unit->id])); ?>"  class="btn btn-primary btn-xs" ><i class="fa fa-pencil"></i></a>
                                <?php if(Auth::guard('admin')->user()->permission == 1): ?>
                                    <a data-action="delete" data-parent="tr" data-url="<?php echo e(route('admin.unit.delete',$unit->id)); ?>"  class="btn btn-danger btn-xs" ><i class="fa fa-trash-o"></i></a>
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
<?php if($errors->first()): ?>
<script type="text/javascript">
    $('#unitCreate').modal("show");
</script>
<?php endif; ?>
<?php if($editData): ?>
 <!-- Modal -->
        <div id="unitEdit" class="modal fade " role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <?php echo Form::open(['route'=>['admin.unit.update',$editData->id]]); ?>

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            
                                <div class="form-group">
                                    <?php echo Form::label('name', 'Name', ['class'=>'control-label']); ?>

                                    <?php echo Form::text('name', $editData->name, ['class'=>'form-control']); ?>

                                    <div class="text-danger"><?php echo e($errors->first('name')); ?></div>
                                </div>
                                <div class="form-group">
                                    <?php echo Form::label('unit', 'Unit', ['class'=>'control-label']); ?>

                                    <?php echo Form::text('unit', $editData->alias, ['class'=>'form-control']); ?>

                                    <div class="text-danger"><?php echo e($errors->first('unit')); ?></div>
                                </div>
                                <div class="form-group">
                                    <?php echo Form::label('weight', 'In Weight', ['class'=>'control-label']); ?>

                                    <?php echo Form::select('weight', ['0'=>'No','1'=>'yes'],$editData->weight, ['class'=>'form-control']); ?>

                                    <div class="text-danger"><?php echo e($errors->first('unit')); ?></div>
                                </div>
                                <div class="form-group">
                                    <?php echo Form::label('calculation', 'calculation', ['class'=>'control-label']); ?>

                                    <?php echo Form::text('calculation', $editData->calculation, ['class'=>'form-control']); ?>

                                    <div class="text-danger"><?php echo e($errors->first('calculation')); ?></div>
                                </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Update</button>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div><!-- /Model -->
<script type="text/javascript">
    $('#unitEdit').modal("show");
</script>
<?php endif; ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>