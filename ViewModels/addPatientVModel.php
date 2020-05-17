<?php
include("config/dbConnections.php");
session_start();
error_reporting(E_ERROR | E_PARSE);
$_fn = $_ln  = '';
$errors = array();
$succesMessage = '';
$Inserted = false;
if (isset($_POST['add_patient_btn'])) {
    $_fn = $_POST['firstname'];
    $_ln = $_POST['lastname'];
    $dis = $_POST['diseases'];
    if ($_POST['diseases'] == "Select Disease") {
        $errors['err'] = "Please all fields are required";
    }
    if (empty($_POST['firstname'])) {
        $errors['err'] = "Please all fields are required";
    }
    if (empty($_POST['lastname'])) {
        $errors['err'] = "Please all fields are required";
    }
    if (count($errors) == 0) {
        $fn = mysqli_real_escape_string($connection, $_POST['firstname']);
        $ln = mysqli_real_escape_string($connection, $_POST['lastname']);
        $di = mysqli_real_escape_string($connection, $_POST['diseases']);
        $full = date("F d, Y h:i:s A", time());
        $sqlstatement = "INSERT INTO patients(firstname,lastname,disease,pay_date)VALUES('$fn','$ln','$di','$full')";
        $query = mysqli_query($connection, $sqlstatement);
        if ($query == true) {
            $Inserted = true;
            $succesMessage = "New Patient Added!";
        }
    }
}
