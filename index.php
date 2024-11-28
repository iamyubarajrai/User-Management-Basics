<?php session_start();
if(isset($_POST['submit']) == true) {
    $uname = $_POST['email'];
    $pwd = $_POST['pwd'];
    if($uname != '' && $pwd != '') {
        include "./connection.php";
        $sql = "SELECT id, email, password FROM tbl_users WHERE email='$uname'";
        $res = mysqli_query($conn, $sql);
        //print_r($res);
        if($res->num_rows > 0) {
            $pwdHash = sha1($pwd);
            while($row = mysqli_fetch_assoc($res)) {
                echo $pwdHash . " + " . $row['password'];
                if($pwdHash == $row['password']) {
                    $_SESSION['login_status'] = true;
                    $_SESSION['msg'] = "Login successfull.";
                    header("location: ./list.php");
                } else {
                    $_SESSION['pwd_err'] = "Password not matched.";
                }
            }
        } else {
            $_SESSION['user_err'] = "User/Email not matched!";
        }
    }
}
include "header.php"; ?>
<span class="msg-box">
    <?php echo isset($_SESSION['msg']) ? $_SESSION['msg'] : ''; ?>
</span>
    <div class="form-box">
        <h1>Login User</h1>
        <form action="#" method="POST" name="login_form">
            <div class="field-group">
                <label for="email">Username</label>
                <input type="text" id="email" name="email" value="">
                <span><?php echo isset($_SESSION['user_err']) ? $_SESSION['user_err'] : ''; ?></span>
            </div>
            <div class="field-group">
                <label for="pwd">Password</label>
                <input type="password" id="pwd" name="pwd" value="">
                <span><?php echo isset($_SESSION['pwd_err']) ? $_SESSION['pwd_err'] : ''; ?></span>
            </div>
            <button type="submit" name="submit">Login</button>
        </form>
    </div>
<?php include "footer.php";
$_SESSION['msg'] = '';
$_SESSION['user_err'] = ''; ?>