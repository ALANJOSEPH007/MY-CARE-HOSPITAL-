<?php
include("../connection.php");
session_start();
if(isset($_SESSION["user"])){
  if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
      header("location: ../login.php");
  }else{
      $useremail=$_SESSION["user"];
  }

}else{
  header("location: ../login.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
 <meta charset="utf-8">
 <title>Sub Category</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
 <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {
 var data = google.visualization.arrayToDataTable([

 ['id','email'],
 <?php 
      $query = "SELECT count(pname) FROM patient";

       $exec = mysqli_query($database,$query);
       while($row = mysqli_fetch_array($exec)){

       echo "['".$row['pid']."',".$row['pemail']."],";
       }
       ?> 
 
 ]);

 var options = {
 title: 'Number of Recipes in Vegetarian Categories',
  pieHole: 0.4,
          pieSliceTextStyle: {
            color: 'black',
          },
          legend: 'none'
 };
 var chart = new google.visualization.BarChart(document.getElementById("columnchart12"));
 chart.draw(data,options);
 }
  
    </script>
<script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {
 var data = google.visualization.arrayToDataTable([

 ['Category','Number'],
 <?php 
      $query = "SELECT count(add_recipe.rec_category) AS number, category.title FROM add_recipe INNER JOIN category WHERE add_recipe.rec_category=category.id AND add_recipe.rec_pcategory='2' GROUP BY add_recipe.rec_category";

       $exec = mysqli_query($conn,$query);
       while($row = mysqli_fetch_array($exec)){

       echo "['".$row['title']."',".$row['number']."],";
       }
       ?> 
 
 ]);

 var options = {
 title: 'Number of Recipes in Non-Vegetarian Categories',
  pieHole: 0.4,
          pieSliceTextStyle: {
            color: 'black',
          },
          legend: 'none'
 };
 var chart = new google.visualization.BarChart(document.getElementById("columnchart123"));
 chart.draw(data,options);
 }
  
    </script>
</head>
<body>
<header>
      <!--<label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
      </label>-->
      <div class="left_area">
      <a href="admin.php" style="text-decoration:none;">  <h3>ADMIN <span>PANEL</span></h3></a>
      </div>
      <div class="right_area">
        <a href="logout.php" class="logout_btn">Logout</a>
      </div>
    </header>
    <!--header area end-->
    
    <!--sidebar end-->

<!--<div class="content">-->
<div class="dashboard">
  
 <div class="card">
    <div class="card-header">
      <a href="piechart.php" style="text-decoration:none;"><h3 style="color:white;font-size:24px">GENDER COUNTS</h3></a>
    </div>
    </div>
  
  <div class="card1">
    <div class="card1-header">
    <a href="donutchart.php" style="text-decoration:none;"><h3 style="color:black;text-decoration:none;font-size:22px">MAIN CATEGORY</h3></a>
    </div>
   
  </div>

  <div class="card2">
    <div class="card2-header">
    <a href="barchart.php" style="text-decoration:none;"><h3 style="color:white;">SUB-CATEGORY</h3></a>
    </div>
    
  </div>

  <div class="card3">
    <div class="card3-header">
    <a href="col.php" style="text-decoration:none;"><h3 style="color:white">FAVOURITE RATE</h3></a>
    </div>
    
  </div>

  <div class="card4">
    <div class="card4-header">
    <a href="a.php" style="text-decoration:none;"><h3 style="color:white">REGIONAL RATE</h3></a>
    </div>
  </div>
</div>

<style>
.dashboard {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0);
  transition: 0.3s;
  width: 13%;
  margin: 20px;
  float: left;
  margin-left:75px;
  margin-top:90px;
  
  
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.8);
}

.card-header {
  background-color: #0000FF;
  padding: 20px;
  text-align: center;
  
}

.card-body {
  padding: 20px;
  
}
.card1 {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0);
  transition: 0.3s;
  width: 13%;
  margin: 20px;
  float: left;
  margin-left:50px;
  margin-top:90px;
  
}

.card1:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.8);
}

.card1-header {
  background-color: yellow;
  padding: 20px;
  text-align: center;
  
}

.card1-body {
  padding: 20px;
}
.card2 {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.9);
  transition: 0.3s;
  width: 13%;
  margin: 20px;
  float: left;
  margin-left:50px;
  margin-top:90px;
  
}

.card2:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.8);
}

.card2-header {
  background-color: green;
  padding: 20px;
  text-align: center;
  
}

.card2-body {
  padding: 20px;
}
.card3 {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0);
  transition: 0.3s;
  width: 13%;
  margin: 20px;
  float: left;
  margin-left:50px;
  margin-top:90px;
  
}

.card3:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.8);
}

.card3-header {
  background-color: orange;
  padding: 20px;
  text-align: center;
 
}

.card3-body {
  padding: 20px;
}
.card4 {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0);
  transition: 0.3s;
  width: 13%;
  margin: 20px;
  float: left;
  margin-left:50px;
  margin-top:90px;
  
}

.card4:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.8);
}

.card4-header {
  background-color: red;
  padding: 20px;
  text-align: center;
  
}

.card4-body {
  padding: 20px;
}
</style>
<br>
 <div class="container-fluid">
 <div id="columnchart12" style="width: 100%; height: 500px;"></div>
 </div>
 <div class="container-fluid">
 <div id="columnchart123" style="width: 100%; height: 500px;"></div>
 </div>

</body>
</html>