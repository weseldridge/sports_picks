<div class="col-sm-12">
	<h1>Profile</h1>
	<p>This is information people will see when viewing your profile</p>
</div>

<div class="col-sm-6 col-sm-offset-3">
	<div class="well">
		<div class="row">
			<div class="col-sm-3 text-right">
				<strong>Photo</strong>
			</div>
			<div class="col-sm-3">
				<div>
					<?php if($user['use_gravatar']): ?>
						<img src=<?php echo "http://www.gravatar.com/avatar/" . md5(strtolower(trim($user['gravatar_email'])));?>>
					<?php else: ?>
						<img src=<?php echo $this->config->item('base_url') . $user['pic_url']; ?>>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-sm-6">
				<a href=<?php echo $this->config->item('full_url') . '/users/photo/' . $user['id']; ?>><button>Change Photo</button></a>
				<p>This photo will be shown next to your post and on your profile.</p>
			</div>
		</div>
		<hr/>
		<form class="form" method="post" action=<?php echo $this->config->item('full_url') . '/users/update_this_user/' . $user['id'];?>>
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
				<strong>Name</strong>
			</div>
			<div class="col-sm-6">
				<input type="text" class="form-control" value=<?php echo $user['name'];?>>
			</div>
		</div>
		<div class="row profile">
			<div class="col-sm-5 text-right">
				<strong>Email</strong>
			</div>
			<div class="col-sm-6">
				<input type="text" class="form-control" value=<?php echo $user['email'];?>>
			</div>
		</div>
		<hr />
		<div class="row profile">
			<div class="col-sm-5 text-right">
				<strong>Twitter Username</strong>
			</div>
			<div class="col-sm-6">
				<input type="text" class="form-control" value=<?php echo $user['twitter'];?>>
			</div>
		</div>
		<div class="row profile">
			<div class="col-sm-5 text-right">
				<strong>Facebook Profile URL</strong>
			</div>
			<div class="col-sm-6">
				<input type="text" class="form-control" value=<?php echo $user['facebook'];?>>
			</div>
		</div>
		<div class="row profile">
			<div class="col-sm-5 text-right">
				<strong>Google+ Profile URL</strong>
			</div>
			<div class="col-sm-6">
				<input type="text" class="form-control" value=<?php echo $user['google'];?>>
			</div>
		</div>

		<input type="submit" value="Save Changes"> 
		</form>
	</div>
</div>