<?php

	$servername = "localhost";
	$username = "socialci_wpsocbu";
	$password = "wrefau@54s2p";
	$dbname = "socialci_wpsosdbn";


  
   
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	} 

  

?>
 
 
