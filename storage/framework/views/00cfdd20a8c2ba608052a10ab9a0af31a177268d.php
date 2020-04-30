<?php $__env->startSection('content'); ?>
    <!-- page head start-->
    <div class="page-head">
        <h3>
            order details
        </h3>
        
    </div>
    <!-- page head end-->

    <!--body wrapper start-->
    <div class="wrapper">
        <div class="row">
            <div class="col-md-10  col-md-offset-1">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                               
                                <div class="row ">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">Membership Type </div>
                                            <div class="col-md-8"> : &nbsp;&nbsp; 
                                                <?php if($order->user->member_type == 0): ?>
                                                    <?php echo e('Free'); ?>

                                                <?php elseif($order->user->member_type == 1): ?>
                                                    <?php echo e('Red'); ?>

                                                <?php elseif($order->user->member_type == 2): ?>
                                                    <?php echo e('Green'); ?>

                                                <?php elseif($order->user->member_type == 3): ?>
                                                    <?php echo e('Blue'); ?>

                                                <?php endif; ?>
                                             </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">Reffered By </div>
                                            <div class="col-md-8"> : &nbsp;&nbsp; <?php echo e($order->user->referred_by); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"><br></div>
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">First Name </div>
                                            <div class="col-md-8"> : &nbsp;&nbsp; <?php echo e($order->user->first_name); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">Last Name </div>
                                            <div class="col-md-8"> : &nbsp;&nbsp; <?php echo e($order->user->last_name); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"><br></div>
                                <div class="row ">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">Mobile </div>
                                            <div class="col-md-8"> : &nbsp;&nbsp; <?php echo e($order->user->mobile); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">Email </div>
                                            <div class="col-md-8"> : &nbsp;&nbsp; <?php echo e($order->user->email); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"><br></div>
                                <div class="row ">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">Membership Card </div>
                                            <div class="col-md-8"> : &nbsp;&nbsp; <?php echo e($order->user->membership_card_no); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">Adhar Card </div>
                                            <div class="col-md-8"> : &nbsp;&nbsp; <?php echo e($order->user->aadhar_card_no); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"><br></div>
                                <div class="row ">
                                <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">Gender </div>
                                            <div class="col-md-8"> : &nbsp;&nbsp; <?php echo e(($order->user->gender==1)?'Male':($order->user->gender==2)?'Female':''); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">Date Of Birth </div>
                                            <div class="col-md-8"> : &nbsp;&nbsp; <?php echo e(($order->user->dob)? date('d-m-Y',strtotime($order->user->dob)):''); ?></div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="clearfix"><br></div>
                                
                                
                            </div><!-- col -->
                        </div><!-- end row -->
                        
                        
                    </div><!-- panel body -->
                </div><!-- panel -->
                    <?php $__currentLoopData = $order->user->address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php 
                            @$sn +=1;
                         ?>
                        <div class="panel panel-warning">
                        <div class="panel-heading"> <?php echo e(($order->user->address_id == $address->id)?'Default Address':'Address '.$sn); ?> </div>
                            <div class="panel-body">
                                <div class="row">
                                <?php if($address->address): ?>
                                <div class="col-md-12">
                                   <?php echo e($address->address); ?>

                                </div><!-- /* col -->
                                <?php endif; ?>
                                <?php if($address->street): ?>
                                <div class="col-md-12">
                                    Street: <?php echo e($address->street); ?>

                                </div><!-- /* col -->
                                <?php endif; ?>
                                <?php if($address->landmark): ?>
                                <div class="col-md-12">
                                    Landmark <?php echo e($address->landmark); ?>

                                </div><!-- /* col -->
                                <?php endif; ?>
                            </div><!-- /* row -->
                        </div><!-- /* panel body -->
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="panel panel-info">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">                               
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
                                                $productItem =  App\Model\Catalog\ProductItem::find($orderItem->iid);
                                               
                                                $qty2 = $orderItem->qty;
                                                
                                                if($productItem->unit->alias == 'gm' && $productItem->saleUnit->alias == 'kg' || $productItem->unit->alias == 'ml' && $productItem->saleUnit->alias == 'ltr'){ 
                                                    $grandTotal = $orderItem->msp*(($orderItem->qty*1000)/ $productItem->qty);
                                                }
                                                elseif($productItem->unit->alias == 'pcs' && $productItem->saleUnit->alias == 'pcs'){
                                                    $grandTotal =($orderItem->msp/$productItem->qty)*$qty2 ;
                                                }
                                                else{
                                                    $grandTotal = $orderItem->msp*$qty2;
                                                }
                                                @$totalPrice += $grandTotal; 
                                             ?>
                                                <tr>
                                                    <td><?php echo e(@$sn=$sn+1); ?></td>
                                                    <td><img src="<?php echo e((@$product->image)?route('front.product.image.get',['50','50','80',$product->image->first()->name]):''); ?>"></td>
                                                    <td class="p-name"><?php echo e(@$product->name); ?> </td>
                                                    <td><?php echo e(@$grandTotal); ?></td>
                                                            
                                                        <td><?php echo e(@$qty2); ?> <?php echo e(@$productItem->saleUnit->alias); ?> </td>
                                                    <td>
                                                        <?php if($orderItem->status == 2): ?>
                                                            <label class="label label-danger">canceled</label>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if($orderItem->status == 1): ?>
                                                            <a href="<?php echo e(route('admin.product.order.item.cancel',$orderItem->id)); ?>">cancel</a>
                                                        <?php endif; ?>

                                                    </td>
                                                     
                                                </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php if(@$totalPrice): ?><div class="col-md-12"><h3 class="text-warning">Total amount : <i class="fa fa-inr"></i> <?php echo e(@round($totalPrice)); ?></h3></div><?php endif; ?>
                        </div>
                    </div><!-- panel body -->
                </div><!-- panel -->
            </div>
        </div>
    </div>
    <!--body wrapper end-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>