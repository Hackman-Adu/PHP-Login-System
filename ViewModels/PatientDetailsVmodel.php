<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
$del_id = $_GET['id'];
include("config/dbConnections.php");
if (isset($_GET['id'])) {
    $pay_id = $_GET['id'];
    $selectQuery = "SELECT * FROM patients WHERE patient_id= $pay_id";
    $_result = mysqli_query($connection, $selectQuery);
    $selectedPay = mysqli_fetch_assoc($_result);
}

if (isset($_POST['del'])) {
    $sqlstatement = "DELETE FROM patients WHERE patient_id='$del_id'";
    $query = mysqli_query($connection, $sqlstatement);
    if ($query == true) {
        header("Location:main.php");
    }
}
