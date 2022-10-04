<?php 
$email = $_POST['email'];
$password = $_POST['password'];
$phone_number = $_POST['phone_number'];



require_once '../connect.php';

$check_email = "select * from admin where email = '$email'";
$email_admin = mysqli_query($connect, $check_email);
$email_admin_array = mysqli_fetch_array($email_admin);

if($email_admin_array != '') {
    if($phone_number == $email_admin_array['phone_number']) {
        $resest_password = "update admin set password = '$password' where  email = '$email'";
        $new_password = mysqli_query($connect, $resest_password);

        mysqli_close($connect);
        header("location:../index.php?id=$email_admin_array[id]");
    }

    
} else {
    header('location:./resest_password.php?error=email hoac so dien thoai khong dung');
}





