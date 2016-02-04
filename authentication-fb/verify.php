<?php


include_once('config.php');
 
############### Mail Sending Close ######################
$code                 = $_REQUEST['code']; 
 
$userefname=$_REQUEST['fname'];
$userelname=$_REQUEST['lname'];
$useremail =$_REQUEST['email'];
$userephone=$_REQUEST['phone'];

$business_name        = $_REQUEST['business_name'];
$demo_website_link    = $_REQUEST['demo_website_link'];



$msg='';
	
$c	= mysql_query("SELECT * FROM user_authentication_details WHERE verified='$code'");
				
$r = mysql_num_rows($c);
if($r > 0)
{ 
if($rows_username = mysql_fetch_array($c)){
$email = $rows_username['email'];
}
					  				   
$count	= mysql_query("SELECT * FROM user_authentication_details WHERE verified='$code' and status='0'");
				
$r = mysql_num_rows($count);

if($r == 1)
{  



mysql_query("UPDATE user_authentication_details SET status='1' WHERE verified='$code'");


############Mail Sending Code#################
     
require_once('PHPMailer/_acp-ml/phpmailer/class.phpmailer.php');
  
$mail             = new PHPMailer();

$body             = '  
                       Dear '.$userefname.' ,  <br/><br/>
 <b>Thank you for your order!</b><br><br>

Your order is now being processed and we will notify you when it is ready. We will send you a separate notification once your order is ready for review.<br><br>

We hereby confirm acceptance on said order subject only to the following exceptions: <br><br>

<b>Order Summary</b><br><br>

<b>Business Name:</b> '.$business_name.' <br/> 
<b>Website :</b> '.$demo_website_link.'<br/>
<b>Contact Person:</b> '.$userefname.' '.$userelname.'<br/>
<b>Email:</b> '.$useremail.' <br/>
<b>Phone:</b> '.$userephone.' <br/><br/>

 
On exceptions described above, we shall assume you agree to same unless you communicate with us within 7 business days of receipt of this notice to discuss any objection you may have.<br><br>
 
Please feel free to get in touch with me in case of any questions or visit our website for more information.<br/><br/>

Best Wishes,<br/>

Judy Cooper<br/>
Client Success Team<br/>
 <br/>
';
 

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
//$mail->AddCC("vishal.k@refine-interactive.com", "Vishal");

$mail->Subject    ='Social Circle Marketing - Order Acceptance';
 
//echo $body;

$mail->MsgHTML($body); 
$mail->AddAddress($useremail);

 $user_att = 'user_pdf/socialcircle_order_acceptance_'.$userefname.'.pdf';

 $mail->AddAttachment($user_att);      // attachment

//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
  //echo "Mailer Error: " . $mail->ErrorInfo;
   echo "<script>
 alert('Mail Not Send.');
      
 </script>";

}  
else {
  echo "<script>
		// alert('Your email address has been verified.  Enjoy using Social Circle Marketing!');
		   window.location.href='http://socialcircle.marketing/authentication/thankyou.php';
		   </script>";                    
}	


}


}

?>

<!doctype html>
<html lang="en" class="theme-b has-gradient has-pattern">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Social Circle - customized facebook apps & Social Media Campaigns</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="HandheldFriendly" content="true">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=0.9, maximum-scale=0.9, user-scalable=no, target-densitydpi=device-dpi">
<script src="javascript/head.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" media="screen" href="styles/screen.css" type="text/css" >
<link rel="stylesheet" media="print" href="styles/print.css" type="text/css" >
<link rel="stylesheet" type="text/css" media="print" href="styles/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css" >
<link rel="stylesheet" href="icon-fonts/font-awesome-4.3.0/css/font-awesome.min.css" type="text/css" />
<link rel="icon" type="image/x-icon" href="images/favicon2.ico">
<style type="text/css">
#sucess_mail { color: #ff0000; margin-top: 5px; }
#welcome p {
    text-align: left;
}
</style>

<!-- ---------- text editor ------------- -->

<link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="external/google-code-prettify/prettify.css" rel="stylesheet"  type="text/css"/>
<link href="styles/style.css" rel="stylesheet" type="text/css" />
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="external/google-code-prettify/prettify.js"></script>
<script src="src/bootstrap-wysiwyg.js"></script>

<!-- ---------- text editor ------------- -->
</head>
<body>
<div id="root">
  <article id="welcome">
   <div class="form_box container center-block">
      <div class="col-lg-6 center-block " style="float:none"  id="contact_form">
        <div class="row">
         
      
      </div>
    </div>
  </article>
  <footer id="footer">
    <p style="margin-top:0px;">&copy; <span class="date">2015</span> Social Circle. All rights reserved. <!--<a href="./">Privacy Policy</a> <a href="./">Terms of Service</a>--></p>
  </footer>
</div>

  <div class="md-card-content">
    <div class="uk-grid" data-uk-grid-margin="">
      <div class="uk-width-1-1">
        <div class="uk-overflow-container">
           Thank You For Validate Your Account.
        </div>
      </div>
    </div>
  </div>
   
  <br/>
  <br/>

</body>
</html>

