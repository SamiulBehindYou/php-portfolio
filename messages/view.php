<?php
require '../includes/db.php';
$id = $_GET['id'];


$select_m = "SELECT * FROM messages WHERE id = $id";
$result_m = mysqli_query($conn, $select_m);
$message_v = mysqli_fetch_assoc($result_m);

// print_r($after_assoc);
// die();

if ($message_v['status'] == 0) {
    $update = "UPDATE messages SET status = 1 WHERE id = $id";
    mysqli_query($conn, $update);
}

require '../includes/header.php';
?>

<div class="row">
    <div class="col-lg-10">
        <table class="table table-bordared">
            <tbody>
                <tr>
                    <td>Name</td>
                    <td><?= $message_v['name'] ?></td>
                </tr>
                <tr>
                    <td width="10%">Eamil</td>
                    <td><?= $message_v['email'] ?></td>
                </tr>
                <tr>
                    <td width="10%">Subject</td>
                    <td><?= $message_v['subject'] ?></td>
                </tr>
                <tr>
                    <td width="10%">Message</td>
                    <td><?= $message_v['message'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php require '../includes/footer.php'; ?>