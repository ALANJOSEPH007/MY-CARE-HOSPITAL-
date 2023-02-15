<?php
include('../connection.php');
session_start();

if (isset($_POST["submit"]))
{
	// $var = $_POST['email'];
    $type=$_POST['res'];
    $fromdate=$_POST['fromdate'];
    $todate=$_POST['todate'];
    $des=$_POST['reason'];
    $email= $_SESSION['user'];
   
    $lid="";        
    $sql = "SELECT * FROM `doctor` WHERE `docemail`= '$email'";
    $data = mysqli_query($database, $sql);
    if($row = mysqli_fetch_array($data))
    {
     $lid = $row['docid'];
     $name= $row['docname'];
     $contact= $row['doctel'];
    }
     
      mysqli_query($database, "INSERT INTO `leave_tbl`(`id`,`lid`,`type`,`descr`,`fromdate`,`todate`,`name`,`email`,`contact`,`status`)
     VALUES ('','$lid','$type','$des','$fromdate','$todate', '$name','$email','$contact',1)");
  
    }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta charset="UTF-8">
    <title> MYCARE- Admin  </title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>Leave</title>
    <style>
    h1 {
      text-align: center;
      font-size: 2.5em;
      font-weight: bold;
      padding-top: 1em;
      margin-bottom: -0.5em;
    }

    form {
      padding: 40px;
    }

    input,
    textarea {
      margin: 5px;
      font-size: 1.1em !important;
      outline: none;
    }

    label {
      margin-top: 2em;
      font-size: 1.1em !important;
    }

    label.form-check-label {
      margin-top: 0px;
    }

    #err {
      display: none;
      padding: 1.5em;
      padding-left: 4em;
      font-size: 1.2em;
      font-weight: bold;
      margin-top: 1em;
    }

    table{
      width: 90% !important;
      margin: 1.5rem auto !important;
      font-size: 1.1em !important;
    }

    .error{
      color: #FF0000;
    }
  </style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script>
    const validate = () => {

      let desc = document.getElementById('leaveDesc').value;
      let checkbox = document.getElementsByClassName("form-check-input");
      let errDiv = document.getElementById('err');

      let checkedValue = [];
      for (let i = 0; i < checkbox.length; i++) {
        if(checkbox[i].checked === true)
          checkedValue.push(checkbox[i].id);
      }

      let errMsg = [];

      if (desc === "") {
        errMsg.push("Please enter the reason and date of leave");
      }

      if(checkedValue.length < 1){
        errMsg.push("Please select the type of Leave");
      }

      if (errMsg.length > 0) {
        errDiv.style.display = "block";
        let msgs = "";

        for (let i = 0; i < errMsg.length; i++) {
          msgs += errMsg[i] + "<br/>";
        }

        errDiv.innerHTML = msgs;
        scrollTo(0, 0);
        return;
      }
    }
  </script>
</head>
<body>
    <?php

    //learn from w3schools.com

 

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='d'){
            header("location: ../login.php");
        }else{
            $useremail=$_SESSION["user"];
        }

    }else{
        header("location: ../login.php");
    }
    
    

       //import database
       include("../connection.php");
       $userrow = $database->query("select * from doctor where docemail='$useremail'");
       $userfetch=$userrow->fetch_assoc();
       $userid= $userfetch["docid"];
       $username=$userfetch["docname"];
    //echo $userid;
    ?>
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
<?php

//learn from w3schools.com

// session_start();

if(isset($_SESSION["user"])){
    if(($_SESSION["user"])=="" or $_SESSION['usertype']!='d'){
        header("location: ../login.php");
    }else{
        $useremail=$_SESSION["user"];
    }

}else{
    header("location: ../login.php");
}


//import database
include("../connection.php");
$userrow = $database->query("select * from doctor where docemail='$useremail'");
$userfetch=$userrow->fetch_assoc();
$userid= $userfetch["docid"];
$username=$userfetch["docname"];


//echo $userid;
//echo $username;

?>
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
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">SESSION</span>
          </a>
          <!-- <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a> -->
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
    <div class="container">
        
        <div class="dash-body">
        <form method="POST" action="#" onsubmit="alert(' successfully applied')">
        <li>
          <a href="leavehis.php">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Leave History</span>
          </a>
        </li>      
  
      <label><b>Select Leave Type :</b></label>
      <!-- error message if type of absence isn't selected -->
<!--     
      <div class="form-check">
        <input class="form-check-input" name="absence[]" type="checkbox" value="Sick" id="Sick">
        <label class="form-check-label" for="Sick">
          Sick
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" name="absence[]" type="checkbox" value="Casual" id="Casual">
        <label class="form-check-label" for="Casual">
          Casual
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" name="absence[]" type="checkbox" value="Vacation" id="Vacation">
        <label class="form-check-label" for="Vacation">
          Vacation -->
          
          
                        <div class="form-check">
                            <select name="res" class="form-control" id="res" required >
                            <option  class="form-check-input" ></option>
                                <option value="Sick" name="res">Sick</option>
                                <option value=" Casual" name="res">Casual</option>
                                <option value="Climatic Disaster " name="res">Climatic Disaster</option>
                                <option value=" Family Functions" name="res ">Family Functions</option>
                                <option value="Others" name="res">Others</option>
                              </select>
                        </div><br><br>  
        <!-- </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" name="absence[]" type="checkbox" value="Bereavement" id="Bereavement">
        <label class="form-check-label" for="Bereavement">
          Bereavement
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" name="absence[]" type="checkbox" value="Time off without pay" id="Time Off Without Pay">
        <label class="form-check-label" for="Time Off Without Pay">
          Time off without pay
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" name="absence[]" type="checkbox" value="Maternity / Paternity" id="Maternity/Paternity">
        <label class="form-check-label" for="Maternity/Paternity">
          Maternity / Paternity
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" name="absence[]" type="checkbox" value="Sabbatical" id="Sabbatical">
        <label class="form-check-label" for="Sabbatical">
          Sabbatical
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" name="absence[]" type="checkbox" value="Other" id="Other">
        <label class="form-check-label" for="Other">
          Others
        </label>
      </div> -->
  
      <div class="mb-3 ">
        <label for="dates"><b>From -</b></label>
        <input type="date" name="fromdate">
  
        <label for="dates"><b>To -</b></label>
        <input type="date" name="todate">
      </div>
  
      <div class="mb-3">
        
        <label for="leaveDesc" class="form-label"><b>Please mention reasons for your leave days :</b></label>
        <!-- error message if reason of the leave is not given -->
         
        <textarea class="form-control" name="reason" id="leaveDesc" rows="4" placeholder="Enter Here..."></textarea>
      </div>
  
  
      <input type="submit" name="submit" value="Submit Leave Request" class="btn btn-success">
    </form>
                
                <?php


                    $sqlmain= "select appointment.appoid,schedule.scheduleid,schedule.title,doctor.docname,patient.pname,schedule.scheduledate,schedule.scheduletime,appointment.apponum,appointment.appodate from schedule inner join appointment on schedule.scheduleid=appointment.scheduleid inner join patient on patient.pid=appointment.pid inner join doctor on schedule.docid=doctor.docid  where  doctor.docid=$userid ";

                    if($_POST){
                        //print_r($_POST);
                        


                        
                        if(!empty($_POST["sheduledate"])){
                            $sheduledate=$_POST["sheduledate"];
                            $sqlmain.=" and schedule.scheduledate='$sheduledate' ";
                        };

                        

                        //echo $sqlmain;

                    }


                ?>
                  
               
                        
                           
    </div>

</body>
</html>