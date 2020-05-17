<?php
session_start();
include("config/dbConnections.php");
$status = '';
if (isset($_GET['email']) && !empty($_GET['email']) && isset($_GET['hash']) && !empty($_GET['hash'])) {
    $email = mysqli_real_escape_string($connection, $_GET['email']);
    $hash = mysqli_real_escape_string($connection, $_GET['hash']);
    $selectEmail = "SELECT * FROM users_info WHERE email='$email' AND token='$hash'AND user_verified='0'";
    $emai_query = mysqli_query($connection, $selectEmail);
    if (mysqli_num_rows($emai_query) == 1) {
        $update = "UPDATE users_info SET user_verified='1' WHERE email='$email'";
        $update_quey = mysqli_query($connection, $update);
        if ($update) {
            $status = "Updated";
        }
    } else {
        $status = "Not";
    }
} else {
    $status = "Invalid";
}
