<?php
include("config/dbConnections.php");
require_once("PHPMailer/PHPMailerAutoload.php");
$errs = ['all' => '', 'success' => ''];
$username = "";
$email = "";
$token = "";
$created = false;
if (isset($_POST['signup-btn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    if (empty($username)) {
        $errs['all'] = "All fields are required";
        return;
    }
    if (empty($email)) {
        $errs['all'] = "All fields are required";
        return;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errs['all'] = "Invalid email address";
        return;
    }
    if (empty($password1)) {
        $errs['all'] = "All fields are required";
        return;
    }
    if ($password1 != $password2) {
        $errs['all'] = "Passwords do not match";
        return;
    }
    if (strlen($password1) < 10) {
        $errs['all'] = "Password must be of at least 10 characters";
        return;
    }
    $sql1 = "SELECT * FROM users_info WHERE email='$email'";
    $query1 = mysqli_query($connection, $sql1);
    $row = mysqli_num_rows($query1);
    if ($row == 1) {
        $errs['all'] = "Email address already in used!";
        return;
    }
    $password1 = md5($password1);
    $verified = false;
    $token = md5($username . time());
    $sql = "INSERT INTO users_info(username,user_password,email,user_verified,token) VALUES ('$username','$password1','$email','$verified','$token')";
    $query = mysqli_query($connection, $sql);
    if ($query == true) {
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
        <h1 class='text-primary'>Email Verification</h1>
        <p><i>Email Verification for $email</i></p>
        <hr>
        <p>Please verify the email address for $email</p>
        <a href='https://testapp.itworldinnovate.com/verify.php?email=$email &hash=$token'>Verify</a>
        </div>
        </div>      
        </div>";
        $mail->addAddress($email);
        $mail->send();
        $created = true;
        $errs['success'] = "Account successfully created!";
    }
}
