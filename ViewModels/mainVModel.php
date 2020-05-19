<?php
session_start();
$number_rows = '';
$counting = '';
include("config/dbConnections.php");
$sql_statement = "SELECT * FROM patients";
$result = mysqli_query($connection, $sql_statement);
$number_rows = mysqli_num_rows($result);

if (isset($_GET['delete_all'])) {
    $all = "DELETE FROM patients";
    $deletall = mysqli_query($connection, $all);
    if ($deletall == true) {
        header("Location:main.php");
    }
}
if (isset($_GET['id'])) {
    $deleteId = $_GET['id'];
    $sql = "DELETE FROM patients WHERE patient_id=?";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
    } else {
        mysqli_stmt_bind_param($stmt, "s", $deleteId);
        if (mysqli_stmt_execute($stmt)) {
            header("Location:main.php");
        }
    }
}
