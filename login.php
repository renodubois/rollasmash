<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

if(count($_POST) > 0) {

  $conn = mysqli_connect("127.0.0.1", "root", "dankmemes", "test");

 // if ($conn->connect_error) {
 //   die("Connection failed: " . $conn->connect_error);
 // }

  $username = $_POST["username"];
  $password = SHA1($_POST["password"]);

  $username = mysqli_real_escape_string($conn, $username);
  $password = mysqli_real_escape_string($conn, $password);

  $query = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";

 # echo $query;

 # echo $username;
 # echo $password;

  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

  $count = mysqli_num_rows($result);

  if($count == 0) {
    echo "Invalid Username or Password!";
  } else {
    header('Location: http://renodubois.me');
  }

}

  $message = " ";
/*
  if(count($_POST) > 0) {
<<<<<<< Updated upstream
    $conn = mysqli($servername, $username, $password);
=======
    $conn = mysql_connect("localhost","root","}R,;#,1d");
>>>>>>> Stashed changes
    mysql_select_db("users",$conn);
    $result = mysql_query("SELECT * FROM details WHERE userName='" . $_POST["userName"] . "' and password = SHA1('". $_POST["password"]."')");
    $count = mysql_num_rows($result);
    if($count == 0) {
      $message = "Invalid Username or Password!";
    } else {
      $message = "You are successfully authenticated!";
    }
  }

*/

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
            <li><a href="forum.html">Forums<span class="sr-only">(current)</span></a></li>
          </ul>
          <div class="text-uppercase">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="signup.php">Sign Up</a></li>
              <li class="active"><a href="login.php"><span class="glyphicon glyphicon-user"></span> Log In</a></li>
            </ul>
          </div>
          <form class="navbar-form navbar-right" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <!-- <button type="submit" class="btn btn-default">Submit</button> -->
          </form>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
</nav>


<div class = "spacer"></div>

<div class="login-block">
  <h2 class="login-block">Log in</h2>
  </br>
  <form action = "login.php"  method = "post">
  <div class="form-group">
    <input type="text" class="form-control" name="username" placeholder="Username">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  <div class="checkbox">
    <label><input type="checkbox">Keep me logged in!</label>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-default">Log In</button>
  </div>
  </form>
</div>


 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
