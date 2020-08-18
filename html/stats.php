<!-- 
COMP 3340: Final Project
By: Hannah Stam (103791045)
html/stats.php
 -->

<!DOCTYPE html>
<html>
<head>
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

	<title>Luxury Seasons Hotel Statistics Page</title>
		

	<div class="topnav" id="myTopnav">
	<a href="index.php"><img class="img-logo" src="../pictures/logo.png"></a>
	<a href="stats.php" class="active">Statistics</a>
	<a href="guestlog.php">Guest Login</a>
	<a href="adminlog.php">Adminisration Login</a>
	<a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
		</a>
	</div>
</head>
<body>

	<p>Statistics chart of the number of rooms booked based on the seasons.</p><br>
	<button class="btn" onclick="window.open('seasons.php')"><i class="far fa-check-circle"></i>Seasons Stats</button><br><br>
	<p>Statistics chart of the number of rooms booked based on the room type.</p><br>
	<button class="btn" onclick="window.open('roomtype.php')"><i class="far fa-check-circle"></i>Room Type Stats</button><br><br>

</body>
<footer>Coded by Hannah Stam (103791045)</footer>
</html>

<?php
    function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
 ?>