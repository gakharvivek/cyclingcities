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
						<table cellpadding='0' cellspacing='0' border=0 width='' style= 'font-family:Arial, Helvetica, sans-serif; font-size:14px;'>
						  <tr>
							<td align='left' style='padding-bottom:7px;' colspan='2'><b>Feedback Details: </b></td>
						  </tr>
						 <tr><td height=30 valign='top'><b>Email:</b> <?=$email?></td>
							
						  </tr>
						  <tr><td height=30 valign='top'><b>Name:</b> <?=$fname?> <?=$lname?></td>
						  </tr>
						  <tr><td height=30 valign='top'><b>Phone:</b> <?=$phone?></td>
						  </tr>
						  <tr><td height=30 valign='top'><b>Country:</b> <?=$countryname?></td>
						  </tr>
						  <tr><td height=30 valign='top'><b>State:</b> <?=$statename?></td>
						  </tr>
						  <tr><td height=30 valign='top'><b>City:</b> <?=$cityname?></td>
						  </tr>
						  <tr><td height=30 valign='top'><b>Message:</b> <?=$messagedata?></td>
						  </tr>
					 </table>
					</td>
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