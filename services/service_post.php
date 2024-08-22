<?php
session_start();
require '../includes/db.php';
require '../includes/function.php';
if(isset($_POST['service'])){
    $title = $_POST['title'];
    $description = $_POST['description'];

    $insert = "INSERT INTO services(title, description) VALUES('$title', '$description')";
    
    if($conn->query($insert)){
        $_SESSION['success_service'] = 'Service added successfully!';
        activitys($_SESSION['login_status'], 'Service added!');
        header('location:see_services.php');
    }
    else{
        $_SESSION['error'] = 'Something went wrong!';
    }
}
?>