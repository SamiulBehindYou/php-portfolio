<?php
session_start();
require '../includes/db.php';
require '../includes/function.php';
if(isset($_POST['skills'])){
    $skill_name = $_POST['name'];
    $percentage = $_POST['percentage'];

    $insert = "INSERT INTO skills(skill, percentage) VALUES('$skill_name', '$percentage')";
    
    if($conn->query($insert)){
        $_SESSION['success_skill'] = 'Skill added successfully!';
        activitys($_SESSION['login_status'], 'Skill added!');
        header('location:see_skills.php');
    }
    else{
        $_SESSION['error'] = 'Something went wrong!';
    }
}
?>