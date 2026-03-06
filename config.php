<?php

$con = mysqli_connect("localhost","root","") or die ("could not connect to the server");
mysqli_select_db($con,"sahmax") or die ("that database is not found!");

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

?>