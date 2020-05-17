<?php
include("config/dbConnections.php");
session_start();
error_reporting(E_ERROR | E_PARSE);
$errs = array();
$user_email = '';
if (isset($_POST['login-btn'])) {
    $user_email = $_POST['user_email'];
    $password = $_POST['password'];

    if (empty($user_email)) {
        $errs['message'] = "All fields are required";
    }
    if (empty($password)) {
        $errs['message'] = "All fields are required";
    }
    if (count($errs) == 0) {
        $password = md5($password);
        $sql = "SELECT * FROM users_info WHERE email='$user_email' AND user_password='$password'";
        $query = mysqli_query($connection, $sql);
        $rows = mysqli_num_rows($query);
        if ($rows == 1) {
            $selectedUser = mysqli_fetch_assoc($query);
            if ($selectedUser['user_verified'] == 0) {
                $date = strtotime($selectedUser['date_created']);
                $date = date('d/m/Y', $date);
                $errs['message'] = "Please verify your email address. A verication link was sent to " . $selectedUser['email'] . ' on ' . $date;
            } else {
                $_SESSION['username'] = $selectedUser['username'];
                $_SESSION['user_email'] = $selectedUser['email'];
                header("Location:main.php");
            }
        } else {
            $errs['message'] = "Wrong User credentials";
        }
    }
}
