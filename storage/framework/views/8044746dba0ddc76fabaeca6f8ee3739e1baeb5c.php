<?php $__env->startPush('links'); ?>
<link href="<?php echo e(asset('assets/css/lightbox.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<div class='row'>
    <div class=" col-md-3 sidebar">
        <?php echo $__env->make('front.include.leftsidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div><!-- /.sidemenu-holder -->
    <div class='col-md-9'>
        <div class="clearfix filters-container m-t-10">
            <div class="row">
                <div class="col col-sm-6 col-md-2">
                    <div class="filter-tabs">
                        <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                            <li class="active"><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                        </ul>
                    </div><!-- /.filter-tabs -->
                </div><!-- /.col -->
                <div class="col col-sm-12 col-md-6">
                    <div class="col col-sm-3 col-md-6 no-padding">
                        <div class="lbl-cnt">
                            <span class="lbl">Sort by</span>
                            <div class="fld inline">
                                
                            </div><!-- /.fld -->
                        </div><!-- /.lbl-cnt -->
                    </div><!-- /.col -->        
                </div><!-- /.col -->
                <div class="col col-sm-6 col-md-4 text-right">
                       <?php echo e($products->links()); ?>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
        <div class="search-result-container ">
            <div id="myTabContent" class="tab-content category-list">
                <div class="tab-pane active " id="grid-container">
                    <div class="category-product">
                        <div class="row">   
                        <?php if($products->count()): ?>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php 
								$imgname = ($product->piImage)?$product->piImage:$product->pImage;
							 ?>
                            <div class="col-sm-6 col-md-4 wow fadeInUp">
                                <div class="products">
                                    	<div class="product">		
												<div class="product-image">
													<div class="image">
														<a title="<?php echo e($product->pName); ?> (<?php echo e($product->piQty.' '.$product->piUnit); ?>)" href="<?php echo e(route('front.product.details',[$product->pName,$product->cName,$product->cUkey,$product->piUkey,$product->pUkey])); ?>">
															<img src="<?php echo e(route('front.product.image.get',['176','192','70',$imgname])); ?>" alt="<?php echo e($product->pName); ?> (<?php echo e($product->piQty.' '.$product->piUnit); ?>)"
																title="<?php echo e($product->pName); ?> (<?php echo e($product->piQty.' '.$product->piUnit); ?>)" >
														</a>
													</div>			   
												</div><!-- /.product-image -->
												<div class="product-info text-left">
													<h3 class="name">
														<a title="<?php echo e($product->pName); ?> (<?php echo e($product->piQty.' '.$product->piUnit); ?>)" href="<?php echo e(route('front.product.details',[$product->pName,$product->cName,$product->cUkey,$product->piUkey,$product->pUkey])); ?>"><?php echo e($product->pName); ?> (<?php echo e($product->piQty.' '.$product->piUnit); ?>)</a>
													</h3>								
													<div class="product-price">	
							                                <span class="price"><i class="fa fa-inr"></i><?php echo e($product->sopMsp); ?></span>
							                                <?php if($product->piMrp && $product->piMrp > $product->sopMsp): ?><span class="price-before-discount"><i class="fa fa-inr"></i><?php echo e($product->piMrp); ?> </span>&nbsp;&nbsp;
							                                <span style="color:#0a0; margin-top: 5px"><?php echo e(round($product->piMrp-$product->sopMsp/$product->piMrp*100)); ?> %</span>
							                                <?php endif; ?>
													</div><!-- /.product-price -->						
												</div><!-- /.product-info -->							
											</div><!-- /.product -->		      
                                </div><!-- /.products -->
                            </div><!-- /.item -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <h3 class="text-danger text-center">Product not found</h3>
                            <?php endif; ?>
                        </div><!-- /.category-product -->
                    </div><!-- /.tab-pane #list-container -->
                </div><!-- /.tab-content -->
                <div class="clearfix filters-container">
                    <div class="text-right">
                            <?php echo e($products->links()); ?>           
                    </div><!-- /.text-right -->
                </div><!-- /.filters-container -->
            </div><!-- /.search-result-container -->
        </div>
    </div><!-- /.col -->
</div><!-- /.row -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('assets/js/jquery.rateit.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/js/lightbox.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('front.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>