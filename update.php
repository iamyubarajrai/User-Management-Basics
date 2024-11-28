<?php session_start(); 
if(isset($_POST['submit'])) {
    //print_r($_POST);
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $phone = $_POST['phone'];

    $photo = $_FILES['photo'];
    $photo_type = $photo['type'];
    $photo_name = "";
    $mime_types = ["image/jpeg", "image/jpg", "image/png", "image/gif"];
    if(in_array($photo_type, $mime_types)) {
        $photo_name = $photo['name'];
        $photo_tmpname = $photo['tmp_name'];
        move_uploaded_file($photo_tmpname, "./public/" . $photo_name);
    }

    include "./connection.php";
    
    $query_stm = ($photo_name == '')  ? 
    "UPDATE tbl_users SET fullname='$fname', phone='$phone' WHERE id=$id" :
    "UPDATE tbl_users SET fullname='$fname', phone='$phone', photo='$photo_name' WHERE id=$id";

    $res = mysqli_query($conn, $query_stm);
    if($res) $_SESSION['msg'] = "User updated successfully.";
    else $_SESSION['msg'] = "Oops! User updation failed.";
} else {
    $_SESSION['msg'] = "Your are trying to access unauthorized page.";
}
header("location: ./list.php");