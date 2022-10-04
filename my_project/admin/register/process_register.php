<?php 
$email = $_POST['email'];
$name = $_POST['name'];
$address = $_POST['address'];
$password = $_POST['password'];
$phone_number = $_POST['phone_number'];



require_once '../connect.php';

$check_email = "select * from admin where email = '$email'";
$email_admin = mysqli_query($connect, $check_email);
$email_admin_array = mysqli_fetch_array($email_admin);


if($email_admin_array != '') {
    mysqli_close($connect);
    header("location:register.php?error=emai da dung cho tai khoan khac");
}

$add_admin = "insert into admin(name, email, phone_number, address, password)
values('$name', '$email', '$phone_number', '$address', '$password')";
mysqli_query($connect, $add_admin);

$get_admin = "select * from admin where email = '$email'";
$list_admin = mysqli_query($connect, $get_admin);
$one_admin = mysqli_fetch_array($list_admin);

$table_name = 'staff_table'.$one_admin['id'];
$staff_table = "create table $table_name(
    staff_id int(6) auto_increment primary key,
    gender char(3),
    name varchar(50),
    email varchar(50) unique,
    phone_num varchar(50) unique,
    birth date
)";
mysqli_query($connect, $staff_table);


$order_table_name = 'order_table'.$one_admin['id'];
$order_table = "create table $order_table_name(
    order_id int(6) auto_increment primary key,
    staff_id int,
    FOREIGN KEY(staff_id) REFERENCES $table_name(staff_id),
    product varchar(50),
    product_code int,
    amount int,
    price int,
    producer varchar(100),
    date_order varchar(30),
    status varchar(5),
    request char(10) DEFAULT 'xác nhận'
     
)";
mysqli_query($connect, $order_table);

$inventory_table_name = 'inventory_table'.$one_admin['id'];
$inventory_table = "create table $inventory_table_name(
    inventory_id int(6) auto_increment primary key,
    product varchar(50),
    product_code int unique,
    producer varchar(100),
    amount int,
    input_price int,
    output_price int
     
)";
mysqli_query($connect, $inventory_table);


header("location:../index.php?id=$one_admin[id]");


