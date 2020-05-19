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
        $sql = "SELECT * FROM users_info WHERE email=? AND user_password=?";
        $st = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($st, $sql)) {
            $errs['message'] = "an eror has occurred";
        } else {
            mysqli_stmt_bind_param($st, "ss", $user_email, $password);
            mysqli_stmt_execute($st);
            $result = mysqli_stmt_get_result($st);
            $rows = mysqli_num_rows($result);
            if ($rows == 1) {
                $selectedUser = mysqli_fetch_assoc($result);
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
}
