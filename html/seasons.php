<!-- 
COMP 3340: Final Project
By: Hannah Stam (103791045)
/html/seasons.php
 -->

<?php
    require_once 'login.php';

    $query = "SELECT season,count(*) as cnt FROM booked GROUP by season";
    $result = mysqli_query($conn, $query);
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

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(draw_chart);

    //Function that creates the pie chart
    function draw_chart() 
    {
        var data = new google.visualization.arrayToDataTable([['Season','Cnt'],
            <?php
            while($row = mysqli_fetch_array($result))
            {
                echo "['".$row["season"]."', ".$row["cnt"]."],";
            } 
            ?>
        ]);
        var options = 
        {
            title: 'Percentage of Rooms based on Seasons that are Currently Reserved',
            pieHole: 0.4
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
        chart.draw(data, options);  
    }
    </script>

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

    <title>Luxury Seasons Hotel Statistics by Seasons</title>
        

    <div class="topnav" id="myTopnav">
    <a href="index.php"><img class="img-logo" src="../pictures/logo.png"></a>
    <a href="seasons.php" class="active">Statistics by Seasons</a>
    <a href="stats.php">Statistics</a>
    <a href="guestlog.php">Guest Login</a>
    <a href="adminlog.php">Adminisration Login</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
        </a>
    </div>
</head>
<body>
<br /><br />  
   <div name="stats" style="width:900px;">  
        <p align="center">G-static Pie Chart of Current Rooms Booked and Reserved based on the Seasons Database</p>  
        <br />  
        <div align="center" id="piechart" style="width: 900px; height: 500px;"></div>  
   </div> 
    



</body>
<footer>Coded by Hannah Stam (103791045)</footer>
</html>

<?php
    function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
 ?>