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

    //if($_FILES['photo']['error'] != 0)
    $photo = $_FILES['photo'];
    $photo_type = $photo['type'];

    //echo $fullname; // checking data
    if($pwd != $cpwd) $_SESSION['msg'] = "Password not matched.";
    else { 
        $hashPwd = sha1($pwd);

        $photo_name = "";
        $mime_types = ["image/jpeg", "image/jpg", "image/png", "image/gif"];
        if(in_array($photo_type, $mime_types)) {
            $photo_name = $photo['name'];
            $photo_tmpname = $photo['tmp_name'];
            move_uploaded_file($photo_tmpname, "./public/" . $photo_name);
        }

        $sql = "INSERT INTO tbl_users (fullname, phone, email, password, photo) VALUES('$fullname', '$phone', '$uname', '$hashPwd', '$photo_name')";
    
        include_once "connection.php";
        $res = mysqli_query($conn, $sql);
        if($res) $_SESSION['msg'] = "Data inserted successfully.";
    }
}
header("location: register.php");