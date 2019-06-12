<!-- This is going to be the PHP script where the action is taking place -->

<!-- These tags indicate PHP code is being put inside them, sort of like <script> or <style> tags -->

<?php   	 session_start();ob_start();
// We start the session at the top of php script as well as the output buffering start. 
// The reason we start the output buffering is so that the code knows to keep the content in a server-side buffer until it's ready to display it. 
// This may also be used to send data from this file to the redirect header that we are going to. Such as the sessions. 

// We first need to connect to our database. For this example, it will be using a localhost server
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "testbase";
$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);

// Once connected, we need to retreive our sent elements and then see if they match up with our database. 
// Note: This is just an example, in a real database you should have passwords encrypted or hashed in a database.
// I will show how you can do this in another example. 

// The values you put in the $_POST is the name attribute that you gave for those inputs.
// The reason we do mysqli_real_escape_string is so that certain key characters like ' or _ can be passed through and encoded. 
// When doing a login system though, special characters should be limited. 
$UsernamePosted = mysqli_real_escape_string($conn,$_POST['Username']); 
$PasswordPosted = mysqli_real_escape_string($conn,$_POST['Password']);

// Now it's time to see if these values match the ones in our database and then redirect the user to the page. 


$sql = "SELECT * FROM users WHERE Username = '$UsernamePosted'";
// This runs the sql statement above to query the results from it.
  $result = $conn->query($sql);
// This retreives the results and allows you to see what they are. 
  if ($result->num_rows > 0) {
    if($row = $result->fetch_assoc()) {
 $Username = $row['Username'];
 $Password = $row['Password'];
    }
  }

// With a simple if statement we can compare the posted data to the data in the database. 
  if($UsernamePosted == $Username && $PasswordPosted == $Password){	
// Now that we know it works, it's time to redirect the user and set the sessions
  	// It's best to also set the session Id in case you need it elsewhere in your code. 
	$_SESSION['Id'] = $row['Id'];
	$_SESSION['Username'] = $row['Username'];

  	header("Location: LoggedIn.php");

				
  }


?>