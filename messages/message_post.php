<?php
session_start();
require '../includes/db.php';
if(isset($_POST['message'])){
    $sender_name = $_POST['sender_name'];
    $sender_email = $_POST['sender_email'];
    $sender_subject = $_POST['sender_subject'];
    $sender_message = $_POST['sender_message'];

    // echo $sender_name.' '.$sender_email.' '.$sender_subject.' '.$sender_message;
    // die();

    if($sender_name != null && $sender_email != null && $sender_subject != null && $sender_message != null){

        $insert = "INSERT INTO messages(name, email, subject, message) VALUES('$sender_name', '$sender_email', '$sender_subject', '$sender_message')";
        
        if($conn->query($insert)){
            $_SESSION['success_message'] = 'Message sent successfully!';
            header('location:../index.php#contact');
        }
        else{
            $_SESSION['error_message'] = 'Something went wrong!';
            header('location:../index.php#contact');
        }
    }
    else{
        $_SESSION['error_message'] = 'Input blank fields!';
        header('location:../index.php#contact');
    }
}
?>