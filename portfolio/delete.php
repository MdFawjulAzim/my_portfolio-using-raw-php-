<?php
session_start();
require '../database.php';

$id = $_GET['id'];

$delete = "DELETE FROM portfolios WHERE id=$id";
mysqli_query($db_connection, $delete);

$_SESSION['delete'] = "Portfolio Deleted Successfully!";
header('location:portfolio.php');