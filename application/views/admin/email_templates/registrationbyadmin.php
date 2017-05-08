<table cellpadding='0' cellspacing='0' width='598px' style='border:1px solid #253f87;'>
	<tr>
		<td> 
			<img src='"<?=site_url('assets/images/email_top.jpg')?>"'>
		</td>
	</tr>
	<tr>
		<td style='border-top:1px solid #788791; min-height:500px; padding:10px;'>
			<table cellpadding='0' cellspacing='0' border=0 width='100%' align='center' style= 'font-family:Arial, Helvetica, sans-serif; font-size:14px;'>
				<tr align=left>
				<td>
				<table cellpadding='0' cellspacing='0' border=0 width='100%' style= 'font-family:Arial, Helvetica, sans-serif; font-size:14px;'>
				<tr><td height=30 colspan=2 style=' font-size:16px;'><b></b></td></tr>
					<tr>
						<td align=left height=30 colspan=2><b>Congratulations,<br><br> Dear <?=$_POST['name'];?></b></td>
					</tr>
					<tr>
						<td align=left height=30 colspan=2>Your account is created to our site.</td>
					</tr>
					<tr>
						<td align=left height=30 colspan=2>Don't share your login credential with anyone.</td>
					</tr>
					<tr>
						<td align=left height=30 colspan=2>Your username is <?=$_POST['username'];?></td>
					</tr>
					<tr>
						<td align=left height=30 colspan=2>Your Password is <?=$_POST['password'];?></td>
					</tr>
					<tr>
						<td align=right height=30><b>Best Of Luck,</b></td>
					</tr>
					<br>
					<tr>
						<td align=right height=30><b>Team Cycling City</b></td>
					</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
				&nbsp;</td>
			</tr>
		</table>
		</td>
	</tr><tr>
		<td style='border-right:1px solid #535353;'>
			<img src='"<?=site_url('assets/images/email_bottom.jpg')?>"'>
		</td>
	</tr>
</table>