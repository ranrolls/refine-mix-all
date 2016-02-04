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
$user_demo_website_link =  $_POST["user_demo_website_link"];
$user_phone = $_POST["user_phone"];

$user_address = filter_var($_POST["user_address"], FILTER_SANITIZE_STRING);
	
 $dated= $_POST['user_date_of_order'];

############## Generate PDF ######################################
 
 

 /*$my_html='<br/><br/>To,<br/><br/>'.$user_fname.' '.$user_lname.' <br/> '.$user_business_name.'<br/>'.$user_address.'
<br/><br/><br/><br/>Dear '.$user_fname.' ,<br/><br/> 
Thank you for signing up with Social Circle Marketing on '.$dated.'. I am Judy Cooper, your account manager from the client success team. We appreciate your confidence and look forward to working together with a customized Facebook app for your business. Please review the details of your business information and subscription below:<br/><br/>

<b>Business Name:</b> '.$user_business_name.' <br/> 
<b>Package:</b> Social Circle Facebook Apps, $1 for the first month, $99 monthly thereafter <br/>
<b>Contact Person:</b> '.$user_fname.' '.$user_lname.'<br/>
<b>Email:</b> '.$user_email.' <br/>
<b>Phone:</b> '.$user_phone.' <br/>
<b>Address:</b> '.$user_address.' <br/><br/>
 
Our team of experts have commenced the first step of creating the look and feel of your new customized Facebook app for your business. I will keep you posted and share the design concept for your approval.<br/><br/>  
  
We look forward to serving you as a valuable customer. For more information on the subscription please visit <a href="http://socialcircle.marketing">www.socialcircle.marketing</a>, terms & conditions of your subscription are available on <a href="http://socialcircle.marketing/terms_conditions">T&C</a>. For any reason if you wish to discontinue with our services, please send us an email on <a href="mailto:cancellations@socialcircle.marketing">cancellations@socialcircle.marketing</a> within 30 days to cancel your subscription.<br/><br/>

Best Wishes,<br/><br/>

Social Circle Marketing<br/>
Client Success Team<br/>
<a href="http://socialcircle.marketing" style="color:#42739e;font-weight:bold" target="_blank">Social Circle Marketing</a><br/>

  ';


 


$terms_condition= '<b>Terms & Conditions</b><br/><br/>

When a customer, generally a small business, which may be an LLC, corporation, partnership, or sole
proprietorship, agrees to service from Social Circle the following Terms and Conditions apply:<br/><br/>

<b>1. Charges:</b> Charges consist of an initial fee followed by a recurring monthly charge. At sign up, only the
initial fee is charged. Recurring amounts are billed monthly, rate plans vary depending upon the sevices
included. All existing customers regardless of rate plan are paying for a month to month subscription
with no contracted or required term.<br/>
<b>2. Authorization & Approval :</b>The customer agrees to provide Social Circle with all required credentials,
verification and authorization to deploy and promote their business Facebook application on behalf of
the customer. The customer also agrees to be responsive to Social Circle requests in a reasonable
period of time, and acknowledges if they are not, it may affect performance of such products.
Social Circle will make reasonable effort to follow up with the customer and send reminders however
Social Circle will not be responsible for any delays caused in delivering or promoting the Facebook
Application to the customer. Social Circle will only proceed after approval from the customer and not be
liable for any delays caused.<br/>
<b>3. Agreement Term, Cancellation and Refunds:</b> Customers have agreed to the term of the agreement
for the rate plan which they select. Social Circle will not issue refunds for services already rendered, but
exceptions may be made on a case-by-case basis. When requesting a refund, the customer must
contact Customer Service at cancellations@socialcircle.marketing (mailto:cancellations@socialcircle.marketing)
and each case will be reviewed. Refunds are not guaranteed and if one is granted, it will only be granted
on a prorated basis. Social Circle cannot and does not guarantee a return of investment (ROI).<br/>
<b>4. No Liability:</b> Social Circle, its suppliers, affiliates, officers, directors, employees, subsidiaries, and
assigns, shall not be liable for any damages whatsoever, including, without limitation, direct or indirect
damages for loss of business profit, personal injuries, business interruptions, state licensing
requirements, city ordinances, business information loss, or any other loss resulting from the use or
inability to use Social Circle s products. The maximum liability shall be limited to the amount actually
paid for the services provided.<br/>
<b>5. Indemnity:</b> Customer shall indemnify and hold Social Circle, its successors, suppliers, affiliates,
officers, directors, employees, subsidiaries, and assigns harmless from any liability or loss resulting from
any judgments or claims against Customer.<br/>
<b>6. Customer Disclosure:</b> The customer agrees to inform Social Circle, in writing of any internet
advertising campaigns it has performed or is performing prior to agreeing to service. Failure to disclose
this information may compromise the services provided by Social Circle. Customer further agrees that
they will only use Social Circle service for lawful purposes only.<br/>
<b>7. Cancellation of Services:</b> If customer wishes to cancel their service, they must email at
cancellations@socialcircle.marketing (mailto:cancellations@socialcircle.marketing) and request to Cancle the
subscription before the next monthly recurring charge.<br/>
<b>8. Respect of Intellectual Property:</b> The customer agrees to respect all trademarks, copyrights and any
other intellectual property. Customer certifies it owns or has permission to use any image uploaded or
otherwise provided to Social Circle.<br/>
<b>9. Terms and Conditions:</b> Social Circle may change its terms and conditions without prior notice, at its
sole discretion. To document your terms and conditions for your service, we recommend that you print
these terms and conditions and store them in a file or electronically.<br/>
<b>10. Authority to Sign:</b> The person agreeing to service on behalf of the customer hereby represents and
warrants that he or she has the authority, and ability, to act on behalf of the customer.<br/><br/>
© 2015 Social Circle. All rights reserved.
';

$weblink= '<a href="http://socialcircle.marketing">www.socialcircle.marketing</a>';

$content = $my_html.'<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>'.$weblink.'<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>'.$terms_condition;


require_once(dirname(__FILE__).'/html2pdf-master/html2pdf.class.php'); 

 

    $html2pdf = new HTML2PDF('P','A4','fr');
   // $html2pdf = new HTML2PDF('P', 'A4', 'fr', true, 'UTF-8', 0);
    $html2pdf->WriteHTML('<img src="http://socialcircle.marketing/authentication-fb/user_pdf/logo.jpg">');
    $html2pdf->WriteHTML($content);
   
 
 
   $a = explode(" ", $user_business_name );

// output without final comma
$new_pantry= implode("_", $a );
   
  
     $filename= 'user_pdf/SocialCircle_Order_Confirmation_'.$new_pantry.'.pdf';
     $fileoutput= $filename;
     
     
    $html2pdf->Output($fileoutput,'F'); */
    
 
 
 
