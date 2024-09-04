<?php 
session_start();
require '../database.php';

$id= $_GET['id'];

$delete = "DELETE FROM messages WHERE id=$id";
mysqli_query($db_connection, $delete);

$_SESSION['del']= 'message Deleted Successfully!';
header('location:message.php');
?>