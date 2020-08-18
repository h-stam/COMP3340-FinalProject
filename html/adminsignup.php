<!-- 
COMP 3340: Final Project
By: Hannah Stam (103791045)
html/adminsignup.php
 -->
<?php

	require_once "login.php";

	$username = $password = $confirm_password = "";
	$username_err = $password_err = $confirm_password_err = "";


	if(isset($_POST["username"]) && isset($_POST["password"]))
	{
		$username = trim($_POST["username"]);
		$password = trim($_POST["password"]);


		if(empty(trim($_POST["username"]))) 
		{
		    $username_err = "Please enter a username.";
		}
		else 
		{
			$sql = "SELECT * FROM `admins` WHERE username = '$username'";
			$result = mysqli_query($conn,$sql);
			$user = mysqli_fetch_assoc($result);
			if($user)
			{
				if($user['username'] === $username) 
				{
					$username_err = "This username is already taken.";
				}
			}
		}


		if(empty(trim($_POST["password"]))) 
		{
			$password_err = "Please enter a password.";
		}
		if(empty(trim($_POST["confirm_password"]))) 
		{
			$confirm_password_err = "Please confirm password.";
		} 
		else
		{
			$confirm_password = trim($_POST["confirm_password"]); 
			if(empty($password_err) && ($password != $confirm_password)) 
			{
				$confirm_password_err = "Password did not match.";
			}
		}
		if(empty($username_err) && empty($password_err) && empty($confirm_password_err)) 
		{
			extract($_POST);
			$sql = "INSERT INTO `admins` (`username`, `password`) VALUES ('$username', '$password')";
			$result = mysqli_query($conn,$sql); 
			mysqli_close($conn); 

			if(!result) echo "INSERT failed: $sql<br>" . $conn->error . "<br><br>";

			echo "Account Created!";
			header("location:adminlog.php");
			echo "<scrip>windsor.location = 'adminlog.php'</script>";


		}
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

	<title>Luxury Seasons Hotel Administration Signup Page</title>
		

	<div class="topnav" id="myTopnav">
	<a href="index.php"><img class="img-logo" src="../pictures/logo.png"></a>
	<a href="stats.php">Statistics</a>
	<a href="adminsignup.php" class="active">Administration Signup</a>
	<a href="guestlog.php">Guest Login</a>
	<a href="adminlog.php" >Administration Login</a>
	<a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
		</a>
	</div>
</head>
<body>
	<div class="login">
		<h1>Sign up to be an Administrator </h1>
        <form action="adminsignup.php" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                Username: <br>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                Password: <br>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                Confirm Password:<br>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit" name="register">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <br><br>
            <p>Already an administrator? Click to login below!</p>
    		<button class="btn" onclick="window.open('adminlog.php')"><i class="far fa-check-circle"></i>REGISTER</button>
        </form>
    </div>    
</body>
<footer>
	Coded by Hannah Stam (103791045)
</footer>
</html>

<?php
    function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
 ?>