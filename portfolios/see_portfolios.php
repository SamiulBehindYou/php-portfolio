<?php require '../includes/header.php';

$select = "SELECT * FROM portfolios ORDER BY id DESC";

$result = mysqli_query($conn, $select);


?>

<div class="row">
    <div class="col-lg-10 m-auto">

    <?php if(isset($_SESSION['success'])){ ?>
        <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
    <?php } unset($_SESSION['success']) ?>

    <?php if(isset($_SESSION['delete_success'])){ ?>
        <div class="alert alert-success"><?= $_SESSION['delete_success'] ?></div>
    <?php } unset($_SESSION['delete_success']) ?>

    <?php if(isset($_SESSION['delete_error'])){ ?>
        <div class="alert alert-success"><?= $_SESSION['delete_error'] ?></div>
    <?php } unset($_SESSION['delete_error']) ?>
    
    <?php if(isset($_SESSION['success_portfolio'])){ ?>
        <div class="alert alert-success"><?= $_SESSION['success_portfolio'] ?></div>
    <?php } unset($_SESSION['success_portfolio']) ?>

    <?php if(isset($_SESSION['update_success'])){ ?>
        <div class="alert alert-success"><?= $_SESSION['update_success'] ?></div>
    <?php } unset($_SESSION['update_success']) ?>

    <?php if($result->num_rows > 0){ ?>
    <table class="table table-boarderd text-center">
        <thead class="bg-primary text-white">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Sub title</th>
            <th scope="col">Image</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($result as $index=>$show){ ?>
        <tr>
            <th scope="col"><?= $index+1 ?></th>
            <th><?= $show['title'] ?></th>
            <th><?= $show['sub_title'] ?></th>
            <th><img src="../assets/uploads/portfolios/<?= $show['image'] ?>" width="60px"></th>
            <th><a href="status.php?id=<?= $show['id'] ?>" class="btn btn-<?= ($show['status'] == 1 ? 'success':'danger') ?> btn-sm"><?= ($show['status'] == 1 ? 'Active':'Deactivted') ?></a></th>
            <th>
                <!-- <a href="portfolio_edit.php?id=<?= $show['id'] ?>" class="btn btn-info btn-xxs shadow m-1">Edit</a> -->
                <a <?= ($show['status'] == 1 ? 'hidden':'') ?> href="portfolio_delete.php?id=<?= $show['id'] ?>&image=<?= $show['image'] ?>" class="btn btn-outline-danger btn-xxs">Delete</a>
            </th>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php }else{ ?>
    <h3 class="text-center">No Data to show!</h3>
<?php } ?>
    </div>
</div>
            
 <?php require '../includes/footer.php' ?>