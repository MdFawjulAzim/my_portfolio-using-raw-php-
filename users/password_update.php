<?php
session_start();
require '../database.php';

$user_id = $_POST['user_id'];
$select = "SELECT * FROM users WHERE id=$user_id";
$select_res = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_res);

$current_password = $_POST['current_password'];
$password = $_POST['password'];
$after_hash = password_hash($password, PASSWORD_DEFAULT);
$confirm_password = $_POST['confirm_password'];

$flag = false;

if (empty($current_password)) {
    $flag = true;
    $_SESSION['crn_pass_err'] = 'Please Enter Current Password!';
} else {
    if (!password_verify($current_password, $after_assoc['password'])) {
        $flag = true;
        $_SESSION['crn_pass_err'] = 'Please Enter Correct Current Password!';
    }
}

if (empty($password)) {
    $flag = true;
    $_SESSION['pass_err'] = 'Please Enter New Password!';
}
if (empty($confirm_password)) {
    $flag = true;
    $_SESSION['conpass_err'] = 'Please Enter Confirm Password!';
} else {
    if ($password != $confirm_password) {
        $flag = true;
        $_SESSION['conpass_err'] = 'Password and Confirm Password Does Not Match!';
    }
}

if ($flag) {
    header('location:profile.php');
} else {
    $update = "UPDATE users SET password='$after_hash' WHERE id=$user_id";
    mysqli_query($db_connection, $update);
    $_SESSION['pass_update'] = 'Password Has Changed Successfully!';
    header('location:profile.php');
}
