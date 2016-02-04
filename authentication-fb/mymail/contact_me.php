<?php

include_once('config.php');

  
if($_POST)
{

 $to_email   	= $_POST["user_email"]; //Recipient email, Replace with own email here
	
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
$user_business_name     = filter_var($_POST["user_business_name"], FILTER_SANITIZE_STRING);
$user_demo_website_link = $_POST["user_demo_website_link"];
$user_phone = $_POST["user_phone"];
	  
$activation= md5($user_email.time()); // encrypted email+timestamp 

$user_email1= 'judy.cooper@socialcircle.biz';

$base_url		= 'http://socialcircle.marketing/authentication/';
 

       //additional php validation
  if(strlen($user_fname)<4){ // If length is less than 4 it will output JSON error.
		$output = json_encode(array('type'=>'error', 'text' => 'First Name is too short or empty!'));
		die($output);
	}
	if(strlen($user_lname)<4){ // If length is less than 4 it will output JSON error.
		$output = json_encode(array('type'=>'error', 'text' => 'Last Name is too short or empty!')); 
		die($output);
	}
 

	if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){ //email validation
		$output = json_encode(array('type'=>'error', 'text' => 'Please enter a valid email!'));
		die($output);
	}
	 
	   


$maildet= 'http://socialcircle.marketing/authentication/verify.php?code='.$activation.'&fname='.$user_fname.'&lname='.$user_lname.'&email='.$user_email.'&business_name='.$user_business_name.'&phone='.$user_phone.'&demo_website_link='.$user_demo_website_link.'';     
   
############################################################ 
	 
	 
require_once('PHPMailer/_acp-ml/phpmailer/class.phpmailer.php');

  
$mail             = new PHPMailer();

$body             =' 
      <table width="95%" border="0" cellspacing="0" cellpadding="0" align="left">
      <tbody>
    <tr><td>
    <span style="font-family:arial; font-size:12px;"> Dear'.$user_fname.',
    <br /><br />

    <span style="font-family:arial; font-size:12px;">Welcome to Social Circle.  <br/> <br/>
 
   Here Below User Details : User Email : -'.$user_email.' <br/>
    User Phone : '.$user_phone.' <br/>
   User Business Name : '.$user_business_name.' <br/>
   
   User Demo Website  : '.$user_demo_website_link.' <br/><br/>

  Please take a moment to verify your email address by 

  <a href="'.$maildet.'">clicking here.</a> 
  <br/> <br/>

Best Wishes,<br/><br/><strong>&#32;Social Marketing</strong><br/> <br/>
 
<span style="font-size:12px;">
Social Media Expert&#32;&#45;&#32;Social Circle<br/>
<a href="www.socialcircle.biz" target="_blank"  style="color:#0b6cda">www.socialcircle.biz</a><br/>
708 3rd Avenue, 6th Floor, New York, NY 10017</span></span>

 </td></tr>
 
<tr>  <td height="10"> </td>    </tr>
 <tr><td><br/>

</td></tr>
  </tbody>
</table>';


$body             = eregi_replace("[\]",'',$body);

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "secure.emailsrvr.com"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
              
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "secure.emailsrvr.com"; // sets the SMTP server
$mail->Port       = 465;                    // set the SMTP port for the GMAIL server
$mail->Username   = "refine.test@refine-interactive.com"; // SMTP account username
$mail->Password   = "Refine@2015";        // SMTP account password


$region_email_id='refine.test@refine-interactive.com';

$mail->setFrom($region_email_id, "Social Marketing Authentication");
$mail->SMTPSecure = 'ssl';

//$mail->SMTPSecure = 'tls';
  
$mail->AddReplyTo($region_email_id, "Refine");

//$mail->AddBCC("vishal.k@refine-interactive.com", "Vishal");

//$mail->AddCC("yogendra.paul@refine-interactive.com", "Yogi");


$mail->Subject    ='Social Marketing - Authentication Mail';
 
//echo $body;

$mail->MsgHTML($body); 
$mail->AddAddress($user_email);

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
   //echo "Mailer Error: " . $mail->ErrorInfo;
   
 $output = json_encode(array('type'=>'error', 'text' => 'Could not send mail! Please check your PHP mail configuration.'));
		die($output);
}  
else {
      
$str=mysql_query("INSERT INTO sociacir_emailcrm.user_authentication_details(id,fname,lname,email,phone,business_name,demo_website_link,contact_date,verified,status) VALUES ('','".$user_fname."','".$user_lname."','".$user_email."','".$user_phone."','".$user_business_name."','".$user_demo_website_link."',now(),'".$activation."','0')");

$last_inserted_id=mysql_insert_id();  
 
 	$output = json_encode(array('type'=>'message', 'text' => 'Hi '.$user_fname.' '.$user_lname.' Thank you for your email.'));
		die($output);             

}	
  
	
	 
}
 #######################################
  
 

?>