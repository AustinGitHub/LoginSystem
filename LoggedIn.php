<?php session_start();ob_start();
// This is going to be the page we redirect to once we are logged in. 

// We need to make sure the session is started and that the user is logged in or else anyone could just go onto this page. 

// If we want to use the name of the user signed in, it's best to define it at the top. 
$User = $_SESSION['Username'];


// If the username session isn't started, redirect the user back to the login
// In this example we will just send them back, but on a real site you can have it display different data such that
// They can't do what someone logged in would be able to do. 
if(!isset($_SESSION['Username'])){
	header("Location: Login.php");
				
}
// Echo is the way we display data to the web browser.
// Echo is able to take most of the web based languages, such as CSS, HTML, and JavaScript
echo "<h1><center> Welcome ".$User."</center></h1>";



?>