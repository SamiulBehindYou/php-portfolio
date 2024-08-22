<?php
session_start();

require '../includes/header.php';
//users data
$select_users = "SELECT * FROM users";
$users = mysqli_query($conn, $select_users);


?>
    <div class="row">
        <div class="col-lg-6 m-auto">
            <?php if (isset($_SESSION['admin_success'])) { ?>
            <div class="alert alert-success">
                <?= $_SESSION['admin_success'] ?>
            </div>
            <?php } unset($_SESSION['admin_success']) ?>
        </div>
    </div>

<div class="row">
    <div class="col-lg-10 m-auto">
        <div class="p-4 text-center rounded bg-light">
            <h1>Welcome to Admin dashboard, <?= $after_assoc['name'] ?>!</h1>
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-lg-10 m-auto">

                <table class="table table-boarderd text-center" style="border: solid gray 1px">
                    <thead class="bg-primary text-white">
                        <tr>
                        <div class="card-header bg-primary">
                            <h1 class="text-white">Registerd users</h1>
                        </div>
                        </tr>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th <?= ($after_assoc['role'] == 0 ? '':'hidden') ?> scope="col">Action</th>
                            <th scope="col">Register at</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $index => $user) { ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= $user['name'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><?= ($user['role'] == 0 ? 'Admin' : 'Modarator') ?></td>
                                <td <?= ($after_assoc['role'] == 0 ? '':'hidden') ?>>
                                    <a href="role_edit.php?id=<?= $user['id'] ?>" class="btn btn-info btn-xxs shadow m-1">Change role</a>
                                    <a href="delete_users.php?id=<?= $user['id'] ?>" class="btn btn-outline-danger btn-xxs">Delete</a>
                                </td>
                                <td>
                                    <?= $user['datetime'] ?><br>
                                    <small><?= time_before($user['datetime']) ?></small>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>



    <?php
    require '../includes/footer.php';
    ?>