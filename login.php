<?php 
// This section processes submissions from the login form.
// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	//connect to database
    require ('mysqli_connect.php');
    echo $_POST['Username'];
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
		$q = "SELECT id, Username, User_Level FROM user WHERE (Username='$e' AND Psword='$p')";		
//run the query and assign it to the variable $result
		$result = mysqli_query ($dbcon, $q); 
// Count the number of rows that match the email/password combination
	if (@mysqli_num_rows($result) == 1) {//The user input matched the database record
// Start the session, fetch the record and insert the three values in an array
		session_start();
		$_SESSION = mysqli_fetch_array ($result, MYSQLI_ASSOC);
$_SESSION['User_Level'] = (int) $_SESSION['User_Level']; // Ensure that the user level is an integer
$url = ($_SESSION['User_Level'] === 1) ? 'admin_page.php' : 'members-page.php'; // Use a ternary operation to set the URL
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