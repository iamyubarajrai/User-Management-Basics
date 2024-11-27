<?php session_start(); 
if(isset($_POST['submit'])) {
    //print_r($_POST);
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $phone = $_POST['phone'];

    include "./connection.php";
    $query_stm = "UPDATE tbl_users SET fullname='$fname', phone='$phone' WHERE id=$id";
    $res = mysqli_query($conn, $query_stm);
    if($res) $_SESSION['msg'] = "User updated successfully.";
    else $_SESSION['msg'] = "Oops! User updation failed.";
} else {
    $_SESSION['msg'] = "Your are trying to access unauthorized page.";
}
header("location: ./list.php");