######### End Here ##########################
 
  
//$activation= md5($user_email.time()); // encrypted email+timestamp 

$user_email1= 'judy.cooper@socialcircle.biz';
 
  

//$maildet= 'http://socialcircle.marketing/authentication/verify.php?code='.$activation.'&fname='.$user_fname.'&lname='.$user_lname.'&email='.$user_email.'&business_name='.$user_business_name.'&phone='.$user_phone.'&demo_website_link='.$user_demo_website_link.'';     


###################Pre Request Booking Date based on user email id ######################################### 
	
$datquery= "select * from user_authentication_fb_details where email='".$user_email."'";
$res= mysql_query($datquery);
  
while($finaldate= mysql_fetch_assoc($res)){

$follow1_book_date=$finaldate['contact_date'];

}


   
############################################################ 
	


 
	 
require_once('PHPMailer/_acp-ml/phpmailer/class.phpmailer.php');

  
$mail             = new PHPMailer();

$body             =' 
                    <tbody>
	                <tr>  
		       <td>
				<p style="margin-left:10px;font-family:verdana;font-size:12px">

Hi '.$user_fname.',<br/><br/>
Our creative design team has put together the look and feel of the new Facebook App for '.$user_business_name.'. Please review from links below and provide your feedback and approval. <br/><br/>
  
<b>'.$user_business_name.'</b> - <a href="'.$user_demo_website_link.'">'.$user_demo_website_link.'</a><br/><br/>
I am sure you are as excited as we are to launch the new Facebook App for '.$user_business_name.'. All you have to do is authorize Social Circle to integrate the Facebook App on your official Facebook Page. It only takes a minute and is safe. Please follow the simple steps highlighted on the link below:<br/><br/>
Instructions to authorize access to Facebook Page:<br/>
<a href="http://socialcircle.marketing/facebook-apps-instructions/">http://socialcircle.marketing/facebook-apps-instructions</a> <br/>

 <br/>

