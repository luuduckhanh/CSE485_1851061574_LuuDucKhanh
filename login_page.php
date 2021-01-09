<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
  </head>
  <body>
  <h2>Login</h2>
<form action="login.php" method="post">
	<p><label class="label" for="Username">UserName:</label>
	<input id="Username" type="text" name="Username" size="30" maxlength="60" value="<?php if (isset($_POST['Username'])) echo $_POST['Username']; ?>" > </p>
	<br>
	<p><label class="label" for="Psword">Password:</label>
	<input id="Psword" type="password" name="Psword" size="30" maxlength="30" value="<?php if (isset($_POST['Psword'])) echo $_POST['Psword']; ?>" ><span>&nbsp;Between 8 and 20 characters.</span></p>
	<p>&nbsp;</p><p><input id="submit" type="submit" name="submit" value="Login"></p>
</form><br>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>