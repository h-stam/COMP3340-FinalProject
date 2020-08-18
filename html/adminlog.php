<!-- 
COMP3340: Final Project
By: Hannah Stam (103791045) 
/html/adminlog.php
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

	<title>Luxury Seasons Hotel Administration Login Page</title>
		

	<div class="topnav" id="myTopnav">
	<a href="index.php"><img class="img-logo" src="../pictures/logo.png"></a>
	<a href="stats.php">Statistics</a>
	<a href="guestlog.php">Guest Login</a>
	<a href="adminlog.php" class="active">Administration Login</a>
	<a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
		</a>
	</div>
</head>
<body>
	<div class="login"> <pre>
		<h1>Administration Login</h1>
        <form action="adminlog.php" method="post">

                Username: <br>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                Password:<br>
                <input type="password" name="password" class="form-control">
                <input type="submit" class="btn btn-primary" value="Login" name="login">
    		<br>
			<p>Not an administrator yet?  Click below to register!</p><br>
			<button class="btn" onclick="window.open('adminsignup.php')"><i class="far fa-check-circle"></i>REGISTER</button>
        </form>
	</pre></div>	

</body>
<footer>
	Coded by Hannah Stam (103791045)
</footer>
</html>


<?php
	require_once "login.php";

	if (isset($_POST['username']) && isset($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = "SELECT * FROM `admins` WHERE username='$username' AND password='$password'";
		$result = mysqli_query($conn, $query) or die (mysqli_error($connection));
		$count = mysqli_num_rows($result);

		if($count == 1){
			echo "Login successful!";
			session_start();
			$_SESSION["loggedin"] = true;
			$_SESSION["id"] = $id;
			$_SESSION["username"] = $username;
			header("location:admin.php");
		}
		else{
			echo "Invalid username or password.";
		}
	}

    function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
 ?>



