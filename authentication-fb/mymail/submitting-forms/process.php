<?php

$errors         = array();  	// array to hold validation errors
$output         = array(); 		// array to pass back data



include_once('config.php');

// validate the variables ======================================================
	if (empty($_POST['fname']))

		$errors['fname'] = 'First Name is required.';

if (empty($_POST['lname']))

		$errors['lname'] = 'Last Name is required.';

if (empty($_POST['email']))
		$errors['lname'] = 'Email is required.';

if (empty($_POST['phone']))
		$errors['phone'] = 'Phone is required.';

	if (empty($_POST['business_name']))
		$errors['business_name'] = 'Business Name is required.';

	

 
	if (empty($_POST['demo_website_link']))
		$errors['demo_website_link'] = 'Website is required.';
   


$activation= md5($user_email.time()); // encrypted email+timestamp 
 
 
$base_url		= 'http://socialcircle.marketing/authentication/mymail/submitting-forms/';

$maildet= 'http://socialcircle.marketing/authentication/mymail/submitting-forms/verify.php?code='.$activation.'&fname='.$_POST['fname'].'&lname='.$_POST['lname'].'&email='.$_POST['email'].'&business_name='.$_POST['business_name'].'&phone='.$_POST['phone'].'&demo_website_link='.$_POST['demo_website_link'].'';     



// return a response ===========================================================

	// response if there are errors
	if ( ! empty($errors)) {

		// if there are items in our errors array, return those errors
		$output['success'] = false;
		$output['errors']  = $errors;
	} 

else {

require_once('PHPMailer/_acp-ml/phpmailer/class.phpmailer.php');

  
$mail             = new PHPMailer();
         
####################mail Sending Code Start ################################    
    
$body             =' 
      <table width="95%" border="0" cellspacing="0" cellpadding="0" align="left">
      <tbody>
    <tr><td>
    <span style="font-family:arial; font-size:12px;"> Dear '.$_POST['fname'].',
    <br /><br />

    <span style="font-family:arial; font-size:12px;">Welcome to Social Circle.  <br/> <br/>
 
   Here Below User Details : User Email : -'.$_POST['email'].' <br/>
    User Phone : '.$_POST['phone'].' <br/>
   User Business Name : '.$_POST['business_name'].' <br/>
   
   User Demo Website  : '.$_POST['demo_website_link'].' <br/><br/>

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
$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
              
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
$mail->AddAddress($_POST['email']);

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
   //echo "Mailer Error: " . $mail->ErrorInfo;
   
 $output = json_encode(array('type'=>'error', 'text' => 'Could not send mail! Please check your PHP mail configuration.'));
		die($output);
}  

 else {

     
$str=mysql_query("INSERT INTO sociacir_emailcrm.user_authentication_details(id,fname,lname,email,phone,business_name,demo_website_link,contact_date,verified,status) VALUES ('','".$_POST['fname']."','".$_POST['lname']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['business_name']."','".$_POST['demo_website_link']."',now(),'".$activation."','0')");

$last_inserted_id=mysql_insert_id();  

             // if there are no errors, return a message
               
}
    
##################### Mail sending Code end Here ##################

                $output['success'] = true;
		$output['result'] = 'Mail Send!';
		
		
}
 
	// return all our data to an AJAX call
	echo json_encode($output);

      