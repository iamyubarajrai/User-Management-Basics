<?php session_start();
include "header.php"; ?>
<span class="msg-box">
    <?php echo isset($_SESSION['msg']) ? $_SESSION['msg'] : ''; ?>
</span>
    <div class="form-box">
        <h1>Register User</h1>
        <form action="insert.php" method="POST" name="register_form" enctype="multipart/form-data">
            <div class="field-group">
                <label for="fname">Fullname</label>
                <input type="text" id="fname" name="fname" value="">
            </div>
            <div class="field-group">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" value="">
            </div>
            <div class="field-group">
                <label for="uname">Username/Email</label>
                <input type="text" id="uname" name="uname" value="">
            </div>
            <div class="field-group">
                <label for="pwd">Password</label>
                <input type="password" id="pwd" name="pwd" value="">
            </div>
            <div class="field-group">
                <label for="cpwd">Confirm Password</label>
                <input type="password" id="cpwd" name="cpwd" value="">
            </div>
            <div class="field-group">
                <label for="photo">Photo</label>
                <input type="file" id="photo" name="photo" value="">
            </div>
            <button type="submit" name="submit">Register</button>
        </form>
    </div>
<?php include "footer.php"; 
session_destroy(); ?>   