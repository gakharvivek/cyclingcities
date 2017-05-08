<table cellpadding='0' cellspacing='0' width='598px'>
		<tr>
		<td>
		<img src='"<?=site_url('assets/images/email_top.jpg')?>"'>
		</td>
		</tr>
		<tr>
		<td style='border-left:1px #b2b2b2 solid; border-right:1px #b2b2b2 solid;'>
		<table cellpadding='5' cellspacing='0' width='596' align='center' style='font-family: Arial'>
		<tr><td>&nbsp;</td></tr>


		<tr>
		<td style='padding:0px 20px 10px;'>
		 <span></span>
		 Dear <?=$fname?> <?=$lname?>,
		</td>
		</tr>
		<tr>
		<td style='padding:0px 20px 10px;'>
		<span>Thank you for registering with Cycling City. Please click on the following link to complete the email verification process</span><br/>

		</td>
		</tr>
		<tr><td style=' padding:0px 20px;'><span style='font-size:13px;'><a href='<?=site_url('user/EmailVerification')?>/<?=$userid?>' target='_blank'>"<?=site_url('user/EmailVerification')?>/<?=$userid?>"</a></span></td></tr>
		<tr>
		<td>
		&nbsp;</td>
		</tr>
		<tr>
		<td align='left' style='padding:0px 20px; font-size:15px;'>
		Best Regards,<br>
		Cycling City Team.</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		</table>
		</td>
		</tr>
		<tr>
		<td>
		<img src='"<?=site_url('assets/images/email_bottom.jpg')?>"'>
		</td>
		</tr>
</table>