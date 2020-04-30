<?php $__env->startPush('links'); ?>
<style type="text/css"> #output{width: 100%; } .imageThumb {max-height: 75px; border: 2px solid; padding: 1px; cursor: pointer; } .pip {display: inline-block; margin: 10px 10px 0 0; } .remove {display: block; background: #444; border: 1px solid black; color: white; text-align: center; cursor: pointer; } .remove:hover {background: white; color: black; } .categoryTree{position: absolute; background: #fff; border: 1px solid #aaa; max-height: 100px; overflow-y: auto; margin-top: -10px; width: 86%; display: none; z-index: 100; } .catText{background: #00f; padding: 3px; margin-right: 5px; } </style> <?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>  
    <!--body wrapper start-->
    <div class="wrapper" style="min-height: 1000px">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit Product</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <?php echo Form::open(['route'=>['seller.product.update',$product->ukey],'method'=>'put','class'=>'validate cmxform','files'=>true]); ?>

                          
                          <div class="form-group clearfix">
                                <div class="col-md-3"><?php echo Form::label('name', 'Name', ['class'=>'control-label']); ?></div>
                                <div class="col-md-9">
                                    <?php echo Form::text('name', $product->name, ['class'=>'form-control','required']); ?>

                                    <?php if($errors->has('name')): ?><p class="text-danger"><?php echo e($errors->first('name')); ?></p> <?php endif; ?>
                                </div>
                            </div> 
                            <div class="form-group clearfix">
                                    <div class="col-md-3">In Weight</div>
                                    <div class="col-md-9">
                                        <?php echo Form::select('weight', ['0'=>'No','1'=>'Yes'], $product->weight, ['class' => 'form-control']); ?>

                                        <?php if($errors->has('weight')): ?><p class="text-danger"><?php echo e($errors->first('weight')); ?></p> <?php endif; ?>
                                    </div>
                            </div>
                            <div class="form-group clearfix">
                                <div class="col-md-3">Image</div>
                                <div class="col-md-9">
                                    <input type="file" accept="image/gif, image/jpeg, image/png" onchange="loadFile(event)" name="image" class="form-control">
                                    <?php if($errors->has('image')): ?><p class="text-danger"><?php echo e($errors->first('image')); ?></p> <?php endif; ?>
                                </div>                                
                            </div>
                            <div class="form-group clearfix">
                                <div class="col-md-3">Is Active</div>
                                <div class="col-md-9">
                                    <?php echo Form::select('status', ['0' => 'no', '1' => 'yes'], $product->status, ['class' => 'form-control']); ?>

                                    <?php if($errors->has('status')): ?><p class="text-danger"><?php echo e($errors->first('status')); ?></p> <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <div class="col-md-3"><?php echo Form::label('keywords', 'Keywords', ['class'=>'control-label']); ?></div>
                                <div class="col-md-9">
                                    <?php echo Form::textarea('keywords',$product->keywords, ['class'=>'form-control','style'=>'resize:none','rows'=>'5','placeholder'=>'Product item keywords']); ?>

                                    <p class="text-danger"><?php echo e($errors->first('keywords')); ?></p>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                               <div class="col-md-3"> <?php echo Form::label('description', 'Description', ['class'=>'control-label']); ?></div>
                                <div class="col-md-9">
                                    <?php echo Form::textarea('description',$product->description, ['class'=>'form-control','style'=>'resize:none','rows'=>'5','placeholder'=>'Product item description']); ?>

                                    <p class="text-danger"><?php echo e($errors->first('description')); ?></p>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <button class="btn btn-primary pull-right">Update Product</button>
                            </div>
                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2 text-center">
                <img id="output"/>
            </div>
        </div>

    </div>
    <!--body wrapper end-->

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('js/jquery.validate.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/form-validation-init.js')); ?>" type="text/javascript"></script>

<script type="text/javascript">

  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('seller.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>