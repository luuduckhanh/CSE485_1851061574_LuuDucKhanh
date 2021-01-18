<?php 
// This section processes submissions from the login form.
// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	//connect to database
    require ('mysqli_connect.php');
    
	// Validate the email address:
	if (!empty($_POST['Username'])) {
			$e = mysqli_real_escape_string($dbcon, $_POST['Username']);
	} else {
	$e = FALSE;
		echo '<p class="error">You forgot to enter your email address.</p>';
	}
	// Validate the password:
	if (!empty($_POST['Psword'])) {
			$p = mysqli_real_escape_string($dbcon, $_POST['Psword']);
	} else {
	$p = FALSE;
		echo '<p class="error">You forgot to enter your password.</p>';
	}
	if ($e && $p){//if no problems
// Retrieve the user_id, first_name and user_level for that email/password combination:
		$q = "SELECT id, Username, User_Level FROM user WHERE (Username='$e' AND Psword=sha1('$p'))";		
//run the query and assign it to the variable $result
		$result = mysqli_query ($dbcon, $q); 
// Count the number of rows that match the email/password combination
	if (@mysqli_num_rows($result) == 1) {//The user input matched the database record
// Start the session, fetch the record and insert the three values in an array
		session_start();
		$_SESSION = mysqli_fetch_array ($result, MYSQLI_ASSOC);
$_SESSION['User_Level'] = (int) $_SESSION['User_Level']; // Ensure that the user level is an integer
$url = ($_SESSION['User_Level'] === 1) ? 'admin_page.php' : 'members_page.php'; // Use a ternary operation to set the URL
header('Location: ' . $url); // Make  the browser load either the members� or the admin page
exit(); // Cancels the rest of the script.
	mysqli_free_result($result);
	mysqli_close($dbcon);
	} else { // No match was made.
	echo '<p class="error">The email address and password entered do not match our records.<br>Perhaps you need to register, click the Register button on the header menu</p>';
	}
	} else { // If there was a problem.
		echo '<p class="error">Please try again.</p>';
	}
	mysqli_close($dbcon);
	} // End of SUBMIT conditional.
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Login pagepage</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="form.css">

    <!-- Bootstrap CSS -->
    
  </head>
  <body>
 <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
      <h1><a href="index.php">Home Page</a></h1>
      <div class="login-form">
      <h2>Login Form</h2>
      <form action="login_page.php" method="post">
            <div class="input">
            <p><label class="label" for="email">Username:</label>
            <input id="email" type="text" name="Username" size="30" maxlength="60"  
            value="<?php if (isset($_POST['Username'])) echo $_POST['Username']; ?>" > </p>
            <br>
            </div>
            <div class="input">
            <p><label class="label" for="Psword">Password:</label>
           <input id="Psword" type="password" name="Psword" size="30" maxlength="30" value="<?php if (isset($_POST['Psword'])) echo $_POST['Psword']; ?>" ><span>&nbsp;Between 8 and 20 characters.</span></p>
            
            </div>
        <p>&nbsp;</p><p><input   class="submit" type="submit" name="submit" value="Login"></p>
      </form><br>
      </div>
      </div>
      </div>
    </div>
 </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>