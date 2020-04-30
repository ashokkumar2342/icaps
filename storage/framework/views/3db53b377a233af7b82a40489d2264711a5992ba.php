<?php $__env->startSection('content'); ?>
<div class="wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4">
                <img src="<?php echo e(route('front.product.image.get',['150','150','70',($productItem->image->first())?$productItem->image->first()->name: 'blank.jpg'])); ?>">
               
            </div>
            <div class="col-md-8">
                <div class="col-md-8">
                    <table class="">
                        <tr><th>Product name </th><td> &nbsp;&nbsp; : &nbsp;&nbsp; <?php echo e($product->name); ?> (<?php echo e($productItem->qty); ?> <?php echo e($productItem->unit->name); ?>)</td></tr>
                        <tr><th>Category  </th><td> &nbsp;&nbsp; : &nbsp;&nbsp;  <?php $__currentLoopData = $product->productOnCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e(App\Model\Catalog\Category::find($category->cid)->name); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td></tr>
                        <tr><th>In Weight </th><td> &nbsp;&nbsp; : &nbsp;&nbsp; <?php echo e(($product->weight == 1)?'Yes':'No'); ?></td></tr>
                        <tr><th>Sale Unit </th><td> &nbsp;&nbsp; : &nbsp;&nbsp; <?php echo e($productItem->saleUnit->name); ?></td></tr>
                        <tr><th>Mrp </th><td> &nbsp;&nbsp; : &nbsp;&nbsp; <?php echo e(($productItem->mrp)?'<i class="fa fa-inr"></i>'.$productItem->mrp:''); ?></td></tr>
                        <tr><th>Description </th><td> &nbsp;&nbsp; : &nbsp;&nbsp; <?php echo e($productItem->description); ?></td></tr>
                        <tr><th>Keywords </th><td> &nbsp;&nbsp; : &nbsp;&nbsp; <?php echo e($productItem->keywords); ?></td></tr>
                    </table>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-info btn-sm" href="<?php echo e(route('seller.product.edit',$product->ukey)); ?>">Edit</a>
                    <a class="btn btn-warning btn-sm" href="<?php echo e(route('seller.product.view',[$product->ukey])); ?>" >Create New Product Type</a>                    
                </div>
            </div>
        </div>
    </div>
    <br>
        <div class="row">
            <div class="panel panel-default col-md-12 ">
                <div class="panel-body" style="border:1px solid #ccc">
                <?php echo Form::open(['route'=>['seller.product.item.update',$product->ukey,$productItem->ukey]]); ?>

                     <?php echo Form::hidden('referr', route('seller.product.view',[$product->ukey]), []); ?>

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="qty/weight">Qty/Weight</label>
                            <?php echo Form::number('qty', $productItem->qty, ['class'=>'form-control','placeholder'=>'Qty/Weight']); ?>

                            <label class="text-danger"><?php echo e($errors->first('qty')); ?></label>
                        </div>
                         <div class="form-group col-md-3">
                            <?php echo Form::label('unit', 'Product In Unit', ['class'=>'control-label']); ?>

                            <select class="form-control select2" placeholder="Select unit" name="unit">
                                <option></option>
                                <?php $__currentLoopData = App\Model\Catalog\Unit::where(['status'=>1,'weight'=>$product->weight])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option  <?php if(old('unit') == $unit->id): ?>
                                        selected 
                                        <?php elseif($productItem->unit_id == $unit->id): ?>
                                        selected
                                        <?php endif; ?> value="<?php echo e($unit->id); ?>"><?php echo e($unit->name); ?> (<?php echo e($unit->alias); ?>)</option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <label class="text-danger"><?php echo e($errors->first('unit')); ?></label>
                        </div>   
                        <div class="form-group col-md-3">
                            <?php echo Form::label('product_price', 'Product Price(MRP)', ['class'=>'control-label']); ?>

                            <?php echo Form::number('product_price',$productItem->mrp, ['class'=>'form-control','placeholder'=>'Product price (mrp)']); ?>

                           
                            <label class="text-danger"><?php echo e($errors->first('product_price')); ?></label>
                        </div>
                        <div class="form-group col-md-3">
                            <?php echo Form::label('selling_unit_type', 'Selling Unit Type', ['class'=>'control-label']); ?>

                              <select class="form-control select2" placeholder="Select unit" name="sale_unit">
                                <option></option>
                                <?php $__currentLoopData = App\Model\Catalog\Unit::where(['status'=>1])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale_unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option  
                                        <?php if(old('sale_unit') == $sale_unit->id): ?>
                                        selected 
                                        <?php elseif($productItem->sale_unit_id == $sale_unit->id): ?>
                                        selected
                                        <?php endif; ?> value="<?php echo e($sale_unit->id); ?>"><?php echo e($sale_unit->name); ?> (<?php echo e($sale_unit->alias); ?>)</option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <label class="text-danger"><?php echo e($errors->first('sale_unit')); ?></label>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <?php echo Form::label('keywords', 'Keywords', ['class'=>'control-label']); ?>

                            <?php echo Form::textarea('keywords',$productItem->keywords, ['class'=>'form-control','style'=>'resize:none','rows'=>'5','placeholder'=>'Product item keywords']); ?>

                           
                            <label class="text-danger"><?php echo e($errors->first('keywords')); ?></label>
                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('description', 'Description', ['class'=>'control-label']); ?>

                            <?php echo Form::textarea('description',$productItem->description, ['class'=>'form-control','style'=>'resize:none','rows'=>'5','placeholder'=>'Product item description']); ?>

                           
                            <label class="text-danger"><?php echo e($errors->first('description')); ?></label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" >Update</button>
                 <?php echo Form::close(); ?>

            </div>
        </div>       
    </div>
    <br>
    <div class="row">
        <div class="col-sm-12">
            <?php echo Form::open(['route'=>['seller.product.item.image.upload',$product->ukey,$productItem->ukey],'files'=>true]); ?>

                    <div class="col-md-2"><?php echo Form::file('image', []); ?></div>
                    <div class="col-md-2"><button class="btn btn-primary btn-sm pull-right">Upload</button></div> 
                    <p class="text-danger"><?php echo e($errors->first('image')); ?></p>                   
            <?php echo Form::close(); ?>

        
        </div>
    </div>
    <br>
    <hr>
    <br>
    <div class="row">
        <?php $__currentLoopData = $productItemImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productItemImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <img style="margin: 10px" src="<?php echo e(route('front.product.image.get',['200','200','90',$productItemImage->name])); ?>">
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <!--select2-->
    <script src="<?php echo e(asset('js/select2.js')); ?>"></script>
    <script type="text/javascript">
        $('.select2').select2();
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('links'); ?>
    <link href="<?php echo e(asset ('css/select2.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/select2-bootstrap.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>
<?php echo $__env->make('seller.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>