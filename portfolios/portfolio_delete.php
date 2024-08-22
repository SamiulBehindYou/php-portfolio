<?php
require '../includes/db.php';
require '../includes/function.php';
session_start();
$id  = $_GET['id'];
$image = $_GET['image'];

$delete = "DELETE FROM portfolios WHERE id = $id";

if($conn->query($delete)){
    unlink('../../gymove/assets/uploads/portfolios/'.$image);
    $_SESSION['delete_success'] = 'Successfully deleted!';
    activitys($_SESSION['login_status'], 'Portfolio deleted!');
    header('location:see_portfolios.php');
}
else{
    $_SESSION['delete_error'] = 'Not delete!';
    header('location:see_portfolios.php');
}
?>