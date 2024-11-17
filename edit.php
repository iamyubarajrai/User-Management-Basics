<?php include "header.php"; ?>
    <div class="form-box">
        <h1>Update User</h1>
        <form action="#" method="POST" name="update_form">
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
                <input type="text" id="uname" name="uname" value="" disabled>
            </div>
            <button type="submit" name="submit">Update</button>
        </form>
    </div>
<?php include "footer.php"; ?>