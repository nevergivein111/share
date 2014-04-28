<?php
/**
 * @var $this Controller
 * @var $link string
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirmation E-mail</title>
<style type="text/css">
	a { text-decoration:none; }
	img { border:none; }
	a:link { text-decoration: none; }
	a:visited { text-decoration: none; }
	a:hover { text-decoration: none; }
	a:active { text-decoration: none; }
</style>
</head>

<body style="padding:0; margin:0;">

<table width="650" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
	<tr>
		<td valign="top">
			<table width="650" border="0" cellspacing="0" cellpadding="0" align="center">
				<tr>
					<td style="background:#0E3787; width:650px; height:65px;padding:10px 0px;">
						<img src="<?php echo Yii::app()->getBaseUrl(true); ?>/mailer_img/logo.png" alt="" style="margin-left:20px;" />
					</td>
				</tr>
			</table>
		</td>
	</tr>

	<tr>
		<td bgcolor="#FFFFFF" valign="top" style="border:1px solid #ccc;">
			<table width="640" height="588" border="0" cellspacing="0" cellpadding="0" align="center" style="padding:9px;">
				<tr>
					<td style="background:url('<?php echo Yii::app()->getBaseUrl(true); ?>/mailer_img/content_bg.png) no-repeat; border:1px solid #ccc;" valign="top">
						<table border="0" cellpadding="0" cellspacing="0" align="center">
							<tr>
								<td align="center" valign="top">
									<p style="font-family:Arial, Helvetica, sans-serif; font-weight:bold; color:#61a8e2; font-size:20px; margin-top:40px; text-align:center;">Thank you for joining shareview.com!</p>
									<p style="font-family:Arial, Helvetica, sans-serif; color:#808284; font-size:13px; text-align:center; margin-bottom:40px;">Click here to confirm your email address</p>
									<a href="<?php echo $link; ?>">
										<img src="<?php echo Yii::app()->getBaseUrl(true); ?>/mailer_img/confirm_email_btn.png" alt="" />
									</a>
								</td>
							</tr>
							<tr>
								<td align="center" valign="top">
									<p style="font-family:Arial, Helvetica, sans-serif; color:#808284; font-size:13px; margin-top:40px; text-align:center;">If clicking the above button doesn’t work, please copy and paste this link into your web browser</p>
									<a href="<?php echo $link;?>" style="font-family:Arial, Helvetica, sans-serif; color:#61a8e2; font-size:13px; text-align:center; text-decoration:underline;"><?php echo $link;?>/</a>
								</td>
							</tr>
							<tr>
								<td align="center" valign="top">
									<p style="font-family:Arial, Helvetica, sans-serif; color:#808284; font-size:13px; margin-top:40px; text-align:center;">
									Thank you, <br />
									Shareview.com Team
									</p>
									<p style="font-family:Arial, Helvetica, sans-serif; color:#808284; font-size:13px; margin-top:20px; text-align:center;">
									©copyright <?php echo date('Y') ?>
									<a href="<?php echo Yii::app()->request->hostInfo;?>" target="_blank" style="color:#808284;"><?php echo Yii::app()->request->hostInfo;?></a><br />
									<a href="#" target="_blank" style="color:#808284; text-decoration:underline;">Privacy Policy
									</a>
									I
									<a href="#" target="_blank" style="color:#808284; text-decoration:underline;">Terms of Use
									</a>
									</p>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>

</table>

</body>
</html>
