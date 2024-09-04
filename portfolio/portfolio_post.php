<?php
session_start();

require '../database.php';

$title = $_POST['title'];
$category = $_POST['category'];
$image = $_FILES['image'];

$after_explode = explode('.', $image['name']);
$extension = end($after_explode);
$allowed_extn = array('jpg', 'png');
if(in_array($extension, $allowed_extn)){
    if($image['size'] <= 1000000){
        $file_name = uniqid().'.'.$extension;
        $new_location = '../uploads/portfolio/'.$file_name;
        move_uploaded_file($image['tmp_name'], $new_location);

        $insert = "INSERT INTO portfolios(title, category, image)VALUES('$title', '$category', '$file_name')";
        mysqli_query($db_connection, $insert);
        $_SESSION['success'] = 'Portofolio Added successfully!';
        header('location:portfolio.php');

    }
    else{
        $_SESSION['err'] = 'Image size max 1MB!';
        header('location:portfolio.php');
    }
}
else{
    $_SESSION['err'] = 'Only PNG & JPG format are allowed!';
    header('location:portfolio.php');
}

?>