<?php
include("config/dbConnections.php");
require_once("PHPMailer/PHPMailerAutoload.php");
$message = '';
if (isset($_POST['proceed'])) {
    $email = mysqli_real_escape_string($connection, $_POST['reset_email']);
    if (!empty(trim($email))) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = "SELECT * FROM users_info WHERE email='$email'";
            $query = mysqli_query($connection, $sql);
            $user = mysqli_num_rows($query);
            $user_token = mysqli_fetch_assoc($query);
            if ($user == 1) {
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'ssl';
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = '465';
                $mail->isHTML();
                $mail->Username = 'ediaryapplication2020@gmail.com';
                $mail->Password = 'HACKMAN1111';
                $mail->setFrom('ediaryapplication2020@gmail.com');
                $mail->Subject = 'Email Verification';
                $mail->Body = "<div class='container'>
                <div class='row text-center'>
                <div class='col-12'>
                <h1 class='text-primary'>Reset Password</h1>
                <p><i>Reset password for $email</i></p>
                <hr>
                <p>Reset account password for $email</p>
                <a href='https://testapp.itworldinnovate.com/main_reset_password.php?email=$email'>RESET PASSWORD HERE>></a>
                </div>
                </div>      
                </div>";
                $mail->addAddress($email);
                if ($mail->send()) {
                    $message = "Reset Link has been sent to $email";
                } else {
                    $message = "Failed to sent reset link";
                }
            } else {
                $message = "This account does not exist";
            }
        } else {
            $message = 'Invalid Email Address';
        }
    } else {
        $message = 'Please enter your email address';
    }
}
