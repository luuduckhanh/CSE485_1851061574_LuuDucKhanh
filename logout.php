<?php
// This is the logout page for the site.
session_start();//access the current session.
//if no session variable then redirect the user
if (!isset($_SESSION['id'])) {
header("location:login_page.php");
exit();
}else{ //cancel the session
	$_SESSION = array(); // Destroy the variables
	session_destroy(); // Destroy the session
	header("location:login_page.php");
	exit();
}
?>