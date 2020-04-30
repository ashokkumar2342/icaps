 <!-- sidebar left start-->
        <div class="sidebar-left">
            <!--responsive view logo start-->
            <div class="logo dark-logo-bg visible-xs-* visible-sm-*">
                <a href="<?php echo e(route('front.home')); ?>">
                    <!--<i class="fa fa-maxcdn"></i>-->
                    <span class="brand-name">Icaps</span>
                </a>
            </div>
            <!--responsive view logo end-->

            <div class="sidebar-left-info">
                <!-- visible small devices start-->
                <div class=" search-field">  </div>
                <!-- visible small devices end-->

                <!--sidebar nav start-->
                <ul class="nav nav-pills nav-stacked side-navigation">
                    <li>
                        <h3 class="navigation-title">Main</h3>
                    </li>
                    <li><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li> 
                    <li>
                        <h3 class="navigation-title">Catalog</h3>
                    </li>
                    <li class="menu-list">
                        <a href="#"><i class="fa fa-list"></i><span>Catalog</span></a>
                        <ul class="child-list">
                            <li><a href="<?php echo e(route('admin.product.list')); ?>">Product</a></li> 
                            <li><a href="<?php echo e(route('admin.category.form')); ?>">Category</a></li> 
                            <li><a href="<?php echo e(route('admin.unit.form')); ?>">Unit</a></li> 
                            <li><a href="<?php echo e(route('admin.color.form')); ?>">Color</a></li>
                        </ul>
                    </li> 
                   
                    
                    <li>
                        <h3 class="navigation-title">Web Request</h3>
                    </li>
                    <li class="menu-list"><a href="#"><i class="fa fa-paper-plane-o text-info"></i> <span>Consultancy</span></a>
                        <ul class="child-list">
                            <li><a href="<?php echo e(route('admin.consultancy.construction')); ?>"> Construction <?php if(App\Construction::where('status','0')->count()): ?><span class="badge noti-arrow bg-danger pull-right"><?php echo e(App\Construction::where('status','0')->count()); ?></span><?php endif; ?>  </a></li>
                            <li><a href="<?php echo e(route('admin.consultancy.educational')); ?>"> Educational <?php if(App\Educational::where('status','0')->count()): ?><span class="badge noti-arrow bg-danger pull-right"><?php echo e(App\Educational::where('status','0')->count()); ?></span><?php endif; ?></a></li>
                        </ul>
                    </li>
                    <li class="menu-list"><a href="#"><i class="fa fa-paper-plane-o text-primary"></i> <span>Assistance</span></a>
                        <ul class="child-list">
                            <li><a href="<?php echo e(route('admin.assistance.passport')); ?>"> Passport <?php if(App\Passport::where('status','0')->count()): ?><span class="badge noti-arrow bg-danger pull-right"><?php echo e(App\Passport::where('status','0')->count()); ?></span><?php endif; ?></a></li>

                            <li><a href="<?php echo e(route('admin.assistance.pancard')); ?>"> Pan Card <?php if(App\Pan::where('status','0')->count()): ?><span class="badge noti-arrow bg-danger pull-right"><?php echo e(App\Pan::where('status','0')->count()); ?></span><?php endif; ?></a></li>

                            <li><a href="<?php echo e(route('admin.assistance.training')); ?>"> Training <?php if(App\Training::where('status','0')->count()): ?><span class="badge noti-arrow bg-danger pull-right"><?php echo e(App\Training::where('status','0')->count()); ?></span><?php endif; ?></a></li>

                            <li><a href="<?php echo e(route('admin.assistance.placement')); ?>"> Placement <?php if(App\Placement::where('status','0')->count()): ?><span class="badge noti-arrow bg-danger pull-right"><?php echo e(App\Placement::where('status','0')->count()); ?></span><?php endif; ?></a></li>

                        </ul>
                    </li>
                    <li class="menu-list"><a href="#"><i class="fa fa-paper-plane-o text-warning"></i> <span>Product</span></a>
                        <ul class="child-list">
                            <li><a href="<?php echo e(route('admin.product.medicine')); ?>"> Medicine <?php if(App\Medicine::where('status','0')->count()): ?><span class="badge noti-arrow bg-danger pull-right"><?php echo e(App\Medicine::where('status','0')->count()); ?></span><?php endif; ?></a></li>   
                            <li><a href="<?php echo e(route('admin.product.order.list')); ?>">Order <?php if(App\Model\Catalog\Order::where('status','0')->count()): ?><span class="badge noti-arrow bg-danger pull-right"><?php echo e(App\Model\Catalog\Order::where('status','0')->count()); ?></span><?php endif; ?></a></li>  
                        </ul>
                    </li>
                    <li class="menu-list"><a href="#"><i class="fa fa-paper-plane-o text-success"></i> <span>Services</span></a>
                        <ul class="child-list">
                            <li><a href="<?php echo e(route('admin.services.taxiservice')); ?>"> Taxi Service <?php if(App\TaxiBooking::where('status','0')->count()): ?><span class="badge noti-arrow bg-danger pull-right"><?php echo e(App\TaxiBooking::where('status','0')->count()); ?><?php endif; ?></span></a></li>

                            <li><a href="<?php echo e(route('admin.services.itreturn')); ?>"> It Return <?php if(App\ItReturn::where('status','0')->count()): ?><span class="badge noti-arrow bg-danger pull-right"><?php echo e(App\ItReturn::where('status','0')->count()); ?></span><?php endif; ?></a></li>

                            <li><a href="<?php echo e(route('admin.services.recharge')); ?>"> Recharge <?php if(App\Recharge::where('status','0')->count()): ?><span class="badge noti-arrow bg-danger pull-right"><?php echo e(App\Recharge::where('status','0')->count()); ?></span><?php endif; ?></a></li>

                            <li><a href="<?php echo e(route('admin.services.salestaxregistration')); ?>"> Sales Tax Registration <?php if(App\SalesTaxRegistration::where('status','0')->count()): ?><span class="badge noti-arrow bg-danger pull-right"><?php echo e(App\SalesTaxRegistration::where('status','0')->count()); ?></span><?php endif; ?></a></li>

                            <li><a href="<?php echo e(route('admin.services.servicetaxregistration')); ?>"> Service Tax Registration <?php if(App\ServiceTaxRegistration::where('status','0')->count()): ?><span class="badge noti-arrow bg-danger pull-right"><?php echo e(App\ServiceTaxRegistration::where('status','0')->count()); ?></span><?php endif; ?></a></li>

                            <li><a href="<?php echo e(route('admin.services.dthservice')); ?>"> DTH Recharge <?php if(App\Dth::where('status','0')->count()): ?><span class="badge noti-arrow bg-danger pull-right"><?php echo e(App\Dth::where('status','0')->count()); ?><?php endif; ?></span></a></li>

                            <li><a href="<?php echo e(route('admin.services.utilitybillpayment')); ?>"> Utility Bill Payment <?php if(App\UtilityBillPayment::where('status','0')->count()): ?><span class="badge noti-arrow bg-danger pull-right"><?php echo e(App\UtilityBillPayment::where('status','0')->count()); ?><?php endif; ?></span></a></li>                            

                        </ul>
                    </li>

                    <li>
                        <h3 class="navigation-title">User Managment</h3>
                    </li>
                  


                   <li class="menu-list"><a href="#"><i class="fa fa-user text-danger"></i> <span>Users</span></a>
                        <ul class="child-list">
                            <li><a href="<?php echo e(route('admin.user.new.form')); ?>"> New</a></li>
                            <li><a href="<?php echo e(route('admin.user.lists')); ?>"> List</a></li>

                        </ul>
                    </li>

                    <li class="menu-list"><a href="#"><i class="fa fa-user text-success"></i> <span>Seller</span></a>
                        <ul class="child-list">
                            <li><a href="<?php echo e(route('admin.seller.new.form')); ?>"> New</a></li>
                            <li><a href="<?php echo e(route('admin.seller.lists')); ?>"> List</a></li>

                        </ul>
                    </li>
                    <li class="menu-list"><a href="#"><i class="fa fa-user text-primary"></i> <span>Members</span></a>
                        <ul class="child-list">
                            <li><a href="<?php echo e(route('admin.member.new.form')); ?>"> New</a></li>
                            <li><a href="<?php echo e(route('admin.member.lists')); ?>"> List</a></li>
                            <li><a href="<?php echo e(route('admin.member.request')); ?>"> Request</a></li>

                        </ul>
                    </li>
                </ul>
                <!--sidebar nav end-->

               
            </div>
        </div>
        <!-- sidebar left end-->
