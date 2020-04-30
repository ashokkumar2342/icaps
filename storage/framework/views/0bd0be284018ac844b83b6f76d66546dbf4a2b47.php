
<?php $__env->startPush('links'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('js/vakata-jstree/tree.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!--body wrapper start-->
    <div class="wrapper">
       <div class="row">
            <div class="col-md-3">
                <a class="btn btn-warning btn-sm" href="<?php echo e(route('admin.category.form')); ?>">+ New Category</a>
                <a class="btn btn-info btn-sm" href="<?php echo e(route('admin.category.special.form')); ?>">+ New Special Category</a>
                <br><br>
                
                <div class="tree" id="category">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <ul>
                               <li ><a href="<?php echo e(route('admin.category.special.edit',$category->ukey)); ?>"><?php echo e($category->name); ?></a></li>
                           </ul>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                  
                </div>
            </div>
            <div class="col-md-9" style="border-left:1px solid #aaa" >
                
                <h2 class="bg-primary" style="padding:9px">Create Special Category</h2>
                <hr>
                <?php echo Form::open(['route'=>'admin.special.category.create','method'=>'put']); ?>

                    <div class="form-group clearfix">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-1">Name</div>
                            <div class="col-md-7">
                                <?php echo Form::text('name', '', ['class'=>'form-control','required']); ?>

                                <?php if($errors->has('name')): ?><p class="text-danger"><?php echo e($errors->first('name')); ?></p> <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-1">Title</div>
                            <div class="col-md-7">
                                <?php echo Form::text('title', '', ['class'=>'form-control','required']); ?>

                                <?php if($errors->has('title')): ?><p class="text-danger"><?php echo e($errors->first('title')); ?></p> <?php endif; ?>
                            </div>
                        </div>
                    </div>
                  
                    <div class="form-group clearfix">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-1">Keywords</div>
                            <div class="col-md-7">
                                <?php echo Form::textarea('keywords', '', ['class'=>'form-control','required', 'style'=>'resize: none', 'rows'=>'4']); ?>

                                <?php if($errors->has('keywords')): ?><p class="text-danger"><?php echo e($errors->first('keywords')); ?></p> <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-1">description</div>
                            <div class="col-md-7">
                                <?php echo Form::textarea('description', '', ['class'=>'form-control','required', 'style'=>'resize: none', 'rows'=>'4']); ?>

                                <?php if($errors->has('description')): ?><p class="text-danger"><?php echo e($errors->first('keywords')); ?></p> <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-1">Is Active</div>
                            <div class="col-md-7">
                                <?php echo Form::select('status', ['0' => 'no', '1' => 'yes'], null, ['class' => 'form-control']); ?>

                                <?php if($errors->has('status')): ?><p class="text-danger"><?php echo e($errors->first('status')); ?></p> <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col clearfix"><div class="pull-right"><button class="btn btn-danger" data-action="resetForm" type="reset"> Reset </button>&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-success pull-right"> Save category </button></div></div>
                <?php echo Form::close(); ?>

            </div>
       </div>
    </div>
    <!--body wrapper end-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>