<?php
require '../includes/db.php';
require '../includes/function.php';
session_start();
if(isset($_POST['settings'])){
    $text_logo = $_POST['text_logo'];
    $logotoshow = $_POST['logotoshow'];
    if($text_logo != null){
        $update = "UPDATE web_info SET text_logo = '$text_logo', logo_status = '$logotoshow' WHERE id = 1";

        mysqli_query($conn, $update);
        $_SESSION['success_settings'] = 'Settings updated successfully!';
        activitys($_SESSION['login_status'], 'Settings Updated!');
        header('location:settings.php');
    }
    else{
        $update = "UPDATE web_info SET  logo_status = '$logotoshow' WHERE id = 1";
        mysqli_query($conn, $update);
        $_SESSION['success_settings'] = 'Settings updated successfully!';
        activitys($_SESSION['login_status'], 'Settings Updated!');
        header('location:settings.php');
    }
}

?>