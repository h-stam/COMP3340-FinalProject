<!-- 
COMP3340: Final Project
By: Hannah Stam (103791045) 
/html/admin.php
-->

<?php
// Initializing the session, if session is not started, goes back to the login page
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: adminlog.php");
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
<script src="../js/jquery-3.5.1.min.js"></script>
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

	<title>Aministration Home Page</title>
		

	<div class="topnav" id="myTopnav">
	<a href="index.php"><img class="img-logo" src="../pictures/logo.png"></a>
	<a href="admin.php" class="active">Administration Home Page</a>
  <a href="book.php">Book Room</a>
	<a href="logout.php">Logout</a>
	<a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
		</a>
	</div>
</head>
<body>
</body>

</html>


<?php
	require_once 'login.php';


  if(isset($_POST['delete']) && isset($_POST['confirmationid'])){
    $confirmationid = get_post($conn, 'confirmationid');
    $query = "DELETE FROM `booked` WHERE `confirmationid`='$confirmationid'";
    $result = $conn->query($query);
    if(!$result) die ("DELETE failed: $query2<br>" . $conn->error ."<br><br>");
  }
  
?>
  <link rel="stylesheet" type="text/css" href="../css/table.css">
  <div class='roomlist'>
  <form action='admin.php' method='post'>
  <table id='listroom'>
  <thead style='text-align: left;'>
  <tr><th>Confirmation ID</th>
      <th>Username</th>
      <th>Room Type</th>
      <th>Season</th>
      <th>Arrival</th>
      <th>Depatrue</th>
      <th>Delete</th>
    </tr></thead>

<?php


  $query  = "SELECT * FROM booked";
  $result = $conn->query($query);
  if(!result) die ("Database access failed  " . $conn->error);
  while($row = mysqli_fetch_array($result)){
    ?>
      <pre><tr>
      <td> <?php echo $row['confirmationid']; ?> </td>
      <td> <?php echo $row['username']; ?></td>
      <td> <?php echo $row['roomtype']; ?></td>
      <td> <?php echo $row['season']; ?></td>
      <td> <?php echo $row['start']; ?></td>
      <td> <?php echo $row['enddate']; ?></td>
<?php
      echo "<td><form action='admin.php' method='POST'><input type='hidden' name='delete' value='yes'><input type='hidden' name='confirmationid' value=". $row['confirmationid']."><input type='submit' value='Delete'></form></td></tr></pre>";
      ?>

    <?php
  }

  echo "</table>";
  echo "</div>";

  
  $result->close();
  $conn->close();

  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }

 ?>
