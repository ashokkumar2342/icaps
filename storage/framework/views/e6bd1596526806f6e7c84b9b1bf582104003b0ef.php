<?php $__env->startSection('content'); ?>
<div class="wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4"><img src="<?php echo e(route('front.product.image.get',['250','250','70',($product->image->first())?$product->image->first()->name : 'blank.jpg'])); ?>"></div>
            <div class="col-md-8">
                <div class="col-md-8">
                    <table >
                        <tr><th>Product name </th><td> &nbsp;&nbsp; : &nbsp;&nbsp; <?php echo e($product->name); ?> (<?php echo e($productItem->qty); ?> <?php echo e($productItem->unit->name); ?>)</td></tr>
                        <tr><th>Category  </th><td> &nbsp;&nbsp; : &nbsp;&nbsp;  <?php $__currentLoopData = $product->productOnCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e(App\Model\Catalog\Category::find($category->cid)->name); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td></tr>
                        <tr><th>In Weight </th><td> &nbsp;&nbsp; : &nbsp;&nbsp; <?php echo e(($product->weight == 1)?'Yes':'No'); ?></td></tr>
                        <tr><th>Mrp </th><td> &nbsp;&nbsp; : &nbsp;&nbsp; <?php echo e((@$produtItem->mrp)?'<i class="fa fa-inr"></i>'.$productItem->mrp:''); ?></td></tr>
                        <tr><th>Description </th><td> &nbsp;&nbsp; : &nbsp;&nbsp; <?php echo e($productItem->description); ?></td></tr>
                        <tr><th>Keywords </th><td> &nbsp;&nbsp; : &nbsp;&nbsp; <?php echo e($productItem->keywords); ?></td></tr>
                    </table>
                    <hr>

                </div>
                <div class="col-md-4">
                    <button class="btn btn-warning btn-sm" data-toggle="collapse" data-target="#saleForm" >Sale in this category</button>
                    
                </div>
            </div>
        </div>
    </div>
    <br>
        <div id="saleForm" class="collapse row">
            <div class="panel panel-default col-md-12 ">
                <div class="panel-body">
                <?php echo Form::open(['route'=>['seller.product.item.sale.post',$product->ukey,$productItem->ukey]]); ?>

                     <?php echo Form::hidden('referr', route('seller.product.item.view',[$product->ukey,$productItem->ukey]), []); ?>

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="selling_price">Selling Price <span class="text-danger">*</span></label>
                            <?php echo Form::number('selling_price', '', ['class'=>'form-control','placeholder'=>'Selling price','required']); ?>

                            <label class="text-danger"><?php echo e($errors->first('selling_price')); ?></label>
                        </div>
                         <div class="form-group col-md-3">
                            <?php echo Form::label('stock', 'Stock', ['class'=>'control-label','required']); ?>

                            <?php echo Form::number('stock', '', ['class'=>'form-control']); ?>

                            <label class="text-danger"><?php echo e($errors->first('stock')); ?></label>
                        </div>   
                       
                        
                    </div>
                    <button type="submit" class="btn btn-primary" >Sale</button>
                 <?php echo Form::close(); ?>

            </div>
        </div>
       
        </div>
    <br>
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading ">
                    Product Item Sale List
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
                            <th>Selling Price (Rs)</i></th>
                            <th>stock</th>
                            <th>Expire Time</th>
                            <th width="70px">Custom</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = App\Model\Catalog\SellOnProduct::where(['pid'=>$product->id,'iid'=>$productItem->id,'sid'=>Auth::guard('seller')->user()->id])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $saleProductItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(@$sn=$sn+1); ?></td>
                                <td><?php echo e($saleProductItem->created_at->format('d-m-Y')); ?></td>
                                <td><?php echo e($saleProductItem->msp); ?></td>
                                <td><?php echo e($saleProductItem->stock); ?></td>
                                <td><?php echo e(($saleProductItem->expire)?date('d-m-Y H:i:s',strtotime($saleProductItem->expire)):''); ?></td>
                                <td>
                                    
                                    <a href="<?php echo e(route('seller.product.item.sale.edit',[$product->ukey,$productItem->ukey,$saleProductItem->ukey])); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="<?php echo e(route('seller.product.item.sale.delete',[$product->ukey,$productItem->ukey,$saleProductItem->ukey])); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                   
                                   
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
    <script src="<?php echo e(asset('js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')); ?>"></script>
    <!--select2 init-->
    <script type="text/javascript">
       
        $(".form_datetime-component").datetimepicker({
            format: "yyyy-mm-dd hh:mm:ii",
            autoclose: true,
            todayBtn: true,
            pickerPosition: "bottom-left"
        });
      
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('links'); ?>
    <link href="<?php echo e(asset ('js/bootstrap-datetimepicker/css/datetimepicker.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>
<?php echo $__env->make('seller.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>