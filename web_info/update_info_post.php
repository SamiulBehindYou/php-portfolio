<?php
require '../includes/db.php';
require '../includes/function.php';
session_start();

if(isset($_POST['info'])){
    $heading = $_POST['heading'];
    $tag = $_POST['tag'];
    $web_title = $_POST['web_title'];
    $watermark = $_POST['watermark'];
    $description = $_POST['description'];

    if($heading != null && $tag != null && $web_title != null && $watermark != null  && $description != null){

        $info_sql = "UPDATE web_info SET heading = '$heading', tag = '$tag', web_title = '$web_title', watermark = '$watermark', description = '$description' WHERE id = 1";

        mysqli_query($conn, $info_sql);
        
        $_SESSION['success_info'] = 'Info updated successfully!';
        activitys($_SESSION['login_status'], 'Info Updated!');
        header('location:update_info.php');
        
    }else{
        $_SESSION['error_info'] = 'Fill the blank fields!';
            header('location:update_info.php');
    }
}else{
    header('location:update_info.php');
}


?>