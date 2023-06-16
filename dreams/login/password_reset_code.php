<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require __DIR__ . '/../../vendor/autoload.php';
include('connection.php');
session_start();
$page_title = "Change password";

function send_password_reset($get_name,$get_email,$token){
    $mail = new PHPMailer(true);

    //$mail->SMTPDebug = 2;
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    $mail->isSMTP();  
    $mail->SMTPAuth   = true;  

    $mail->Host       = 'smtp.gmail.com';
    $mail->Username   = 'tyaginiharika113@gmail.com';                     
    $mail->Password   = 'bchwulxrnzfrxrev';

    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;

    $mail->setFrom('tyaginiharika113@gmail.com', $get_name);
    $mail->addAddress($get_email);

    $mail->isHTML(true);
    $mail->Subject = "Reset Password Notification";

    $email_template = "
    <h2>Hello $get_name,</h2>
    <h5>We have recieved a password reset request from your account.</h5>
    <br/><br/>
    <a href='http://localhost/dreams_figma/login/password_change.php?token=$token&email=$get_email'>Click me</a>
    ";

    $mail->Body = $email_template;
    $mail->send();
}

if(isset($_POST['password_reset_link'])){
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT mentee_name,mentee_mail FROM mentee_table WHERE mentee_mail='$email' LIMIT 1";
    $check_email_run = mysqli_query($con, $check_email);
    if(mysqli_num_rows($check_email_run) > 0){
        $row = mysqli_fetch_array($check_email_run);
        $get_name = $row['mentee_name'];
        $get_email = $row['mentee_mail'];

        $update_token = "UPDATE mentee_table SET verify_token='$token' WHERE mentee_mail='$get_email' LIMIT 1";
        $update_token_run = mysqli_query($con, $update_token);
        if($update_token_run){
            send_password_reset($get_name,$get_email,$token);
            $_SESSION['status'] = "Reset link has been sent. Please check your mail...";
            header('Location: passresetpage.php');
            exit(0);

        }
        else{
            $_SESSION['status'] = "Something went wrong. #1";
            header('Location: passresetpage.php');
            exit(0);
        }
    }
    else{
        $_SESSION['status'] = "No email found";
        header('Location: passresetpage.php');
        exit(0);
    }
}

if(isset($_POST['password_update'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $new_password = mysqli_real_escape_string($con, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);
    $token = mysqli_real_escape_string($con, $_POST['password_token']);

    if(!empty($token)){
        if(!empty($email) && !empty($new_password) && !empty($confirm_password)){
            //Checking the validity of the token
            $check_token = "SELECT verify_token FROM mentee_table WHERE verify_token='$token' LIMIT 1";
            $check_token_run = mysqli_query($con, $check_token);
            if(mysqli_num_rows($check_token_run) > 0){

                if($new_password==$confirm_password){
                    $update_password = "UPDATE mentee_table SET mentee_pass='$new_password' WHERE verify_token='$token' LIMIT 1";
                    $update_password_run = mysqli_query($con, $update_password);

                    if($update_password_run){

                        $new_token = md5(rand())."guru";
                        $update_to_new_token = "UPDATE mentee_table SET verify_token='$new_token' WHERE verify_token='$token' LIMIT 1";
                        $update_to_new_token_run = mysqli_query($con, $update_password);

                        $_SESSION['status'] = "Password Changed Successfully...";
                        header("Location: index.html ");
                        exit(0);
                    }
                    else{
                        $_SESSION['status'] = "Something went wrong. #2";
                        header("Location: password_change.php?token='$token'&email='$email'");
                        exit(0);
                    }
                }
                else{
                    $_SESSION['status'] = "Password and confirm password doesn't match...";
                    header("Location: password_change.php?token='$token'&email='$email'");
                    exit(0);
                }
            }
            else{
                $_SESSION['status'] = "Invalid token...";
                header("Location: password_change.php?token='$token'&email='$email'");
                exit(0);
            }
        }
        else{
            $_SESSION['status'] = "All fields are mandatory...";
            header("Location: password_change.php?token='$token'&email='$email'");
            exit(0);
        }
    }
    else{
        $_SESSION['status'] = "No token found...";
        header('Location: password_change.php');
        exit(0);
    }
    }