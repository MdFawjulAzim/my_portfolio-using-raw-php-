<?php
session_start();
require 'database.php';

$email= $_POST['email'];
$password= $_POST['password'];
$flag=false;

if(empty($email)){
    $flag=true;
    $_SESSION['email_add_error']='Please Enter Email Address!'; 
}
else{
    $select = "SELECT COUNT(*) as total FROM users WHERE email='$email'";
    $select_res=mysqli_query($db_connection,$select);
    $after_assoc=mysqli_fetch_assoc($select_res);
    if($after_assoc['total'] != 1){
        $flag=true;
        $_SESSION['email_add_error']='Your Email Dose Not Exist!'; 
    }
}
if(empty($password)){
    $flag=true;
    $_SESSION['password_error']='Please Enter password!' ;   
}
else{
    $select = "SELECT * FROM users WHERE email='$email'";
    $select_res=mysqli_query($db_connection , $select);
    $after_assoc=mysqli_fetch_assoc($select_res);
    if(!password_verify($password , $after_assoc['password'])){
         $flag=true;
        $_SESSION['password_error']='Wrong password!';
       
    }
    else{
        $_SESSION['login']='Your Login Successfully!'; 
        $_SESSION['logged_id']= $after_assoc['id'];
        header('location:dashboard.php');
    }
}




if($flag){
    header('location:/my_portfolio/login_dashboard.php');
}


?>