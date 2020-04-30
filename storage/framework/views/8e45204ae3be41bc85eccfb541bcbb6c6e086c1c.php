<?php $__env->startSection('content'); ?>
<div class="wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4"><img src="<?php echo e(route('front.product.image.get',['250','250','70',$product->image->first()->name])); ?>"></div>
            <div class="col-md-8">
                <div class="col-md-8">
                    <table class="">
                        <tr><th>Category  </th><td> &nbsp;&nbsp; : &nbsp;&nbsp;  <?php $__currentLoopData = $product->productOnCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e(App\Model\Catalog\Category::find($category->cid)->name); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td></tr>
                        <tr><th>In Weight </th><td> &nbsp;&nbsp; : &nbsp;&nbsp; <?php echo e(($product->weight == 1)?'Yes':'No'); ?></td></tr>
                        <tr><th>Description </th><td> &nbsp;&nbsp; : &nbsp;&nbsp; <?php echo e($product->description); ?></td></tr>
                        <tr><th>Keywords </th><td> &nbsp;&nbsp; : &nbsp;&nbsp; <?php echo e($product->keywords); ?></td></tr>
                    </table>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-info btn-sm" href="<?php echo e(route('seller.product.edit',$product->ukey)); ?>">Edit</a>
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="collapse" data-target="#createColor">Create Product Type</button>
                    
                </div>
            </div>
        </div>
    </div>
    <br>
        <div id="createColor" class="collapse <?php echo e(($errors->first())?'in':''); ?> row">
            <div class="panel panel-default col-md-12 ">
                <div class="panel-body" style="border:1px solid #aaa">
                <?php echo Form::open(['route'=>['seller.product.item.create',$product->ukey]]); ?>

                     
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="qty/weight">Qty/Weight</label>
                            <?php echo Form::number('qty', '', ['class'=>'form-control','placeholder'=>'Qty/Weight']); ?>

                            <label class="text-danger"><?php echo e($errors->first('qty')); ?></label>
                        </div>
                         <div class="form-group col-md-3">
                            <?php echo Form::label('unit', 'Product In Unit', ['class'=>'control-label']); ?>

                            <select class="form-control select2" placeholder="Select unit" name="unit">
                                <option></option>
                                <?php $__currentLoopData = App\Model\Catalog\Unit::where(['status'=>1,'weight'=>$product->weight])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($unit->id); ?>"><?php echo e($unit->name); ?> (<?php echo e($unit->alias); ?>)</option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <label class="text-danger"><?php echo e($errors->first('unit')); ?></label>
                        </div>   
                        <div class="form-group col-md-3">
                            <?php echo Form::label('product_price', 'Product Price(MRP)', ['class'=>'control-label']); ?>

                             <?php echo Form::number('product_price','', ['class'=>'form-control','placeholder'=>'Product price (mrp)']); ?>

                            <label class="text-danger"><?php echo e($errors->first('product_price')); ?></label>
                        </div>
                        <div class="form-group col-md-3">
                            <?php echo Form::label('selling_unit_type', 'Selling Unit Type', ['class'=>'control-label']); ?>

                              <select class="form-control select2" placeholder="Select unit" name="sale_unit">
                                <option></option>
                                <?php $__currentLoopData = App\Model\Catalog\Unit::where(['status'=>1])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($unit->id); ?>"><?php echo e($unit->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <label class="text-danger"><?php echo e($errors->first('sale_unit')); ?></label>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <?php echo Form::label('keywords', 'Keywords', ['class'=>'control-label']); ?>

                            <?php echo Form::textarea('keywords','', ['class'=>'form-control','style'=>'resize:none','rows'=>'5','placeholder'=>'Product item keywords']); ?>

                           
                            <label class="text-danger"><?php echo e($errors->first('keywords')); ?></label>
                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('description', 'Description', ['class'=>'control-label']); ?>

                            <?php echo Form::textarea('description','', ['class'=>'form-control','style'=>'resize:none','rows'=>'5','placeholder'=>'Product item description']); ?>

                           
                            <label class="text-danger"><?php echo e($errors->first('description')); ?></label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" >Create</button>
                 <?php echo Form::close(); ?>

            </div>
        </div>
       
        </div>
    <br>
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading ">
                    Product List
                    <span class="tools pull-right">
                        <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                        <a class="t-close fa fa-times" href="javascript:;"></a>
                    </span>
                </header>
                <table class="table responsive-data-table data-table">
                    <thead>
                        <tr>
                            <th width="30px">Sn</th>
                            <th width="80">Date</th>
                            <th width="60">Image</th>
                            <th>Qty</th>
                            <th>Product price</th>
                            <th>Selling Unit</th>
                            <th width="150px">Custom</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = App\Model\Catalog\ProductItem::where(['pid'=>$product->id,'sid'=>Auth::guard('seller')->user()->id])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(@$sn=$sn+1); ?></td>
                                <td><?php echo e($productItem->created_at->format('d-m-Y')); ?></td>
                                <td><img src="<?php echo e(route('front.product.image.get',['50','50','80',($productItem->image->first())?$productItem->image->first()->name : $product->image->first()->name])); ?>"></td>
                                <td><?php echo e($productItem->qty); ?> <?php echo e($productItem->unit->name); ?> (<?php echo e($productItem->unit->alias); ?>)</td>
                                <td><?php echo e($productItem->mrp); ?></td>
                                <td><?php echo e($productItem->saleUnit->name); ?></td>
                                <td>
                                    <a href="<?php echo e(route('seller.product.item.sale',[$product->ukey,$productItem->ukey])); ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>
                                    <a href="<?php echo e(route('seller.product.item.edit',[$product->ukey,$productItem->ukey])); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="<?php echo e(route('seller.product.item.delete',[$product->ukey,$productItem->ukey])); ?>" onclick="return confirm('are you sure to delete this data ?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                </td>
                               
                                
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <!--select2-->
    <script src="<?php echo e(asset('js/select2.js')); ?>"></script>
    <!--select2 init-->
    <script type="text/javascript">
       
        $('.select2').select2();
      
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('links'); ?>
    <link href="<?php echo e(asset ('css/select2.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/select2-bootstrap.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>
<?php echo $__env->make('seller.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>