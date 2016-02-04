<?php
ob_start();

include 'inc/header.php'; 

include('config.php');
?>
<?php

	if (!isset($_SESSION['valid'])) {

		header('Location: redirect.php?action=invalid_permission');	

	} 
  
  		   
  $query = "SELECT * FROM `ras_companyinfo` WHERE fname = '".$_REQUEST['username']."' ORDER BY `id` ASC"; 
   $result = $conn->query($query);
   
    
   
?>		   
				  
  


<style>



.left_column

{

float:left;

width: 30%;

padding: 10px;  

}



.middle_column

{

float:left;

width: 30%;

padding: 10px;          

}



.right_column

{

float:right;

width: 30%;

padding: 10px;

}



</style>

  <div id="main_body" class="row">

    <div id="main" class="col-md-12" >
    <div style="background: rgb(96, 95, 30) none repeat scroll 0% 0%; opacity: 0.88; padding: 15px; color: rgb(255, 255, 255);">
    
    
   <br/>
    	 
			  <table width="100%" border="1" cellspacing="0" cellpadding="6">
              <tbody>
                  <tr>
                    <colgroup>
                        <col width="5%"> 
                        <col width="15%">
                        <col width="25%">
                        <col width="15%">
                        <col width="10%">
                        <col width="15%">
                        <col width="15%">
                     </colgroup>
                  </tr>      
                <tr>
				<td >Client Id</td>
				<td >Name</td> 
				<td >Email</td>
				<td >Contact Date</td>
				<td >Source</td>
				<td >Stage 1 Email Activation</td>
				<td>Stage 2 Email Activation</td> 
				<td>Status</td> 
				   
                </tr>
				
				<?php 
					 
					$item_num = 1;
					while($row = $result->fetch_assoc()) { 
					$client_id= $row['client_id'];
					############# Send Mail Manual On Click #####################
					$action='';
					$action=$_REQUEST['action'];
					
				if($action=='sendmail'){
					
				$username = $_REQUEST['username'];
				$email	 = $row['email'];

				$user_email1='judy.coper@socialcircle.biz';

					
$message_body='  
				<table width="95%" border="0" cellspacing="0" cellpadding="0" align="left">
				<tbody>
				<tr><td>
				<span style="font-family:arial; font-size:12px;"> Hey '.$username.',
				<br /><br />

				<span style="font-family:arial; font-size:12px;">Welcome to Social Circle. Thanks for speaking to our social expert and taking a step further to solidify your social media presence with us. Our trial sign up offer for just $1 for the first month will let you explore our qualitative work techniques. Social Circle&acute;s team of experts will develop customized Facebook apps that would convey the true spirit of your brand to the target market. <br/> <br/>

				You can learn more about Social Circle on <a href="http://www.socialcircle.biz/" target="_blank" style="color:#0b6cda">www.socialcircle.biz </a> and the different businesses that have increased their customer base by utilising the power of Social Media and the Facebook Apps and campaigns offered by Social Circle. Restaurants/ F&B outlets can benefit by utilising social media for reservations, bookings, menu, specials, delivery and much more. <a href="http://www.socialcircle.biz/sapporo-teppanyaki-booking-reservation/index.html" target="_blank"   style="color:#042eee; font-weight:bold;">Click here</a> to see one such reservation/ Bookings example.<br/> <br/>

				We invite you to this exciting journey and welcome you to sign up for just $1.. <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=3DW9KCTN5W528" target="_blank"  style="color:#042eee; font-weight:bold;">Click here to activate for just $1</a><br/> <br/>
				I&acute;ll be in touch shortly to assist you with the sign up process&#46;<br/> <br/>

				Best Wishes,<br/><br/><strong>&#32;Judy Cooper</strong><br/> <br/>


				<span style="font-size:12px;">
				Social Media Expert&#32;&#45;&#32;Social Circle<br/>
				<a href="www.socialcircle.biz" target="_blank"  style="color:#0b6cda">www.socialcircle.biz</a><br/>
				708 3rd Avenue, 6th Floor, New York, NY 10017</span></span>

				</td></tr>

				<tr>  <td height="10"> </td>    </tr>
				<tr><td><br/>
				<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=3DW9KCTN5W528" target="_blank"><img src="http://socialcircle.biz/sendmail/sample.jpg" align="left"></a>
				</td></tr>
				</tbody>
				</table>
';
 
			############################################################

			//proceed with PHP email.
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
			$headers .= 'From: '.$user_email1.''. "\r\n" .  
			//$headers .= 'Bcc: varsha.kalra@refine-interactive.com,mercylaoay@sixelevencenter.com,gary@refine-interactive.com,yogendra.paul@refine-interactive.com' . "\r\n"; 
			$headers .= 'Bcc: yogendra.paul@refine-interactive.com' . "\r\n"; 
			$headers .= 'X-Mailer: PHP/' . phpversion();

			$subject='Social Circle - Activate for just $1';
			$to_email=$email;
			$from=$user_email1;
			
			########### FOr Sending Attachment #########################
			
			
			###################### End Here #############################
			
			
			if($row['Stage_2_Email_Activation']=='1'){
				
				echo "Mail has Already Send.";
				
			}
			    else { 
						$send_mail = mail($to_email,$subject, $message_body, $headers);

			#################################################################### 
			if(!$send_mail)
			{  
				echo "Could not send mail!"; 
			}
			else{ 
		          $query1 = "Update ras_companyinfo set Stage_2_Email_Activation = '1'  where fname = '".$username."'";
					$conn->query($query1);
					
		           echo "Mail send to user";
				   $url2="user_by_id.php?username=".$row['fname'];
				   header('Location:' .$url2);
		    
			      }
			}		  
		     
	}
			 	
					############# End Here #####################################
				?> 
				
<SCRIPT language=JavaScript>
function reload(form)
{
var val=form.status.options[form.status.options.selectedIndex].value;

var username='<?php echo $_REQUEST['username'];?>';
var Stage_2_Email_Activation='<?php echo $row['Stage_2_Email_Activation'];?>';
//alert(username);
//self.location='update_status.php?username=vishal&status='+ val;
//self.location='update_status.php?username=' + username + '&status='+val;
self.location='update_status.php?username=' + username + '&status='+ val + '&Stage_2_Email_Activation='+Stage_2_Email_Activation;

}

</script>

					
				<tr>
				<td><?php echo $row['client_id'];?></td>
				<td><?php echo $row['fname'];?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['contact_date']; ?></td>
				<td><?php echo $row['source']; ?></td> 
               <td><?php 
 
if($row['Stage_1_Email_Activation']=='1'){
	  
echo "<span style='color:rgb(35, 203, 106)'>Stage 1 Mail Send.</span>";
}
else{
 
echo "<span style='color:red'>Stage 1 Not Mail Send.</span><br/>";
 
//echo '<input type="submit" name="manualsend" />';
 
}

?></td>
               
<td><?php 
if($row['Stage_2_Email_Activation']=='1'){
 
echo "<span style='color:rgb(35, 203, 106)'>Stage 2 Mail Send.</span>";


}
else{
	  
echo "<span style='color:red'>Stage 2 Mail Not Send.</span>";

//echo "<form method=\"POST\" action=\"\" . $_SERVER['PHP_SELF'] . "\">";

  $url1="user_by_id.php?action=sendmail&username=".$row['fname'];
   
 echo "<a href='" . $url1 . "'>Send mail</a>"; 
   
 //echo "";user_by_id.php?username=vishal
//echo "</form>";	 
}

?></td>

 

 <td><?php 
 
if($row['status']=='0'){
	  
echo "<span style='color:red'>Inactive.</span>";
 
 
echo '<form method="post" name=f1 enctype="multipart/form-data" action="update_status.php">'; 
 
echo "Select Status:<select name='status' id='status' style='color: green;' onchange=\"reload(this.form)\">
 
<option selected='selected' value='0'>Select Status</option>
<option value='1'>Available</option>
<option value='0'>Not Available</option>";

 
echo "</select><br/><br/>";

echo '</form>';

 
}
else{
 
 echo "<span style='color:green'>Active.</span>";
 
//echo "<span style='color:red'>Stage 1 Not Mail Send.</span><br/>";
 
//echo '<input type="submit" name="manualsend" />';
 
}

?></td>
                
                </tr>
               

			<?php //$i++;
                $item_num ++; } ?>
			</tbody>
			</table>
            <br /> 
			 

    </div>
    <div style="clear:"><!--//--></div>
    </div>

    <!-- end main -->

 <!--   

  
  </div>
 

<?php

include 'inc/footer.php';

?>



 