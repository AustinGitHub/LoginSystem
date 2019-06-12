
 <!-- First you have to create a form for the site -->
<!-- The reason we use POST is because we are posting the data being submitted to the file indicated. -->
<title> Login system </title> 
<h1> Log in </h1>
  <form method="POST" action="LogIntoSite.php">

  	Username: <input type="text" name="Username" placeholder="Username"><br/>
  	Password: <input type="password" name="Password" placeholder="Password"><br/>
  
    <button type='submit' name='submit'> Submit </button>

  	</form>