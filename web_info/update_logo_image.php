<?php
session_start();
require '../includes/header.php';

?>
<div class="row mt-2">
    <div class="col-lg-6 m-auto">

        <?php if(isset($_SESSION['error_logo'])){ ?>
        <div class="alert alert-danger"><?= $_SESSION['error_logo'] ?></div>
        <?php } unset($_SESSION['error_logo']) ?>

        <?php if(isset($_SESSION['success_logo'])){ ?>
        <div class="alert alert-success"><?= $_SESSION['success_logo'] ?></div>
        <?php } unset($_SESSION['success_logo']) ?>

        <div class="card">
            <div class="card-header bg-primary">
                <h1 class="text-white">Change Logo</h1>
            </div>
            <div class="card-body">
                <form action="update_logo_image_post.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Input new logo</label>
                        <input type="file" name="image" class="form-control" onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])">
                        <small>Note: Please upload 400x400 logo.</small><br>
                        <img src="../assets/uploads/logo/<?= $web_show['image_logo'] ?>" id="img" class="mt-3 rounded" width="60"/>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="logo" class="btn btn-primary">Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>


<?php
require '../includes/footer.php';
?>