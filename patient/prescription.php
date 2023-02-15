<?php
include("../connection.php");
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    <title>Sessions</title>
    <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
</style>
</head>
<body>
    <?php

    //learn from w3schools.com

    

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='p'){
            header("location: ../login.php");
        }else{
            $useremail=$_SESSION["user"];
        }

    }else{
        header("location: ../login.php");
    }
    

    //import database
    include("../connection.php");
    $userrow = $database->query("select * from patient where pemail='$useremail'");
    $userfetch=$userrow->fetch_assoc();
    $userid= $userfetch["pid"];
    $username=$userfetch["pname"];


    //echo $userid;
    //echo $username;
    
    date_default_timezone_set('Asia/Kolkata');

    $today = date('Y-m-d');


 //echo $userid;
 ?>
 <div class="container">
 <div class="sidebar">
    <div class="logo-details">
       &nbsp;
       <!-- <i class='bx bxl-c-plus-plus'></i> --> 
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
          <a href="doctors.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">DOCTORS</span>
          </a>
        </li>
        <li>
          <a href="appointment.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name"> APPOINMENT BOOKINGS</span>
          </a>
        </li>
        <li>
          <a href="schedule.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">SESSIONS</span>
          </a>
        </li>
        <li>
          <a href="prescription.php">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">PRESCRIPTION</span>
          </a>
          <!-- <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a> -->
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
        <?php

               


                ?>
                  
        <div class="dash-body">
          
            <table border="0" width="120%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
            <form action="pdf.php" method="POST">
           

          
                <tr >
                    <td width="13%" >
                    <a href="schedule.php" ><button  class="login-btn btn-primary-soft btn btn-icon-back"  style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px"><font class="tn-in-text">Back</font></button></a>
                    </td>
                    <td >
                         
                    </td>
                    <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                            Today's Date
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;">
                            <?php 

                                
                                echo $today;

                                

                        ?>
                        </p>
                    </td>
                    <td width="10%">
                        <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                    </td>


                </tr>
                
              
                <tr>
                   <td colspan="4">
                       <center>
                        <div class="abc scroll">
                        <table width="70%" class="sub-table scrolldown" border="0" style="padding: 50px;border:none">
                        <table width="65%" class="sub-table scrolldown" border="0">
                        <thead>
                        <tr>
                                <th class="table-headin">
                                    
                                
                                Doctor 
                                
                                </th>
                                <th class="table-headin">
                                  Disease
                                </th>
                                <th class="table-headin">
                                  Allergies
                                </th>
                               
                               
                               <th class="table-headin">
                                    
                                Prescription
                               </th>
                               <th class="table-headin">
                                    
                                    Action
                                   </th>
                                </tr>
                        </thead>
                        <tbody>
				
                     <?php
						$iddd=$_SESSION['iddd'];
                        $sql="select * from tbl_prescrip where pid='$iddd'";
						$res=mysqli_query($database,$sql);
						$count=mysqli_num_rows($res);
						if($count>0)
{
	while($row=mysqli_fetch_assoc($res)){
    $id=$row['pre_id'];
		$pt=$row['p_name'];
		$doc=$row['doc_name'];
		$dis=$row['disease'];
		$ale=$row['Allergy'];
		$pre=$row['prescription'];
	
	              
 ?>
 
 <tr>

<td>
	<?php  echo $doc;?>
</td>
<td>
	<?php  echo $dis;?>
</td>
<td>
	<?php  echo $ale;?>
</td>
<td>
	<?php  echo $pre;?>
</td>
<td><button type="submit"  name="btn_pdf" value="<?php echo $id;?>">PDF</button></td>
 </tr>
  
 <?php
					}}	?>
                            
</form>
                        </table>
                        </div>
                        </center>
                   </td> 
                </tr>
                       
                        
                        
            </table>
        </div>
    </div>

    </div>

</body>
</html>
