<?php
session_start();
require '../includes/header.php';

?>
<div class="row mt-2">
    <div class="col-lg-6 m-auto">

        <?php if(isset($_SESSION['error_landing_image'])){ ?>
        <div class="alert alert-danger"><?= $_SESSION['error_landing_image'] ?></div>
        <?php } unset($_SESSION['error_landing_image']) ?>

        <?php if(isset($_SESSION['success_landing_image'])){ ?>
        <div class="alert alert-success"><?= $_SESSION['success_landing_image'] ?></div>
        <?php } unset($_SESSION['success_landing_image']) ?>

        <div class="card">
            <div class="card-header bg-primary">
                <h1 class="text-white">Change landing image</h1>
            </div>
            <div class="card-body">
                <form action="update_landing_image_post.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Input new image</label>
                        <input type="file" name="image" class="form-control" onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])">
                        <img src="../assets/uploads/landing_image/<?= $web_show['image'] ?>" id="img" class="mt-3 rounded" width="200"/>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="landingimage" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>


<?php
require '../includes/footer.php';
?>