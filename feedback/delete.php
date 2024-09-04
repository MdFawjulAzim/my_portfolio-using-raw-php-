<?php 
session_start();
require '../database.php';

$id= $_GET['id'];

$select = "SELECT image FROM feedbacks WHERE id=$id";
$select_res = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_res);

if($after_assoc['image'] != null){
    $delete_from = '../uploads/feedback/'.$after_assoc['image'];
    unlink($delete_from);
}

$delete = "DELETE FROM feedbacks WHERE id=$id";
mysqli_query($db_connection, $delete);

$_SESSION['del']= 'Feedback Deleted Successfully!';
header('location:feedback.php');
?>