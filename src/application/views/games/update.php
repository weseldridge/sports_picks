<?php echo validation_errors(); ?>
<div class="col-sm-8 col-sm-offset-2">
    <div class="row">
        <?php echo form_open('games/update_this_game/' . $game['id'], array('class'=>'form-horizontal')); ?>
        <fieldset>
            <legend>Update a Game</legend>

            <div class="form-group">
                <?php $data = array('name' => 'team_1','placeholder' => $game['team_1'], 'class' => 'form-control');?>
                <?php echo form_label('Team 1', 'team_1', array('class'=>'col-sm-4 control-label')); ?>
                <div class="col-sm-6">
                    <?php echo form_input($data);?>
                </div>
            </div>
            <div class="form-group">
                <?php $data = array('name' => 'team_2','placeholder' => $game['team_2'], 'class' => 'form-control');?>
                <?php echo form_label('Team 2', 'team_2', array('class'=>'col-sm-4 control-label')); ?>
                <div class="col-sm-6">
                    <?php echo form_input($data);?>
                </div>
            </div>
            <div class="form-group">
                <?php $data = array('name' => 'network','placeholder' => $game['network'], 'class' => 'form-control');?>
                <?php echo form_label('Network', 'network', array('class'=>'col-sm-4 control-label')); ?>
                <div class="col-sm-6">
                    <?php echo form_input($data);?>
                </div>
            </div>
            <div class="form-group">
                <?php $data = array('name' => 'play_date','placeholder' => $game['play_date'], 'class' => 'form-control');?>
                <?php echo form_label('Play Date', 'play_date', array('class'=>'col-sm-4 control-label')); ?>
                <div class="col-sm-6">
                    <?php echo form_input($data);?>
                </div>
            </div>
            <p>They did win = 1. They did not win = 2.</p>
            <div class="form-group">
                <?php $data = array('name' => 'team_1_won','placeholder' => $game['team_1_won'], 'class' => 'form-control');?>
                <?php echo form_label('Did Team 1 win?', 'team_1_won', array('class'=>'col-sm-4 control-label')); ?>
                
                <div class="col-sm-6">
                    <?php echo form_input($data);?>
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