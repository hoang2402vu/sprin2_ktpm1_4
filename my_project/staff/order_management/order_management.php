<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>order_management</title>
    <link rel="stylesheet" href="../staff_style.css">
</head>
<body>



<?php 
$staff_id = $_GET['staff_id'];
$staff_table = $_GET['table_name'];
$admin_id = substr($staff_table, 11);

$order_table = 'order_table'.substr($staff_table, 11);


require_once '../connect.php';


$staff = "select * from $staff_table where staff_id = '$staff_id'";
$staff_query = mysqli_query($connect, $staff);
$staff_array = mysqli_fetch_array($staff_query);
$staff_name = $staff_array['name'];

$find = "";
if(isset($_GET['find'])) {
    $find = $_GET['find'];
}
$order =  "select * from $order_table where staff_id = $staff_id and product like '%$find%' order by order_id DESC";
$order_query = mysqli_query($connect, $order);

$input_order = "select price, amount from $order_table where status = 'nhập'";
$input_order_query = mysqli_query($connect, $input_order);
$input_order_count = 0;
$input_order_sum = 0;
foreach($input_order_query as $the_input_order) {
    $input_order_count += 1;
    $input_order_sum += $the_input_order['price']*$the_input_order['amount'];
}

$output_order = "select price, amount from $order_table where status = 'xuất'";
$output_order_query = mysqli_query($connect, $output_order);
$output_order_count = 0;
$output_order_sum = 0;
foreach($output_order_query as $the_output_order) {
    $output_order_count+= 1;
    $output_order_sum += $the_output_order['price']*$the_output_order['amount'];
}



?>
    <div class="header">
        <div class="">
            <p>tên nhân viên: <span class="name_staff"><?php echo $staff_name?></span></p>
            <p>ID: <span class="name_staff"><?php echo $staff_id?></span></p>
        </div>

        <div class="logout">
            <h2> <a href="../index.php" class="header_link"> ĐĂNG XUẤT</a></h2>
        </div>
    </div>

    <div class="main">
        <div class="main_order">
            <div class="interactive_order">
                <div class="interactive_in_out">
                    <p>tổng số đơn nhập: <span class="count_order"><?php echo $input_order_count?></span></p>
                    <p>tổng số tiền hàng nhập: <span class="count_order"><?php echo $input_order_sum?></span></p>
                </div>
                <div class="interactive_in_out">
                    <p>tổng số đơn xuất: <span class="count_order"><?php echo $output_order_count?></span></p>
                    <p>tổng số tiền hàng xuất: <span class="count_order"><?php echo $output_order_sum?></span></p>
                </div>

                <form class="find_order">
                        <input type="search" name = "find" placeholder="tên hàng" class="find_order_input">
                        <input type="hidden"  name="table_name" value="<?php echo $staff_table ?>">
                        <input type="hidden"  name="staff_id" value="<?php echo $staff_id ?>">
                        <button type="submit" class="find_order_button">tìm</button>
                    </form>
            </div>

            <div class="in_out_order">
                    <button class="in_out_button"><a href="./input_order.php?staff_id=<?=$staff_id?>&id=<?=$admin_id?>&status=1" class="in_out_link">nhập hàng</a></button>  
                    <button class="in_out_button"><a href="./output_order.php?staff_id=<?=$staff_id?>&id=<?=$admin_id?>&status=0" class="in_out_link out_link">xuất hàng</a></button>               
            </div>
        </div>

        <div class="order_table">
            <div class="order_content_list">
                    <table class="order_list_table">
                        <tr>
                            <th class="order_list_title">id đơn hàng</th>
                            <th class="order_list_title">tên sản phẩm</th>
                            <th class="order_list_title">mã sản phẩm</th>
                            <th class="order_list_title">số lượng</th>
                            <th class="order_list_title">giá/1 sản phẩm</th>
                            <th class="order_list_title">nhà sản xuất</th>
                            <th class="order_list_title">thời gian nhận đơn</th>
                            <th class="order_list_title">id nhân viên nhận đơn</th>
                            <th class="order_list_title">loại đơn hàng</th>
                            <th class="order_list_title">xóa</th>

                        </tr>

                        <?php foreach ($order_query  as  $value): ?>
                            <tr>
                                <td class="order_list_title"><?php echo $value['order_id'] ?></td>
                                <td class="order_list_title"><?php echo $value['product'] ?></td>
                                <td class="order_list_title"><?php echo $value['product_code'] ?></td>
                                <td class="order_list_title"><?php echo $value['amount'] ?></td>
                                <td class="order_list_title"><?php echo $value['price'] ?></td>
                                <td class="order_list_title"><?php echo $value['producer'] ?></td>
                                <td class="order_list_title"><?php echo $value['date_order'] ?></td>
                                <td class="order_list_title"><?php echo $value['staff_id'] ?></td>
                                <td class="order_list_title"><?php echo $value['status'] ?></td>   
                                <td>
                                    <?php if($value['request'] != 'checked') { ?>
                                        <button class="order_button"><a href="delete_order.php?staff_id=<?=$staff_id?>&id=<?=$admin_id?>&order_id=<?=$value['order_id']?>" class="order_link delete">XÓA</a></button></td>    
                                    <?php } else { ?>
                                        <button class="order_button order_checked">đã nhận</button></td>    
                                    <?php }?>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
    </div>
</body>
</html>