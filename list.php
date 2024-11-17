<?php include "header.php"; ?>
    <div class="data-box">
        <h1>All Users</h1>
        <table border="1" cellspacing="0" cellpadding="6">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Fullname</th>
                    <th>Username/Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Dikshyant</td>
                    <td>dikshyant@abc.com</td>
                    <td>
                        <a href="#" class="btn">Edit</a>
                        <a href="#" class="btn btn--danger">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Subodh</td>
                    <td>subodh@abc.com</td>
                    <td>
                        <a href="edit.php" class="btn">Edit</a>
                        <a href="#" class="btn btn--danger">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Khusi</td>
                    <td>khusi@abc.com</td>
                    <td>
                        <a href="#" class="btn">Edit</a>
                        <a href="#" class="btn btn--danger">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Manish</td>
                    <td>manish@abc.com</td>
                    <td>
                        <a href="#" class="btn">Edit</a>
                        <a href="#" class="btn btn--danger">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<?php include "footer.php"; ?>