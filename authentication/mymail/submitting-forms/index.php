<?php

include_once('config.php');
 session_start();
 
 ######### DB Connection #############
$msg = '';
					
 if (isset($_POST['login']) && !empty($_POST['login_username']) && !empty($_POST['login_password'])) {
	   				
	 $myusername 							= $_POST['login_username'];
	 $encrypted_mypassword	                                    = $_POST['login_password'];
  $query = "select * from user_authentication where username='".$myusername."' AND password= '".$encrypted_mypassword."'  ";
  $result=mysql_query($query);
  $rest= mysql_num_rows($result);
  if($rest>0){
         while($row=mysql_fetch_assoc($result)){

                                  $username     =  stripslashes($row['username']);
				  $password	   = $row['password'];	
				  $userType	  = $row['userType']; 
                }	 
              } 
           
        else {
	       echo "No Records";
            }

 if ($myusername == $username && $encrypted_mypassword == $password && $userType=='auth') {	

    $_SESSION['username'] = $username;
    $_SESSION['userType'] = $userType;
				
         header('Location: dashboard.php');
     } 

   
       else {
          $msg = 'Incorrect username or password';	
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

<link href="style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" media="screen" href="styles/screen.css" type="text/css" >
<link rel="stylesheet" media="print" href="styles/print.css" type="text/css" >
<link rel="stylesheet" type="text/css" media="print" href="styles/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css" >
<link rel="stylesheet" href="icon-fonts/font-awesome-4.3.0/css/font-awesome.min.css" type="text/css" />
<link rel="icon" type="image/x-icon" href="images/favicon2.ico">

 
</head>
 

<body class="login_page">
<div class="login_page_wrapper">
  <div class="md-card" id="login_card">
    <div class="md-card-content large-padding" id="login_form">
      <div class="login_heading">
        <div class="user_avatar"></div>
      </div>

 <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

      	<h4 class="form-signin-heading" style="color:#fd0000;"><?php echo $msg; ?></h4>
   
        <div class="uk-form-row">
          <label for="login_username">Username</label>
          <input class="md-input" type="text" id="login_username" name="login_username" />
        </div>
        <div class="uk-form-row">
          <label for="login_username">Password</label>
          <input class="md-input" type="password" id="login_username" name="login_password" />
        </div>
        <div class="uk-margin-medium-top">
       
 <button class="md-btn md-btn-primary md-btn-block md-btn-large" type="submit" name="login">Sign In</button> 
        </div>
        <div class="uk-margin-top"> 
          <!--<span class="icheck-inline">
                            <input type="checkbox" name="login_page_stay_signed" id="login_page_stay_signed" data-md-icheck />
                            <label for="login_page_stay_signed" class="inline-label">Stay signed in</label>
                        </span>--> 

            


        </div>
      </form>
    </div>
    <div class="md-card-content large-padding uk-position-relative" id="login_help" style="display: none">
      <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top" id="login_help_close"></button>
      <h2 class="heading_b uk-text-success">Can't log in?</h2>
      <p>Here’s the info to get you back in to your account as quickly as possible.</p>
      <p>First, try the easiest thing: if you remember your password but it isn’t working, make sure that Caps Lock is turned off, and that your username is spelled correctly, and then try again.</p>
      <p>If your password still isn’t working, it’s time to <a href="#" id="login_password_reset_show">reset your password</a>.</p>
    </div>
    <div class="md-card-content large-padding" id="login_password_reset" style="display: none">
      <h2 class="heading_a uk-margin-large-bottom">Reset password</h2>
      <form action="">
        <div class="uk-form-row">
          <label for="login_email_reset">Your email address</label>
          <input class="md-input" type="text" id="login_email_reset" name="login_email_reset" />
        </div>
        <div class="uk-margin-medium-top">
          <button class="md-btn md-btn-primary md-btn-block">Reset password</button>
        </div>
      </form>
    </div>
  </div>
  <!-- <div class="uk-margin-top">
            <a href="#" id="login_help_show">Need help?</a>
        </div>--> 
</div>

<!-- common functions --> 
<script src="assets/js/common.min.js"></script> 
<!-- altair core functions --> 
<script src="assets/js/altair_admin_common.min.js"></script> 

<!-- altair login page functions --> 
<script src="assets/js/pages/login_page.min.js"></script>
</body>
</html>