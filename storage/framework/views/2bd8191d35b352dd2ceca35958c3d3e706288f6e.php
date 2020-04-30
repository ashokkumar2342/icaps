<?php if(Session::has('message')): ?>
<script type="text/javascript">
$(document).ready(function(){
    Command: toastr["<?php echo e(Session::get('class')); ?>"]("<?php echo Session::get('message'); ?>")


});
</script>
<?php endif; ?>