<div class="col-sm-8 col-sm-offset-2">
	<div class="well">
		<table class="table table-hover">
			<thead >
				<tr>
					<th>League Name</th>
					<th>Sport</th>
					<th>Player Count</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($leagues as $league):?>
				<tr>
					<td><?php echo $league['title'];?></td>
					<td><?php echo $league['title'];?></td>
					<td><?php echo $league['title'];?></td>
					<td><button class="btn btn-default"><a href=<?php echo $this->config->item('full_url') . '/leagues/join_this_league/' . $league['id'];?>>Join</a> </button></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>	
	</div>
</div>