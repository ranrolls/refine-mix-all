<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Social Connect</title>

<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

<link href="../css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="http://socialcircle.biz/sendmail/admin/inc/jquery.min.js"></script>
	<script type="text/javascript" src="http://socialcircle.biz/sendmail/admin/inc/jquery.totemticker.js"></script>
	<script type="text/javascript">
		$(function(){
			$('#vertical-ticker').totemticker({
				row_height	:	'100px',
				start		:	'#start',
				mousestop	:	true,
			});
		});
	</script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
              <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
</head>
<!--<body style="background:url(images/home-bg.jpg) no-repeat; background-size:100%; background-attachment:fixed;">-->
<body style="background:#0983a1;">
  
<div id="wrapper" class="container">
<header> 
  <!-- begin -->
  
  <nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid"> 
      <!-- Home and toggle get grouped for better mobile display -->
      <div class="navbar-header"><a class="navbar-brand" href="index.php">Home</a></div>
      
     
	        <ul class="nav navbar-nav">
        <li><a href="all_user_details.php">All Users Details</a></li>      
      </ul>
	  
	     <ul class="nav navbar-nav">
        <li><a href="manual_mail_send.php">Add manual Users</a></li>      
      </ul>
 
  
      <ul class="nav navbar-nav navbar-right">
        <!-- Begin Login -->
        <li class="dropdown">
        <?php
      if (isset($_SESSION['valid']) && $_SESSION['valid'] == true) {
       $inactive = 60 * 60 * 1;
      if (time() - $_SESSION['timeout'] > $inactive) {
        $_SESSION['valid'] = false;	
        session_unset();
        session_destroy();
      } else {
        echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">' 
        . $_SESSION['username'] . '<b class="caret"></b></a>';
        echo '<ul class="dropdown-menu">';
        echo '<li><a href="redirect.php?action=logout">Logout</a></li>';
        echo '</ul>';
      }
    }

    else {
        echo '<a href="userlogin.php">Admin Login</a>';
      }
    
    ?>
        </li>
        <!-- End Login -->  
      </ul>
    </div>
    <!-- /.container-fluid --> 
  </nav>
  
  <!-- end --> 
</header>

 