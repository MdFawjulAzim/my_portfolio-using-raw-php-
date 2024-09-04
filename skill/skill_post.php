<?php
session_start();
require '../database.php';

$skill_name = $_POST['skill_name'];
$percentage = $_POST['percentage'];

$insert = "INSERT INTO skills(skill_name, percentage)VALUES('$skill_name', '$percentage')";
mysqli_query($db_connection, $insert);

$_SESSION['skill'] = 'New Skill Added Successfully!';
header('location:skill.php');


?>