<?php

//learn from w3schools.com

session_start();
$email = $_SESSION["user"];
if(isset($_SESSION["user"])){
    if(($_SESSION["user"])=="" or $_SESSION['usertype']!='d'){
        header("location: ../login.php");
    }

}else{
    header("location: ../login.php");
}



//import database
include("../connection.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>Doctors</title>
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

    <div class="sidebar">
    <div class="logo-details">
       &nbsp;
       <!-- <i class='bx bxl-c-plus-plus'></i>  -->
      <span class="logo_name">MYCARE</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="index.php" class="active">
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
        <div class="dash-body">
            <table border="0" width="120%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr >
                    <td width="13%">
                        <a href="doctors.php" ><button  class="login-btn btn-primary-soft btn btn-icon-back"  style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px"><font class="tn-in-text">Back</font></button></a>
                    </td>
                    <td>
                        
                        <form action="" method="post" class="header-search">

                            <input type="search" name="search" class="input-text header-searchbar" placeholder="Search Doctor name or Email" list="doctors">&nbsp;&nbsp;
                            
                            <?php
                                echo '<datalist id="doctors">';
                                $list11 = $database->query("select  docname,docemail from  doctor;");

                                for ($y=0;$y<$list11->num_rows;$y++){
                                    $row00=$list11->fetch_assoc();
                                    $d=$row00["docname"];
                                    $c=$row00["docemail"];
                                    echo "<option value='$d'><br/>";
                                    echo "<option value='$c'><br/>";
                                };

                            echo ' </datalist>';
?>
                            
                       
                            <input type="Submit" value="Search" class="login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
                        
                        </form>
                        
                    </td>
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


                </tr>
               
              
                <?php

                    if($_POST){
                        $keyword=$_POST["search"];
                        // $email = $_SESSION['user'];
                        $sqlmain= "SELECT * FROM `leave_tbl` WHERE email ='$email'";
                    }
                    else
                    {
                        $sqlmain= "SELECT * FROM `leave_tbl` WHERE email ='$email'";

                    }



                ?>
                  
                <tr>
                   <td colspan="4">
                       <center>
                        <div class="abc scroll">
                        <table width="65%" class="sub-table scrolldown" border="0">
                        <thead>
                        <tr>
                                <th class="table-headin">
                                    
                                
                                Doctor Name
                                
                                </th>
                                <th class="table-headin">
                                    Email
                                </th>
                                <th class="table-headin">
                                    Contact
                                </th>
                                <th class="table-headin">
                                    
                                    Leave From
                                    
                                </th>
                                <th class="table-headin">
                                    
                                Leave To
                               </th>
                               
                               <th class="table-headin">
                                    
                                Description
                               </th>
                               <th class="table-headin">
                                    
                                    Action
                                   </th>
                                </tr>
                        </thead>
                        <tbody>
                  
                            <?php

                                
                                $result= $database->query($sqlmain);

                               
                                for ( $x=0; $x<$result->num_rows;$x++) {
                                    $row=$result->fetch_assoc();
                                   ?><tr>
                                    <?php
                                    $name=$row["name"];
                                    $email=$row["email"];
                                    $contact=$row["contact"];
                                    $from=$row["fromdate"];
                                    $to=$row["todate"];
                                    $descr=$row["descr"];
                                    echo '
                                        <td> &nbsp;'.
                                        substr($name,0,30)
                                        .'</td>
                                        <td>
                                        '.substr($email,0,20).'
                                        </td>
                                        <td>
                                            '.substr($contact,0,20).'
                                        </td>
                                        <td>
                                        '.substr($from,0,20).'
                                        </td>
                                        <td>
                                        '.substr($to,0,20).'
                                    </td>
                                    <td>
                                    '.substr($descr,0,20).'
                                </td>
                                    ';
                                    
                               
                        
                                 
                            ?>
                            <td><?php if ($row['status']==2) { 
	 ?>  <a href="approve.php?id=<?php echo $row['id'];?>" class="non-style-link"><button  class="btn-primary-soft btn "  style=" background-color:green; color:#ffff;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Approved</font></button></a>
     <?php }  else if ($row['status']==-1) { ?>
        <a class="non-style-link"><button  class="btn-primary-soft btn "  style=" background-color:red; color:#ffff;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Rejected</font></button></a>

        <!-- <?php } else {?>
    <a class="non-style-link"><button  class="btn-primary-soft btn "  style=" background-color:red; color:#ffff;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Rejected</font></button></a>
<?php } ?> -->
</td> </tr> 
 <?php } ?>
                          
                           
                            </tbody>

                        </table>
                        </div>
                        </center>
                   </td> 
                </tr>
                       
                        
                        
            </table>
        </div>
    </div>
        }
</div>

</body>
</html>