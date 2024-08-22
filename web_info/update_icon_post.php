<?php
session_start();
require '../includes/db.php';
require '../includes/function.php';
if(isset($_POST['icon'])){
    $image = $_FILES['image'];

    if($image['size'] != 0){
        $after_explode = explode('.', $image['name']);
        $extension = end($after_explode);
        $extension_type = ['jpg', 'JPG', 'jpeg', 'png', 'ico'];
        if(in_array($extension, $extension_type)){
            if($image['size'] <= 1000000){

                $icon_select = "SELECT icon FROM web_info WHERE id = 1";
                $icon_result = mysqli_query($conn, $icon_select);

                $get_icon = mysqli_fetch_assoc($icon_result);
                if($get_icon['icon'] != null){
                    unlink('../assets/uploads/icon/'.$get_icon['icon']);
                }

                $file_name = uniqid().'.'.$extension;
                $photo_sql = "UPDATE web_info SET icon = '$file_name' WHERE id = 1";

                if($conn->query($photo_sql)){
                    move_uploaded_file($image['tmp_name'], '../../gymove/assets/uploads/icon/'.$file_name);
                    $_SESSION['success_icon'] = 'Icon added successfully!';
                    activitys($_SESSION['login_status'], 'Icon Updated!');
                    header('location:update_icon.php');
                }else{
                  
                    $_SESSION['error_icon'] = 'Icon not uploaded!';
                    header('location:update_icon.php');
                }

            }else{
                $_SESSION['error_icon'] = 'Icon must be under 1 MB.';
                header('location:update_icon.php');
            }
        }
        else{
            $_SESSION['error_icon'] = 'Only jpg, jpeg, png, extension acceptable!';
            header('location:update_icon.php');
        }
    }else{
        $_SESSION['error_icon'] = 'Upload icon to continue.';
        header('location:update_icon.php');
    }


}
?>