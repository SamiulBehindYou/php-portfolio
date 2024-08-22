<?php 
require '../includes/db.php';
session_start();
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($email != null && $password != null){
        $select = "SELECT * FROM users WHERE email = '$email'";

        $result = mysqli_query($conn, $select);
        if($result->num_rows > 0){
            $af = mysqli_fetch_assoc($result);
            if(password_verify($password, $af['password'])){
                $_SESSION['login_status'] = $af['id'];
                $_SESSION['admin_success'] = 'You are successfylly logged in!';
                header('location:../admin/admin.php');
            }
            else{
                $_SESSION['error'] = 'Something went wrong!';
                header('location:login.php');
                die();
            }
            
        }
        else{
            $_SESSION['error'] = 'Email not registered!';
        header('location:login.php');
        }
    }
    else{
        $_SESSION['error'] = 'Input blank field!';
        header('location:login.php');
    }

}
else{
    header('location:login.php');
}

?>