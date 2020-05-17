<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
$update_id = $_GET['id'];
$message = '';
include("config/dbConnections.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $statement = "SELECT * FROM patients WHERE patient_id=$id";
    $getQuery = mysqli_query($connection, $statement);
    $patient = mysqli_fetch_assoc($getQuery);
}

if (isset($_POST['update'])) {
    $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $disease = mysqli_real_escape_string($connection, $_POST['diseases']);
    $update_date = date("F d,Y h:i:s A", time());
    $sql = "UPDATE patients SET patient_id='" . $update_id . "',lastname='" . $lastname . "',disease='" . $disease . "',pay_date='" . $update_date . "',firstname='" . $firstname . "' WHERE patient_id='" . $update_id . "'";
    $query = mysqli_query($connection, $sql);
    if ($query == true) {
        $message = "<h6 class='text-success text-left'>Information successfully updated</h6>";
    }
}
