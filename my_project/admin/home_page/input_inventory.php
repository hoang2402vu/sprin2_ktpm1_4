<?php 
require_once './connect.php';
$id = $_GET['id'];
$order_id = $_GET['order_id'];

$order_table = "order_table".$id;
$check_order = "select * from $order_table where order_id = '$order_id'";
$check_order_query = mysqli_query($connect, $check_order);
$check_order_array = mysqli_fetch_array($check_order_query);

$product = $check_order_array['product'];
$product_code = $check_order_array['product_code'];
$producer = $check_order_array['producer'];
$amount  = $check_order_array['amount'];
$price = $check_order_array['price'];


$inventory_table_name = 'inventory_table'.$id;
$check_product = "select * from $inventory_table_name where product_code = '$product_code'";
$check_product_query = mysqli_query($connect, $check_product);
$check_product_array = mysqli_fetch_array($check_product_query);

if($check_product_array == '') {
    $add_product = "insert into $inventory_table_name( product, product_code, producer, amount, input_price)
                values('$product', '$product_code', '$producer', '$amount', '$price')";
    mysqli_query($connect, $add_product);
} 
else {
    
    $new_input_price = $price;
    $new_amount = $amount + $check_product_array['amount'];
    $update_input_price = "update $inventory_table_name set
                 input_price = $new_input_price, amount = $new_amount where product_code = $product_code";
    mysqli_query($connect, $update_input_price);
}

header("location: home_page.php?id=$id");