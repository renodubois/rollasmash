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
  $password = $_POST["password"];

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
