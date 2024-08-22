<?php require '../includes/header.php';

$select = "SELECT * FROM skills";

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
    
    <?php if(isset($_SESSION['success_skill'])){ ?>
        <div class="alert alert-success"><?= $_SESSION['success_skill'] ?></div>
    <?php } unset($_SESSION['success_skill']) ?>

    <?php if(isset($_SESSION['update_success'])){ ?>
        <div class="alert alert-success"><?= $_SESSION['update_success'] ?></div>
    <?php } unset($_SESSION['update_success']) ?>
    <?php if($result->num_rows > 0){ ?>
    <table class="table table-boarderd text-center">
        <thead class="bg-primary text-white">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Skill</th>
            <th scope="col">Percentage</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($result as $index=>$show){ ?>
        <tr>
            <th scope="col"><?= $index+1 ?></th>
            <th><?= $show['skill'] ?></th>
            <th><?= $show['percentage'] ?></th>
            <th><a href="status.php?id=<?= $show['id'] ?>" class="btn btn-<?= ($show['status'] == 1 ? 'success':'danger') ?> btn-sm"><?= ($show['status'] == 1 ? 'Active':'Deactivted') ?></a></th>
            <th>
                <!-- <a href="skill_edit.php?id=<?= $show['id'] ?>" class="btn btn-info btn-xxs shadow m-1">Edit</a> -->
                <a title="Delete only show when skill deactivted." <?= ($show['status'] == 1 ? 'hidden':'') ?> href="skill_delete.php?id=<?= $show['id'] ?>" class="btn btn-outline-danger btn-xxs">Delete</a>
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