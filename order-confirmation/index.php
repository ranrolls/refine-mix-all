<?php


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
				'user_fname'		: $('input[name=fname]').val(), 
				'user_lname'		: $('input[name=lname]').val(), 
				'user_email'	        : $('input[name=email]').val(),
                                'user_phone'	        : $('input[name=phone]').val(),  
                                'user_businessname'	: $('input[name=businessname]').val(), 
                                'user_package_name'	: $('input[name=package_name]').val()   
                                
                                
			};
            
            //Ajax post data to server
            $.post('contact_me.php', post_data, function(response){
                
                              // alert(response.text); exit;	                              
 
				 if(response.type == 'error'){ //load json data from server and output message     
					 output = '<div class="error">'+response.text+'</div>';
				 }

                              else{
                              // header('Location: 'http://socialcircle.marketing/order-confirmation/success.php');
                                   window.location.href = 'success.php';  
				      
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

<style type="text/css">#sucess_mail{ color:#ff0000; margin-top:5px;}</style>


<!-- ---------- text editor ------------- -->

<link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet" type="text/css" />
	<link href="external/google-code-prettify/prettify.css" rel="stylesheet"  type="text/css"/>
    <link href="styles/style.css" rel="stylesheet" type="text/css" />
  
	<script src="external/jquery.hotkeys.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<script src="external/google-code-prettify/prettify.js"></script>
	<script src="src/bootstrap-wysiwyg.js"></script>
 

  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>

 <style>

body {
	font-family: "Trebuchet MS", "Helvetica", "Arial",  "Verdana", "sans-serif";
	font-size: 62.5%;
}

</style>

<!-- ---------- text editor ------------- -->
</head>
<body>
<div id="root">
  <header id="top">
    <h1><a href="index.php" accesskey="h"><img src="images/logo.png" alt="logo"></a></h1>
    <nav id="nav">
      <ul>
        <li style="padding-top:8px; color:#fff; ">customized facebook apps & Social Media Campaigns</li>
      

      </ul>
    </nav>
  </header>
  <article id="welcome">
   <div class="form_box container center-block">
   
   <div class="col-lg-6 center-block " style="float:none"  id="contact_form"><div class="row">
     
   <div class="col-lg-6"><input type="text" name="fname" id="fname" required="true" value=""  placeholder="First Name" class="input-field"></div>
   <div class="col-lg-6"><input type="text" name="lname"  id="lname" required="true" value="" placeholder="Last Name" class="input-field"></div>
				 
<div class="clearfix"></div>
   <div class="col-lg-12"><input type="email" name="email" required="true" value="" placeholder="Email ID" class="input-field"></div>
   <div class="col-lg-12"><input type="text" name="businessname" required="true" value="" placeholder="Business Name" class="input-field"></div>
   <div class="col-lg-12"><input type="text" name="phone" required="true" value="" placeholder="Phone No." class="input-field"></div>
<!--<div class="col-lg-12">  
<input type="text" required="true" id="datepicker">
</div>-->
<!--<div class="col-lg-12">  
 <select name="package_name" required="true">
  <option value="" disabled="disabled" selected="selected">Please select a Package</option>
  <option value="Social Circle Web package,$1 for the first month, $99 monthly">Social Circle Web package, $1 for the first month, $99 monthly</option>

  <option value="Social Circle Facebook Apps, $1 for the first month, $99 monthly">Social Circle Facebook Apps, $1 for the first month, $99 monthly</option>

</select>
</div>--> <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
 <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
<div class="clearfix"></div>
   <div class="col-lg-12"><input type="submit" name="submit" id="submit_btn"  value="Send E-mail">  </div>
    <h5 class=" sucess_mail" id="sucess_mail"></h5>
   
   </div></div> 
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