<?php 
session_start();
require '../database.php';

$id=$_POST['id'];
$designation = $_POST['designation'];
$name = $_POST['name'];
$desp = $_POST['desp'];

$update = "UPDATE abouts SET designation='$designation', name='$name', desp='$desp'";
mysqli_query($db_connection,$update);
// mysqli_query($db_connection, $update);

$_SESSION['about'] = 'About Info Updated successfully!';
header('location:about.php');

?>