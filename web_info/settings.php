<?php
session_start();
require '../includes/header.php';
?>
<div class="row mt-2">
    <div class="col-lg-6 m-auto">

        <?php if(isset($_SESSION['success_settings'])){ ?>
        <div class="alert alert-success"><?= $_SESSION['success_settings'] ?></div>
        <?php } unset($_SESSION['success_settings']) ?>

        <div class="card">
            <div class="card-header bg-primary">
                <h1 class="text-center text-white">Set logo</h1>
            </div>
            <div class="card-body">
                <form action="settings_post.php" method="POST">
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label class="form-label">Text Logo</label>
                            <input type="text" name="text_logo" value="<?= $web_show['text_logo']?>" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Image Logo</label><br>
                            <img src="../assets/uploads/logo/<?= $web_show['image_logo']?>" width="50px" class=""><br>
                        </div>
                        <small class="mt-1"><b>Note:</b> Changing image logo on 'change logo' section.</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Select logo type to show</label>
                        <select name="logotoshow" class="form-control">
                            <option value="0" <?= ($web_show['logo_status'] == 1 ? '':'selected')?>>Text logo</option>
                            <option value="1" <?= ($web_show['logo_status'] == 1 ? 'selected':'')?>>Image logo</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <button type="submit"name="settings" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>


<?php
require '../includes/footer.php';
?>