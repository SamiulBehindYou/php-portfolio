<?php
require '../includes/db.php';
require '../includes/function.php';
session_start();
$id  = $_GET['id'];
$delete = "DELETE FROM reviews WHERE id = $id";

if($conn->query($delete)){
    $_SESSION['delete_success'] = 'Successfully deleted!';
    activitys($_SESSION['login_status'], 'Review deleted!');
    header('location:see_reviews.php');
}
else{
    $_SESSION['delete_error'] = 'Not delete!';
    header('location:see_reviews.php');
}
?>