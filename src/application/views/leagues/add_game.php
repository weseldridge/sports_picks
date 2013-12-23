<?php echo validation_errors(); ?>
<div class="col-sm-8 col-sm-offset-2">
    <div class="row">
        <?php echo form_open('leagues/add_this_game_to_league', array('class'=>'form-horizontal')); ?>
        <fieldset>
            <legend>Add Games to the League</legend>
           <div class="form-group">
                <?php echo form_label('Games', 'games', array('class'=>'col-sm-4 control-label')); ?>
                <div class="col-sm-6">
                    <?php foreach($games as $game): ?>
                    <?php echo form_checkbox('games[]', $game['id'], false); ?>
                    <?php echo $game['team_1'] . ' vs ' . $game['team_2']; ?><br>
                    <?php endforeach; ?>
                </div>
            </div>
        </fieldset>
        <br/>
        <div class="submit_button">
            <?php echo form_submit('submit', 'Submit'); ?>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>