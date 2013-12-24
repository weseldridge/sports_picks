<div class="col-sm-4 col-sm-offset-4">
    <div class="row signin">
        <?php echo validation_errors(); ?>
        <?php echo form_open('users/user_login', array('class'=>'form-horizontal')); ?>
        <fieldset>
            <legend>Please Sign In</legend>

            <div class="form-group">
                <?php $data = array('name' => 'username','placeholder' => 'User Name', 'class' => 'form-control');?>
                <?php echo form_label('User Name', 'username', array('class'=>'col-sm-4 control-label')); ?>
                <div class="col-sm-6">
                    <?php echo form_input($data);?>
                </div>
            </div>
            <div class="form-group">            
                <?php $data = array('name' => 'password','placeholder' => 'Password', 'class' => 'form-control');?>
                <?php echo form_label('Password', 'password', array('class'=>'col-sm-4 control-label')); ?>
                <div class="col-sm-6">
                    <?php echo form_password($data);?>
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