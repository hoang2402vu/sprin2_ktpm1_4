<?php 
$email = $_POST['email'];
$name = $_POST['name'];
$date = $_POST['date'];
$phone_num = $_POST['phone_number'];
$id = $_POST['id'];
$table_name = $_POST['table_name'];
$gender = $_POST['gender'];



require_once '../connect.php';



$check_staff = "select * from $table_name where staff_id != '$id'";
$staff = mysqli_query($connect, $check_staff);
foreach($staff as $value) {
    if($value['email'] == $email || $value['phone_num'] == $phone_num) {
        mysqli_close($connect);
        header("location:update_staff.php?id=$id&table_name=$table_name&error=emai hoac so dien thoai da dung cho tai khoan khac");
    }
}






$update_staff = "update $table_name set

name = '$name',
gender = '$gender',
email = '$email',
phone_num = '$phone_num',
birth =' $date'
where staff_id = '$id'";
mysqli_query($connect, $update_staff);

$admin_id = substr($table_name, 11);


header("location:./staff.php?id=$admin_id");