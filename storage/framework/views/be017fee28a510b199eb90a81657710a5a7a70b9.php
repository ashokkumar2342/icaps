<?php if(!Auth::guard('user')->user()->member): ?>
	<?php echo Form::open(['route'=>'user.member.request.post']); ?>

		<div class="text-danger text-center">Currently you are not of icaps member. Merbership request <button class="btn btn-link">Click Here</button></div>
	<?php echo Form::close(); ?>

<?php endif; ?>