<?php
session_start();
require '../includes/header.php';

?>
<div class="row mt-2">
    <div class="col-lg-6 m-auto">

        <?php if(isset($_SESSION['error_icon'])){ ?>
        <div class="alert alert-danger"><?= $_SESSION['error_icon'] ?></div>
        <?php } unset($_SESSION['error_icon']) ?>

        <?php if(isset($_SESSION['success_icon'])){ ?>
        <div class="alert alert-success"><?= $_SESSION['success_icon'] ?></div>
        <?php } unset($_SESSION['success_icon']) ?>

        <div class="card">
            <div class="card-header bg-primary">
                <h1 class="text-white">Change Icon</h1>
            </div>
            <div class="card-body">
                <form action="update_icon_post.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Icon</label>
                        <input type="file" name="image" class="form-control" onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])">
                        <small>Note: Please upload 200x200 icon.</small><br>
                        <img src="../assets/uploads/icon/<?= $web_show['icon'] ?>" id="img" class="mt-3 rounded" width="200"/>
                        <?php if(isset($_SESSION['error_icon'])){ ?>
                            <strong><?= $_SESSION['error_icon'] ?></strong>
                        <?php } unset($_SESSION['error_icon']) ?>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="icon" class="btn btn-primary">Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>


<?php
require '../includes/footer.php';
?>