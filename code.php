<?php
session_start();
include ('dbcon.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';

try {
    function sendemail_varify($first_name, $email, $verify_token) {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.gmail.com';
        $mail->Username = 'saidqaaje11@gmail.com';
        $mail->Password = 'abesaid12';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('saidqaaje11@gmail.com', $first_name);
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Email verification from said';

        $email_template = "
        <h2>You have registered with eng said</h2>
        <h5>Verify your email address to login with the below link:</h5>
        <br/><br/>
        <a href='http://localhost/crud_project_v.2/Register.php/verify-email.php?token=$verify_token'>Click here</a>
        ";

        $mail->Body = $email_template;
        $mail->send();
        echo "Message has been sent";
    }

    if(isset($_POST['register_btn'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $verify_token = md5(rand());

        sendemail_varify($first_name, $email, $verify_token);
        echo "sent or not";
    }
} catch (Exception $e) {
    echo "Error sending email: {$mail->ErrorInfo}";
}


    //Email exisist or not 
    
   $check_email_query =  "SELECT email FROM administrators WHERE email = '$email' LIMIT 1";
   check_email_query_run = mysqli_query('$conn',$check_email_query);

   if(mysqli_num_rows(check_email_query_run) > 0 ){
    
    $_SESSION['status'] = "Email already Exsist";
    header("location: register.php");
   } else{

    //insert user / Registed User Data
    $query = "INSERT INTO administrators (first_name, last_name, email, password, 	varify_token) VALUES('$first_name','$last_name', '$email', '$password', '$verify_token')"
    $query_run = mysqli_query($con,$query);

    if($query_run){
        sendemail_varify("$first_name","$email","$verify_token");
        $_SESSION['status'] = "Registeration Successed! Please verify your Email Address";
        header("location: register.php");
    } else{
        $_SESSION['status'] = "Registeration Failed!!";
        header("location: register.php");
    }
   
  }
}
?>