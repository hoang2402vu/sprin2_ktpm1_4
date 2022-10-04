<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home_page</title>
    <link rel="stylesheet" href="../home_page_style.css">
    <link rel="stylesheet" href="../staff/staff.css">
</head>
<body>

<?php 
$id = $_GET['id'];

$staff_id_select = '';
if(isset($_GET['staff_id'])) {
    $staff_id_select = $_GET['staff_id'];
}



require_once '../connect.php';

$table_name = 'order_table'.$id;
$staff_table = 'staff_table'.$id;



$staff = "select * from $staff_table";
$staff_query = mysqli_query($connect, $staff);



$find = '';
if(isset($_GET['find'])) {
    $find = $_GET['find'];
}

if(!isset($_GET['staff_id']) || $_GET['staff_id'] == 'tất cả') {
    $list_staff = "select * from $table_name where  request = 'checked' and  product like '%$find%'";
    $list_staff_query = mysqli_query($connect, $list_staff);

    $input_order = "select price, amount from $table_name where  request = 'checked' and   status = 'nhập' and  product like '%$find%'";
    $input_order_query = mysqli_query($connect, $input_order);
    $input_order_count = 0;
    $input_order_sum = 0;
    $count_order = 0;
    foreach($input_order_query as $the_input_order) {
        $input_order_count += 1;
        $input_order_sum += $the_input_order['price']*$the_input_order['amount'];
        $count_order += 1;
    }

    $output_order = "select price, amount from $table_name where  request = 'checked' and  status = 'xuất' and  product like '%$find%'";
    $output_order_query = mysqli_query($connect, $output_order);
    $output_order_count = 0;
    $output_order_sum = 0;
    foreach($output_order_query as $the_output_order) {
        $output_order_count+= 1;
        $output_order_sum += $the_output_order['price']*$the_output_order['amount'];
        $count_order += 1;
    }
} else {
    $staff_id = $_GET['staff_id'];
    $list_staff = "select * from $table_name where  request = 'checked' and  staff_id = $staff_id and  product like '%$find%' ";
    $list_staff_query = mysqli_query($connect, $list_staff);

    $input_order = "select price, amount from $table_name where  request = 'checked' and  staff_id = $staff_id and status = 'nhập' and  product like '%$find%'";
    $input_order_query = mysqli_query($connect, $input_order);
    $input_order_count = 0;
    $input_order_sum = 0;
    $count_order = 0;
    foreach($input_order_query as $the_input_order) {
        $input_order_count += 1;
        $input_order_sum += $the_input_order['price']*$the_input_order['amount'];
        $count_order += 1;
    }

    $output_order = "select price, amount from $table_name where  request = 'checked' and  staff_id = $staff_id and status = 'xuất' and  product like '%$find%'";
    $output_order_query = mysqli_query($connect, $output_order);
    $output_order_count = 0;
    $output_order_sum = 0;
    foreach($output_order_query as $the_output_order) {
        $output_order_count+= 1;
        $output_order_sum += $the_output_order['price']*$the_output_order['amount'];
        $count_order += 1;
    }
}

?>






<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <h2><a href="http://localhost/my_project/admin/home_page/home_page.php?id=<?php echo $id ?>">
                    TRANG CHỦ
                </a></h2>
            </li>
            <li>
                <h3><a href="http://localhost/my_project/admin/home_page/staff/staff.php?id=<?php echo $id ?>" class = "sidebar_link">quản lý nhân viên</a></h3>
            </li>
            <li>
                <h3><a href="show_order.php?id=<?= $id?>" class = "sidebar_link" style="background-color: rgba(255,255,255,0.2 )">đơn hàng</a></h3>
            </li>
            <li>
                <h3><a href="../inventory/inventory.php?id=<?= $id?>" class = "sidebar_link">sản phẩm trong kho</a></h3>
            </li>
            <li>
                <h3><a href="../producer/producer.php?id=<?= $id?>" class = "sidebar_link">nhà cung cấp</a></h3>
            </li>
            
            <li>
                <h3><a href="#" class = "sidebar_link"></a></h3>
            </li>
            <li>
                <h3><a href="#" class = "sidebar_link"></a></h3>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!--main -->
    <div class="main">
        <div class="header">
            <h2> <a href="http://localhost/my_project/admin/" class="header_link"> ĐĂNG XUẤT</a></h2>
        </div>

        <div class="main_content">
            <div class="staff_content_header">
                <div class="find_order_item staff_content_header_item">
                    <div>
                        <h3 class="amount_staff">tổng số đơn hàng: <?php echo $count_order ?></h3>
                        <div class="interactive_in_out">
                            <p>tổng số đơn nhập: <span class="count_order"><?php echo $input_order_count?></span></p>
                            <p>tổng số tiền hàng nhập: <span class="count_order"><?php echo $input_order_sum?></span></p>
                        </div>
                        <div class="interactive_in_out">
                            <p>tổng số đơn xuất: <span class="count_order"><?php echo $output_order_count?></span></p>
                            <p>tổng số tiền hàng xuất: <span class="count_order"><?php echo $output_order_sum?></span></p>
                        </div>
                    </div>

                    <div class="find_order">
                        <form class="find_staff" action="show_order.php">
                            <div class="select_wrap">
                                <input type="hidden" value="<?= $id ?>" name="id">
                                <label for="">Chọn id nhân viên:</label>
                                <select id="" name="staff_id" class="select_staff" >
                                    <option <?php echo$staff_id_select == 'tất cả'?'selected':''?>>tất cả</option>
                                    <?php foreach ($staff_query as  $value): ?>                            
                                        <option class="staff_list_title" <?=$staff_id_select == $value['staff_id']?'selected':''?>><?php echo $value['staff_id'] ?> </option>                                                          
                                    <?php endforeach ?>
                                </select>  
                            </div>
                            <div>
                                <input type="search" name = "find" placeholder="tên sản phẩm" class="find_staff_input" value="<?= $find ?>">
                                <input type="hidden"  name="id" value="<?php echo $id ?>">
                                <button type="submit" class="find_staff_button">tìm</button>
                            </div>
      
                        </form>
                    </div>
                    
                </div>

            </div>

            <div class="staff_content_list">
                    <table class="staff_list_table">
                        <tr>
                            <th class="staff_list_title">id</th>
                            <th class="staff_list_title">tên sản phẩm</th>
                            <th class="staff_list_title">mã sản phẩm</th>
                            <th class="staff_list_title">số lượng</th>
                            <th class="staff_list_title">đơn giá</th>
                            <th class="staff_list_title">nhà sản xuất</th>
                            <th class="staff_list_title">ngày nhận đơn</th>
                            <th class="staff_list_title">id nhân viên</th>
                            <th class="staff_list_title">xuất/nhập</th>

                        </tr>

                        <?php foreach ($list_staff_query as  $value): ?>
                            <tr>
                                <td class="staff_list_title"><?php echo $value['order_id'] ?></td>
                                <td class="staff_list_title"><?php echo $value['product'] ?></td>
                                <td class="staff_list_title"><?php echo $value['product_code'] ?></td>
                                <td class="staff_list_title"><?php echo $value['amount'] ?></td>
                                <td class="staff_list_title"><?php echo $value['price'] ?></td>
                                <td class="staff_list_title"><?php echo $value['producer'] ?></td>
                                <td class="staff_list_title"><?php echo $value['date_order'] ?></td>
                                <td class="staff_list_title"><?php echo $value['staff_id'] ?></td>
                                <td class="staff_list_title"><?php echo $value['status'] ?></td>                           
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
        </div>


    </div>

</div>

    
</body>
</html>