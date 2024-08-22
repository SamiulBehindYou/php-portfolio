<?php
require '../includes/db.php';
require '../includes/function.php';
if($_GET['id']){
    $id = $_GET['id'];
    $delete = "DELETE FROM users WHERE id = $id";

    if($conn->query($delete)){
        $_SESSION['admin_success'] = 'Successfully deleted!';
        activitys($_SESSION['login_status'], 'User deleted!');
        header('location:admin.php');
    }
}else{
    header('location:admin.php');
}

?>