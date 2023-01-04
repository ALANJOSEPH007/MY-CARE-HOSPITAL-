<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/login.css">
        
    <title>Forgot Password</title>

    
    
</head>
<body>
    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    $msg="";
    include ('connection.php') ;
    //learn from w3schools.com
    //Unset all the server side variables
    if($_POST)
    {
        $email=$_POST['useremail'];
        $selectquery=mysqli_query($database,"select * from register where email='{$email}'")or die(mysqli_error($database));
        $selectquery1=mysqli_query($database,"select * from patient where pemail='{$email}'")or die(mysqli_error($database));
        $selectquery2=mysqli_query($database,"select * from doctor where docemail='{$email}'")or die(mysqli_error($database));
        $count=mysqli_num_rows($selectquery);
        // $count1=mysqli_num_rows($selectquery1);
        $count2=mysqli_num_rows($selectquery2);
        $row=mysqli_fetch_array($selectquery);
        $row2=mysqli_fetch_array($selectquery2);
         if($count>0)
         {
            require 'vendor/autoload.php';
            $mail = new PHPMailer(true);
           

        try {
        //Server settings
        $mail->SMTPDebug = false;                    //disable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'mycarehospital2022@gmail.com';                     //SMTP username
        $mail->Password   = 'fhwwkxuugghvaeic';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('mycarehospital2022@gmail.com');
        $mail->addAddress($email,'email');
        // $password=$row['newpassword'];
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Forgot Password';
        $mail->Body    = "Hi $email your Password is {$row['password']}";
        $mail->AltBody = "Hi $email your Password is {$row['password']}";

        $mail->send();
        $msg="your password has been sent to your email";
    } catch (Exception $e) {
        echo "Message could not be sent." ;
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
    // echo "</div>";
    // $msg = "<div class='alert alert-info'>We've send a password on your email address.</div>";
        
        //     header('Location: patient/index.php');
        //     $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;"></label>';
        }
        
    }else {
        $error= "<div class='alert alert-danger'>Something wrong went.</div>";
    }
// else{
//     //header('location: signup.php');
//     $error='<label for="promter" class="form-label"></label>';
// }
         
        // elseif($count2>0)
        // {
        //     echo $row
        // }


?>
    <center>
    <div class="container">
        <table border="0" style="margin: 0;padding: 0;width: 60%;">
            <tr>
                <td>
                    <p class="header-text">Have forgotten</p>
                </td>
                <?php echo $msg; ?>
            </tr>
        <div class="form-body">
            <tr>
                <td>
                    <p class="sub-text">forgot password</p>
                </td>
            </tr>
            <tr>
                <form action="" method="POST" >
                <td class="label-td">
                    <label for="useremail" class="form-label">Email: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td">
                    <input type="email" name="useremail" class="input-text" placeholder="Email Address" required>
                </td>
            </tr>
            
            <tr>
                <td>
                    <input type="submit" value="submit" class="login-btn btn-primary btn">
                </td>
            </tr>
        </div>
            <tr>
                <td>
                    <br>
                    <!-- <label for="" class="sub-text" style="font-weight: 280;">Don't have an account&#63; </label>
                    <a href="signup.php" class="hover-link1 non-style-link">Sign Up</a><br> -->
                    <label for="" class="sub-text" style="font-weight: 280;">Back to login&#63; </label>
                    <a href="login.php" class="hover-link1 non-style-link">Login</a>
                    <br><br><br>
                </td>
            </tr>
                        
                        
    
                        
                    </form>
        </table>

    </div>
</center>
</body>
</html>