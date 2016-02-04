<?php

include_once('config.php');

  
if($_POST)
{
	$to_email   	= $_POST["user_email"]; //Recipient email, Replace with own email here
	
//$message= $_POST["msg"]; 
 
 
	
	//check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
		
		$output = json_encode(array( //create JSON data
			'type'=>'error', 
			'text' => 'Sorry Request must be Ajax POST'
		));
		die($output); //exit script outputting json data
    } 
	
	//Sanitize input data using PHP filter_var().
$user_fname		= filter_var($_POST["user_fname"], FILTER_SANITIZE_STRING);
$user_lname		= filter_var($_POST["user_lname"], FILTER_SANITIZE_STRING);
$user_email		= filter_var($_POST["user_email"], FILTER_SANITIZE_EMAIL); 
//$message		= filter_var($message, FILTER_SANITIZE_STRING);
	
	//additional php validation
	//if(strlen($user_fname)<4){ // If length is less than 4 it will output JSON error.
		//$output = json_encode(array('type'=>'error', 'text' => 'First Name is too short or empty!'));
		//die($output);
	//}
	//if(strlen($user_lname)<4){ // If length is less than 4 it will output JSON error.
		//$output = json_encode(array('type'=>'error', 'text' => 'Last Name is too short or empty!')); 
		//die($output);
	//}
	//if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){ //email validation
		//$output = json_encode(array('type'=>'error', 'text' => 'Please enter a valid email!'));
		//die($output);
	//}
	 
	  
	//if(strlen($message)<3){ //check emtpy message
		//$output = json_encode(array('type'=>'error', 'text' => 'Too short message! Please enter something.'));
		//die($output);
	//}



$user_email1='judy.coper@socialcircle.biz';

            
$message_body='  
<table width="95%" border="0" cellspacing="0" cellpadding="0" align="left">
  <tbody>
    <tr><td>
<span style="font-family:arial; font-size:12px;"> Hey '.$user_fname.',
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
//$headers .= 'From: Judy Coper'. "\r\n" . 
//$headers .= 'Bcc: varsha.kalra@refine-interactive.com,mercylaoay@sixelevencenter.com,gary@refine-interactive.com,yogendra.paul@refine-interactive.com' . "\r\n";
//$headers .= 'Bcc: varsha.kalra@refine-interactive.com,gary@refine-interactive.com,yogendra.paul@refine-interactive.com' . "\r\n";
$headers .= 'Bcc: yogendra.paul@refine-interactive.com' . "\r\n"; 
$headers .= 'X-Mailer: PHP/' . phpversion();
 
 
	$subject='Social Circle - Activate for just $1';
	$to_email=$user_email;
	$from=$user_email1;
	$send_mail = mail($to_email,$subject, $message_body, $headers);

####################################################################

	
	if(!$send_mail)
	{
 
		//If mail couldn't be sent output error. Check your PHP email configuration (if it ever happens)
		$output = json_encode(array('type'=>'error', 'text' => 'Could not send mail! Please check your PHP mail configuration.'));
		die($output);
	}else{

	

	
###############insert query###############
$str=mysql_query("INSERT INTO `wpsosdbn`.`ras_companyinfo` (client_id,`fname`, `lname`, `message`, `email`,contact_date,source,Stage_1_Email_Activation,Stage_2_Email_Activation) VALUES ('','".$user_fname."', '".$user_lname."', '".$message_body."', '".$user_email."',now(),'Email','1','')");

$last_inserted_id=mysql_insert_id();

 $client_id='SC'.$last_inserted_id;	

$str1=mysql_query("UPDATE `ras_companyinfo` SET `client_id`='".$client_id."'  WHERE id='".$last_inserted_id."' ");
 
   
#############################

 $output = json_encode(array('type'=>'message', 'text' => 'Hi '.$user_fname.' '.$user_lname.' Thank you for your email.'));
   die($output);
		
 ################# FOr Insert Details Into Database#####
		
		
		
		
		############## End Here #######################
		
	}
}
 #######################################
  
 

?>