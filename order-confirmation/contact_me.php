<?php

include_once('confige.php');
  
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
$user_businessname	= filter_var($_POST["user_businessname"], FILTER_SANITIZE_STRING);
$user_phone		= filter_var($_POST["user_phone"], FILTER_SANITIZE_STRING);
  
$user_package_name    = 'Social Circle Web package, $1 for the first month, $99 monthly';
   
#################### For Attachment ##################
 
 // $path=  $_SERVER['DOCUMENT_ROOT']."/order-confirmation/";
 // $filename="Social_Circle_terms_condition.doc";
 // $file = $path.$filename;
 
require_once('PHPMailer/_acp-ml/phpmailer/class.phpmailer.php');

  
$mail             = new PHPMailer();

$body             = 'Dear '.$user_fname.',
<br/><br/> 
Thank you for signing up with Social Circle Web. I am Judy Cooper, your account manager from the client success team. We appreciate your confidence and look forward to working together with you to provide a stronger online presence for your business. Please review the details of your business information and subscription below:<br/><br/>
 
Business Name:      '.$user_businessname.' <br/> 
Package:            '.$user_package_name.' <br/>
Contact Person:    '.$user_fname.'  '.$user_lname.' <br/>
Email:              '.$user_email.'<br/>
Phone:              '.$user_phone.' <br/>
<br/> 
 
Here is what you get with Social Circle Web:<br/><br/> 

- Responsive and mobile friendly website <br/>
- Content Management System to easily edit and manage content <br/>
- Website Hosting <br/>
- SEO - (Search Engine Optimization) - To get your business found online<br/>
- Social Media Setup - Facebook, Twitter, etc<br/><br/>
 
Our team of experts have commenced the first step of creating the look and feel of your new business website that will work seamlessly on all devices including smart phones and tablets. In parallel, our SEO team will also research and recommend the most suitable keywords to get increased traffic. I will keep you posted and share the demo link for your approval. <br/><br/>  
Kindly acknowledge the above for us to activate your subscription. <br/><br/> 

Please feel free to get in touch with me in case of any questions or visit our website for more information.<br/><br/>
 
Best Wishes,<br/> <br/>
<strong>Judy Cooper</strong><br/> 
Client Success Team<br/>
<a href="http://socialcircle.marketing">www.socialcircle.marketing</a>

';


$region_email_id   = 'clientsuccess@socialcircle.marketing'; 
 
$body             = eregi_replace("[\]",'',$body);

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "secure.emailsrvr.com"; // SMTP server
$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
              
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "secure.emailsrvr.com"; // sets the SMTP server
$mail->Port       = 465;                    // set the SMTP port for the GMAIL server
$mail->Username   = "clientsuccess@socialcircle.marketing"; // SMTP account username
$mail->Password   = "Z58cdeBb";        // SMTP account password
 
$mail->setFrom($region_email_id, "Social Circle Marketing");
$mail->SMTPSecure = 'ssl';

//$mail->SMTPSecure = 'tls';
  
$mail->AddReplyTo($region_email_id, "Social Circle Marketing");
 
$mail->Subject ='Order confirmation from Social Circle Marketing'; 

$mail->AddCC("yogendra.paul@refine-interactive.com", "Social Circle Order Confirmation"); 

//$mail->AddBCC("yogendra.paul@refine-interactive.com", "Vishal");

//echo $body;

$mail->MsgHTML($body); 

$mail->AddAddress($user_email);

//$mail->AddAttachment("terms_condition.doc");      // attachment

if(!$mail->Send()) {
   echo "Mailer Error: " . $mail->ErrorInfo;
  //If mail couldn't be sent output error. Check your PHP email configuration (if it ever happens)

$output = json_encode(array('type'=>'error', 'text' => 'Could not send mail! Please check your PHP mail configuration.'));
die($output); 


}  
else { 

$str=mysql_query("INSERT INTO social_marketing_order_confirmation(fname,lname,email,phone,business_name,package_name,contact_date,status,order_from) VALUES ('".$user_fname."','".$user_lname."','".$user_email."','".$user_phone."','".$user_businessname."','".$user_package_name."',now(),'1','WEB')");

$last_inserted_id=mysql_insert_id();
 
#############################
  
 
 $output = json_encode(array('type'=>'message', 'text' => 'Hi '.$user_fname.' '.$user_lname.' Thank you for your email.'));
   die($output);
}
    
  
 
 
######################################################      
 
 
  
     
}


 

?>