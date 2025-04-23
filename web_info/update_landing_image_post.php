<?php
session_start();
require '../includes/db.php';
require '../includes/function.php';

if(isset($_POST['landingimage'])){
    $image = $_FILES['image'];

    if($image['size'] != 0){
        $after_explode = explode('.', $image['name']);
        $extension = end($after_explode);
        $extension_type = ['jpg', 'JPG', 'jpeg', 'png'];
        if(in_array($extension, $extension_type)){
            if($image['size'] <= 10000000){

                $image_select = "SELECT image FROM web_info WHERE id = 1";
                $image_result = mysqli_query($conn, $image_select);
                $get_image = mysqli_fetch_assoc($image_result);
                if($get_image['image'] != null){
                    unlink('../assets/uploads/landing_image/'.$get_image['image']);
                }

                $file_name = uniqid().'.'.$extension;
                $photo_sql = "UPDATE web_info SET image = '$file_name' WHERE id = 1";

                if($conn->query($photo_sql)){
                    move_uploaded_file($image['tmp_name'], '../assets/uploads/landing_image/'.$file_name);
                    $_SESSION['success_landing_image'] = 'Image Updated successfully!';
                    activitys($_SESSION['login_status'], 'Landing image Updated!');
                    header('location:update_landing_image.php');
                }else{
                  
                    $_SESSION['error_landing_image'] = 'Image not uploaded!';
                    header('location:update_landing_image.php');
                }

            }else{
                $_SESSION['error_landing_image'] = 'Image must be under 10 MB.';
                header('location:update_landing_image.php');
            }
        }
        else{
            $_SESSION['error_landing_image'] = 'Only jpg, jpeg, png, extension acceptable!';
            header('location:update_landing_image.php');
        }
    }else{
        $_SESSION['error_landing_image'] = 'Upload logo to continue.';
        header('location:update_landing_image.php');
    }


}
?>