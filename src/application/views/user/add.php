<?php echo validation_errors(); ?>
<div class="col-sm-8 col-sm-offset-2">
    <div class="row">
        <?php echo form_open('user/add_this_user', array('class'=>'form-horizontal')); ?>
        <fieldset>
            <legend>Add a User</legend>

            <div class="form-group">
                <?php echo form_label('User Name', 'username', array('class'=>'col-sm-4 control-label')); ?>
                <div class="col-sm-6">
                    <?php echo form_input(array('name' => 'username','placeholder' => 'jonsmith', 'class' => 'form-control'));?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Email', 'email', array('class'=>'col-sm-4 control-label')); ?>
                <div class="col-sm-6">
                    <input type="email" name="email" class="form-control" placeholder="jon.smith@rebelliouslabs.com">
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('First Name', 'first_name', array('class'=>'col-sm-4 control-label')); ?>
                <div class="col-sm-6">
                    <?php echo form_input(array('name' => 'first_name','placeholder' => 'Jon', 'class' => 'form-control'));?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Last Name', 'last_name', array('class'=>'col-sm-4 control-label')); ?>
                <div class="col-sm-6">
                    <?php echo form_input(array('name' => 'last_name','placeholder' => 'Smith', 'class' => 'form-control'));?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Password', 'password', array('class'=>'col-sm-4 control-label')); ?>
                <div class="col-sm-6">
                    <input type="password" name="password" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Confrim Password', 'cpassword', array('class'=>'col-sm-4 control-label')); ?>
                <div class="col-sm-6">
                    <input type="password" name="cpassword" class="form-control">
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