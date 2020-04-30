
<?php $__env->startPush('links'); ?>
 <!--bootstrap picker-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('js/bootstrap-datetimepicker/css/datetimepicker.css')); ?>"/>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>  
    <!--body wrapper start-->
    <div class="wrapper" style="min-height: 1000px">
        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-info">                   
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <img  src="<?php echo e(route('front.product.image.get',['230','300','100',$product->image->first()->name])); ?>">
                            </div>
                            <div class="col-md-9">
                                <h2> <?php echo e($product->name); ?></h2>
                                <table class="table">
                                    <tr><th>Category  </th><td>  : </td><td> <?php $__currentLoopData = $product->productOnCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e(App\Model\Catalog\Category::find($category->cid)->name); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td></tr>
                                    <tr><th>Price </th><td>  :  </td><td> <?php echo e($product->mrp); ?></td></tr>
                                    
                                    <tr><th>Description </th><td>  :</td><td>  <?php echo e($product->description); ?></td></tr>
                                </table>
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
                                        <?php $__currentLoopData = $product->productItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(@$sn=$sn+1); ?></td>
                                                <td><?php echo e($productItem->created_at->format('d-m-Y')); ?></td>
                                                <td><img src="<?php echo e(route('front.product.image.get',['50','50','80',($productItem->image->first())?$productItem->image->first()->name : $product->image->first()->name])); ?>"></td>
                                                <td><?php echo e($productItem->qty); ?> <?php echo e($productItem->unit->name); ?> (<?php echo e($productItem->unit->alias); ?>)</td>
                                                <td><?php echo e($productItem->mrp); ?></td>
                                                <td><?php echo e($productItem->saleUnit->name); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('admin.product.item.view',[$product->ukey,$productItem->ukey])); ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>
                                                    <a href="<?php echo e(route('admin.product.item.delete',[$product->ukey,$productItem->ukey])); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                                   
                                                        
                                                </td>
                                               
                                                
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>                                  
                            </div>                         
                        </div>                       
                    </div><!--/panel body -->
                </div><!--/panel -->
            </div>
        </div>        
    </div>
    <!--body wrapper end-->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('js/jquery.validate.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/form-validation-init.js')); ?>" type="text/javascript"></script>
<!--bootstrap picker-->
<script type="text/javascript" src="<?php echo e(asset('js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')); ?>"></script>
<!--picker initialization-->
<script src="<?php echo e(asset('js/picker-init.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>