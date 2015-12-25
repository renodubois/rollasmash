<?php 
ini_set('display_errors', 'On');

$servername = "localhost";
$username = "root";
$password = "}R,;#,1d";
$database = "users";

if(count($_POST) > 0) {
  
  $conn = mysqli($servername, $username, $password, $database);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  echo "Connected successfully";

  $result = mysqli_query($conn, "SELECT * FROM details WHERE userName='$_POST["username"]' and password = SHA1('$_POST["password"]')");

  $count = mysqli_num_rows($result);

  if($count == 0) {
    echo "Invalid Username or Password!";
  } else {
    echo "Correct username or password!";
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