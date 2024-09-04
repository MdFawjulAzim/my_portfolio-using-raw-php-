<?php 
session_start();
require '../database.php';

$title = $_POST['title'];
$desp = $_POST['desp'];

$insert = "INSERT INTO services(title, desp)VALUES('$title', '$desp')";
mysqli_query($db_connection, $insert);

$_SESSION['success'] = 'New Service Added successfully!';
header('location:service.php');
?>