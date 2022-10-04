<?php 
$name = $_POST['name'];
$id_staff = $_POST['id_staff'];
$id_admin = $_POST['id_admin'];

require_once './connect.php';
$list_admin = "select * from admin where id = '$id_admin'";
$list_admin_query = mysqli_query($connect, $list_admin);
$list_admin_array = mysqli_fetch_array($list_admin_query);
if($list_admin_array['id'] == '') {
    mysqli_close($connect);
    header('location:index.php?error=id kho khong ton tai');
}

$table_name = 'staff_table'.$id_admin;

$staff = "select * from $table_name where staff_id = '$id_staff'";
$staff_query = mysqli_query($connect, $staff);
$staff_array = mysqli_fetch_array($staff_query);

if($staff_array['staff_id'] == '') {
    mysqli_close($connect);
    header('location:index.php?error=id nhan vien khong ton tai');
} else {
    if($staff_array['name'] != $name) {
        mysqli_close($connect);
        header('location:index.php?error=id nhan vien va ten dang nhap khong khop');
    }
    else {
        mysqli_close($connect);
        header("location:./order_management/order_management.php?staff_id=$id_staff&table_name=$table_name");
    }
}