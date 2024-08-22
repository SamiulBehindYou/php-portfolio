<?php
require '../includes/db.php';
session_start();
if(isset($_SESSION['login_status'])){
    header('location:../admin/admin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login now!</title>
    <!-- Favicon icon -->
    <link rel="icon" type="/assetsimage/png" sizes="16x16" href="">
	<link rel="stylesheet" href="./assets/vendor/chartist/css/chartist.min.css">
    <link href="../assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="../assets/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
<body>
<div class="container">
<div class="row mt-2">
    <div class="col-lg-6 m-auto">

        <?php if(isset($_SESSION['error'])){ ?>
        <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
        <?php } unset($_SESSION['error']) ?>

        <?php if(isset($_SESSION['success'])){ ?>
        <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
        <?php } unset($_SESSION['success']) ?>

        <div class="card">
            <div class="card-header bg-primary">
                <h1 class="text-center text-white">Login</h1>
            </div>
            <div class="card-body">
                <form action="login_post.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email!">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Passowrd</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter your password!">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>
</div>

</body>
</html>