<div class="login-wrapper col-xs-12 icy-bg">
    <div class="row row-fixed">

        <div class="col-sm-5" id="login_form">
            <h1 class="h2"><?php echo lang('login_heading');?></h1>

            <?php
            echo isset($_SESSION['auth_message']) ? $_SESSION['auth_message'] : FALSE;
            ?>

            <div id="infoMessage"><?php echo $message;?></div>

            <?php echo form_open("auth/login");?>

              <div class="form-group">
                <?php echo lang('login_identity_label', 'identity');?>
                <br>
                <?php echo form_input($identity);?>
              </div>

              <div class="form-group">
                <?php echo lang('login_password_label', 'password');?>
                <br>
                <?php echo form_input($password);?>
                <p><a class="forgotPassword" href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
              </div>

              <div class="form-group">
                <?php echo form_submit('submit', lang('login_submit_btn'), array('class' => 'btn btn-primary'));?>
                &nbsp;&nbsp;
                <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                <?php echo lang('login_remember_label', 'remember');?>
              </div>

            <?php echo form_close();?>

        </div>

        <div class="col-sm-5 col-sm-offset-1" id="login_register">

            <h2>Hello, I'm new here:</h2>

            <?php if( $registration == TRUE ): ?>
                <!-- Registration Open -->
                <p><a href="<?php echo base_url('register'); ?>">Create a new account</a></p>
            <?php else: ?>
                <!-- Registration Closed -->
                <p><a href="<?php echo base_url('invite'); ?>">Request an invite</a></p>
            <?php endif; ?>
        </div>
    </div>
</div>