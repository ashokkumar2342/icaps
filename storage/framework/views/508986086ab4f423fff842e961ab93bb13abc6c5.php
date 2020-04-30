<?php $__env->startSection('content'); ?>
<div class="wrapper">
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
                            <th width="30">Sn</th>
                            <th width="30px">Id</th>
                            <th width="80">Date</th>
                            <th width="60">Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            
                            <th width="100px">Custom</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(@$sn = $sn+1); ?></td>
                                <td><?php echo e($product->ukey); ?></td>
                                <td><?php echo e($product->created_at); ?></td>
                                <td><img src="<?php echo e(route('front.product.image.get',['50','50','80',@$product->image->first()->name])); ?>"></td>
                                <td><?php echo e($product->name); ?></td>
                                <td><?php $__currentLoopData = $product->productOnCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$productOnCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e(($key==0)?'':', '); ?><?php echo e(App\Model\Catalog\Category::find($productOnCategory->cid)->name); ?>  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                                
                                <td>
                                    <a href="<?php echo e(route('seller.product.view',[$product->ukey])); ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>
                                   
                                    <a href="<?php echo e(route('seller.product.edit',[$product->ukey])); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>

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

<?php echo $__env->make('seller.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>