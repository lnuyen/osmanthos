<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="login-wrapper col-xs-12 icy-bg">
    <div class="row row-fixed">

        <div class="col-sm-5" id="login_form">
            <?php
            echo isset($_SESSION['auth_message']) ? $_SESSION['auth_message'] : FALSE;
            ?>
            <h1 class="h2">Create an account:</h1>
            <?php
            echo form_open();

            echo '<div class="form-group">';
            echo form_label('First Name','first_name').'<br />';
            echo form_error('first_name', '<span class="error">', '</span>');
            echo form_input('first_name',set_value('first_name'),array('class' => 'form-control'));
            echo '</div>';

            echo '<div class="form-group">';
            echo form_label('Last Name','last_name').'<br />';
            echo form_error('last_name', '<span class="error">', '</span>');
            echo form_input('last_name',set_value('last_name'),array('class' => 'form-control'));
            echo '</div>';

            echo '<div class="form-group">';
            echo form_label('Email','email').'<br />';
            echo form_error('email', '<span class="error">', '</span>');
            echo form_input('email',set_value('email'),array('class' => 'form-control'));
            echo '</div>';

            echo '<div class="form-group">';
            echo form_label('Password', 'password').'<br />';
            echo form_error('password', '<span class="error">', '</span>');
            echo form_password(array('name' => 'password','class' => 'form-control'));
            echo '</div>';

            echo '<div class="form-group">';
            echo form_label('Confirm Password', 'confirm_password').'<br />';
            echo form_error('confirm_password', '<span class="error">', '</span>');
            echo form_password(array('name' => 'confirm_password','class' => 'form-control'));
            echo '</div>';
            
            echo form_submit('register','Register',array('class' => 'btn btn-primary'));
            echo form_close();
            ?>

        </div>

        <div class="col-sm-5 col-sm-offset-1" id="login_register">

            <h2>I have an account:</h2>

            <!-- Login -->
            <p><a href="<?php echo base_url('login'); ?>">Sign in to your account</a></p>
            
        </div>
    </div>
</div>