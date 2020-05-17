<?php
include("config/dbConnections.php");
$message = "";
$email = "";
$invalid = false;
if (isset($_GET['email']) && !empty($_GET['email'])) {
    $email = mysqli_real_escape_string($connection, $_GET['email']);
    $sql = "SELECT * FROM users_info WHERE email='$email'";
    $query = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($query);
    if ($num == 0) {
        $message = "Invalid Account Credentials";
        $invalid = true;
    }

    if (isset($_POST['resetpass'])) {
        $pass1 = mysqli_real_escape_string($connection, $_POST['newpass1']);
        $pass2 = mysqli_real_escape_string($connection, $_POST['newpass2']);
        if (!empty($pass1) && !empty($pass2)) {
            if ($pass1 == $pass2) {
                $pass1 = md5($pass1);
                $update = "UPDATE users_info SET user_password='" . $pass1 . "' WHERE email='" . $email . "'";
                $update_query = mysqli_query($connection, $update);
                if ($update_query) {
                    $message = "Your password has been successfully updated <a href='index.php'>Login Now</a>";
                } else {
                    $message = "An error has occurred!";
                }
            } else {
                $message = "Password do not match";
            }
        } else {
            $message = "Password cannot be empty";
        }
    }
} else {
    header("Location:denied.php");
}
