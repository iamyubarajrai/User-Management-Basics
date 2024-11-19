<?php session_start();
include "connection.php";
$id = $_GET['id'];
$sql = "DELETE FROM tbl_users WHERE id=$id";

mysqli_query($conn, $sql);
$_SESSION['msg'] = "User with id " . $id . " deleted.";
header("location: ./list.php");
