<?php
session_start();
require '../database.php';

$id = $_GET['id'];

$delete = "DELETE FROM services WHERE id=$id";
mysqli_query($db_connection, $delete);

$_SESSION['delete'] = "Service Deleted Successfully!";
header('location:service.php');