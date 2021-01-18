<!doctype html>
<html lang="en">
  <head>
    <title>Register pagepage</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="form.css">;
  </head>
  <body>
  <?php
//The link to the database is moved to the top of the PHP code.
require ('mysqli_connect.php'); // Connect to the db.
// This query INSERTs a record in the users table.
// Has the  the form been submitted?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = array(); // Initialize an error array.
	
	// Check for an email address:
	if (empty($_POST['Username'])) {
		$errors[] = 'You forgot to enter your username.';
	} else {
	$e = mysqli_real_escape_string($dbcon, trim($_POST['Username']));
	}
	// Check for a password and match against the confirmed password:
	if (!empty($_POST['Psword1'])) {
		if ($_POST['Psword1'] != $_POST['Psword2']) {
		$errors[] = 'Your two passwords did not match.';
		} else {
	$p = mysqli_real_escape_string($dbcon, trim($_POST['Psword1']));
		}
	} else {
		$errors[] = 'You forgot to enter your password.';
  }

  $Username=$_POST['Username'];
  $sql="select * from user where Username='$Username';";
  if($result = mysqli_query($dbcon, $sql))
  {
    if(mysqli_num_rows($result) > 0){
      $errors[]='Username is all ready exist.';
    }
  }
  
	if (empty($errors)) { // If it runs
	// Register the user in the database...
// Make the query:
$q = "INSERT INTO user ( Username,Psword) 
VALUES ( '$e', sha1('$p'));";		
		$result = @mysqli_query ($dbcon, $q); // Run the query.
		if ($result) { // If it runs
		header ("location:register_thank.php"); 
		exit();
		
		} else { // If it did not run
		// Message:
			echo '<h2>System Error</h2>
<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
		// Debugging message:
		echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
		} // End of if ($result)
		mysqli_close($dbcon); // Close the database connection.
		include ('footer.php'); 
		exit();
	} else { // Report the errors.
		//header ("location: register-page.php"); 
		echo '<h2>Error!</h2>
		<p class="error">The following error(s) occurred:<br>';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br>\n";
		}
		echo '</p><h3>Please try again.</h3><p><br></p>';
		}// End of if (empty($errors))
} // End of the main Submit conditional.
?>
  <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
             <div class="register-form">
             <h2>Register Form</h2>
            <form action="register_page.php" method="post">        
            <div class="input">
            <p><label class="label" for="email">Username:</label>
            <input  type="text" name="Username" size="30" maxlength="60"  
            value="<?php if (isset($_POST['Username'])) echo $_POST['Username']; ?>" > </p>
            <br>
            </div>
            <div class="input">
            <p><label class="label" for="Psword">Password:</label>
           <input id="Psword1" type="password" name="Psword1" size="30" maxlength="30" value="<?php if (isset($_POST['Psword1'])) echo $_POST['Psword1']; ?>" ><span>&nbsp;Between 8 and 20 characters.</span></p>
            <br>
            </div>
            <div class="input">
            <p><label class="label" for="Psword">Confirm Password:</label>
           <input id="Psword2" type="password" name="Psword2" size="30" maxlength="30" value="<?php if (isset($_POST['Psword2'])) echo $_POST['Psword2']; ?>" ></p>
            <br>
            </div>          
            <p><input class="submit" type="submit" name="submit" value="Register"></p>
            </form>
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