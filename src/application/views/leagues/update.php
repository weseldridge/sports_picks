<?php echo validation_errors(); ?>
<div class="col-sm-8 col-sm-offset-2">
    <div class="row">
        <?php echo form_open('leagues/update_this_league/' . $league['id'], array('class'=>'form-horizontal')); ?>
        <fieldset>
            <legend>Update League</legend>

            <div class="form-group">
                <?php $data = array('name' => 'title', 'value' => $league['title'], 'class' => 'form-control');?>
                <?php echo form_label('Title', 'title', array('class'=>'col-sm-4 control-label')); ?>
                <div class="col-sm-6">
                    <?php echo form_input($data);?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Description', 'description', array('class'=>'col-sm-4 control-label')); ?>
                <div class="col-sm-6">
                    <textarea name="description" row="3" class="form-control">
                        <?php echo $league['description']; ?>
                    </textarea>
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