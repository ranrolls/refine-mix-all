<!--For User-->

<?php

$message = "

<!doctype html>

<html>

<head>

<meta charset='utf-8'>

<title> Conatct Form Mailer </title>

</head>

<body style='margin:0px; padding:0px;'>

<table width='100%' border='0' cellspacing='0' cellpadding='0'>

  <tbody>

    <tr><td>  

    <table width='550' border='0' cellspacing='0' cellpadding='0' style='border:1px solid #eaeaea; '>

  <tbody>



<tr><td height='50' bgcolor='#00aae6'> <table width='100%' border='0' cellspacing='0' cellpadding='0'>

  <tbody>

    <tr>

      <td width='10'> </td>

      <td><span style='font-size:16px;font-weight:bold; color:#fff'>Thank you for your enquiry.</span></td>

      <td width='10'> </td>

    </tr>

  </tbody>

</table>

</td></tr>

<tr><td height='10'></td></tr>

<tr><td><table width='100%' border='0' cellspacing='0' cellpadding='0'>

  <tbody>

    <tr>

      <td width='10'> </td>

      <td><span style='font-size:14px;font-weight:normal; color:#272727' >&nbsp; </span></td>

      <td width='10'></td>

    </tr>

  </tbody> 

</table>

</td></tr>

<tr><td height='10'></td></tr>

<tr><td><table width='100%' border='0' align='left' cellpadding='0' cellspacing='0'>

  
<tr bgcolor='#f5f5f5'><td width='10' height='50' > </td><td width='144'> <span style='font-size:14px;font-weight:bold;font-family:Arial,sans-serif; color:#272727' > Name </span></td><td width='10' style='border-left:1px solid #ccc;'> </td><td width='4'> </td><td width='320'>  <span style='font-size:14px;font-weight:normal;font-family:Arial,sans-serif; color:#272727' >".$_POST['name']."</span></td><td width='10'> </td></tr> 



<tr bgcolor='#f5f5f5'><td height='50' width='10' > </td><td > <span style='font-size:14px;font-weight:bold;font-family:Arial,sans-serif; color:#272727' >Email  </span></td><td style='border-left:1px solid #ccc;'> </td><td width='4'> </td><td>  <span style='font-size:14px;font-weight:normal;font-family:Arial,sans-serif; color:#272727' >".$_POST['email']."</span></td><td width='10'> </td></tr>
 


<tr bgcolor='#f5f5f5'><td height='50' width='10' > </td><td > <span style='font-size:14px;font-weight:bold;font-family:Arial,sans-serif; color:#272727' >phone</span></td><td style='border-left:1px solid #ccc;'> </td><td width='4'> </td><td>  <span style='font-size:14px;font-weight:normal;font-family:Arial,sans-serif; color:#272727' >".$_POST['phone']."</span></td><td width='10'> </td></tr>



<tr bgcolor='#f5f5f5'><td width='10' height='50' > </td><td width='144'> <span style='font-size:14px;font-weight:bold;font-family:Arial,sans-serif; color:#272727' > Message </span></td><td width='10' style='border-left:1px solid #ccc;'> </td><td width='4'> </td><td width='320'>  <span style='font-size:14px;font-weight:normal;font-family:Arial,sans-serif; color:#272727' >".$_POST['Message']."</span></td><td width='10'> </td></tr>       

<tr bgcolor='#f5f5f5'><td width='10' height='50' > </td><td width='144'> <span style='font-size:14px;font-weight:bold;font-family:Arial,sans-serif; color:#272727' > Checkin </span></td><td width='10' style='border-left:1px solid #ccc;'> </td><td width='4'> </td><td width='320'>  <span style='font-size:14px;font-weight:normal;font-family:Arial,sans-serif; color:#272727' >".$_POST['Checkin']."</span></td><td width='10'> </td></tr>

<tr bgcolor='#f5f5f5'><td width='10' height='50' > </td><td width='144'> <span style='font-size:14px;font-weight:bold;font-family:Arial,sans-serif; color:#272727' > Checkout </span></td><td width='10' style='border-left:1px solid #ccc;'> </td><td width='4'> </td><td width='320'>  <span style='font-size:14px;font-weight:normal;font-family:Arial,sans-serif; color:#272727' >".$_POST['Checkout']."</span></td><td width='10'> </td></tr>

<tr bgcolor='#f5f5f5'><td height='50' width='10' > </td><td > <span style='font-size:14px;font-weight:bold;font-family:Arial,sans-serif; color:#272727' >No. of Rooms  </span></td><td style='border-left:1px solid #ccc;'> </td><td width='4'> </td><td>  <span style='font-size:14px;font-weight:normal;font-family:Arial,sans-serif; color:#272727' >".$_POST['room']."</span></td><td width='10'> </td></tr>  



