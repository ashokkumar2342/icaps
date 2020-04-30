		
			<!-- ================================== TOP NAVIGATION ================================== -->
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>        
    <nav class="yamm megamenu-horizontal" role="navigation">
        <ul class="nav">
        	<?php $__currentLoopData = DB::table('categories')->where(['parent'=>null,'type'=>0,'status'=>1])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mainMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="dropdown menu-item">
                
                <a href="#" title="<?php echo e($mainMenu->name); ?>" alt="<?php echo e($mainMenu->name); ?>"  class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-<?php echo e($mainMenu->icon); ?>" aria-hidden="true"></i><?php echo e($mainMenu->name); ?></a>
	                <ul class="dropdown-menu mega-menu">
	                   <?php $__currentLoopData = DB::table('categories')->where(['parent'=>$mainMenu->id,'status'=>1])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4">
                                <li><a title="<?php echo e($childMenu->name); ?>" alt="<?php echo e($childMenu->name); ?>" style="font-size:0.9em" href="<?php echo e(route('front.product.category',$childMenu->ukey)); ?>"><?php echo e($childMenu->name); ?> &nbsp;&nbsp;<i class="fa fa-caret-right"></i></a></li>
                        		<?php $__currentLoopData = DB::table('categories')->where(['parent'=>$childMenu->id,'status'=>1])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subChild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        			<li><a title="<?php echo e($subChild->name); ?>" alt="<?php echo e($subChild->name); ?>"  style="color:#00d; font-size:0.9em;margin-left:8px" href="<?php echo e(route('front.product.category',$subChild->ukey)); ?>"><?php echo e($subChild->name); ?></a></li>
                        		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
	                    
	                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
	                </ul><!-- /.dropdown-menu -->  
            </li><!-- /.menu-item -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul><!-- /.nav -->
    </nav><!-- /.megamenu-horizontal -->
</div><!-- /.side-menu -->
<!-- ================================== TOP NAVIGATION : END ================================== -->


<!-- ============================================== SPECIAL OFFER ============================================== -->
<div class="sidebar-widget outer-bottom-small wow fadeInUp">
	<h3 class="section-title">Product Of The Month</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
	        <div class="item">
	        	<div class="products special-product">
		        	<div class="product">
						<div class="product-micro">
							<div class="row product-micro-row">
								<div class=" ">
									<div class="product-image">
										<div class="image">
											<a href="#">
												<img src="<?php echo e(asset('assets/images/promotion/dove.jpg')); ?>" alt="">
											</a>					
										</div><!-- /.image -->
									</div><!-- /.product-image -->
								</div><!-- /.col -->
								
							</div><!-- /.product-micro-row -->
						</div><!-- /.product-micro -->
      				</div>
		        </div>
	        </div>
	         <div class="item">
	        	<div class="products special-product">
		        	<div class="product">
						<div class="product-micro">
							<div class="row product-micro-row">
								<div class=" ">
									<div class="product-image">
										<div class="image">
											<a href="#">
												<img src="<?php echo e(asset('assets/images/promotion/product_of_the_month.jpg')); ?>" alt="">
											</a>					
										</div><!-- /.image -->
									</div><!-- /.product-image -->
								</div><!-- /.col -->
								
							</div><!-- /.product-micro-row -->
						</div><!-- /.product-micro -->
      				</div>
		        </div>
	        </div>
	    	
	    </div>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<div class="sidebar-widget outer-bottom-small wow fadeInUp">
	<h3 class="section-title">Special Offer</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
	        <div class="item">
	        	<div class="products special-product">
		        	<div class="product">
						<div class="product-micro">
							<div class="row product-micro-row">
								<div class=" ">
									<div class="product-image">
										<div class="image">
											<a href="#">
												<img src="<?php echo e(asset('assets/images/promotion/big_discount_on_membership.jpg')); ?>" alt="">
											</a>					
										</div><!-- /.image -->
									</div><!-- /.product-image -->
								</div><!-- /.col -->
								
							</div><!-- /.product-micro-row -->
						</div><!-- /.product-micro -->
      				</div>
		        </div>
	        </div>
	    	
	    </div>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ============================================== SPECIAL OFFER : END ============================================== -->
<!-- ============================================== 
Testimonials============================================== -->
<?php if(App\Review::count()): ?>
<div class="sidebar-widget  wow fadeInUp outer-top-vs ">
	<div id="advertisement" class="advertisement">
	 	<?php $__currentLoopData = App\Review::orderBy('id','desc')->take(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	 		<?php if($review->user): ?>
		 	<?php 
	         	$profile = route('user.image.profile.view',$review->user->profile_pic);
	     	 ?>
		 	<div class="item">
		        <div class="avatar"><img width="100" height="100px" src="<?php echo e(($review->user->profile_pic)? $profile : asset('profile-img/user.png')); ?>">
		        </div>
				<div class="testimonials"><em>"</em><?php echo e($review->comments); ?> <em>"</em></div>
				<div class="clients_author"><?php echo e($review->user->first_name); ?></div><!-- /.container-fluid -->
		    </div><!-- /.item -->
		    <?php endif; ?>
	    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div><!-- /.owl-carousel -->
</div>
   <?php endif; ?>
<!-- ============================================== Testimonials: END ============================================== -->

