<table cellpadding='0' cellspacing='0' border='0' width='600px'>
	<tr>
	<td style='border:1px solid #0194e2;'>
		<img src='"<?=site_url('assets/images/email_top.jpg')?>' style='display:block'>
	</td>
	</tr>
	<tr>
		<td style='border-left:1px solid #0194E2; border-right:1px solid #0194E2; min-height:500px;'>
			<table cellpadding='0' cellspacing='0' border=0 width='598px' align='center' style= 'font-family:Arial, Helvetica, sans-serif; font-size:14px;'>
				<tr align=left>
					<td style='padding:15px 20px;'>
						<table cellpadding='0' cellspacing='0' border=0 width='560px' style= 'font-family:Arial, Helvetica, sans-serif; font-size:14px;'>
							<tr><td height=30 valign='top'>Welcome <?=$fname?> <?=$lname?>, </td></tr>

							<tr><td height=30 valign='top'>Your user name is <b><?=$username?></b>.<br/></td></tr>

							<tr><td height=30 valign='top'>Your password is <b><?=$password?></b>.<br/></td></tr>

							<tr><td height=30 valign='top'>Remember not to share this password with anyone.</td></tr>
							
							<tr><td valign='top' style='padding-bottom:20px;'>Thank you for registering with Cycling City. Please click on the following link to complete the email verification process:</td></tr>
							
							<tr><td style='max-width:500px; padding-left:0px; word-wrap:break-word; padding-bottom:20px;' valign='top'><a href='<?=site_url('user/EmailVerification')?>/<?=$userid?>' target='_blank'>"<?=site_url('user/EmailVerification')?>/<?=$userid?>"</a></td></tr>
							
							<tr><td height=30 valign='top'>NOTE: This is an automatically generated email, so please do not reply.</td>
							</tr>
						</table>
					</td>
				</tr>
				
				<tr>
					<td align='right' style='padding:0px 10px;'>
					<div style='display:inline-block; text-align:left;'>Best Regards,<br>
					Cycling City.</div></td>
				</tr>
				<tr>
					<td>
					&nbsp;</td>
				</tr>
			</table>
		</td>
	</tr>

	<tr>
	<td style='border:1px solid #0194E2; border-bottom:none;'>
		<img src='"<?=site_url('assets/images/email_bottom.jpg')?>"' style='display:block'>
	</td>
	</tr>

</table>