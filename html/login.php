<!-- 
COMP3340: Final Project
By: Hannah Stam (103791045) 
/html/login.php
-->

<?php

session_start();

$hn = 'localhost'; //host
$db = 'stam11_proj'; //database
$un = 'stam11_proj'; //username
$pw = 'password'; //password

$conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

?>