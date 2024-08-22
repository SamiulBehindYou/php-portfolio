<?php
session_start();
require '../includes/header.php';
?>
<div class="row mt-2">
    <div class="col-lg-6 m-auto">

        <?php if(isset($_SESSION['error_info'])){ ?>
        <div class="alert alert-danger"><?= $_SESSION['error_info'] ?></div>
        <?php } unset($_SESSION['error_info']) ?>

        <?php if(isset($_SESSION['success_info'])){ ?>
        <div class="alert alert-success"><?= $_SESSION['success_info'] ?></div>
        <?php } unset($_SESSION['success_info']) ?>

        <div class="card">
            <div class="card-header bg-primary">
                <h1 class="text-center text-white">Change Info</h1>
            </div>
            <div class="card-body">
                <form action="update_info_post.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Heading</label>
                        <input type="text" value="<?= $web_show['heading'] ?>" name="heading" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Heading Watermark</label>
                        <input type="text" value="<?= $web_show['watermark'] ?>" name="watermark" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tag</label>
                        <input type="text" value="<?= $web_show['tag'] ?>" name="tag" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Website title</label>
                        <input type="text" value="<?= $web_show['web_title'] ?>" name="web_title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea rows = 4 name="description" class="form-control"><?= $web_show['description'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="info" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>


<?php
require '../includes/footer.php';
?>