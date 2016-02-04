<?php 
error_reporting(0);
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$formcontent="Name".$_POST['name']."\n"."Email:".$_POST['email']."\n"."Phone No :".$_POST['phone']."\n"."Subject :".$_POST['subject']."\n"."Message :".$_POST['message'];
$recipient = "manishraj456@gmail.com";
$subject = "Contact Us";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "<center><h1>Thank You!</h1></center>";
header('location:index.html');
?>