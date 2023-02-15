<?php
include("../connection.php");
session_start();

// $userrow = $database->query("select * from doctor where docemail='$useremail'");
// $userfetch=$userrow->fetch_assoc();
// $userid= $userfetch["docid"];
// $username=$userfetch["docname"];

$doctor=$_SESSION['docname'];

#############################################################################################################################################################
if(isset($_POST['p']) )
{
  $id = $_POST['p'];
  $_SESSION['pidd']="$id";

}

if(isset($_POST['prescribe']) )
{



   $id=$_SESSION['pidd'];
  $disease = $_POST['disease'];
  $allergy = $_POST['allergy'];
  $pname = $_POST['p_name'];
  $prescription = $_POST['prescription'];
 
  $query=mysqli_query($database,"INSERT INTO `tbl_prescrip`( `p_name`,`pid`,`doc_name`,`disease`,`Allergy`,`prescription`)
 VALUES ('$pname','$id','$doctor','$disease','$allergy','$prescription')");

if($query)
{
  echo "<script>alert('Prescribed successfully!');</script>";
}
else{
  echo "<script>alert('Unable to process your request. Try again!');</script>";
}
}






#############################################################################################################################################################


?>






<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> MYCARE- Doctor </title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <meta name="viewport" content="width=device-width, -scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    
        <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
     <style>
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>

   </head>
<body>

  <div class="sidebar">
    <div class="logo-details">
       &nbsp;
       <!-- <i class='bx bxl-c-plus-plus'></i> --> -->
      <span class="logo_name">MYCARE</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">DASHBOARD</span>
          </a>
        </li>
        <!-- <li>
           <a href="#">
            <i class='bx bx-box' ></i>
            <span class="links_name">DOCTORS</span>
          </a> 
        </li> -->
        <li>
          <a href="appointment.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">APPOINTMENTS</span>
          </a>
        </li>
        
        <li>
          <a href="patient.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">PATIENTS</span>
          </a>
        </li>
       
        <li>
          <a href="docleave.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">LEAVE</span>
          </a>
        </li>
        <li>
        <a href="schedule.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">SESSION</span>
          </a>
        </li>
        <li>
          <a href="prescription.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">PRESCRIPTIONS</span>
          </a>
        </li>
        <li>
          <!-- <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">QUERIES</span>
          </a> -->
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
         
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <!-- <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div> -->
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

<div class="dropdown">
  <button class="dropbtn"><p class="profile-title">Dr.<?php echo $_SESSION['docname']; ?>..</p></button>
  <div class="dropdown-content">
    <!-- <a href="edituser.php">Profile</a> -->
    <a href="settings.php">settings</a>
    <a href="../logout.php">Logout</a>
  </div>
</div>

        
        <!-- <i class='bx bx-chevron-down' ></i> -->
      </div>
    </nav>
</div>
<?php

// session_start();
// include('func1.php');
// $pid='';
// $ID='';h
// $appdate='';
// $apptime='';
// $fname = '';
// $lname= '';
 $doctor = $_SESSION['docname'];
// if(isset($_GET['pid']) && isset($_GET['ID']) && ($_GET['appdate']) && isset($_GET['apptime']) && isset($_GET['fname']) && isset($_GET['lname'])) {
// $pid = $_GET['pid'];
//   $ID = $_GET['ID'];
//   $fname = $_GET['fname'];
//   $lname = $_GET['lname'];
//   $appdate = $_GET['appdate'];
//   $apptime = $_GET['apptime'];
// }



?>

<html lang="en">
  <head>


    <!-- Required meta tags -->
   
      <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
      <a class="navbar-brand" href="#"><i class="fa fa-hospital-o" aria-hidden="true"></i> Hospital Management System</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <style >
    .bg-primary {
      background: #F0F2F0;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #000C40, #F0F2F0);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #000C40, #F0F2F0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
.list-group-item.active {
    z-index: 2;
    color: #fff;
    background-color: #342ac1;
    border-color: #007bff;
}
.text-primary {
    color: #342ac1!important;
}

.btn-primary{
  background-color: #3c50c1;
  border-color: #3c50c1;
}
  </style>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
       <!-- <li class="nav-item">
        <a class="nav-link" href="logout1.php"><i class="fa fa-power-off" aria-hidden="true"></i> Logout</a>
        
      </li> -->
       <li class="nav-item">
       <a class="nav-link" href="index.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Back</a>
      </li>
    </ul>
  </div>
</nav>

</head>
  <style type="text/css">
    button:hover{cursor:pointer;}
    #inputbtn:hover{cursor:pointer;}
  </style>

<body style="padding-top:50px;">
   <div class="container-fluid" style="margin-top:50px;">
    <h3 style = "margin-left: 40%;  padding-bottom: 20px; font-family: 'IBM Plex Sans', sans-serif;"> Welcome &nbsp<?php echo $_SESSION['docname']; ?>
   </h3>

   <div class="tab-pane" id="list-pres" role="tabpanel" aria-labelledby="list-pres-list">
        <form class="form-group"  action="" name="prescribeform" method="post">
        
          <div class="row">
            <div class="container">
            <div class="form-group">
              <?php
             $idd=$_SESSION['pidd'];
              $checker = $database->query("SELECT `pname` from `patient` where pid='$idd'");
                $rw=mysqli_fetch_array($checker);
                if ($checker->num_rows==1){

                    foreach($checker as $a)
                    {
                        $name=$a['pname'];
                    
              
              ?>
                <label>Patient Name: </label>
                <textarea id="disease" class="form-control" rows ="2" name="p_name" value="<?php echo $name; ?>"  required><?php echo $name; }}?></textarea>
              </div>
              <div class="form-group">
                <label>Disease:</label>
                <textarea id="disease" class="form-control" rows ="5" name="disease" required></textarea>
              </div>
    
              <div class="form-group">
                <label>Allergies:</label>
                <textarea id="allergy" class="form-control" rows ="5" name="allergy" required></textarea>
              </div>
    
              <div class="form-group">
                <label>Prescription:</label>
                <textarea id="prescription"class="form-control" rows ="5" name="prescription" required></textarea>
              </div>
                      
                     
                      
                      </div><br>
                      <input type="hidden" name="fname" value="<?php echo $fname ?>" />
                      <input type="hidden" name="lname" value="<?php echo $lname ?>" />
                      <input type="hidden" name="appdate" value="<?php echo $appdate ?>" />
                      <input type="hidden" name="apptime" value="<?php echo $apptime ?>" />
                      <input type="hidden" name="pid" value="<?php echo $pid ?>" />
                      <input type="hidden" name="ID" value="<?php echo $ID ?>" />
                      <br><br>
                  <input type="submit" name="prescribe" value="Prescribe" class="btn btn-primary" style="margin-left: 40pc;">
            </div>
          </div>
          
        </form>
        <br>
        
      </div>
      </div>

      <!-- <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Recent Sales</div>
          <div class="sales-details">
            <ul class="details">
              <li class="topic">Date</li>
              <li><a href="#">02 Jan 2021</a></li>
              <li><a href="#">02 Jan 2021</a></li>
              <li><a href="#">02 Jan 2021</a></li>
              <li><a href="#">02 Jan 2021</a></li>
              <li><a href="#">02 Jan 2021</a></li>
              <li><a href="#">02 Jan 2021</a></li>
              <li><a href="#">02 Jan 2021</a></li>
            </ul>
            <ul class="details">
            <li class="topic">Customer</li>
            <li><a href="#">Alex Doe</a></li>
            <li><a href="#">David Mart</a></li>
            <li><a href="#">Roe Parter</a></li>
            <li><a href="#">Diana Penty</a></li>
            <li><a href="#">Martin Paw</a></li>
            <li><a href="#">Doe Alex</a></li>
            <li><a href="#">Aiana Lexa</a></li>
            <li><a href="#">Rexel Mags</a></li>
             <li><a href="#">Tiana Loths</a></li>
          </ul>
          <ul class="details">
            <li class="topic">Sales</li>
            <li><a href="#">Delivered</a></li>
            <li><a href="#">Pending</a></li>
            <li><a href="#">Returned</a></li>
            <li><a href="#">Delivered</a></li>
            <li><a href="#">Pending</a></li>
            <li><a href="#">Returned</a></li>
            <li><a href="#">Delivered</a></li>
             <li><a href="#">Pending</a></li>
            <li><a href="#">Delivered</a></li>
          </ul>
          <ul class="details">
            <li class="topic">Total</li>
            <li><a href="#">$204.98</a></li>
            <li><a href="#">$24.55</a></li>
            <li><a href="#">$25.88</a></li>
            <li><a href="#">$170.66</a></li>
            <li><a href="#">$56.56</a></li>
            <li><a href="#">$44.95</a></li>
            <li><a href="#">$67.33</a></li>
             <li><a href="#">$23.53</a></li>
             <li><a href="#">$46.52</a></li>
          </ul>
          </div>
          <div class="button">
            <a href="#">See All</a>
          </div>
        </div>
        <div class="top-sales box">
          <div class="title">Top Seling Product</div>
          <ul class="top-sales-details">
            <li>
            <a href="#">
              <img src="images/sunglasses.jpg" alt="">
              <span class="product">Vuitton Sunglasses</span>
            </a>
            <span class="price">$1107</span>
          </li>
          <li>
            <a href="#">
              <img src="images/jeans.jpg" alt="">
              <span class="product">Hourglass Jeans </span>
            </a>
            <span class="price">$1567</span>
          </li>
          <li>
            <a href="#">
              <img src="images/nike.jpg" alt="">
              <span class="product">Nike Sport Shoe</span>
            </a>
            <span class="price">$1234</span>
          </li>
          <li>
            <a href="#">
              <img src="images/scarves.jpg" alt="">
              <span class="product">Hermes Silk Scarves.</span>
            </a>
            <span class="price">$2312</span>
          </li>
          <li>
            <a href="#">
              <img src="images/blueBag.jpg" alt="">
              <span class="product">Succi Ladies Bag</span>
            </a>
            <span class="price">$1456</span>
          </li>
          <li>
            <a href="#">
              <img src="images/bag.jpg" alt="">
              <span class="product">Gucci Womens's Bags</span>
            </a>
            <span class="price">$2345</span>
          <li>
            <a href="#">
              <img src="images/addidas.jpg" alt="">
              <span class="product">Addidas Running Shoe</span>
            </a>
            <span class="price">$2345</span>
          </li>
<li>
            <a href="#">
              <img src="images/shirt.jpg" alt="">
              <span class="product">Bilack Wear's Shirt</span>
            </a>
            <span class="price">$1245</span>
          </li>
          </ul>
        </div>
      </div>
    </div> --> 
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
  
