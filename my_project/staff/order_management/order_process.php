<?php
require_once '../connect.php';


$staff_id_true = $_POST['staff_id'];

$id = $_POST['id'];

$staff_table = 'staff_table'.$id;
$order_table = 'order_table'.$id;
$inventory_table_name = 'inventory_table'.$id;

$product = $_POST['product_name'];
$product_code = $_POST['product_id'];
$amount = $_POST['amount'];
$price = $_POST['price'];
$producer = $_POST['producer'];
$staff_name = $_POST['name'];
$staff_id = $_POST['id_staff'];
$status = $_POST['status'];
$time = $_POST['time'];
$date = $_POST['date'];

$date_order = $time."/".$date;


$staff_name_true = "select name from $staff_table where staff_id = $staff_id_true";
$staff_name_true_query = mysqli_query($connect, $staff_name_true);
$staff_name_true_array = mysqli_fetch_array($staff_name_true_query);

$check_product = "select * from $inventory_table_name where product_code = '$product_code'";
$check_product_query = mysqli_query($connect, $check_product);
$check_product_array = mysqli_fetch_array($check_product_query);

$error = '';
if($staff_id_true != $staff_id) {
    $error = 'id nhân viên không chính sác';
} elseif($staff_name != $staff_name_true_array[0]) {
    $error = 'tên nhân viên không chính sác';
}

if($check_product_array != ''){
    if($check_product_array['product'] != $product || $check_product_array['producer'] != $producer){
        $error = 'tên sản phẩm hoặc tên nhà phân phối không khớp với mã sản phẩm';
    }
} 


if($status == 0 || $status == 3) {
    if($check_product_array == '') {
        $error = 'sản phẩm không có trong kho';
    }
     elseif($amount > $check_product_array['amount']) {
        $error = "chỉ còn $check_product_array[amount] sản phẩm trong kho";
    }
}



if($status == 1) {
    if($error != '') {
        mysqli_close($connect);
        header("location:./input_order.php?staff_id=$staff_id_true&id=$id&error=$error&status=1");
    }
    else {
        $order = "insert into $order_table( staff_id, product, product_code, amount, price, producer, date_order, status)
                      values( '$staff_id', '$product', '$product_code', '$amount', '$price', '$producer', '$date_order', 'nhập')";
         mysqli_query($connect, $order);
            
        
        

    }
}
if($status == 0) {
    if($error != '') {
        mysqli_close($connect);
        header("location:./output_order.php?staff_id=$staff_id_true&id=$id&error=$error&status=0");
    } else {
        $order = "insert into $order_table( staff_id, product, product_code, amount, price, producer, date_order, status)
                      values( '$staff_id', '$product', '$product_code', '$amount', '$price', '$producer', '$date_order', 'xuất')";
         mysqli_query($connect, $order);
            
    }
} 

if($status == 3) {
    if($error != '') {
        mysqli_close($connect);
        header("location:./output_order.php?staff_id=$staff_id_true&id=$id&error=$error&status=0");
    }
}




mysqli_close($connect);
header("location:./order_management.php?staff_id=$staff_id&table_name=$staff_table");




