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
      <td><span style='font-size:16px;font-weight:bold; color:#fff'>You have been subscribed!</span></td>
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
      <td><span style='font-size:14px;font-weight:normal; color:#272727' >Thank you for using this coupon. </span></td>
      <td width='10'></td>
    </tr>
  </tbody> 
</table>
</td></tr>
<tr><td height='10'></td></tr>
<tr><td><table width='100%' border='0' align='left' cellpadding='0' cellspacing='0'>
  
<tr bgcolor='#f5f5f5'><td width='10' height='50' > </td><td width='144'> <span style='font-size:14px;font-weight:bold;font-family:Arial,sans-serif; color:#272727' >Promo Code </span></td><td width='10' style='border-left:1px solid #ccc;'> </td><td width='4'> </td><td width='320'>  <span style='font-size:14px;font-weight:normal;font-family:Arial,sans-serif; color:#272727' >".$_POST['Promo_Code']."</span></td><td width='10'> </td></tr>

<tr bgcolor='#f5f5f5'><td height='50' width='10' > </td><td > <span style='font-size:14px;font-weight:bold;font-family:Arial,sans-serif; color:#272727' >Email  </span></td><td style='border-left:1px solid #ccc;'> </td><td width='4'> </td><td>  <span style='font-size:14px;font-weight:normal;font-family:Arial,sans-serif; color:#272727' >".$_POST['email']."</span></td><td width='10'> </td></tr>      

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
$subject = "New Subscriber  -MASTER TAILOR";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <fbapps@socialcircle.marketing>' . "\r\n";
$headers .= 'Cc: <hnnguyen120395@gmail.com>'. "\r\n";
//$headers .= 'Bcc: yogendra.paul@refine-interactive.com' . "\r\n";

mail($to,$subject,$message,$headers);
?>

<!--For Admin-->
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
      <td><span style='font-size:16px;font-weight:bold; color:#fff'>New Subscriber from Facebook</span></td>
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
      <td><span style='font-size:14px;font-weight:normal; color:#272727' >The following subscriber has used this promo code from the Facebook App created by Social Circle </span></td>
      <td width='10'></td>
    </tr>
  </tbody> 
</table>
</td></tr>
<tr><td height='10'></td></tr>
<tr><td><table width='100%' border='0' align='left' cellpadding='0' cellspacing='0'>
  
<tr bgcolor='#f5f5f5'><td width='10' height='50' > </td><td width='144'> <span style='font-size:14px;font-weight:bold;font-family:Arial,sans-serif; color:#272727' >Promo Code </span></td><td width='10' style='border-left:1px solid #ccc;'> </td><td width='4'> </td><td width='320'>  <span style='font-size:14px;font-weight:normal;font-family:Arial,sans-serif; color:#272727' >".$_POST['Promo_Code']."</span></td><td width='10'> </td></tr>

<tr bgcolor='#f5f5f5'><td height='50' width='10' > </td><td > <span style='font-size:14px;font-weight:bold;font-family:Arial,sans-serif; color:#272727' >Email  </span></td><td style='border-left:1px solid #ccc;'> </td><td width='4'> </td><td>  <span style='font-size:14px;font-weight:normal;font-family:Arial,sans-serif; color:#272727' >".$_POST['email']."</span></td><td width='10'> </td></tr>      

</table>
</td></tr>  
<tr><td></td></tr>  
<tr><td></td></tr>    
  </tbody>
</table>
  
    </td></tr>
  </tbody>
</table><br />

<p style='font-size:14px; font-weight:normal; font-family:Arial,sans-serif; margin-top:5px; font-style:italic;' >* Social Circle strongly recommends to confirm the subscription </p>

</body>
</html>

";

$to = "fbapps@socialcircle.marketing"; //Admin
$subject = "New Subscriber  -MASTER TAILOR"; 

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <fbapps@socialcircle.marketing>' . "\r\n";
$headers .= 'Cc: <hnnguyen120395@gmail.com>'. "\r\n";
//$headers .= 'Bcc: yogendra.paul@refine-interactive.com' . "\r\n";

mail($to,$subject,$message,$headers);
?>
