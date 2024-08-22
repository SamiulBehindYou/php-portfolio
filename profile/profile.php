<?php
require '../includes/db.php';
require '../includes/header.php';
?>

<div class="row">
    <div class="col-lg-6 m-auto">
        
        <?php if(isset($_SESSION['success_profile'])){ ?>
        <div class="alert alert-success"><?= $_SESSION['success_profile'] ?></div>
        <?php } unset($_SESSION['success_profile']) ?>
        <?php if(isset($_SESSION['error'])){ ?>
        <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
        <?php } unset($_SESSION['error']) ?>
        <div class="card">
            <div class="card-header bg-primary">
                <h1 class="text-center text-white">Profile</h1>
            </div>
            <div class="card-body">
                <form action="profile_post.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" value="<?= $after_assoc['name'] ?>" name="name" class="form-control" placeholder="Enter your name!">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" value="<?= $after_assoc['email'] ?>" name="email" class="form-control" placeholder="Enter your email!">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Change image</label>
                        <input type="file" name="image" class="form-control"  onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])">
                        <img src="../assets/uploads/<?= ($after_assoc['image'] != null ? 'profile/'.$after_assoc['image']:'profile.jpg') ?>" id="img" class="rounded mt-3" width="200px">
                        <?php if(isset($_SESSION['error_image'])){ ?>
                            <strong><?= $_SESSION['error_image'] ?></strong>
                        <?php } unset($_SESSION['error_image']) ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Enter password</label>
                        <input type="password" required name="password" class="form-control" placeholder="Enter password to update info!">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="profile" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>



<?php require '../includes/footer.php'; ?>