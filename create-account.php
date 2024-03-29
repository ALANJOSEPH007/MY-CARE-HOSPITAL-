<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/signup.css">
        
    <title>Create Account</title>
    <style>
        .container{
            animation: transitionIn-X 0.5s;
        }
    </style>
</head>
<body>
<?php

//learn from w3schools.com
//Unset all the server side variables
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

session_start();


$_SESSION["user"]="";
$_SESSION["usertype"]="";

// Set the new timezone
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');

$_SESSION["date"]=$date;


//import database
include("connection.php");





if($_POST){

    $result= $database->query("select * from webuser");

    $fname=$_SESSION['personal']['fname'];
    $lname=$_SESSION['personal']['lname'];
    $name=$fname." ".$lname;
    $address=$_SESSION['personal']['address'];
    // $nic=$_SESSION['personal']['nic'];
    $dob=$_SESSION['personal']['dob'];
    $email=$_POST['newemail'];
    $tele=$_POST['tele'];
    $newpassword=md5($_POST['newpassword']);
    $cpassword=md5($_POST['cpassword']);
    $code = mysqli_real_escape_string($database, md5(rand()));
    
    if ($newpassword==$cpassword){
        $result= $database->query("select * from webuser where email='$email';");
        if($result->num_rows==1){
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this Email address.</label>';
        }else{
            
            $database->query("insert into patient(pemail,pname,ppassword, paddress,pdob,ptel) values('$email','$name','$newpassword','$address','$dob','$tele');");
            $database->query("insert into register(email,name,password,tel,`activation_code`, `status`) values('$email','$name','$newpassword','$tele','$code','');");
            $database->query("insert into webuser values('$email','p')");

            //print_r("insert into patient values($pid,'$email','$fname','$lname','$newpassword','$address','$dob','$tele');");
            $_SESSION["user"]=$email;
            $_SESSION["usertype"]="p";
            $_SESSION["username"]=$fname;
            
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'mycarehospital2022@gmail.com';                     //SMTP username
        $mail->Password   = 'fhwwkxuugghvaeic';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('mycarehospital2022@gmail.com');
        $mail->addAddress($email);

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'no reply';
        $mail->Body    = 'Here is the verification link <b><buttononclick="myFunction()">Verification link</button></b>';

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    echo "</div>";
    $msg = "<div class='alert alert-info'>We've send a verification link on your email address.</div>";
        
            header('Location: patient/index.php');
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;"></label>';
        }
        
    }else {
        $error= "<div class='alert alert-danger'>Something wrong went.</div>";
    }
}else{
    //header('location: signup.php');
    $error='<label for="promter" class="form-label"></label>';
}

?>


    <center>
    <div class="container">
        <table border="0" style="width: 69%;">
            <tr>
                <td colspan="2">
                    <p class="header-text">Let's Get Started</p>
                    <p class="sub-text">It's Okey, Now Create User Account.</p>
                </td>
            </tr>
            <tr>
                <form action="" method="POST" >
                <td class="label-td" colspan="2">
                    <label for="newemail" class="form-label">Email: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="email" name="newemail" class="input-text" placeholder="Email Address"  onkeyup="validateEmail()"  required>
                </td>
                
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="tele" class="form-label">Mobile Number: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="tel" name="tele" class="input-text"  placeholder="ex: 0712345678" pattern="[0-9]{10}" onkeyup="validatePhone()" required >
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="newpassword" class="form-label">Create New Password: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="password" name="newpassword" class="input-text" placeholder="New Password" onkeyup="validatePassword()" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="cpassword" class="form-label">Conform Password: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="password" name="cpassword" class="input-text" placeholder="Conform Password"   onkeyup="validateConfirm()" required>
                </td>
            </tr>
     
            <tr>
                
                <td colspan="2">
                    <?php echo $error ?>

                </td>
            </tr>
            
            <tr>
                <td>
                    <input type="reset" value="Reset" class="login-btn btn-primary-soft btn" >
                </td>
                <td>
                    <input type="submit" value="Sign Up" class="login-btn btn-primary btn">
                </td>

            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    <label for="" class="sub-text" style="font-weight: 280;">Already have an account&#63; </label>
                    <a href="login.php" class="hover-link1 non-style-link">Login</a>
                    <br><br><br>
                </td>
            </tr>

                    </form>
            </tr>
        </table>

    </div>
</center>
<script>
function myFunction() {
  var txt;
  if (confirm("Successfully registered")) {
    txt = "You pressed OK!";
  } 
  document.getElementById("demo").innerHTML = txt;
}
function validateEmail()
{
  var emailvalue =document.getElementById('email');
  var mailformat=/^[a-z,A-Z,0-9][a-z,A-Z,0-9,_,.]*@[a-z]{3,5}\.[a-z]{2,3}$/;
  if (emailvalue.value.match(mailformat)) {
    text="";
    document.getElementById('mail_err').innerHTML = text;
    document.getElementById('signup_btn').disabled = false;
    return false;
  }     
  else {
    text="Invalid email format.";
    document.getElementById('mail_err').innerHTML = text;
    document.getElementById('signup_btn').disabled = true;
    return true;
  }
}

function validatePhone()
{
  var phonevalue =document.getElementById('phone');
  var format=/^[6-9]\d{9}/;
  if(phonevalue.value.length==10 && phonevalue.value.match(format))
  {
    text="";
    document.getElementById('ph_err').innerHTML = text;
    document.getElementById('signup_btn').disabled = false;
    return false;
  }
  else
  {
    text="Invalid Phone Number";
    document.getElementById('ph_err').innerHTML = text;
    document.getElementById('signup_btn').disabled = true;
    return true;
  }
}
function validatePassword() 
{
  var password =document.getElementById('password');
  var pformat=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;
  if(password.value.match(pformat))
  {
    text="";
    document.getElementById('pwd_err').innerHTML = text;
    document.getElementById('signup_btn').disabled = false;
    return false;
  }
  else {
    text="Password should contain atleast one capital letter, special character and a number";
    document.getElementById('pwd_err').innerHTML = text;
    document.getElementById('signup_btn').disabled = true;
    return true;
  }
}

function validateConfirm() 
{ 
  var password =document.getElementById('password');
  var cpassword =document.getElementById('cpassword');
  var x=passwordvalue.value;
  var y=cpasswordvalue.value;
  if (x === y) 
  { 
    text="";
    document.getElementById('cpwd_err').innerHTML = text;
    document.getElementById('signup_btn').disabled = false;
    return false;
  }
  else 
  {
    text="Password does not match";
    document.getElementById('cpwd_err').innerHTML = text;
    document.getElementById('signup_btn').disabled = true;
    return true;
  }
}
</script>
</body>
</html>