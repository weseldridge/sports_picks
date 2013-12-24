<div class="col-sm-12">
	<h1>League Details</h1>
</div>

<div class="col-sm-6 col-sm-offset-3">
	<div class="well">
		<div class="row profile">
			<div class="col-sm-5 text-right">
				<strong>League Name</strong>
			</div>
			<div class="col-sm-6">
				<?php echo $league['title'];?>
			</div>
		</div>
		<div class="row profile">
			<div class="col-sm-5 text-right">
				<strong>League Description</strong>
			</div>
			<div class="col-sm-6">
				<?php echo $league['description'];?>
			</div>
		</div>
		<hr />
		<div class="row">
			<div class="col-sm-12">
				<strong>League Players</strong>
			</div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Name</th>
						<th>Wins/Losses</th>
						<th>Admin</th>
					</tr>
				</thead>
				<tbody class="clickable">
					<?php if($players): ?>
						<?php foreach($players as $player): ?>
						<tr href="<?php echo $this->config->item('full_url') . '/users/detail/' . $player['id']; ?>">
							<th><?php echo $player['name'];?></th>
							<th></th>
							<th></th>
						</tr>
						<?php endforeach; ?>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>