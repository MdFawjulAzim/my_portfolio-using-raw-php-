<?php 
session_start();
require '../database.php';

$id = $_GET['id'];

$select = "SELECT status FROM portfolios WHERE id=$id";
$select_res = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_res);

if($after_assoc['status'] == 1){
    $update = "UPDATE portfolios SET status=0 WHERE id=$id";
    mysqli_query($db_connection, $update);
    $_SESSION['status'] = 'Portfolios Status Deactivated!';
    header('location:portfolio.php');
}   
else{
    $update = "UPDATE portfolios SET status=1 WHERE id=$id";
    mysqli_query($db_connection, $update);
    $_SESSION['status'] = 'Portfolios Status Activated!';
    header('location:portfolio.php');
}
?>