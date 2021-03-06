<?php $__env->startPush('links'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('js/vakata-jstree/tree.css')); ?>">
<style type="text/css">#output{width: 100%; } .imageThumb {max-height: 75px; border: 2px solid; padding: 1px; cursor: pointer; } .pip {display: inline-block; margin: 10px 10px 0 0; } .remove {display: block; background: #444; border: 1px solid black; color: white; text-align: center; cursor: pointer; } .remove:hover {background: white; color: black; } .categoryTree{position: absolute; background: #fff; border: 1px solid #aaa; max-height: 100px; overflow-y: auto; margin-top: -10px; width: 86%; display: none; z-index: 100; } .catText{background: #00f; padding: 3px; margin-right: 5px; } </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>  
    <!--body wrapper start-->
    <div class="wrapper" style="min-height: 1000px">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add New Product</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <?php echo Form::open(['route'=>'seller.product.add.post','class'=>'validate cmxform','files'=>true]); ?>

                            <div class="form-group clearfix">
                                <label class="col-lg-3 col-md-4 control-label">Category Select</label>
                                <div class="col-lg-9 col-md-8">
                                    <input type="hidden" value="<?php echo e(old('catId')); ?>" id="categoryId" name="catId">
                                    <input type="hidden" value="<?php echo e(old('category')); ?>" name="category" id="categoryInput2" class="form-control">
                                    <div class="input-group m-b-10">    
                                        <input type="text" value="<?php echo e(old('category')); ?>"   disabled id="categoryInput" class="form-control">
                                         
                                        <div class="input-group-btn">
                                            <button id="loadTree" tabindex="-1" class="btn btn-white" type="button"><i class="fa fa-list"></i></button>
                                        </div>
                                    </div>
                                    <ul id="catResult"></ul>
                                    <div class="categoryTree" id="category">
                                       
                                    </div>
                                    <?php if($errors->has('category')): ?><p class="text-danger"><?php echo e($errors->first('category')); ?></p> <?php endif; ?>
                                </div>
                                
                            </div> 
                            <div class="form-group clearfix">
                                <div class="col-md-3"><?php echo Form::label('name', 'Name', ['class'=>'control-label']); ?></div>
                                <div class="col-md-9">
                                    <?php echo Form::text('name', '', ['class'=>'form-control','required']); ?>

                                    <?php if($errors->has('name')): ?><p class="text-danger"><?php echo e($errors->first('name')); ?></p> <?php endif; ?>
                                </div>
                                
                            </div>  
                          
                           
                           
                            <div class="form-group clearfix">
                                    <div class="col-md-3">In Weight</div>
                                    <div class="col-md-9">
                                        <?php echo Form::select('weight', ['0'=>'No','1'=>'Yes'], null, ['class' => 'form-control']); ?>

                                        <?php if($errors->has('weight')): ?><p class="text-danger"><?php echo e($errors->first('weight')); ?></p> <?php endif; ?>
                                    </div>
                            </div>
                            
                            
                            <div class="form-group clearfix">
                                <div class="col-md-3">Image</div>
                                <div class="col-md-9">
                                    <input type="file" accept="image/gif, image/jpeg, image/png" onchange="loadFile(event)" name="image" class="form-control">
                                    <?php if($errors->has('image')): ?><p class="text-danger"><?php echo e($errors->first('image')); ?></p> <?php endif; ?>
                                </div>                                
                            </div>
                            <div class="form-group clearfix">
                                <div class="col-md-3">Is Active</div>
                                <div class="col-md-9">
                                    <?php echo Form::select('status', ['0' => 'no', '1' => 'yes'], null, ['class' => 'form-control']); ?>

                                    <?php if($errors->has('status')): ?><p class="text-danger"><?php echo e($errors->first('status')); ?></p> <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <div class="col-md-3"><?php echo Form::label('keywords', 'Keywords', ['class'=>'control-label']); ?></div>
                                <div class="col-md-9">
                                    <?php echo Form::textarea('keywords','', ['class'=>'form-control','style'=>'resize:none','rows'=>'5','placeholder'=>'Product item keywords']); ?>

                                    <p class="text-danger"><?php echo e($errors->first('keywords')); ?></p>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                               <div class="col-md-3"> <?php echo Form::label('description', 'Description', ['class'=>'control-label']); ?></div>
                                <div class="col-md-9">
                                    <?php echo Form::textarea('description','', ['class'=>'form-control','style'=>'resize:none','rows'=>'5','placeholder'=>'Product item description']); ?>

                                    <p class="text-danger"><?php echo e($errors->first('description')); ?></p>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <button class="btn btn-primary pull-right">Add Product</button>
                            </div>
                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2 text-center">
                <img id="output"/>
            </div>
        </div>

    </div>
    <!--body wrapper end-->

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('js/vakata-jstree/tree.js')); ?>"></script>
<script type="text/javascript">
        function searchCat(data){$('#catResult').html(); if(data != ''){axios.put('<?php echo e(route('seller.category.search')); ?>',{value:data}).then(response => {if (response.data.status === 'OK' ) {for (var i = 0; i < response.data.categories.length; i++) {$('#categoryInput').removeClass('spinner'); } } }).catch(error=> {toastr.error('Error in for finding category ..'); $('#categoryInput').removeClass('spinner'); }); } } $('#category').on('changed.jstree',function(e,data){var i, j, r = [],s = []; for(i = 0, j = data.selected.length; i < j; i++) {r.push(data.instance.get_node(data.selected[i]).text); s.push(data.instance.get_node(data.selected[i]).id); } $('#categoryInput').val(r.join(', ')); $('#categoryInput2').val(r.join(', ')); $('#categoryId').val(s.join(', ')); }); $('#loadTree').on('click',function(){$('#category').slideToggle('fast'); jsTreeLoad(); }); $('#pType').on('change',function(){$('#category').slideDown('fast'); }); function jsTreeCheck(id){$('#category').html(''); axios.get('<?php echo e(route('seller.category.find','')); ?>/'+id).then(response => {if (response.data) {jsTreeLoad(id); } }).catch(error=> {toastr.error('Error in for finding category ..'); }); } function jsTreeLoad(){$('#category').jstree({'core' : {'data' : {'url' : '<?php echo e(route('seller.category.get')); ?>', 'data' : function (node) {console.log(node); } } }, }); } var loadFile = function(event) {var output = document.getElementById('output'); output.src = URL.createObjectURL(event.target.files[0]); }; </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('seller.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>