<?php 
session_start();
/* Dynamic logic of register */
//print_r($_POST); //shows data only
//var_dump($_POST); // shows data and it's type

if(isset($_POST['submit'])) {
    $fullname = $_POST['fname'];
    $phone = $_POST['phone'];
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];
    $cpwd = $_POST['cpwd'];

    //echo $fullname; // checking data
    if($pwd != $cpwd) $_SESSION['msg'] = "Password not matched.";
    else { 
        $hashPwd = sha1($pwd);
        $sql = "INSERT INTO tbl_users (fullname, phone, email, password) VALUES('$fullname', '$phone', '$uname', '$hashPwd')";

        include_once "connection.php";
        $res = mysqli_query($conn, $sql);
        if($res) $_SESSION['msg'] = "Data inserted successfully.";
    }
}
header("location: register.php");