<style>
<!--
.edit-icon {
	text-align: center;
    position: relative;
    top: 57px;
    z-index: 99999;
}
-->
</style>
<div class="comingsoonpage martop64">
<div class="container">
<div class="row">
	<div class="col-md-12">
    <h1>My <span class="redcolor">Profile</span></h1>
        <h2><span class="redcolor">Sampe text</span> to how to go ahead in choosing the cycle, <br/>
sampe text <span class="redcolor"> & choose the cycles by</span></h2>
    </div>
</div>
  <div class="row">
  	<div class="col-md-12">
    <div class="profilepage fntcentury martop15">
		<div class="edit-icon">
        	<a href="<?php echo site_url('personal_profile/edit_profile');?>"><img src="<? echo site_url('assets/images/edit.png');?>" height=128; width=128;/></a>
     	</div>
    	<div class="profilepic">
		   <? if($editprofile['pic']!='')
				{?>
				   <img src="<?php echo site_url('upload/user'); ?>/<?php echo $editprofile['pic']; ?>" class="img-responsive"/> 
			  <?}
			  else
			    {?>
				   <img src="<? echo site_url('assets/images/img_profile.jpg');?>" alt=""/>
			  <?}?>
		   
		</div>
        
    </div>
    
    <div class="editprofile brdrtop">
    <div >
    <table class="table table-bordered brdrleftzero brdrrightzero">
    	<tr>
        	<td class="wd100"><span class="redcolor tttl">Name</span> <?php echo $editprofile['firstname']; ?> <?php echo $editprofile['lastname']; ?> <a href="<?php echo site_url('personal_profile/edit_profile');?>"><img src="<? echo site_url('assets/images/icon_edit.png');?>"/></a></td>
            <td><span class="redcolor tttl">Gender</span><?php echo $editprofile['gender']; ?></td>
        </tr>
        <tr>
		    <?php $dob=$editprofile['dob']; ?>
        	<td><span class="redcolor tttl">Birth Date</span> <?php echo date('d M Y', strtotime($dob)); ?></td>
            <td><span class="redcolor tttl">Marital Status</span> <?php echo $editprofile['marital']; ?></td>
        </tr>
        <tr>
        	<td><span class="redcolor tttl">Location</span> <?php echo $this->myaccount_fm->GetcityNameById( $editprofile['city'] ) ; ?>, <?php echo $this->myaccount_fm->GetstateNameById( $editprofile['state'] ) ; ?>, <?php echo $editprofile['country'];  ?></td>
        	<td><span class="redcolor tttl">AREA</span> <?php echo $editprofile['area']; ?>, <?php echo $editprofile['pincode']; ?> </td>
        </tr>
         <tr>
        	<td><span class="redcolor tttl">OCCUPATION</span> <?php echo $editprofile['occu']; ?></td>
            <td><span class="redcolor tttl">USER TYPE</span> <?php echo $editprofile['user_type']; ?></td>
        </tr>
         <tr>
        	<td><span class="redcolor tttl">OWNS A  CYCLE</span> <?php echo $editprofile['owncycle']; ?></td>
            <td><span class="redcolor tttl">MEMBER OF CYCLING CLUB ON</span>  <?php echo $editprofile['club_member']; ?></span></td>
        </tr>
        <tr>
        	<td colspan="2">
            	<span class="redcolor tttl">TYPE OF CYCLING</span> <?php echo $editprofile['typeofcyclinst']; ?>
            </td>
        </tr>
        <tr>
        	<td colspan="2">
			   <?php $creat=$editprofile['created']; ?>
            	<span class="redcolor tttl">Member of cycling cities in science</span> <span class=""><?php echo date('d M Y', strtotime($creat)); ?></span>
            </td>
        </tr>
    </table>
    
    </div>
   
   
    </div>
    </div>
  </div>
  
  
  
</div>
</div>