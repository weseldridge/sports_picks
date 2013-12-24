<div class="col-sm-8 col-sm-offset-2">
	<div class="well">
		<table class="table table-hover">
			<thead >
				<tr>
					<th>League Name</th>
					<th>Description</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($leagues as $league):?>
				<tr>
					<td><?php echo $league['title'];?></td>
					<td><?php echo $league['description'];?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>	
	</div>
</div>