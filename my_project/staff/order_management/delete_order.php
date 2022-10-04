<?php 
$id = $_GET['id'];
$order_id = $_GET['order_id'];
$staff_id = $_GET['staff_id'];
require_once '../connect.php';

$order_table = "order_table".$id;


$delete_staff = "delete from $order_table  where order_id = '$order_id'";
mysqli_query($connect, $delete_staff);



$table_name = "staff_table".$id;


header("location:./order_management.php?staff_id=$staff_id&table_name=$table_name");