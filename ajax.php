<?php session_start();
// $id = $_GET['id'];

$ids = implode(',', $_SESSION['user_ids']);

include "connection.php"; 
$sql = "SELECT id, phone, fullname, email FROM tbl_users WHERE id NOT IN ($ids) LIMIT 1";
$res = mysqli_query($conn, $sql);

if($res && ($res->num_rows > 0)):
    $i = 0; 
    while($row = mysqli_fetch_assoc($res)):
    $i++; 
    array_push($_SESSION['user_ids'], $row['id']); ?>
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
    <?php endwhile; 
else:  
    if($_SESSION['no_data'] == false): ?>
    <tr>
        <td colspan="5">No more data.</td>
    </tr>
<?php endif;
    $_SESSION['no_data'] = true;
endif; ?>

<!-- ob_get, <<<HTML -->
