<div class="col-sm-8 col-sm-offset-2">
	<div class="well">
		<table class="table table-hover">
			<thead >
				<tr>
					<th>League Name</th>
					<th>Description</th>
				</tr>
			</thead>
			<tbody class="clickable">
				<?php foreach($leagues as $league):?>
				<tr href="<?php echo $this->config->item('full_url') . '/leagues/detail/' . $league['id'];?>">
					<td><?php echo $league['title'];?></td>
					<td><?php echo $league['description'];?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>	
	</div>
</div>