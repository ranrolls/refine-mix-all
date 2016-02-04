<?php
session_start();

include_once('config.php');

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Social Circle Form</title>

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
                                'user_phone'             : $('input[name=phone]').val()   
                                
			};
            
            //Ajax post data to server
            $.post('contact_me.php', post_data, function(response){  
				if(response.type == 'error'){ //load json data from server and output message     
					output = '<div class="error">'+response.text+'</div>';
				}else{
                                      alert(response);
				    output = '<div class="success">'+response.text+'</div>';
					//reset values in all input fields
					$("#contact_form  input[required=true], #contact_form textarea[required=true]").val(''); 
					$("#contact_form #contact_body").slideUp(); //hide form after success
				}
				$("#contact_form #contact_results").hide().html(output).slideDown();
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
</head>

<body>

  <header id="top"> 
    <nav id="nav">
      <ul> 
 <li class="a"><?php echo $_SESSION['username'].' '. $_SESSION['userType'];?></li> <br/><br/>
 <li><a href="logout.php?action=logout">Logout</a></li>
      </ul>
    </nav>
  </header>

<div class="form-style" id="contact_form">
    <div class="form-style-heading"></div>
    
    <div id="contact_results"></div>
    <div id="contact_body">
        <label><span>First Name <span class="required">*</span></span>
            <input type="text" name="fname" id="fname" required="true" class="input-field"/>
        </label>
		<label><span>Last Name <span class="required">*</span></span>
            <input type="text" name="lname" id="lname" required="true" class="input-field"/>
        </label>
		 <label><span>Email <span class="required">*</span></span>
            <input type="email" name="email" required="true" class="input-field"/>
        </label>
		        
        <label for="field5"><span>Phone<span class="required">*</span></span>
            <input type="text" name="phone" required="true" class="input-field"/>
        </label>
		
       <label for="field5"><span>Business Name<span class="required">*</span></span>
            <input type="text" name="business_name" required="true" class="input-field"/>
        </label>
      
            <label for="field5"><span>Website<span class="required">*</span></span>
            <input type="text" name="demo_website_link" required="true" class="input-field"/>
        </label>

           

        <label>
            <span>&nbsp;</span><input type="submit" id="submit_btn" value="Submit" />
        </label>
    </div>
</div>

</body>
</html>
