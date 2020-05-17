<?php
session_start();
$number_rows = '';
$counting = '';
include("config/dbConnections.php");
$sql_statement = "SELECT * FROM patients";
$result = mysqli_query($connection, $sql_statement);
$number_rows = mysqli_num_rows($result);

if (isset($_POST['delAll'])) {
    $all = "DELETE FROM patients";
    $deletall = mysqli_query($connection, $all);
    if ($deletall == true) {
        header("Location:main.php");
    }
}
