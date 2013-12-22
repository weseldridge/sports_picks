<?php echo validation_errors(); ?>
<div class="col-sm-8 col-sm-offset-2">
    <div class="row">
        <?php echo form_open('leagues/add_this_league', array('class'=>'form-horizontal')); ?>
        <fieldset>
            <legend>Add a League</legend>

            <div class="form-group">
                <?php $data = array('name' => 'title','placeholder' => 'Title', 'class' => 'form-control');?>
                <?php echo form_label('Title', 'title', array('class'=>'col-sm-4 control-label')); ?>
                <div class="col-sm-6">
                    <?php echo form_input($data);?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Description', 'description', array('class'=>'col-sm-4 control-label')); ?>
                <div class="col-sm-6">
                    <?php echo form_textarea(array('name' => 'description', 'class'=>'form-control', 'row'=>'3')); ?>
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