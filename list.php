<?php session_start();
if(!isset($_SESSION['login_status']) && $_SESSION['login_status'] == false) header("location: ./index.php");
else $_SESSION['msg'] = "Wow! Welcome.";

include "connection.php"; 
$sql = "SELECT id, phone, fullname, email FROM tbl_users LIMIT 1";
$res = mysqli_query($conn, $sql);

$id = [];
include "header.php"; ?>
    <span class="msg-box">
        <?php echo isset($_SESSION['msg']) ? $_SESSION['msg'] : ''; ?>
    </span>
    <a href="./logout.php" class="btn btn--danger">Logout</a>
    <div class="data-box">
        <h1>All Users</h1>
        <table border="1" cellspacing="0" cellpadding="6">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Phone</th>
                    <th>Fullname</th>
                    <th>Username/Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; 
                while($row = mysqli_fetch_assoc($res)):
                $i++; 
                array_push($id, $row['id']);
                $_SESSION['user_ids'] = [$row['id']]; ?>
                    <pre><?php //print_r($row); //checking data ?></pre>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <a href="./edit.php?id=<?php echo $row['id']; ?>" class="btn btn--small">Edit</a>
                        <a href="./delete.php?id=<?php echo $row['id']; ?>" class="btn btn--danger">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="#" class="js-load" title="Load More">Load More</a>
    </div>
    <script>
        let jsLoad = jQuery(".js-load"),
            dataBox = jQuery(".data-box tbody");
        jsLoad.on("click", (e) => {
            e.preventDefault();//prevents page reload
            $.ajax({
                url: "/picusermgmt/ajax.php",
                method: "GET",
                data: {id: <?php echo json_encode($id); ?>},
                success: function(res) {
                    dataBox.append(res);
                    console.log(res); 
                },
                error: function(err) {
                    console.log(err); 
                }
            });
        });
    </script>
<?php include "footer.php"; 
$_SESSION['msg'] = ''; ?>