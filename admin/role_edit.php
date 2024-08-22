<?php
require '../includes/db.php';
require '../includes/function.php';
session_start();
$id = $_GET['id'];
$select = "SELECT role FROM users WHERE id = $id";
$result = mysqli_query($conn, $select);
$after_assoc = mysqli_fetch_assoc($result);

if($after_assoc['role'] == 1){
    $update = "UPDATE users SET role = 0 WHERE id = $id";

}
else{
    $update = "UPDATE users SET role = 1 WHERE id = $id";
    activitys($_SESSION['login_status'], 'Admin role Updated!');
}

if($conn->query($update)){
    $_SESSION['success'] = 'Role Updated Successfully!';
    header('location:admin.php');
}
?>