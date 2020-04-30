<?php $__env->startSection('title'); ?>
<?php echo e(isset($productItem->name) ? $productItem->name : ''); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('keywords'); ?>
<?php echo e(isset($productItem->keywords) ? $productItem->keywords : ''); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?>
<?php echo e(isset($productItem->description) ? $productItem->description : ''); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('links'); ?>
<link href="<?php echo e(asset('assets/css/lightbox.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<div class="body-content outer-top-xs">
	<div class='container-fluid'>
		<div class='row single-product'>
			<div class='col-md-3 sidebar'>
			<?php echo $__env->make('front.include.leftsidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			</div>
			<div class='col-md-9'>
            <div class="detail-block">
				<div class="row  wow fadeInUp">                
				     <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
					    <div class="product-item-holder size-big single-product-gallery small-gallery">
					        <div id="owl-single-product">
					        <?php $__currentLoopData = $product->image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					        	<?php  
					        	    @$n = $n+1; 
					        	    $image = route('front.product.image.get',['600','600','90',$image->name]);
					        	 ?>
					            <div class="single-product-gallery-item " id="slide<?php echo e($n); ?>">
					                <a data-lightbox="image-1" data-title="<?php echo e($product->name); ?> (<?php echo e($productItem->qty.' '.$productItem->unit->alias); ?>)" href="<?php echo e($image); ?> " class="text-center">
					                <img class="img-responsive" align="middle" 
					                	src="<?php echo e($image); ?>" 
					                	title="<?php echo e($product->name); ?> (<?php echo e($productItem->qty.' '.$productItem->unit->alias); ?>)"
					                	alt="<?php echo e($product->name); ?> (<?php echo e($productItem->qty.' '.$productItem->unit->alias); ?>)" 
					                />		
					            </a>
					            </div><!-- /.single-product-gallery-item -->
					            
					        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					        </div><!-- /.single-product-slider -->
					        <div class="single-product-gallery-thumbs gallery-thumbs">
					        	<?php $__currentLoopData = $product->image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					        	<?php  @$n = $n+1;  ?>
					            <div id="owl-single-product-thumbnails">
					                <div class="item">
					                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide<?php echo e($n); ?>">
					                        <img class="img-responsive"  alt="" src="<?php echo e(route('front.product.image.get',['70','70','70',$image->name])); ?>"  />
					                    </a>
					                </div>               
					            </div><!-- /#owl-single-product-thumbnails -->	
					            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					        </div><!-- /.gallery-thumbs -->
					    </div><!-- /.single-product-gallery -->
					</div><!-- /.gallery-holder -->        			
					<div class='col-sm-6 col-md-7 product-info-block'>
						<div class="product-info">
							<h1 class="name"><?php echo e($product->name); ?> (<?php echo e($productItem->qty.' '.$productItem->unit->alias); ?>)</h1>
							
							<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-2">
										<div class="stock-box">
											<span class="label">Availability :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											<?php if(@$sellOnProduct): ?>
											<span class="text-success">In Stock</span>
											<?php else: ?>
											<span class="value">Out Of Stock</span>
											<?php endif; ?>
										</div>	
									</div>
								</div><!-- /.row -->	
							</div><!-- /.stock-container -->
							<div class="description-container m-t-20">
								<?php echo e(($productItem->description)?$productItem->description : $product->description or ''); ?>

							</div><!-- /.description-container -->
							<?php if(@$sellOnProduct): ?>
							<div class="price-container info-container m-t-20">
								<div class="row">
									<div class="col-sm-12">
										<div class="price-box">
											<?php if($productItem->mrp): ?>
	                                            <span class="price"><i class="fa fa-inr"></i> <?php echo e($sellOnProduct->msp); ?></span>
												&nbsp;&nbsp;&nbsp;&nbsp;
												<span class="price-before-discount"><i class="fa fa-inr"></i> <?php echo e($productItem->mrp); ?></span>
												<?php if($productItem->mrp>$sellOnProduct->msp): ?>
	                                            <?php 
	                                                $discRate = $productItem->mrp-$sellOnProduct->msp;

	                                             ?>
	                                            	&nbsp;&nbsp;
	                                            	<span style="color:#0a0"><?php echo e(round($discRate/$productItem->mrp*100)); ?> % off</span>
	                                            <?php endif; ?>
	                                        <?php else: ?>
                                            	<span class="price-before-discount"><i class="fa fa-inr"></i><?php echo e($sellOnProduct->msp); ?></span>
                                        	<?php endif; ?>
										</div>
									</div>
								
								</div><!-- /.row -->
							</div><!-- /.price-container -->
							<div class="quantity-container info-container">
							<?php  
								$oldCart = Session::get('cart');
								$cart = new App\Model\Catalog\Cart($oldCart);
								
							 ?>
								<div class="row">
								<?php if($productItem->saleUnit->weight): ?>
									<?php if(@array_key_exists($productItem->id,$cart->items)): ?>
										<?php 
										 $prQty = $cart->items[$productItem->id]['qty'];
										 ?>
									<?php endif; ?>
									<div class="col-sm-2">
										<span class="label">Qty :</span>
									</div>
									<?php echo e(Form::open(['route'=>'front.cart.add','method'=>'put'])); ?>

								    <input type="hidden" name="puk" value="<?php echo e(encrypt($product->id)); ?>">
								    <input type="hidden" name="iid" value="<?php echo e(encrypt($productItem->id)); ?>">
								    <input type="hidden" name="sop" value="<?php echo e(encrypt($sellOnProduct->id)); ?>">
									<div class="col-md-10">
										<div class="row">
											<div class="col-md-4 col-xs-4">
												<div class="col-md-8">
													<div class="cart-quantity">
														<div class="quant-input">
											                <div class="arrows">
											                  	<div class="arrow kgPlus gradient"><span class="ir"><i class="icon fa fa-sort-asc "></i></span></div>
											                  	<div class="arrow kgMinus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
											                </div>
											                <input type="text" name="lv" value="<?php echo e((count(@$prQty))?$prQty['lv']:1); ?>">
										              	</div>
										            </div>
									            </div>
									            <div class="col-md-4"><h4 ><?php echo e(collect(explode(',',$productItem->saleUnit->alias))->first()); ?></h4></div>
											</div>
											<div class="col-md-5 col-xs-5">
												<div class="col-md-8">
													<div class="cart-quantity">
														<div class="quant-input" >
											                <div class="arrows" style="margin-right: -30px">
											                  	<div class="arrow gmPlus gradient"><span class="ir"><i class="icon fa fa-sort-asc "></i></span></div>
											                  	<div class="arrow gmMinus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
											                </div>
											                <input type="text" name="sv" value="<?php echo e((count(@$prQty))?$prQty['sv']:0); ?>">
										              	</div>
										            </div>
									            </div>
									            <div class="col-md-4"><h4 ><?php if($productItem->saleUnit->alias == 'kg'): ?> gm <?php elseif($productItem->saleUnit->alias == 'ltr'): ?> ml  <?php endif; ?> </h4></div>
											</div>
										</div>
										
									</div>
									<div class="clearfix"><br><br></div>
									<div class="col-md-12 col-md-offset-3 ">
											<br>
										<?php if(@!array_key_exists($productItem->id, $cart->items)): ?>
										 <button type="submit"  class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
										<?php else: ?>
    									    <button type="submit"  class="btn btn-info"><i class="fa fa-shopping-cart inner-right-vs"></i> UPDATE CART</button>
    									<?php endif; ?>
									</div>
									<?php echo Form::close(); ?>

									
								</div><!-- /.row -->
									<?php else: ?>
									<div class="col-sm-2">
										<span class="label">Qty :</span>
									</div>
									<?php echo e(Form::open(['route'=>'front.cart.add','method'=>'put'])); ?>

									<input type="hidden" name="puk" value="<?php echo e(encrypt($product->id)); ?>">
								    <input type="hidden" name="iid" value="<?php echo e(encrypt($productItem->id)); ?>">
								    <input type="hidden" name="sop" value="<?php echo e(encrypt($sellOnProduct->id)); ?>">
									<div class="col-md-4">
										<div class="col-md-8">
										<div class="cart-quantity">
											<div class="quant-input">
								                <div class="arrows">
								                  	<div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc "></i></span></div>
								                  	<div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
								                </div>
								                <input type="text" name="qt" value="<?php echo e(@(array_key_exists($productItem->id, $cart->items))? $cart->items[$productItem->id]['qty'] : 1); ?>">
							              	</div>
							            </div>
							            </div>
							            <div class="col-md-4"><h4 ><?php echo e(isset($productItem->saleUnit->alias) ? $productItem->saleUnit->alias : ''); ?></h4></div>
									</div>
									<div class="col-md-6">
									    <?php if(@array_key_exists($productItem->id, $cart->items)): ?>
										 <button type="submit"  class="btn btn-info"><i class="fa fa-shopping-cart inner-right-vs"></i> UPDATE CART</button>
										 <?php else: ?>
										 <button type="submit"  class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
    									
    									<?php endif; ?>
									</div>
									<?php echo Form::close(); ?>

									
								</div><!-- /.row -->
									<?php endif; ?>
							</div><!-- /.quantity-container -->
							<?php else: ?>
								<div style="margin-top: 50%"></div>
							<?php endif; ?>

						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
					<div>
						<?php $__currentLoopData = $product->productItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productItem1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<a href="<?php echo e(route('front.product.details',[$product->name,$category->name,$category->ukey,$productItem1->ukey,$product->ukey])); ?>" 
							style="border:1px dashed #ccc;padding: 10px;margin-left: 10px"><?php echo e($productItem1->qty.' '.$productItem1->unit->alias); ?></a>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div><!-- /.row -->
                </div>
							
				<?php if($reletedPrds->count()): ?>	
				<!-- ============================================== SCROLL TABS ============================================== -->
				<section class="section featured-product wow fadeInUp">
					<h3 class="section-title"><?php echo e($reletedPrds->first()->cName); ?></h3>
					<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
						<?php $__currentLoopData = $reletedPrds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reletedPrd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php 
							$imgname = ($reletedPrd->piImage)?$reletedPrd->piImage:$reletedPrd->pImage;
						 ?>
						<div class="item item-carousel">
							<div class="products">						
								<div class="product">		
									<div class="product-image">
										<div class="image">
											<a alt="<?php echo e($reletedPrd->pName); ?> (<?php echo e($reletedPrd->piQty.' '.$reletedPrd->piUnit); ?>)" title="<?php echo e($reletedPrd->pName); ?> (<?php echo e($reletedPrd->piQty.' '.$reletedPrd->piUnit); ?>)" href="<?php echo e(route('front.product.details',[$reletedPrd->pName,$reletedPrd->cName,$reletedPrd->cUkey,$reletedPrd->piUkey,$reletedPrd->pUkey])); ?>">
												<img src="<?php echo e(route('front.product.image.get',['176','192','70',$imgname])); ?>" alt="<?php echo e($reletedPrd->pName); ?> (<?php echo e($reletedPrd->piQty.' '.$reletedPrd->piUnit); ?>)"
													title="<?php echo e($reletedPrd->pName); ?> (<?php echo e($reletedPrd->piQty.' '.$reletedPrd->piUnit); ?>)" >
											</a>
										</div>			   
									</div><!-- /.product-image -->
									<div class="product-info text-left">

										<h3 class="name">
											<a title="<?php echo e($reletedPrd->pName); ?> (<?php echo e($reletedPrd->piQty.' '.$reletedPrd->piUnit); ?>)" alt="<?php echo e($reletedPrd->pName); ?> (<?php echo e($reletedPrd->piQty.' '.$reletedPrd->piUnit); ?>)" href="<?php echo e(route('front.product.details',[$reletedPrd->pName,$reletedPrd->cName,$reletedPrd->cUkey,$reletedPrd->piUkey,$reletedPrd->pUkey])); ?>"><?php echo e($reletedPrd->pName); ?> (<?php echo e($reletedPrd->piQty.' '.$reletedPrd->piUnit); ?>)</a>
										</h3>								
										<div class="product-price">	
				                                <span class="price"><i class="fa fa-inr"></i><?php echo e($reletedPrd->sopMsp); ?></span>
				                                <?php if($reletedPrd->piMrp && $reletedPrd->piMrp > $reletedPrd->sopMsp): ?><span class="price-before-discount"><i class="fa fa-inr"></i><?php echo e($reletedPrd->piMrp); ?> </span>&nbsp;&nbsp;
				                                <span style="color:#0a0; margin-top: 5px"><?php echo e(round($reletedPrd->piMrp-$reletedPrd->sopMsp/$reletedPrd->piMrp*100)); ?> %</span>
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
					<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
			</div><!-- /.col -->
			<div class="clearfix"></div>
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /.body-content -->


</html>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('assets/js/lightbox.min.js')); ?>"></script>
<script>
    <?php if($errors->first()): ?>
        alert('please choose a valid quantity');
    <?php endif; ?>
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('front.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>