<?php include "./connection.php";
if(isset($_GET['id'])):
    $id = $_GET['id'];
    $sql = "SELECT id, fullname, phone, email FROM tbl_users WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    include "header.php"; 
    while($row = mysqli_fetch_assoc($res)): ?>
        <div class="form-box">
            <h1>Update User</h1>
            <form action="./update.php" method="POST" name="update_form">
                <input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>">
                <div class="field-group">
                    <label for="fname">Fullname</label>
                    <input type="text" id="fname" name="fname" value="<?php echo isset($row['fullname']) ? $row['fullname'] : ''; ?>">
                </div>
                <div class="field-group">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" value="<?php echo isset($row['phone']) ? $row['phone'] : ''; ?>">
                </div>
                <div class="field-group">
                    <label for="uname">Username/Email</label>
                    <input type="text" id="uname" name="uname" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>" disabled>
                </div>
                <button type="submit" name="submit">Update</button>
            </form>
        </div>
    <?php endwhile; 
    include "footer.php"; 
else:
    header("location: ./list.php");
endif;
?>