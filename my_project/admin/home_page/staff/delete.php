<?php 
$id = $_GET['id'];
$table_name = $_GET['table_name'];
require_once '../connect.php';




$delete_staff = "delete from $table_name  where staff_id = '$id'";
mysqli_query($connect, $delete_staff);

$admin_id = substr($table_name, 11);


header("location:./staff.php?id=$admin_id");