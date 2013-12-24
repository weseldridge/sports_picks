<div class="col-sm-12">
	<h1>Profile</h1>
</div>

<div class="col-sm-6 col-sm-offset-3">
	<div class="well">
		<div class="row">
			<div class="col-sm-12 profile"><h2><?php echo $user['name'];?></h2></div>
			<div class="col-sm-3 text-right">
				<strong>Photo</strong>
			</div>
			<div class="col-sm-5">
				<div>
					<?php if($user['use_gravatar']): ?>
						<img src=<?php echo "http://www.gravatar.com/avatar/" . md5(strtolower(trim($user['gravatar_email'])));?>>
					<?php else: ?>
						<img src=<?php echo $this->config->item('base_url') . $user['pic_url']; ?>>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<hr/>
		<div class="row profile">
			<div class="col-sm-5 text-right">
				<strong>Username</strong>
			</div>
			<div class="col-sm-6">
				<?php echo $user['username'];?>
			</div>
		</div>
		<div class="row profile">
			<div class="col-sm-5 text-right">
				<strong>Email</strong>
			</div>
			<div class="col-sm-6">
				<?php echo $user['email'];?>
			</div>
		</div>
		<hr />
		<?php if($user['twitter']):?>
		<div class="row profile">
			<div class="col-sm-5 text-right">
				<strong>Twitter</strong>
			</div>
			<div class="col-sm-6">
				<?php echo 'http://twitter.com/' . $user['twitter'];?>
			</div>
		</div>
		<?php endif; ?>
		<?php if($user['facebook']):?>
		<div class="row profile">
			<div class="col-sm-5 text-right">
				<strong>Facebook</strong>
			</div>
			<div class="col-sm-6">
				<a href="<?php echo 'http://facebook.com/' . $user['facebook'];?>"><?php echo $user['facebook'];?></a>
			</div>
		</div>
		<?php endif; ?>
		<?php if($user['google']):?>
		<div class="row profile">
			<div class="col-sm-5 text-right">
				<strong>Google+</strong>
			</div>
			<div class="col-sm-6">
				<?php echo 'https://plus.google.com/+' . $user['google'];?>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>