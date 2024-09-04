<?php 
session_start();
require '../database.php';

$id = $_GET['id'];

$select = "SELECT status FROM services WHERE id=$id";
$select_res = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_res);

if($after_assoc['status'] == 1){
    $update = "UPDATE services SET status=0 WHERE id=$id";
    mysqli_query($db_connection, $update);
    $_SESSION['status'] = 'service Status Deactivated!';
    header('location:service.php');
}   
else{
    $update = "UPDATE services SET status=1 WHERE id=$id";
    mysqli_query($db_connection, $update);
    $_SESSION['status'] = 'service Status Activated!';
    header('location:service.php');
}
?>