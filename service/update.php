<?php 
session_start();
require '../database.php';

$id = $_POST['id'];
$title = $_POST['title'];
$desp = $_POST['desp'];

$update = "UPDATE services SET title='$title', desp='$desp' WHERE id=$id";
mysqli_query($db_connection, $update);

$_SESSION['update'] = 'Service Update Successfully!';
header('location:service.php');
?>