<!-- 
COMP 3340: Final Project
By: Hannah Stam (103791045)
/html/index.php
-->

<!DOCTYPE html>
<html>
<head>
	<title>Luxury Seasons Hotel Home Page</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- My own CSS style sheet -->
	<link rel="stylesheet" type="text/css" href="../css/style.css">

	<!-- Bootstrap -->
	<link href="../css/boostrap.min.css" rel="stylesheet">
	<!-- "Dancing Script" Font from Google Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesom/4.7.0/css/font-awesome.min.css">

	<script>
		function myFunction() {
			var x = document.getElementById("myTopnav");
			if(x.className === "topnav") {
				x.className += " responsive";
			} else{
				x.className = "topnav";
			}
		}
	</script>

</head>
<body>

	<div class="topnav" id="myTopnav">
		<a href="index.php" class="active"><img class="img-logo" src="../pictures/logo.png"></a>
		<a href="stats.php">Statistics</a>
		<a href="guestlog.php">Guest Login</a>
		<a href="adminlog.php">Administration Login</a>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			<i class="fa fa-bars"></i>
		</a>
	</div>

	<div class="main">
		<h1 class="bold text-center">Welcome to the Luxury Seasons Hotel!</h1>
		<p class="text-center">A place where any season is possible. The luxury seasons hotel has been running since 2010.  From standard to luxry, we offer a variety of rooms that match every season!</p>

		<button class="btn" onclick="window.open('guestlog.php')"><i class="far fa-check-circle"></i>BOOK NOW!</button>
</body>
<footer>
	Coded by Hannah Stam (103791045)
</footer>	
</html>


<?php
	session_start();
	if(!isset($_SESSION['login'])) {
		?> 
		<h4>Please login by selecting the Aministration Login button or the Guest Login button</h4>
		<?php
	}
?>