<div class="col-sm-12">
	<h1>Profile</h1>
</div>

<div class="col-sm-6 col-sm-offset-3">
	<div class="well">
		<div class="row">
			<div class="col-sm-12">
				<h2 class="text-center"><?php echo $game['team_1'] . ' vs ' . $game['team_2'];?></h2>
			</div>
		</div>
		<div class="row profile">
			<div class="col-sm-5 text-right">
				<strong>Score</strong>
			</div>
			<div class="col-sm-6">
				<h3><?php echo $game['team_1_score'] . ':' . $game['team_2_score'];?></h3>
			</div>
		</div>
		<div class="row profile">
			<div class="col-sm-5 text-right">
				<strong>Play Date</strong>
			</div>
			<div class="col-sm-6">
				<?php echo $game['play_date'];?>
			</div>
		</div>
		<div class="row profile">
			<div class="col-sm-5 text-right">
				<strong>Network</strong>
			</div>
			<div class="col-sm-6">
				<?php echo $game['network'];?>
			</div>
		</div>
	</div>
</div>