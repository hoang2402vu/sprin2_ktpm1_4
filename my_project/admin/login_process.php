<?php 
$email = $_POST['email'];
$password = $_POST['password'];

require_once './connect.php';

$check_email = "select * from admin where email = '$email'";
$email_admin = mysqli_query($connect, $check_email);
$email_admin_array = mysqli_fetch_array($email_admin);


if($email_admin_array != '') {
    if($password == $email_admin_array['password']) {
        mysqli_close($connect);
        header("location:./home_page/home_page.php?id=$email_admin_array[id]");
    }
}

mysqli_close($connect);
header("location:./?error=emai hoac mat khau khong dung");