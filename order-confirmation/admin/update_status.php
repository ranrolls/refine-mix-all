<?php

 
include('config.php');

 $status=$_REQUEST['status'];
 $username=$_REQUEST['username'];
 $Stage_2_Email_Activation =$_REQUEST['Stage_2_Email_Activation'];
  
//echo "Value of \$status = '".$status."' ";


if ($status!= "")
{
	if($Stage_2_Email_Activation=='1'){

		//echo "vishal";
    $query1 = "update ras_companyinfo set status = '".$status."'  where fname = '".$username."' "; 
	$conn->query($query1);
					
		           //echo "Mail send to user";
				   $url2="user_by_id.php?username=".$username;
				   header('Location:' .$url2);
				   
	}
}

?>