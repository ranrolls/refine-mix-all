
<?php

$user_fname		= 'vishal';
$user_lname		= 'kumar';
$user_email		= 'vishal.k@refine-interactive.com';
$user_business_name     = 'Test';
$user_demo_website_link = 'www.google.com';
$user_phone = '9654165988';



    $my_html='  
				 
 Dear '.$user_fname.' '.$user_lname.' ,  <br/><br/>

Thank you for signing up with Social Circle Web. I am Judy Cooper, your account manager from the client success team. We appreciate your confidence and look forward to working together with you to provide a stronger online presence for your business. Please review the details of your business information and subscription below:<br/><br/>

<b>Business Name:</b> '.$user_business_name.' <br/> 
<b>Website :</b> '.$user_demo_website_link.'<br/>
<b>Contact Person:</b> '.$user_fname.' '.$user_lname.'<br/>
<b>Email:</b> '.$user_email.' <br/>
<b>Phone:</b> '.$user_phone.' <br/><br/>

Here is what you get with Social Circle Web: <br/>

- Responsive and mobile friendly website <br/>
- Content Management System to easily edit and manage content <br/>
- Website Hosting <br/>
- SEO -(Search Engine Optimization) - To get your business found online <br/>
- Social Media Setup - Facebook, Twitter, etc<br/><br/>

Our team of experts have commenced the first step of creating the look and feel of your new business website that will work seamlessly on all devices including smart phones and tablets. In parallel, our SEO team will also research and recommend the most suitable keywords to get increased traffic. I will keep you posted and share the demo link for your approval. <br/><br/>

  
Please feel free to get in touch with me in case of any questions or visit our website for more information.<br/><br/>

Best Wishes,<br/>

Judy Cooper<br/>
Client Success Team<br/>
 <br/>

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

$content =  $my_html.'<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>'.$terms_condition;


require_once(dirname(__FILE__).'/html2pdf-master/html2pdf.class.php'); 

 

    $html2pdf = new HTML2PDF('P','A4','fr');
    
    $html2pdf->WriteHTML($content);

     $filename= 'user_pdf/socialcircle_order_acceptance_'.$user_fname.'.pdf';
      $fileoutput= $filename;

    $html2pdf->Output($fileoutput,'F');
	
	
	
?>	