<?php
require '../includes/db.php';
$id = $_GET['id'];


$select_re = "SELECT * FROM reviews WHERE id = $id";
$result_re = mysqli_query($conn, $select_re);
$review_show = mysqli_fetch_assoc($result_re);

if($review['status'] == 0){
    $update = "UPDATE reviews SET status = 1 WHERE id = $id";
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
                        <td><?= $review_show['name'] ?></td>
                    </tr>
                    <tr>
                        <td width="10%">Profession</td>
                        <td><?= $review_show['profession'] ?></td>
                    </tr>
                    <tr>
                        <td width="10%">Email</td>
                        <td><?= $review_show['email'] ?></td>
                    </tr>
                    <tr>
                        <td width="10%">Review</td>
                        <td><?= $review_show['review'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <?php require '../includes/footer.php'; ?>