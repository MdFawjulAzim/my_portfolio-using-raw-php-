<?php
session_start();
require '../database.php';

$user_id = $_POST['user_id'];
$select = "SELECT * FROM users WHERE id=$user_id";
$select_res = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_res);


$photo = $_FILES['photo'];

$after_explode = explode('.', $photo['name']);
$extension = end($after_explode);
$allowed_extension = array('png', 'jpg','svg');
if (in_array($extension, $allowed_extension)) {

    if ($photo['size'] <= 1000000) {
        if ($after_assoc['photo'] != null) {
            $delete_from = '../uploads/users/' . $after_assoc['photo'];
            unlink($delete_from);
        }
        $file_name = uniqid() . '.' . $extension;
        $new_location = '../uploads/users/' . $file_name;
        move_uploaded_file($photo['tmp_name'], $new_location);

        $update = "UPDATE users SET photo='$file_name' WHERE id=$user_id";
        mysqli_query($db_connection, $update);
        $_SESSION['photo_update'] = 'Profile Photo Updated Successfully!';
        header('location:profile.php');
    } else {
        $_SESSION['err'] = 'Image Size Max 1 MB!';
        header('location:profile.php');
    }
} else {
    $_SESSION['err'] = 'Only PNG OR JPG Format are Allowed!';
    header('location:profile.php');
}
