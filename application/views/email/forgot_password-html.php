<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><title>Create a new password on <?php echo $site_name; ?></title></head>
<body>
<div style="max-width: 800px; margin: 0; padding: 30px 0;">
<table width="80%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="5%"></td>
<td align="left" width="95%" style="font: 13px/18px Arial, Helvetica, sans-serif; color:#333;">
<h2 style="font: normal 20px/23px Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: #333;">Create a new password</h2>
Forgot your password? It happens to everyone :)<br />
To create a new password, just follow this link:<br />
<br />
<big style="font: 16px/18px Arial, Helvetica, sans-serif;"><b><a href="<?php echo site_url('/auth/reset_password/'.$user_id.'/'.$new_pass_key); ?>" style="color: #3366cc;">Create a new password</a></b></big><br />
<br />
If the link doesn't work, copy the following link to your browser address bar:<br />
<nobr><a href="<?php echo site_url('/auth/reset_password/'.$user_id.'/'.$new_pass_key); ?>" style="color: #3366cc;"><?php echo site_url('/auth/reset_password/'.$user_id.'/'.$new_pass_key); ?></a></nobr><br />
<br />
<br />
See you soon!<br />
<?php echo $site_name; ?>
<br />
<br />
<span style="font-size: 11px; color:#aaa">You received this email, because it was requested by a <a href="<?php echo site_url(''); ?>" style="color: #3366cc;"><?php echo $site_name; ?></a> member. This is part of the procedure to create a new password on the system. If you DID NOT request a new password then please ignore this email and your password will remain the same.</span><br />
</td>
</tr>
</table>
</div>
</body>
</html>