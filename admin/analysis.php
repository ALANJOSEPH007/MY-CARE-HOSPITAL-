<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> MYCARE- Admin </title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
     
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
 

   </head>
<body>
  <?php
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
include("../connection.php");
?>
<script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {
 var data = google.visualization.arrayToDataTable([

 ['Users','Number'],
 <?php 
      $query= "SELECT count(usertype) AS number, usertype FROM webuser where  usertype!='a' GROUP BY usertype";
      
       $exec = mysqli_query($database,$query);
       while($row = mysqli_fetch_array($exec)){

       echo "['".$row['usertype']."',".$row['number']."],";
       }
       ?> 
 
 ]);

 var options = {
 title: 'Registered Patients and Doctors',
  pieHole: 0,
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

 ['Dates','Number'],
 <?php 
      $query= "SELECT count(appodate) AS number, appodate FROM appointment GROUP BY appodate";
      
       $exec = mysqli_query($database,$query);
       while($row = mysqli_fetch_array($exec)){

       echo "['".$row['appodate']."',".$row['number']."],";
       }
       ?> 
 
 ]);

 var options = {
 title: 'Number of Appointments ',
  pieHole: 0,
          pieSliceTextStyle: {
            color: 'black',
          },
          legend: 'none'
 };
 var chart = new google.visualization.BarChart(document.getElementById("columnchart123"));
 chart.draw(data,options);
 }
  
    </script>
       
<div id="google-element">
  <div class="sidebar">
    <div class="logo-details">
       &nbsp;
       <!-- <i class='bx bxl-c-plus-plus'></i> --> -->
      <span class="logo_name">MYCARE</span>
    </div>
    <ul class="nav-links">
        <li>
          <a href="index.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="doctors.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">DOCTORS</span>
          </a>
        </li>
        <li>
          <a href="patient.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">PATIENTS</span>
          </a>
        </li>
        
        <li>
          <a href="appointment.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">APPOINTMENTS</span>
          </a>
        </li>
        <li>
          <a href="schedule.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">SCHEDULE</span>
          </a>
        </li>
        <li>
          <a href="docleave.php">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Doctor Leave</span>
          </a>
        </li>
        <!-- <li>
          <a href="chart.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">DATA</span>
          </a>
        </li> -->
        <li>
          <a href="contact.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">QUERIES</span>
          </a>
        </li>
        <li>
          <a href="analysis.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">ANALYSIS</span>
          </a>
        </li>
        <li>
          <!-- <a href="#">
            <i class='bx bx-user' ></i>
            <span class="links_name">Team</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-message' ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-heart' ></i>
            <span class="links_name">Favrorites</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Setting</span>
          </a>
        </li>
         <li class="log_out"> -->
          <a href="../logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <td width="15%">
        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
            Today's Date
        </p>
        <p class="heading-sub12" style="padding: 0;margin: 0;">
            <?php 
        date_default_timezone_set('Asia/Kolkata');

        $date = date('Y-m-d');
        echo $date;
        ?>
        </p>
    </td>
    <td width="10%">
        <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
    </td>
      <div class="profile-details">
        <!-- <img src="images/profile.jpg" alt=""> -->
        <span class="admin_name">ADMIN</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav><br>
    <br>
    <div class="container-fluid">
 <div id="columnchart12" style="width: 100%; height: 500px;"></div>
 </div>
 <div class="container-fluid">
 <div id="columnchart123" style="width: 100%; height: 500px;"></div>
 </div>
 <div class="container-fluid">
 <div id="columnchart124" style="width: 100%; height: 500px;"></div>
 </div>

    
                            <script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>
                            <script >
                                function loadGoogleTranslate(){
                                   new google.translate.TranslateElement("google_element");
                                }
                            </script>
</div>
     
  </section>
 
  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>
