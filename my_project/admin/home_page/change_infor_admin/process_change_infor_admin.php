<?php 
$email = $_POST['email'];
$name = $_POST['name'];
$address = $_POST['address'];
$password = $_POST['password'];
$phone_number = $_POST['phone_number'];
$id = $_POST['id'];



require_once '../connect.php';

$check_id = "select email from admin where id != '$id'";
$email_admin = mysqli_query($connect, $check_id);
$email_admin_array =mysqli_fetch_all($email_admin);

$count = 0;

foreach($email_admin_array as $index => $admin) {
    if($admin[0] == $email) {
        $count += 1;
    }
    
}

if($count != 0) {
    mysqli_close($connect);
    header("location:./change_infor_admin.php?id=$id&error=email da dung cho tai khoan khac");
} else {
    $update_admin = "update admin set
        email = '$email',
        name = '$name',
        address = '$address',
        phone_number = '$phone_number',
        password = '$password'
        where  id = '$id'";
    $new_admin = mysqli_query($connect, $update_admin); 
    mysqli_close($connect);
    header("location:../home_page.php?id=$id");
}

    
