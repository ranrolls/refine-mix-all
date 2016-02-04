<?php
	ob_start();
	session_start();
	
?>

<?
 
 error_reporting(E_ALL);
 ini_set("display_errors", 1);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
 

<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">

 
<!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
              <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->

<style>
body {
  padding-top: 40px;
  padding-bottom: 40px;
  background:#0983a1;
}

.form-signin {
  max-width: 400px;
  padding: 10px 15px;
  margin: 0 auto;
  margin-top:28%;
  background-color: rgba(0, 0, 0, 0.6);
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
  margin-bottom:10px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

.centerDiv
{
    width: 25%;
    margin: 0 auto;
}
</style>

</head>

  <body>
  
  	<div class="container">
 <?php 
 
include('config.php');

		 ######### DB Connection #############
		 $msg = '';
					
		 if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
		 global $conn;
						
	 $myusername 							= $_POST['username'];
	 $encrypted_mypassword	                = $_POST['password'];
 				   
	 $query = "select * from user_reg where username='".$myusername."' AND password= '".$encrypted_mypassword."' and userType='Admin' ";
		   $result = $conn->query($query);
		############################################################### 
	  if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
				  $username     =  stripslashes($row['username']);
				  $password	   = $row['password'];	
				  $userType	  = $row['userType']; }		  
				 } else {
					  echo "No Records";
					 }

				 $conn->close();
				  ################################# 
				 if ($myusername == $username && $encrypted_mypassword == $password && $userType=='Admin') {					
							$_SESSION['valid'] = true;
							$_SESSION['timeout'] = time();
							
							$_SESSION['username'] = $username;
							
							header('Location: redirect.php?action=succeed');
						} else {
							$msg = 'Incorrect username or password';	
						}
					} 			
				?>
    </div>  

    <div class="container">
      <form class="form-signin" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
      	<h4 class="form-signin-heading" style="color:#fd0000;"><?php echo $msg; ?></h4>
        <input type="text" class="form-control" name="username" placeholder="username" required autofocus>
        <input type="password" class="form-control" name="password" placeholder="password" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>  
        
        <h2 class="form-signin-heading text-center"><a href="index.php">Home <span class="glyphicon glyphicon-home"></span></a></h2>      
      </form>
    </div>  
  </body>
</html>

