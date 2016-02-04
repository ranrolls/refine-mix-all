<?php

session_start();

include_once('config.php');

// 29 Oct 2015
 

// Prints the day, date, month, year, time, AM or PM
//echo date("j F Y") . "<br>";

// Prints October 3, 1975 was on a Friday
//echo "Oct 3,1975 was on a ".date("l", mktime(0,0,0,10,3,1975)) . "<br>";

// Use a constant in the format parameter
//echo date(DATE_RFC822) . "<br>";

// prints something like: 1975-10-03T00:00:00+00:00

//echo date(DATE_ATOM,mktime(0,0,0,10,3,1975));
 


 if($_POST)
 {

  $to_email   	= $_POST["email"];  
 
  $str=mysql_query("select * from user_authentication_details where email='".$to_email."' "); 
  $row = mysql_fetch_assoc($str);

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
<script type="text/javascript">

$(document).ready(function() {
    $("#submit_btn").click(function() { 
       
	    var proceed = true;
        //simple validation at client's end
        //loop through each field and we simply change border color to red for invalid fields		
		$("#contact_form input[required=true], #contact_form textarea[required=true]").each(function(){
			$(this).css('border-color',''); 
			if(!$.trim($(this).val())){ //if this field is empty 
				$(this).css('border-color','red'); //change border color to red   
				proceed = false; //set do not proceed flag
			}
			//check invalid email
			var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
			if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
				$(this).css('border-color','red'); //change border color to red   
				proceed = false; //set do not proceed flag				
			}	
		});
       
        if(proceed) //everything looks good! proceed...
        {
			//get input field values data to be sent to server
            post_data = {
				'user_fname'		 : $('input[name=fname]').val(), 
				'user_lname'		 : $('input[name=lname]').val(), 
				'user_email'	         : $('input[name=email]').val(),
                                'user_business_name'	 : $('input[name=business_name]').val(),
                                'user_demo_website_link' : $('input[name=demo_website_link]').val(),
                                'user_phone'             : $('input[name=phone]').val(),
                                'user_address'           : $('input[name=address]').val(),
                                'user_date_of_order'     : $('input[name=date_of_order]').val()
                                

                                
			};
            
 
 //Ajax post data to server

            $.post('reminder_contact_me.php', post_data, function(response){  

                   
				if(response.type == 'error'){ //load json data from server and output message     
					output = '<div class="error">'+response.text+'</div>';
				}else{
                                       
                                    window.location.href = 'reminder_success.php'; 

				    //output = '<div class="success">'+response.text+'</div>';
					//reset values in all input fields
					$("#contact_form  input[required=true], #contact_form textarea[required=true]").val(''); 
					$("#contact_form #contact_body").slideUp(); //hide form after success
				}
		//$("#contact_form #contact_results").hide().html(output).slideDown();
            }, 'json');
        }
    });
    
    //reset previously set border colors and hide all message on .keyup()
    $("#contact_form  input[required=true], #contact_form textarea[required=true]").keyup(function() { 
        $(this).css('border-color',''); 
        $("#result").slideUp();
    });
});



            
</script>
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
<script src="external/jquery.hotkeys.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="external/google-code-prettify/prettify.js"></script>
<script src="src/bootstrap-wysiwyg.js"></script>

<!-- ---------- text editor ------------- -->
</head>
<body>
<div id="root">
  <header id="top">
    <h1><a href="index.php" accesskey="h"><img src="images/logo.png" alt="logo"></a></h1>
    <nav id="nav">
      <ul>
        <li class="a"><?php echo $_SESSION['username'].' '. $_SESSION['userType'];?></li>
        <br/>
        <br/>
        <li><a href="logout.php?action=logout">Logout</a></li>
      </ul>
    </nav>
  </header>
  <article id="welcome">
    <div class="form_box container center-block">
      <div class="col-lg-6 center-block " style="float:none"  id="contact_form">
        <div class="row">

        <div class="clearfix"></div>
            <label style="font-size: large;">Reminder</label><br/>
       <form name="form1" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"  >
             
          <div class="col-lg-12">
            <input type="email" name="email" required="true" value="<?php echo htmlentities($row['email']) ?>" placeholder="Email ID" class="input-field">
          </div>
         <input type="submit" name="checkmail" value="Check Email"><br>
           </form>
   
<br/><br/>



          <div class="col-lg-6">
            <input type="text" name="fname" id="fname" required="true" value="<?php echo $row['fname'];?>"  placeholder="First Name" class="input-field">
          </div>
          <div class="col-lg-6">
            <input type="text" name="lname"  id="lname" required="false" value="<?php echo $row['lname'];?>" placeholder="Last Name" class="input-field">
          </div>
          <div class="clearfix"></div>
          <div class="col-lg-12">
            <input type="email" name="email" required="true" value="<?php echo $row['email'];?>" placeholder="Email ID" class="input-field">
          </div>
          <div class="clearfix"></div>
          <div class="col-lg-12">
           
            <input type="text" name="phone" required="true" value="<?php echo $row['phone'];?>" placeholder="Phone No" class="input-field">
          </div>
          <div class="col-lg-12">
            <input type="text" class="input-field" required="true" name="business_name"  value="<?php echo $row['business_name'];?>" placeholder="Business Name">
          </div>
          <div class="clearfix"></div>
          <div class="col-lg-12">
            <input type="text" class="input-field" required="true" name="demo_website_link"  value="<?php echo $row['demo_website_link'];?>" placeholder="Website">
          </div>
 <div class="col-lg-12">
            <input type="text" class="input-field" required="true" name="address"  value="<?php echo $row['address'];?>" placeholder="Address">
          </div>
          <div class="col-lg-12">
            <input type="text" class="input-field" required="true" name="date_of_order"  value="<?php echo $row['date_of_order'];?>" placeholder="Date">
          </div>
          

          <div class="clearfix"></div>
          <div class="col-lg-12">
            <input type="submit" name="submit" id="submit_btn"  value="Send E-mail">
          </div>
          <h5 class="sucess_mail" id="sucess_mail"></h5>
        </div>
      </div>
    </div>
  </article>
  <footer id="footer">
    <p style="margin-top:0px;">&copy; <span class="date">2015</span> Social Circle. All rights reserved. <!--<a href="./">Privacy Policy</a> <a href="./">Terms of Service</a>--></p>
  </footer>
</div>
<script> head.load('javascript/tf.js','javascript/scripts.js','javascript/mobile.js')</script> 
<script src="javascript/util.js"></script> 
<script src="javascript/lib.js"></script> 
<!-- 
<script src="javascript/jquery-1.js"></script> 
<script src="javascript/jquery.js"></script>
<script> head.load('javascript/jquery.js','javascript/tf.js','javascript/scripts.js','javascript/mobile.js')</script>

--> 

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-65377455-1', 'auto');
  ga('send', 'pageview');

</script> 

<!-- ----------  text Editor ke  liiye  ----------------------- -->

</body>
</html>