<table cellpadding='0' cellspacing='0' border='0' width='600px'>
	<tr>
	<td style='border:1px solid #0194e2;'>
		<img src='"<?=site_url('assets/images/email_top.jpg')?>"' style='display:block'>
	</td>
	</tr>
	<tr>
		<td style='border-left:1px solid #0194E2; border-right:1px solid #0194E2; min-height:500px;'>
			<table cellpadding='0' cellspacing='0' border=0 width='598px' align='center' style= 'font-family:Arial, Helvetica, sans-serif; font-size:14px;'>
				<tr align=left>
					<td style='padding:15px 20px;'>
						<table cellpadding='0' cellspacing='0' border=0 width='560px' style= 'font-family:Arial, Helvetica, sans-serif; font-size:14px;'>
							<tr><td height=30 valign='top'>Dear <?=$name?>, </td></tr>

							<tr>
								<td height=30 valign='top'>
								   Username: <?=$username?>
								</td>
							</tr>
							<tr>
								<td height=30 valign='top'>
								   Password: <?=$password?>
								</td>
							</tr>
							
							<tr><td height=30 valign='top'>NOTE: This is an automatically generated email, so please do not reply.</td>
							</tr>
						</table>
					</td>
				</tr>
				
				<tr>
					<td align='right' style='padding:0px 10px;'>
					<div style='display:inline-block; text-align:left;'>Best Regards,<br>
					Cycling City Team.</div></td>
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