Please let me know if we can provide further assistance in launching your Facebook App. <br/><br/>

Best Wishes,<br/><br/>

Social Circle Marketing<br/>
Client Success Team<br/>
<a href="http://socialcircle.marketing" style="color:#42739e;font-weight:bold" target="_blank">Social Circle Marketing</a>
<br/><br/>
---------------------------------------------
<br/><br/>			 <br>
				 Dear '.$user_fname.',<br/><br/> 

Thank you for signing up with Social Circle Marketing on '.$follow1_book_date.'. I am Judy Cooper, your account manager from the client success team. We appreciate your confidence and look forward to working together with a customized Facebook app for your business. Please review the details of your business information and subscription below:<br/><br/>
 
<b>Business Name:</b> '.$user_business_name.' <br/> 
<b>Package:</b> Social Circle Facebook Apps, $1 for the first month, $99 monthly thereafter <br/>
<b>Contact Person:</b> '.$user_fname.' '.$user_lname.'<br/>
<b>Email:</b> '.$user_email.' <br/>
<b>Phone:</b> '.$user_phone.' <br/>
<b>Address:</b> '.$user_address.' <br/><br/>
  
Our team of experts have commenced the first step of creating the look and feel of your new customized Facebook app for your business. I will keep you posted and share the design concept for your approval.<br/><br/>  

We look forward to serving you as a valuable customer. For more information on the subscription please visit <a href="http://socialcircle.marketing">www.socialcircle.marketing</a>, terms & conditions of your subscription are available on <a href="http://socialcircle.marketing/terms_conditions">T&C</a>. For any reason if you wish to discontinue with our services, please send us an email on <a href="mailto:cancellations@socialcircle.marketing">cancellations@socialcircle.marketing</a> within 30 days to cancel your subscription.<br/><br/>

  
Social Circle Marketing<br/>
Client Success Team<br/>
<a href="http://socialcircle.marketing">www.socialcircle.marketing</a>

<br/>

 		 
				</td>
			</tr>
			</tbody>

          
                  ';


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


$region_email_id='clientsuccess@socialcircle.marketing';

$mail->setFrom($region_email_id, "Social Circle Marketing");
$mail->SMTPSecure = 'ssl';

//$mail->SMTPSecure = 'tls';
  
$mail->AddReplyTo($region_email_id, "Social Circle Marketing");

//$mail->AddBCC("yogendra.paul@refine-interactive.com", "Social Circle Marketing");

$mail->AddCC("orders@socialcircle.marketing", "Social Circle Marketing");


$mail->Subject    ='Attn: Facebook App for '.$user_business_name.'';
  

$mail->MsgHTML($body); 
$mail->AddAddress($user_email);

 $a1 = explode(" ", $user_business_name);

// output without final comma
$new_pantry1= implode("_", $a1);
   
  
    $filename1= 'user_pdf/SocialCircle_Order_Confirmation_'.$new_pantry1.'.pdf';
    $fileoutput1= $filename1;

//$mail->AddAttachment($fileoutput1);      // attachment


if(!$mail->Send()) {
   //echo "Mailer Error: " . $mail->ErrorInfo;
   
 $output = json_encode(array('type'=>'error', 'text' => 'Could not send mail! Please check your PHP mail configuration.'));
		die($output);
}  
else {
      
/*$str=mysql_query("INSERT INTO sociacir_emailcrm.user_authentication_fb_details(id,fname,lname,email,phone,date_of_order,address,business_name,demo_website_link,contact_date,verified,status) VALUES ('','".$user_fname."','".$user_lname."','".$user_email."','".$user_phone."','".$dated."','".$user_address."','".$user_business_name."','".$user_demo_website_link."',now(),'".$activation."','1')");

$last_inserted_id=mysql_insert_id();  */


$follow1_date= date("j F Y");
 
$sql_follow_status = "UPDATE user_authentication_fb_details SET demo_website_link='".$user_demo_website_link."',
                   follow1_order_confirm_status='YES',follow1_date='".$follow1_date."'
                        WHERE email= '".$user_email."'";
		        mysql_query($sql_follow_status);




$output = json_encode(array('type'=>'message', 'text' => 'Hi '.$user_fname.' '.$user_lname.' Thank you for your email.'));
die($output);             

  

}	
  
	
	 
}
 #######################################
  
 

?>