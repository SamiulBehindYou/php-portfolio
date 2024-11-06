<?php
session_start();
require '../includes/db.php';
require '../includes/function.php';
if(isset($_POST['profile'])){
    $id = $_SESSION['login_status'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $image = $_FILES['image'];
    $password = $_POST['password'];

    $user_select = "SELECT image, password FROM users WHERE id = $id";
    $user_result = mysqli_query($conn, $user_select);
    $get_user = mysqli_fetch_assoc($user_result);

    if(password_verify($password, $get_user['password'])){
        
            if($name != null && $email != null){
                if($image['size'] != 0){
                    $after_explode = explode('.', $image['name']);
                    $extension = end($after_explode);
                    $extension_type = ['jpg', 'JPG', 'jpeg', 'png', 'gif', 'webp'];
                    if(in_array($extension, $extension_type)){
                        if($image['size'] <= 10000000){
        
                            if($get_user['image'] != null){
                                unlink('../assets/uploads/profile/'.$get_user['image']);
                            }
        
                            $file_name = uniqid().'.'.$extension;
                            $photo_sql = "UPDATE users SET name = '$name', email = '$email', image = '$file_name' WHERE id = $id";
        
                            if($conn->query($photo_sql)){
                                move_uploaded_file($image['tmp_name'], '../assets/uploads/profile/'.$file_name);
                                $_SESSION['success_profile'] = 'Profile added successfully!';
                                activitys($_SESSION['login_status'], 'Profile updated!');
                                header('location:profile.php');
                            }else{
                                $_SESSION['error_image'] = 'File not uploaded!';
                                header('location:profile.php');
                            }
        
                        }else{
                            $_SESSION['error_image'] = 'Image must be under 10 MB.';
                            header('location:profile.php');
                        }
                    }
                    else{
                        $_SESSION['error_image'] = 'Only jpg, jpeg, png, gif, webp extension acceptable!';
                        header('location:profile.php');
                    }
                }else{
                    $photo_sql = "UPDATE users SET name = '$name', email = '$email' WHERE id = $id";
        
                    if($conn->query($photo_sql)){
                        $_SESSION['success_profile'] = 'Profile Updated successfully!';
                        activitys($_SESSION['login_status'], 'Profile updated!');
                        header('location:profile.php');
                    }else{
                        $_SESSION['error_image'] = 'Profile not uploaded!';
                        header('location:profile.php');
                    }
                }
            }
            
        }else{
            $_SESSION['error'] = 'Password does not matched!';
            header('location:profile.php');
        }
    }
?>