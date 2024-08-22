<?php
require '../includes/db.php';
session_start();

//users data

$id = $_SESSION['login_status'];
$select = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $select);
$after_assoc = mysqli_fetch_assoc($result);

// Security checkup
if($after_assoc['role'] != 0){
    $_SESSION['error'] = 'DO NOT TRY TO UNAUTORIZE ACCESS!';
    header('location:logout.php');
}



if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $select = "SELECT email FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $select);

    if($result->num_rows > 0){
        $_SESSION['error'] = 'Email already exist!';
    }else{
        $insert = "INSERT INTO users (name, email, password) VALUES('$name', '$email', '$password_hash')";

        if($conn->query($insert)){
            $_SESSION['admin_success'] = 'Register Successfully!';
            header('location:../admin/admin.php');
        }
        else{
            $_SESSION['error'] = 'Something went wrong!';
        }
    }   
}

require '../includes/header.php';

?>


<div class="row">
    <div class="col-lg-6 m-auto">
        
        <?php if(isset($_SESSION['error'])){ ?>
        <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
        <?php } unset($_SESSION['error']) ?>
        <div class="card">
            <div class="card-header bg-primary">
                <h1 class="text-center text-white">Regsiter</h1>
            </div>
            <div class="card-body">
                <form action="register.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter your name!">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email!">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Passowrd</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter your password!">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="register" class="btn btn-primary">Register</button>
                        <a href="login.php" class="btn btn-outline-primary">Login Now!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>

<?php require '../includes/footer.php'; ?>