<!doctype html>
<html lang="en">
  <head>
    <title>Change Password</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="form.css"> 
  </head>
  <body>
  <p><?php 
// This page lets a user change their password.
// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require ('mysqli_connect.php'); // Connect to the db.
	$errors = array(); // Initialize an error array.
	// Check for an email address:
	if (empty($_POST['username'])) {
		$errors[] = 'You forgot to enter your username.';
	} else {
		$e = mysqli_real_escape_string($dbcon, trim($_POST['username']));
	}
	// Check for the current password:
	if (empty($_POST['psword'])) {
		$errors[] = 'You forgot to enter your current password.';
	} else {
		$p = mysqli_real_escape_string($dbcon, trim($_POST['psword']));
	}
	// Check for a new password and match against the confirmed password:
	if (!empty($_POST['psword1'])) {
		if ($_POST['psword1'] != $_POST['psword2']) {
			$errors[] = 'Your new password did not match the confirmed password.';
		} else {
			$np = mysqli_real_escape_string($dbcon, trim($_POST['psword1']));
		}
	} else {
		$errors[] = 'You forgot to enter your new password.';
	}
	if (empty($errors)) { // If everything's OK.
	// Check that they've entered the right email address/password combination:
		$q = "SELECT id FROM user WHERE (Username='$e' AND Psword=sha1('$p') )";
		$result = @mysqli_query($dbcon, $q);
		$num = @mysqli_num_rows($result);
		if ($num == 1) { // Match was made.
			// Get the user_id:
			$row = mysqli_fetch_array($result, MYSQLI_NUM);
			// Make the UPDATE query:
			$q = "UPDATE user SET Psword=sha1('$np') WHERE id=$row[0]";		
			$result = @mysqli_query($dbcon, $q);
			if (mysqli_affected_rows($dbcon) == 1) { // If it ran OK.
				// Print a message.
				echo '<h2>Thank you!</h2>
				<h3>Your password has been updated.</h3>';	
			} else { // If it did not run OK.
				// Public message:
				echo '<h2>System Error</h2>
				<p class="error">Your password could not be changed due to a system error. We apologize for any inconvenience.</p>'; 
				// Debugging message:
				echo '<p>' . mysqli_error($dbcon) . '<br /><br />Query: ' . $q . '</p>';
			}
			mysqli_close($dbcon); // Close the database connection.
			// Include the footer and quit the script (to not show the form).
			
			exit();
		} else { // Invalid email address/password combination.
			echo '<h2>Error!</h2>
			<p class="error">The username and password do not match those on file.</p>';
		}
	} else { // Report the errors.
		echo '<h2>Error!</h2>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p class="error">Please try again.</p><p><br /></p>';
	} // End of if (empty($errors)) IF.
	mysqli_close($dbcon); // Close the database connection.
    } // End of the main Submit conditional.
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="change_password_form">
                <h2>Change Your Password</h2>
                <form action="change_password.php" method="post">
                    <div class="input">
                    <p><label class="label" for="username">Username:</label><br><input  type="text" name="username" size="30" maxlength="60" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" > </p>
                    </div>
                    <div class="input">
                    <p><label class="label" for="psword">Current Password:</label><br><input id="psword" type="password" name="psword" size="30" maxlength="12" value="<?php if (isset($_POST['psword'])) echo $_POST['psword']; ?>"></p>
                    </div>
                    <div class="input">
                    <p><label class="label" for="psword1">New Password:</label><br><input id="psword1" type="password" name="psword1" size="30" maxlength="12" value="<?php if (isset($_POST['psword1'])) echo $_POST['psword1']; ?>"></p>
                    </div>
                    <div class="input">
                    <p><label class="label" for="psword2">Confirm New Password:</label><br><input id="psword2" type="password" name="psword2" size="30" maxlength="12" value="<?php if (isset($_POST['psword2'])) echo $_POST['psword2']; ?>"></p>
                    </div>
                    <p><input class="submit" type="submit" name="submit" value="Change"></p>
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