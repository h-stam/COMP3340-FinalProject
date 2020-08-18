<!-- 
COMP3340: Final Project
By: Hannah Stam (103791045) 
/html/logout.php
-->

<?php
//initializes session
session_start();
$_SESSION = array();
//logs off
session_destroy();
//Go back to home page
header('Location: index.php');
?>