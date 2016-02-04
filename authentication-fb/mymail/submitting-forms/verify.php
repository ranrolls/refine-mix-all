<?php


include_once('config.php');

############Mail Sending Code#################

if($_POST['sendconfirm']){
	 
$useremail =$_POST['email'];
$agree     = $_POST['agree'];
$userefname=$_POST['fname'];
$userelname=$_POST['lname'];
$userephone=$_POST['phone'];


	 
require_once('PHPMailer/_acp-ml/phpmailer/class.phpmailer.php');
  
$mail             = new PHPMailer();

$body             = '  
                     <tbody>
	                <tr>  
		       <td>
				<p style="margin-left:10px;font-family:verdana;font-size:12px">
				<br>
				Dear '.$userefname.' '.$userelname.' ,</p><br/><br/>				
				 
				 Greetings, <br/>

                              Welcome to Social Circle Marketing.<br/><br/>

                               You have Agreed terms & conditions.your request with Social Marketing. 
				<br>
				<p style="margin-left:10px;font-family:verdana;font-size:12px">Regards,<br><br>
				<a href="" style="color:#42739e;font-weight:bold" target="_blank">Social Circle Marketing</a>
				<br>Social Circle Marketing team<br>
				<br>
				<br>
				</p>
				</td>
			</tr>
			</tbody>
';
 

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
//$mail->AddCC("vishal.k@refine-interactive.com", "Vishal");

$mail->Subject    ='Verification Mail Send to User';
 
//echo $body;

$mail->MsgHTML($body); 
$mail->AddAddress($useremail);

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
  //echo "Mailer Error: " . $mail->ErrorInfo;
   echo "<script>
 alert('Mail Not Send.');
      
 </script>";

}  
else {
  echo "<script>
		 alert('Your email address has been verified.  Enjoy using Social Circle Marketing!');
		   window.location.href='http://socialcircle.marketing/authentication/mymail/submitting-forms/';
						</script>";                    
}	

  
}

  
############### Mail Sending Close ######################
$code                 = $_REQUEST['code'];
$fname                = $_REQUEST['fname'];
$lname                = $_REQUEST['lname'];
$useremail            = $_REQUEST['email'];
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


<form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
  
 <div class="md-card-content">
        <div class="uk-grid" data-uk-grid-margin="">
          <div class="uk-width-1-1">
            <div class="uk-overflow-container">
   
              <table class="uk-table">
                <thead>
                  <tr>
                    <th>Id</th> 
                   <th>First Name</th>
                  <th>Last Name</th>
                    <th>Email </th>
                    <th>Phone No.</th>
                    <th>Business name</th>
                    <th>Website</th>
                      <th>Contact Date</th>
                    
                  </tr>
                </thead>
  
                     <tbody> 
                     <tr> 
                         <td><?php echo $rows_username['id'];?></td> 
                          <td><?php echo $rows_username['fname'];?></td> 
                          <td><?php echo $rows_username['lname'];?></td>
                          <td><?php echo $rows_username['email'];?></td>
                          <td><?php echo $rows_username['phone'];?></td>
                        <td><?php echo $rows_username['business_name'];?></td>
                         <td><?php echo $rows_username['demo_website_link'];?></td>
                         <td><?php echo $rows_username['contact_date'];?></td>
                           
                     </tr>

<input type="hidden" name="fname" id="fname"  value="<?php echo $rows_username['fname'];?>">
 <input type="hidden" name="lname" id="lname"  value="<?php echo $rows_username['lname'];?>">
 <input type="hidden" name="email" id="email"  value="<?php echo $rows_username['email'];?>">
 <input type="hidden" name="business_name" id="business_name"  value="<?php echo $rows_username['business_name'];?>">
  
                     </tbody>    
              </table>
              
            </div>
            
          </div>
        </div>
      </div> 
      
      <div class="uk-width-large-1">
       <label for="agree">I Agree</label>
                           <input type="checkbox" name="agree" value="Agreed" checked>   
      </div><br/><br/>
 <div class="uk-width-large-1">
       <input name="sendconfirm" id="sendconfirm" class="md-btn md-btn-primary" style="float:right;" value="SEND MAIL" type="submit"> 
        </div>

</form>


</body>

</html>

<?php
 		 		 
}   
		     
	   $msg="Your account is activated"; 
						  
				} 
				else
				{
				$msg ="Your account is already active, no need to activate again";
				} 
			 
				 

			//echo $msg; 
	   		 

?>