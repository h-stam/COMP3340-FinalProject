<!-- 
COMP3340: Final Project
By: Hannah Stam (103791045) 
/html/guest.php
-->

<?php
// Initializing the session, if session is not started, goes back to the login page
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: guestlog.php");
    exit;
}
?>

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

	<title>Guest Home Page</title>
		

	<div class="topnav" id="myTopnav">
	<a href="index.php"><img class="img-logo" src="../pictures/logo.png"></a>
	<a href="guest.php" class="active">Guest HomePage</a>
	<a href="reserve.php">Reserve a Room</a>
	<a href="logout.php">Logout</a>
	<a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
		</a>
	</div>
</head>
<body>
	<h1>Guest Home Page </h1>
	<form action="guest.php" method="post"> <pre>
        <p>Select your Username</p>
<?php      
    require_once "login.php";

    $query = "SELECT * FROM guests";
    $result = $conn->query($query);
    if(!$result) die ("Database access failed: " . $conn->error);

    $rows = $result->num_rows;
    echo 'Username: <select name="username">';
    for($j = 0; $j < $rows; ++$j)
    {
      $result->data_seek($j);
      $row = $result->fetch_array(MYSQLI_NUM);

      echo "<option value='$row[1]'> $row[1]</option>";
    }
    echo '</select><br>';
  ?>

  <input type="submit" value="Submit"></pre>
</pre></form>
</body>
</html>

<?php
	require_once 'login.php';

	if(isset($_POST['delete'])){
		$confirmationid = get_post($conn, 'confirmationid');
		$query = "DELETE FROM booked WHERE confirmationid = '$confirmationid'";
		$result = $conn->query($query);
		if(!$result) die ("Database access failed. " .$conn->error);
	}
?>
	<table id='listroom'>
		<tr>
			<td>Confirmation ID</td>
			<td>Username</td>
			<td>Room Type</td>
			<td>Season</td>
			<td>Arrival Date</td>
			<td>Departure Date</td>
			<td>Delete</td>
		</tr>
<?php
	if(isset($_POST['username']))
	{
	    $username = $_POST['username'];
		$sql = "SELECT * FROM booked WHERE username = '$username'";
		$result = $conn->query($sql);
		if(!result) die ("Database access failed.  " .$conn->error);
		while($row = mysqli_fetch_array($result))
		{
			?>
			<pre><tr>
			<td> <?php echo $row['confirmationid']; ?> </td>
			<td> <?php echo $row['username']; ?></td>
			<td> <?php echo $row['roomtype']; ?></td>
			<td> <?php echo $row['season']; ?></td>
			<td> <?php echo $row['start']; ?></td>
			<td> <?php echo $row['enddate']; ?></td>
		<?php
			echo "<td><form action='guest.php' method='POST'><input type='hidden' name='delete' value='yes'><input type='hidden' name='confirmationid' value=". $row['confirmationid']."><input type='submit' value='Delete'></form></td></tr></pre>";
		}

		echo "</table>";
		echo "</div>";
	}
	

    function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
?>