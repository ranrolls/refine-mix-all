<?php

session_start();
	 

if ($_GET['action'] == 'logout') {
session_unset();
session_destroy();

	//$msg = 'Logged out. Now come back to Login page';
	//echo '<p class="lead">' . $msg . '</p>';
	//header('Refresh: 2; URL=login.php');
	
echo "<script>
     alert('Logged out. Now come back to Login page');
     window.location.href='index.php';
    </script>";
}


?>