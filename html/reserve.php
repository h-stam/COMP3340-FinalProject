<!-- 
COMP 3340: Final Project
By: Hannah Stam (103791045)
html/reserve.php
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

  <title>Reseravation Page</title>
    

  <div class="topnav" id="myTopnav">
  <a href="index.php"><img class="img-logo" src="../pictures/logo.png"></a>
  <a href="reserve.php" class="active">Make a Reservation</a>
  <a href="guest.php">Guest Home
  <a href="logout.php">Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
    </a>
  </div>
</head>

<body>
  <h2>Make a reservation!</h2>
  <form action="book.php" method="post"> <pre>
        <h2>Book a Room</h2>

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
  <p> All dates must have the following format: YYYY-MM-DD </p>
        Arrival <input type="text" name="start">  
        Departure <input type="text" name="enddate">
  <? 
    $query = "SELECT roomtype FROM roomtypes";
    $result = $conn->query($query);
    if(!$result) die ("Database access failed: " . $conn->error);

    $rows = $result->num_rows;
    echo 'Roomtype: <select name="roomtype">';
    for($j = 0; $j < $rows; ++$j)
    {
      $result->data_seek($j);
      $row = $result->fetch_array(MYSQLI_NUM);

      echo "<option value='$row[0]'> $row[0]</option>";
    }
    echo '</select><br>';
  ?>
 

  <?
    $query = "SELECT season FROM seasons";
    $result = $conn->query($query);
    if(!$result) die ("Database access failed: " . $conn->error);

    $rows = $result->num_rows;
    echo 'Season: <select name="season">';
    for($j = 0; $j < $rows; ++$j)
    {
      $result->data_seek($j);
      $row = $result->fetch_array(MYSQLI_NUM);
      echo "<option value='$row[0]'> $row[0]</option>";
    }
    echo '</select><br>';
 ?>     
      <input type="submit" value="Book Guest's Stay"></pre>
  </form>
</body>

</html>

<?php
require_once 'login.php';

  if (isset($_POST['username'])  &&
      isset($_POST['roomtype'])  &&
      isset($_POST['season'])  &&
      isset($_POST['start'])  &&
      isset($_POST['enddate']))
  {

    extract($_POST);

    $query = ("INSERT INTO `booked`(`username`, `roomtype`, `season`, `start`, `enddate`) VALUES ('$username', '$roomtype', '$season', '$start', '$enddate')");
    $result = $conn->query($query);

    if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
    else
    {
      echo "Booking was successful!";
    }
    
  }

    function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }

 ?>