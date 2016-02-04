<?php
 
		ob_start();

		include 'inc/header.php';

		include('config.php');
 ?>
 
 <?php
 
		if (!isset($_SESSION['valid'])) {

			header('Location: redirect.php?action=invalid_permission');	

		} 
	 
 	
  // if (isset($_POST['sendmail']) && !empty($_POST['business_name']) && !empty($_POST['business_address'])&& !empty($_POST['contact'])&& !empty($_POST['billing_address'])&& !empty($_POST['agent_name'])&& !empty($_POST['fname'])&& !empty($_POST['lname'])&& !empty($_POST['email'])&& !empty($_POST['message'])) {
  
 if($_POST){
	 
				$business_name			= filter_var($_POST['business_name'], FILTER_SANITIZE_STRING);
				$business_address		= filter_var($_POST['business_address'], FILTER_SANITIZE_STRING);
				$billing_address		= filter_var($_POST['billing_address'], FILTER_SANITIZE_STRING);
				$contact				= $_POST['contact']; 
				$agent_name				= $_POST['agent_name'];
				$fname					= filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
				$lname					= filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
				$email					= filter_var($_POST['email'], FILTER_SANITIZE_STRING);
				$message				= filter_var($_POST['message'], FILTER_SANITIZE_STRING); 
 
				$date = date('Y-m-d h:i:s');
					
			/*$user_email1='judy.coper@socialcircle.biz';

					
$message_body='  
				<table width="95%" border="0" cellspacing="0" cellpadding="0" align="left">
				<tbody>
				<tr><td>
				<span style="font-family:arial; font-size:12px;"> Hey '.$fname.',
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
			$send_mail = mail($to_email,$subject, $message_body, $headers);

			#################################################################### 
			if(!$send_mail)
			{  
				echo "Could not send mail!"; 
			}
			else{ 
			 
			*/
				###############insert query###############
			
//echo 	$query = "INSERT INTO ras_companyinfo set client_id = '', fname = '$fname', lname = '$lname',message='$message',email = '$email',contact_date ='$date',source ='Manual',Stage_1_Email_Activation = '',Stage_2_Email_Activation = '1',business_name = '$business_name',business_address = '$business_address',contact = '$contact',billing_address = '$billing_address',agent_name = '$agent_name' "; die;
		
    $query = "SELECT * FROM `ras_companyinfo` WHERE email = '".$email."' "; 
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
	 
    $db_emal=$row['email'];	 
       if($db_emal==$email){
		   echo "<span style='color:red'>Email Already Exits</span>";
		   
	   }
     else{ 
 $query = "INSERT INTO `ras_companyinfo`(`id`, `client_id`, `fname`, `lname`, `message`, `email`, `contact_date`, `source`, `Stage_1_Email_Activation`, `Stage_2_Email_Activation`, `business_name`, `business_address`, `contact`, `billing_address`, `agent_name`,status) 
VALUES ('','','".$fname."','".$lname."','".$message."','".$email."','".$date."','Manual','','','".$business_name."','".$business_address."','".$contact."','".$billing_address."','".$agent_name."','')	";		

  
				$result=$conn->query($query);
		 
				 //  $last_inserted_id = $result->insert_id;	
				   $last_inserted_id = $conn->insert_id;
					 
					//$last_inserted_id=mysql_insert_id();

					$client_id='SC'.$last_inserted_id;	 
					 
					$query1 = "Update ras_companyinfo set client_id = '".$client_id."'  where id = '".$last_inserted_id."'";
					$conn->query($query1);
					
						 
						echo "<span style='color:green'>User Added.</span>";

				}
   
   }
   
   
   
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

    <div id="main" class="col-md-9">
    <div style="background: rgb(96, 95, 30) none repeat scroll 0% 0%; opacity: 0.88; padding: 15px; color: rgb(255, 255, 255);">
    	 
    	<h3>Send Mail manually </h3>

			<form class="form-signin" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            
			<input type="text" value="" class="form-control" name="business_name" placeholder="Business Name:" required >
			<input type="text" value="" class="form-control" name="business_address" placeholder="Business Address:" required > 
			 <input type="text" id="contact" name="contact" class="form-control" placeholder="Contact :0123456789" title="">
			<input type="text" value="" class="form-control" name="billing_address" placeholder="Billing Address :" required >
			<input type="text" value="" class="form-control" name="agent_name" placeholder="Agent Name:" required ><br/>
			 
			<input type="text" value="" class="form-control" name="fname" placeholder="First Name" required >
			<input type="text" value="" class="form-control" name="lname" placeholder="Last Name" required>
			<input type="email" value="" class="form-control" name="email" placeholder="Email" required> <br/>
		 
			<input type="text" style="color: gray;" name="desc" class="form-control"  value="Social Circle - Activate for just $1" placeholder="desc"  placeholder="Social Circle - Activate for just $1" readonly="readonly"><br/>
			 <div class="col-lg-12"><textarea name="message" style="color: gray;" id="message" readonly  class="form-control"  placeholder="">Welcome to Social Circle. Thanks for speaking to our social expert and taking a step further to solidify your social media presence with us. Our trial sign up offer for just $1 for the first month will let you explore our qualitative work techniques. Social circle´s team of experts is efficient in making tailor-made apps that would convey the true spirit of your brand to the target market.

You can learn more about Social Circle on www.socialcircle.biz and the different businesses that have increased their customer base by utilising the power of Social Media and the Facebook Apps and campaigns offered by Social Circle. Restaurants/ F&B outlets can benefit by utilising social media for reservations, bookings, menu, specials, delivery and much more. Click here to see one such reservation/ Bookings example.

We invite you to this exciting journey and welcome you to sign up for just $1.. Click here to activate for just $1

I´ll be in touch shortly to assist you with the sign up process.

Best Wishes,

Judy Cooper

Social Media Expert - Social Circle
www.socialcircle.biz
708 3rd Avenue, 6th Floor, New York, NY 10017
    </textarea></div><br/><br/><br/>
			<input type="submit" class="btn btn-lg btn-primary btn-block" name="sendmail" id="sendmail" value="Save"> 
	 
 
			</form>


    </div>
    <div style="clear:"><!--//--></div>
    </div>

    <!-- end main -->
 

    
  </div>

  <!-- end main_body -->

  

<?php

include 'inc/footer.php';

?>
 

