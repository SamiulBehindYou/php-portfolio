<?php
require '../includes/db.php';
session_start();
$id = $_GET['id'];
$select = "SELECT status FROM skills WHERE id = $id";
$result = mysqli_query($conn, $select);
$after_assoc = mysqli_fetch_assoc($result);

if($after_assoc['status'] == 1){
    $update = "UPDATE skills SET status = 0 WHERE id = $id";

}
else{
    $update = "UPDATE skills SET status = 1 WHERE id = $id";
}

if($conn->query($update)){
    $_SESSION['update_success'] = 'Updated Successfully!';
    header('location:see_skills.php');
}
?>