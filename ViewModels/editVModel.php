<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
$update_id = $_GET['id'];
$message = '';
include("config/dbConnections.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * from patients WHERE patient_id=?";
    $_stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($_stmt, $sql)) {
    } else {
        mysqli_stmt_bind_param($_stmt, "s", $id);
        mysqli_stmt_execute($_stmt);
        $result = mysqli_stmt_get_result($_stmt);
        $patient = mysqli_fetch_assoc($result);
    }
}

if (isset($_POST['update'])) {
    $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $disease = mysqli_real_escape_string($connection, $_POST['diseases']);
    $update_date = date("F d,Y h:i:s A", time());
    $sql = "UPDATE patients SET patient_id=?,lastname=?,disease=?,pay_date=?,firstname=? WHERE patient_id=?";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $message = "an error has occurred";
    } else {
        mysqli_stmt_bind_param($stmt, "ssssss", $update_id, $lastname, $disease, $update_date, $firstname, $update_id);
        if (mysqli_stmt_execute($stmt)) {
            $message = "Patient updated!";
        }
    }
}
