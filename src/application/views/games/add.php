<?php echo validation_errors(); ?>
<div class="col-sm-8 col-sm-offset-2">
    <div class="row">
        <?php echo form_open('games/add_this_game', array('class'=>'form-horizontal')); ?>
        <fieldset>
            <legend>Add a Game</legend>

            <div class="form-group">
                <?php $data = array('name' => 'team_1','placeholder' => 'Team 1', 'class' => 'form-control');?>
                <?php echo form_label('Team 1', 'team_1', array('class'=>'col-sm-4 control-label')); ?>
                <div class="col-sm-6">
                    <?php echo form_input($data);?>
                </div>
            </div>
            <div class="form-group">
                <?php $data = array('name' => 'team_2','placeholder' => 'Team 2', 'class' => 'form-control');?>
                <?php echo form_label('Team 2', 'team_2', array('class'=>'col-sm-4 control-label')); ?>
                <div class="col-sm-6">
                    <?php echo form_input($data);?>
                </div>
            </div>
            <div class="form-group">
                <?php $data = array('name' => 'network','placeholder' => 'Network', 'class' => 'form-control');?>
                <?php echo form_label('Network', 'network', array('class'=>'col-sm-4 control-label')); ?>
                <div class="col-sm-6">
                    <?php echo form_input($data);?>
                </div>
            </div>
            <div class="form-group">
                <?php $data = array('name' => 'play_date','placeholder' => 'Play Date', 'class' => 'form-control');?>
                <?php echo form_label('Play Date', 'play_date', array('class'=>'col-sm-4 control-label')); ?>
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