<tr bgcolor='#f5f5f5'><td width='10' height='50' > </td><td width='144'> <span style='font-size:14px;font-weight:bold;font-family:Arial,sans-serif; color:#272727' > Adults </span></td><td width='10' style='border-left:1px solid #ccc;'> </td><td width='4'> </td><td width='320'>  <span style='font-size:14px;font-weight:normal;font-family:Arial,sans-serif; color:#272727' >".$_POST['adults']."</span></td><td width='10'> </td></tr>    



<tr bgcolor='#f5f5f5'><td height='50' width='10' > </td><td > <span style='font-size:14px;font-weight:bold;font-family:Arial,sans-serif; color:#272727' >Children  </span></td><td style='border-left:1px solid #ccc;'> </td><td width='4'> </td><td>  <span style='font-size:14px;font-weight:normal;font-family:Arial,sans-serif; color:#272727' >".$_POST['children']."</span></td><td width='10'> </td></tr>






</table>

</td></tr>  

<tr><td></td></tr>  

<tr><td></td></tr>    

  </tbody>

</table>

  

    </td></tr>

  </tbody>

</table><br />







</body>

</html>



";



/*

<p style='font-size:14px; font-weight:normal; font-family:Arial,sans-serif; margin-top:5px; font-style:italic;' >* Social Circle strongly recommends to confirm the subscription </p>

*/



$to = $_POST['email'];

$subject = "New Facebook Enquiry  - Crib Rentals Rome";



// Always set content-type when sending HTML email

$headers = "MIME-Version: 1.0" . "\r\n";

$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";



// More headers

$headers .= 'From: <clientsuccess@socialcircle.marketing>' . "\r\n";

$headers .= 'Cc: <sales@socialcircle.marketing>'. "\r\n";

$headers .= 'Bcc: socialcirclebiz@gmail.com' . "\r\n";



mail($to,$subject,$message,$headers);

?>

<!--For Admin-->

<?php

$message = "

<!doctype html>

<html>

<head>

<meta charset='utf-8'>

<title> Contact Form Mailer </title>

</head>

<body style='margin:0px; padding:0px;'>

<table width='100%' border='0' cellspacing='0' cellpadding='0'>

  <tbody>

    <tr><td>  

    <table width='550' border='0' cellspacing='0' cellpadding='0' style='border:1px solid #eaeaea; '>

  <tbody>



<tr><td height='50' bgcolor='#00aae6'> <table width='100%' border='0' cellspacing='0' cellpadding='0'>

  <tbody>

    <tr>

      <td width='10'> </td>

      <td><span style='font-size:16px;font-weight:bold; color:#fff'>New Enquiry from Facebook</span></td>

      <td width='10'> </td>

    </tr>

  </tbody>

</table>

</td></tr>

<tr><td height='10'></td></tr>

<tr><td><table width='100%' border='0' cellspacing='0' cellpadding='0'>

  <tbody>

    <tr>

      <td width='10'> </td>

      <td><span style='font-size:14px;font-weight:normal; color:#272727' >The following user has made an enquiry from the Facebook App created by Social Circle </span></td>

      <td width='10'></td>

    </tr>

  </tbody> 

</table>

</td></tr>

<tr><td height='10'></td></tr>

<tr><td><table width='100%' border='0' align='left' cellpadding='0' cellspacing='0'>

  


<tr bgcolor='#f5f5f5'><td width='10' height='50' > </td><td width='144'> <span style='font-size:14px;font-weight:bold;font-family:Arial,sans-serif; color:#272727' > Name </span></td><td width='10' style='border-left:1px solid #ccc;'> </td><td width='4'> </td><td width='320'>  <span style='font-size:14px;font-weight:normal;font-family:Arial,sans-serif; color:#272727' >".$_POST['name']."</span></td><td width='10'> </td></tr> 



<tr bgcolor='#f5f5f5'><td height='50' width='10' > </td><td > <span style='font-size:14px;font-weight:bold;font-family:Arial,sans-serif; color:#272727' >Email  </span></td><td style='border-left:1px solid #ccc;'> </td><td width='4'> </td><td>  <span style='font-size:14px;font-weight:normal;font-family:Arial,sans-serif; color:#272727' >".$_POST['email']."</span></td><td width='10'> </td></tr>
  
