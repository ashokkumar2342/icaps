<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-3 " style="min-height: 300px">
			<?php echo $__env->make('user.include.side_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
		<div class="col-md-9" style="background-color: white; padding:30px">
			<?php echo $__env->make('user.include.member_request', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	
			
			<div class="col-md-12" >
				<h3 style="margin-bottom: 25px;padding-bottom: 10px;border-bottom: 1px solid #c6c6c6;"><strong>	Order Details</strong></h3>
				 
				 <table class="table responsive-data-table data-table">
                    <thead>
                        <tr>
                            <th>Sn &nbsp;&nbsp;</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Custom</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php 
                                $product = App\Model\Catalog\Product::find($orderItem->pid);
                                $productItem = App\Model\Catalog\ProductItem::find($orderItem->iid);
                                $qty2 = $productItem->qty;
                                if($productItem->unit->alias == 'gm' && $productItem->saleUnit->alias == 'kg' || $productItem->unit->alias == 'ml' && $productItem->saleUnit->alias == 'ltr'){ 
                                    $grandTotal = $orderItem->msp*(($orderItem->qty*1000)/ $productItem->qty);
                                }
                                elseif($productItem->unit->alias == 'pcs' && $productItem->saleUnit->alias == 'pcs'){
                                    $grandTotal =($orderItem->msp/$qty2)*$orderItem->qty ;
                                }
                                else{
                                    $grandTotal = $orderItem->msp*$orderItem->qty;
                                }
                                @$totalPrice += $grandTotal;
                             ?>
                                <tr>
                                    <td><?php echo e(@$sn=$sn+1); ?></td>
                                    <td><img src="<?php echo e(route('front.product.image.get',['50','50','80',$product->image->first()->name])); ?>"></td>
                                    <td class="p-name"><?php echo e($product->name); ?> (<?php echo e($productItem->qty.' '.$productItem->unit->alias); ?>)</td>
                                    <td><?php echo e($grandTotal); ?></td>
                                    <td><?php echo e($orderItem->qty); ?> <?php echo e($productItem->saleUnit->alias); ?></td>
                                    <td>
                                        <?php if($orderItem->status == 2): ?>
                                            <label class="label label-danger">cancelled</label>
                                        <?php endif; ?>                                       
                                    </td>
                                    <td>
                                        <?php if($orderItem->status == 1): ?>
                                            <a onclick="return confirm('Are you sure to cancel this order ?')" href="<?php echo e(route('user.order.item.cancel',$orderItem->ukey)); ?>">Cancel</a>
                                        <?php endif; ?>                                       
                                    </td>
                                </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>	
                <h3 class="text-info">Total Amount : <span class="text-warning"><i class="fa fa-inr"></i> <?php echo e(@$totalPrice); ?></span></h3>		
		 	</div>
            

		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>