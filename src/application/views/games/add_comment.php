<?php echo validation_errors(); ?>
<div class="col-sm-8 col-sm-offset-2">
    <div class="row">
        <?php echo form_open('games/add_this_comment/' . $game_id, array('class'=>'form-horizontal')); ?>
        <fieldset>
            <legend>Add a Comment</legend>

            <div class="form-group">
                <?php echo form_label('Comment', 'text', array('class'=>'col-sm-4 control-label')); ?>
                <div class="col-sm-6">
                    <?php echo form_textarea(array('name' => 'text', 'class'=>'form-control', 'row'=>'3')); ?>
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