<tr bgcolor='#f5f5f5'><td height='50' width='10' > </td><td > <span style='font-size:14px;font-weight:bold;font-family:Arial,sans-serif; color:#272727' >Phone  </span></td><td style='border-left:1px solid #ccc;'> </td><td width='4'> </td><td>  <span style='font-size:14px;font-weight:normal;font-family:Arial,sans-serif; color:#272727' >".$_POST['phone']."</span></td><td width='10'> </td></tr>
  
<tr bgcolor='#f5f5f5'><td width='10' height='50' > </td><td width='144'> <span style='font-size:14px;font-weight:bold;font-family:Arial,sans-serif; color:#272727' > Message </span></td><td width='10' style='border-left:1px solid #ccc;'> </td><td width='4'> </td><td width='320'>  <span style='font-size:14px;font-weight:normal;font-family:Arial,sans-serif; color:#272727' >".$_POST['Message']."</span></td><td width='10'> </td></tr> 
 


<tr bgcolor='#f5f5f5'><td width='10' height='50' > </td><td width='144'> <span style='font-size:14px;font-weight:bold;font-family:Arial,sans-serif; color:#272727' > Checkin Date</span></td><td width='10' style='border-left:1px solid #ccc;'> </td><td width='4'> </td><td width='320'>  <span style='font-size:14px;font-weight:normal;font-family:Arial,sans-serif; color:#272727' >".$_POST['Checkin']."</span></td><td width='10'> </td></tr>

<tr bgcolor='#f5f5f5'><td width='10' height='50' > </td><td width='144'> <span style='font-size:14px;font-weight:bold;font-family:Arial,sans-serif; color:#272727' > Checkout Date</span></td><td width='10' style='border-left:1px solid #ccc;'> </td><td width='4'> </td><td width='320'>  <span style='font-size:14px;font-weight:normal;font-family:Arial,sans-serif; color:#272727' >".$_POST['Checkout']."</span></td><td width='10'> </td></tr>


<tr bgcolor='#f5f5f5'><td height='50' width='10' > </td><td > <span style='font-size:14px;font-weight:bold;font-family:Arial,sans-serif; color:#272727' >No. of Rooms  </span></td><td style='border-left:1px solid #ccc;'> </td><td width='4'> </td><td>  <span style='font-size:14px;font-weight:normal;font-family:Arial,sans-serif; color:#272727' >".$_POST['room']."</span></td><td width='10'> </td></tr>  



<tr bgcolor='#f5f5f5'><td width='10' height='50' > </td><td width='144'> <span style='font-size:14px;font-weight:bold;font-family:Arial,sans-serif; color:#272727' > Adults </span></td><td width='10' style='border-left:1px solid #ccc;'> </td><td width='4'> </td><td width='320'>  <span style='font-size:14px;font-weight:normal;font-family:Arial,sans-serif; color:#272727' >".$_POST['adults']."</span></td><td width='10'> </td></tr>    



<tr bgcolor='#f5f5f5'><td height='50' width='10' > </td><td > <span style='font-size:14px;font-weight:bold;font-family:Arial,sans-serif; color:#272727' >Children  </span></td><td style='border-left:1px solid #ccc;'> </td><td width='4'> </td><td>  <span style='font-size:14px;font-weight:normal;font-family:Arial,sans-serif; color:#272727' >".$_POST['children']."</span></td><td width='10'> </td></tr>

</table>

</td></tr>  

<tr><td></td></tr>  

<tr><td></td></tr>    

  </tbody>

</table>

  

    </td></tr>

  </tbody>

</table><table width='550' border='0' cellspacing='0' cellpadding='0' >
<tr><td height='10' align='left' valign='top' ></td>
<td align='right' valign='top' > </td>
  <td   align='right' valign='top' ></td>
</tr>
<tr><td align='left' valign='top' ></td>
<td align='right' valign='top' > <a target='_blank' href='http://socialcircle.marketing/'><img  alt='' src='https://socialcircle.marketing/fbapps/crib-rentals-rome/dev/test/image/social-logo.png' style='float:right'></a> </td>
  <td width='10' align='right' valign='top' ></td>
</tr>
<tbody>
</tbody></table>



</body>

</html>



";



$to = "yogendra.paul@refine-interactive.com"; //Actual Client Email ID who serves as Admin

$subject = "New Facebook Enquiry - Crib Rentals Rome "; 



// Always set content-type when sending HTML email

$headers = "MIME-Version: 1.0" . "\r\n";

$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";



// More headers

$headers .= 'From: <clientsuccess@socialcircle.marketing>' . "\r\n";

$headers .= 'Cc: <sales@socialcircle.marketing>'. "\r\n";

$headers .= 'Bcc: socialcirclebiz@gmail.com' . "\r\n";



mail($to,$subject,$message,$headers);

?>
