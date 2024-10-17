<?php
define('HOST_NAME',"localhost");
define('HOST_USER',"root");
define('HOST_PWD',"");
define('DB_NAME',"test");

// Create connection
$conn = mysqli_connect(HOST_NAME, HOST_USER, HOST_PWD, DB_NAME);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>