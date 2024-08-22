<?php
session_start();
require '../includes/db.php';
require '../includes/function.php';

if(isset($_POST['logo'])){
    $image = $_FILES['image'];

    if($image['size'] != 0){
        $after_explode = explode('.', $image['name']);
        $extension = end($after_explode);
        $extension_type = ['jpg', 'JPG', 'jpeg', 'png', 'ico'];
        if(in_array($extension, $extension_type)){
            if($image['size'] <= 1000000){

                $logo_select = "SELECT image_logo FROM web_info WHERE id = 1";
                $logo_result = mysqli_query($conn, $logo_select);

                $get_logo = mysqli_fetch_assoc($logo_result);
                if($get_logo['image_logo'] != null){
                    unlink('../assets/uploads/logo/'.$get_logo['image_logo']);
                }

                $file_name = uniqid().'.'.$extension;
                $photo_sql = "UPDATE web_info SET image_logo = '$file_name' WHERE id = 1";

                if($conn->query($photo_sql)){
                    move_uploaded_file($image['tmp_name'], '../../gymove/assets/uploads/logo/'.$file_name);
                    $_SESSION['success_logo'] = 'Logo Updated successfully!';
                    activitys($_SESSION['login_status'], 'Logo image Updated!');
                    header('location:update_logo_image.php');
                }else{
                  
                    $_SESSION['error_logo'] = 'Logo not uploaded!';
                    header('location:update_logo_image.php');
                }

            }else{
                $_SESSION['error_logo'] = 'Logo must be under 1 MB.';
                header('location:update_logo_image.php');
            }
        }
        else{
            $_SESSION['error_logo'] = 'Only jpg, jpeg, png, extension acceptable!';
            header('location:update_logo_image.php');
        }
    }else{
        $_SESSION['error_logo'] = 'Upload logo to continue.';
        header('location:update_logo_image.php');
    }


}
?>