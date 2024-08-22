<?php
session_start();
require '../includes/header.php';

?>

<div class="row">
    <div class="col-lg-10 m-auto">
    <?php if($activity_result->num_rows > 0){ ?>
        <table class="table table-boarderd text-center" style="border: solid gray 1px">
            <thead class="bg-primary text-white">
                <tr>
                    <div class="card-header bg-primary">
                        <h1 class="text-white">Registerd users</h1>
                    </div>
                </tr>
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Username</th>
                    <th scope="col">Activity</th>
                    <th scope="col">Datetime</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($activity_result as $index => $show) {
                    if ($show['status'] == 0) {
                        $a_id = $show['id'];
                        mysqli_query($conn, "UPDATE activitys SET status = 1 WHERE id = $a_id");
                    }


                    $id = $show['user_id'];
                    $select_user = "SELECT name FROM users WHERE id = $id";
                    $user_r = mysqli_query($conn, $select_user);
                    $user = mysqli_fetch_assoc($user_r);
                    ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $show['activity'] ?></td>
                        <td>
                            <!-- <?= $show['datetime'] ?><br> -->
                            <small><?= time_before($show['datetime']) ?></small>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php }else{ ?>
            <h3 class="text-center">No Data to show!</h3>
        <?php } ?>
    </div>
</div>


<?php
require '../includes/footer.php';
?>