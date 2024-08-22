<?php require '../includes/header.php';

$select = "SELECT * FROM reviews ORDER BY id DESC";

$result = mysqli_query($conn, $select);


?>

<div class="row">
    <div class="col-lg-12 m-auto">

    <?php if(isset($_SESSION['success'])){ ?>
        <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
    <?php } unset($_SESSION['success']) ?>

    <?php if(isset($_SESSION['delete_success'])){ ?>
        <div class="alert alert-success"><?= $_SESSION['delete_success'] ?></div>
    <?php } unset($_SESSION['delete_success']) ?>

    <?php if(isset($_SESSION['delete_error'])){ ?>
        <div class="alert alert-success"><?= $_SESSION['delete_error'] ?></div>
    <?php } unset($_SESSION['delete_error']) ?>
    
    <?php if(isset($_SESSION['success_reviews'])){ ?>
        <div class="alert alert-success"><?= $_SESSION['success_reviews'] ?></div>
    <?php } unset($_SESSION['success_reviews']) ?>

    <?php if(isset($_SESSION['update_success'])){ ?>
        <div class="alert alert-success"><?= $_SESSION['update_success'] ?></div>
    <?php } unset($_SESSION['update_success']) ?>
    <?php if($result->num_rows > 0){ ?>
    <small><b>Note 1:</b> If you not seen your reviews, it will not show on your page.</small><br>
    <small><b>Note 2:</b> Latest review will show on top.</small>
    <table class="table table-boarderd text-center">
        <thead class="bg-primary text-white">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Profession</th>
            <th scope="col">Email</th>
            <th scope="col">Review</th>
            <th scope="col">DateTime</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($result as $index=>$show){ ?>

        <a href="view.php?id=<?= $show['id'] ?>">
        <tr class="bg-<?= ($show['status'] == 1 ? '':'black text-white') ?>">
            <th scope="col"><?= $index+1 ?></th>
            <th><?= $show['name'] ?></th>
            <th><?= $show['profession'] ?></th>
            <th><?= $show['email'] ?></th>
            <th><?= $show['review'] ?></th>
            <th><?= $show['datetime'] ?></th>
            <th>
                <a href="view.php?id=<?= $show['id'] ?>" class="btn btn-outline-danger btn-xxs">See</a>
                <a title="Delete only show when review deactivted." href="review_delete.php?id=<?= $show['id'] ?>" class="btn btn-outline-danger btn-xxs">Delete</a>
            </th>
        </tr>
        </a>

        <?php } ?>
        </tbody>
    </table>
<?php }else{ ?>
<h3 class="text-center">No Data to show!</h3>
<?php } ?>
    </div>
</div>
            
 <?php require '../includes/footer.php' ?>