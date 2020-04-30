<?php $__env->startSection('title'); ?>
<?php echo e(isset($category->name) ? $category->name : ''); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('keywords'); ?>
<?php echo e(isset($category->keywords) ? $category->keywords : ''); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?>
<?php echo e(isset($category->description) ? $category->description : ''); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="body-content outer-top-xs">
    <div class='container-fluid'>
        <div class='row'>
            <div class="clearfix  col-md-3 sidebar">
                <?php echo $__env->make('front.include.leftsidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div><!-- /.sidemenu-holder -->
            <div class='col-md-9'>
				<?php if($products->count()): ?>
				<div class="search-result-container ">
					<div id="myTabContent" class="tab-content category-list">
						<div class="tab-pane active " id="grid-container">
							<div class="category-product">
								<div class="row">		
									<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php 
										$imgname = ($product->piImage)?$product->piImage:$product->pImage;
									 ?>
									<div class="col-sm-6 col-md-4 wow fadeInUp">
										<div class="products">											
											<div class="product">		
												<div class="product-image">
													<div class="image">
														<a title="<?php echo e($product->pName); ?> (<?php echo e($product->piQty.' '.$product->piUnit); ?>)" alt="<?php echo e($product->pName); ?> (<?php echo e($product->piQty.' '.$product->piUnit); ?>)"  href="<?php echo e(route('front.product.details',[$product->pName,$product->cName,$product->cUkey,$product->piUkey,$product->pUkey])); ?>">
															<img src="<?php echo e(route('front.product.image.get',['176','192','70',$imgname])); ?>" alt="<?php echo e($product->pName); ?> (<?php echo e($product->piQty.' '.$product->piUnit); ?>)"
																title="<?php echo e($product->pName); ?> (<?php echo e($product->piQty.' '.$product->piUnit); ?>)" >
														</a>
													</div>			   
												</div><!-- /.product-image -->
												<div class="product-info text-left">

													<h3 class="name">
														<a title="<?php echo e($product->pName); ?> (<?php echo e($product->piQty.' '.$product->piUnit); ?>)" alt="<?php echo e($product->pName); ?> (<?php echo e($product->piQty.' '.$product->piUnit); ?>)" href="<?php echo e(route('front.product.details',[$product->pName,$product->cName,$product->cUkey,$product->piUkey,$product->pUkey])); ?>"><?php echo e($product->pName); ?> (<?php echo e($product->piQty.' '.$product->piUnit); ?>)</a>
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
								</div><!-- /.row -->
							</div><!-- /.category-product -->
						</div><!-- /.tab-pane -->
					</div><!-- /.tab-content -->
					<div class="clearfix filters-container">
						<div class="text-right">
							<?php echo e($products->links()); ?>			    
						</div><!-- /.text-right -->
					</div><!-- /.filters-container -->
				</div><!-- /.search-result-container -->
				<?php else: ?>
                    <h3 class="text-danger text-center"><b>There have no any product in this category</b></h3>
                    <?php if($products2->count()): ?>	
					<!-- ============================================== SCROLL TABS ============================================== -->
					<section class="section featured-product wow fadeInUp">
						<h3 class="section-title"><?php echo e($products2->first()->cName); ?></h3>
						<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                   	<?php $__currentLoopData = $products2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php 
						$imgname = ($product2->piImage)?$product2->piImage:$product2->pImage;
					 ?>
					<div class="item item-carousel">
						<div class="products">						
							<div class="product">		
								<div class="product-image">
									<div class="image">
										<a title="<?php echo e($product2->pName); ?> (<?php echo e($product2->piQty.' '.$product2->piUnit); ?>)" alt="<?php echo e($product2->pName); ?> (<?php echo e($product2->piQty.' '.$product2->piUnit); ?>)" href="<?php echo e(route('front.product.details',[$product2->pName,$product2->cName,$product2->cUkey,$product2->piUkey,$product2->pUkey])); ?>">
											<img src="<?php echo e(route('front.product.image.get',['176','192','70',$imgname])); ?>" alt="<?php echo e($product2->pName); ?> (<?php echo e($product2->piQty.' '.$product2->piUnit); ?>)"
												title="<?php echo e($product2->pName); ?> (<?php echo e($product2->piQty.' '.$product2->piUnit); ?>)" >
										</a>
									</div>			   
								</div><!-- /.product-image -->
								<div class="product-info text-left">

									<h3 class="name">
										<a title="<?php echo e($product2->pName); ?> (<?php echo e($product2->piQty.' '.$product2->piUnit); ?>)" alt="<?php echo e($product2->pName); ?> (<?php echo e($product2->piQty.' '.$product2->piUnit); ?>)"  href="<?php echo e(route('front.product.details',[$product2->pName,$product2->cName,$product2->cUkey,$product2->piUkey,$product2->pUkey])); ?>"><?php echo e($product2->pName); ?> (<?php echo e($product2->piQty.' '.$product2->piUnit); ?>)</a>
									</h3>								
									<div class="product-price">	
			                                <span class="price"><i class="fa fa-inr"></i><?php echo e($product2->sopMsp); ?></span>
			                                <?php if($product2->piMrp && $product2->piMrp > $product2->sopMsp): ?><span class="price-before-discount"><i class="fa fa-inr"></i><?php echo e($product2->piMrp); ?> </span>&nbsp;&nbsp;
			                                <span style="color:#0a0; margin-top: 5px"><?php echo e(round($product2->piMrp-$product2->sopMsp/$product2->piMrp*100)); ?> %</span>
			                                <?php endif; ?>
									</div><!-- /.product-price -->						
								</div><!-- /.product-info -->							
							</div><!-- /.product -->		      
						</div><!-- /.products -->
					</div><!-- /.item -->
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 	
						</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
<!-- ============================================== SCROLL TABS : END ============================================== -->
<?php endif; ?>				
				<?php endif; ?>
			</div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>