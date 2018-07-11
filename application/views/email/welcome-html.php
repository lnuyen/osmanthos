<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><title>Welcome to <?php echo $site_name; ?>!</title></head>
    <body>
        <div style="max-width: 800px; margin: 0; padding: 30px 0;">
            <table width="80%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td width="5%"></td>
                    <td align="left" width="95%" style="font: 13px/18px Arial, Helvetica, sans-serif;">
                        <h2 style="font: normal 20px/23px courier new, Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: black;">Welcome to <?php echo $site_name; ?>!</h2>
                        Thank you for joining <?php echo $site_name; ?>!
                        To get started, please follow this link:<br />
                        <br />
                        <big style="font: 16px/18px Arial, Helvetica, sans-serif;"><b><a href="<?php echo site_url('/auth/login/'); ?>" style="color: #A8DDDB;">Go to <?php echo $site_name; ?> now!</a></b></big><br />
                        <br />
                        If the link doesn't work you can also copy the following link to your browser address bar:<br />
                        <nobr><a href="<?php echo site_url('/account'); ?>" style="color: #A8DDDB;"><?php echo site_url('/auth/login/'); ?></a></nobr><br />
                        <br />
                        <br />
                        <?php if (strlen($username) > 0) { ?>Your username: <?php echo $username; ?><br /><?php } ?>
                        Your email address: <?php echo $email; ?><br />
                        <?php /* Your password: <?php echo $password; ?><br /> */ ?>
                        <br />
                        <br />
                        We can't wait to create great fragrances with you!<br />
                        sm
                    </td>
            </tr>
            </table>
        </div>
    </body>
</html>