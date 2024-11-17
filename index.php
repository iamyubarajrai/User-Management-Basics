<?php include "header.php"; ?>
    <div class="form-box">
        <h1>Login User</h1>
        <form action="#" method="POST" name="login_form">
            <div class="field-group">
                <label for="uname">Username</label>
                <input type="text" id="uname" name="uname" value="">
            </div>
            <div class="field-group">
                <label for="pwd">Password</label>
                <input type="password" id="pwd" name="pwd" value="">
            </div>
            <button type="submit" name="submit">Login</button>
        </form>
    </div>
<?php include "footer.php"; ?>