<?php

	error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	ini_set('display_startup_errors', TRUE);

	$errUsername = $errPassword = $errEmail = $errPasswordNotMatch = "";

	if(count($_POST) > 0) {
		// Connect to MySQL database.
		$conn = mysqli_connect("127.0.0.1", "root", "dankmemes", "test");

		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$passwordConfirm = mysqli_real_escape_string($conn, $_POST['password-confirm']);

		$usernameResult = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
		$emailResult = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

		// Check to see if the username is valid and unique.
		if (!$username || (strlen($username) < 4 || strlen($username) > 32) || preg_match('/[^a-z_\-0-9]/i', $username)) {
			$errUsername = "Please enter a valid username";
		} else if (mysqli_num_rows($usernameResult) != 0) {
			$errUsername = "That username is already taken!";
		}
		// Check email for validity.
		if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errEmail = "Please enter a valid email";
		} else if (mysqli_num_rows($emailResult) != 0) {
			$errEmail = "That email is in use!";
		}
		// Check if Password or PW Confirm is blank, then check to see if they are the same.
		if (!$password || (strlen($password) < 6 || strlen($password) > 32) || preg_match('/[^a-z0-9]/i', $password)) {
			$errPassword = "Please enter a valid password";
		}
		if (!$passwordConfirm) {
			$errPasswordNotMatch = "Please re-type your password";
		}
		if ($password != $passwordConfirm) {
			$errPasswordNotMatch = "Passwords do not match";
		}
		// Only going into this block if there were no errors.
		if(!$errUsername && !$errEmail && !$errPassword && !$errPasswordNotMatch) {
			// Let's encrypt our password using SHA1.
			$password = SHA1($password);
			// Insert our data into the Database.
			mysqli_query($conn, "INSERT INTO users VALUES('$username','$password','$email')");
		}

	}
	?>

<!-- Made by Reno DuBois, 2015. Using Bootstrap and Cosmo theme from bootswatch.com. -->
<!-- Source can be accessed at github.com/renodubois -->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Rolla Smash Bros. Community</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/rollasmash.css" type="text/css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  <!-- Navbar -->
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Rolla Smash Bros. Community</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="#">Events</a></li>
            <li><a href="#">Rankings</a></li>
            <li><a href="forum.php">Forums<span class="sr-only">(current)</span></a></li>
          </ul>
          <div class="text-uppercase">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Sign Up</a></li>
              <li class="active"><a href="login.php"><span class="glyphicon glyphicon-user"></span> Log In</a></li>
            </ul>
          </div>
          </form>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
</nav>


<div class ="spacer-small"></div>

<div class="login-block">
  <h2 class="login-block">Sign Up</h2>
	<h4>(* represents a required field)</h4>
  </br>
	<!-- Username (REQUIRED, UNIQUE) -->
  <form action = "signup.php"  method = "post">
  <div class="form-group">
		<label for="username">Username * (4-32 characters)</label>
    <input type="text" class="form-control" name="username" placeholder="Username">
		<?php echo "<p class='text-danger'>$errUsername</p>";?>
  </div>
	<!-- Email (REQUIRED) -->
	<div class="form-group">
		<label for="email">Email Address *</label>
    <input type="email" class="form-control" name="email" placeholder="example@domain.com">
		<?php echo "<p class='text-danger'>$errEmail</p>";?>
  </div>
	<!-- Password and Confirm Password (REQUIRED) -->
  <div class="form-group">
		<label for="password">Password * (6-32 characters)</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
		<?php echo "<p class='text-danger'>$errPassword</p>";?>
  </div>

	<div class="form-group">
		<label for="password-confirm">Confirm Password</label>
    <input type="password" class="form-control" name="password-confirm" placeholder="Confirm Password">
		<?php echo "<p class='text-danger'>$errPasswordNotMatch</p>";?>
  </div>
	<!-- -->
  <div class="form-group">
    <button type="submit" class="btn btn-default">Sign Up</button>
  </div>
  </form>
</div>


 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
