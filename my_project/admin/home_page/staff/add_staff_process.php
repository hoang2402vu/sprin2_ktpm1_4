<?php 
$email = $_POST['email'];
$name = $_POST['name'];
$date = $_POST['date'];
$phone_num = $_POST['phone_number'];
$id = $_POST['id'];
$gender = $_POST['gender'];



require_once '../connect.php';

$table_name = 'staff_table'.$id;

$check_email = "select * from $table_name where email = '$email'";
$email_staff = mysqli_query($connect, $check_email);
$email_staff_array = mysqli_fetch_array($email_staff);

$check_phone_num = "select * from $table_name where phone_num = '$phone_num'";
$phone_num_staff = mysqli_query($connect, $check_phone_num);
$phone_num_staff_array = mysqli_fetch_array($phone_num_staff);


if($email_staff_array != '' || $phone_num_staff_array != '') {
    mysqli_close($connect);
    header("location:add_staff.php?id=$id&error=emai hoac so dien thoai da dung cho tai khoan khac");
}

$add_staff = "insert into $table_name(name, gender, email, phone_num, birth)
values('$name', '$gender', '$email', '$phone_num', '$date')";
mysqli_query($connect, $add_staff);



header("location:./staff.php?id=$id");