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

require_once '../connect.php';

$check_id = "select * from admin where id = '$id'";
$id_admin = mysqli_query($connect, $check_id);
$id_admin_array = mysqli_fetch_array($id_admin);

$admin_name = $id_admin_array['name'];
?>

<?php 
$table_name = 'inventory_table'.$id;
$count_inventory = "select count('inventory_id') from $table_name";
$count_inventory_query = mysqli_query($connect, $count_inventory);
$count_inventory_string = mysqli_fetch_array($count_inventory_query);

$find = '';
if(isset($_GET['find'])) {
    $find = $_GET['find'];
}

$list_staff = "select * from $table_name where product like '%$find%'";
$list_staff_query = mysqli_query($connect, $list_staff);

?>

<?php
$amount_inventory = "select  amount from $table_name where product like '%$find%'";
$amount_inventory_query = mysqli_query($connect, $amount_inventory);
$amount_inventory_count = 0;
$amount_inventory_sum = 0;
foreach($amount_inventory_query as $the_amount_inventory) {
    $amount_inventory_count += 1;
    $amount_inventory_sum += $the_amount_inventory['amount'];
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
                <h3><a href="../staff/staff.php?id=<?php echo $id ?>" class = "sidebar_link">quản lý nhân viên</a></h3>
            </li>
            <li>
                <h3><a href="../show_order/show_order.php?id=<?= $id?>" class = "sidebar_link">đơn hàng</a></h3>
            </li>
            <li>
                <h3><a href="inventory.php?id=<?= $id?>" class = "sidebar_link" style="background-color: rgba(255,255,255,0.2 )">sản phẩm trong kho</a></h3>
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
            <li>
                <h3><a href="#" class = "sidebar_link"></a></h3>
            </li>
        </ul>
    </div>
    

    <!--main -->
    <div class="main">
        <div class="header">
            <h2> <a href="http://localhost/my_project/admin/" class="header_link"> ĐĂNG XUẤT</a></h2>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: flex-end;">
            


            <div class="staff_content_header">
                <div class="staff_content_header_item">
                    <h3 class="amount_staff">số loại hàng trong kho: <?php echo $amount_inventory_count ?></h3>
                    <h3 class="amount_staff">tổng số hàng trong kho: <?php echo $amount_inventory_sum ?></h3>


                    
                    <form class="find_staff">
                        <input type="search" name = "find" placeholder="tên sản phẩm" class="find_staff_input">
                        <input type="hidden"  name="id" value="<?php echo $id ?>">
                        <button type="submit" class="find_staff_button">tìm</button>
                    </form>
                </div>
            </div>
        </div>
            
    </div>

    <div class="main">
        <div class="main_content">
            

            </div>

            <div class="staff_content_list">
                    <table class="staff_list_table">
                        <tr>
                            <th class="staff_list_title">id</th>
                            <th class="staff_list_title">tên sản phẩm</th>
                            <th class="staff_list_title">mã sản phẩm</th>
                            <th class="staff_list_title">nhà sản xuất</th>
                            <th class="staff_list_title">số lượng</th>
                            <th class="staff_list_title">đơn giá nhập</th>
                            <th class="staff_list_title">đơn giá xuất</th>

                        </tr>

                        <?php foreach ($list_staff_query as  $value): ?>
                            <tr>
                                <td class="staff_list_title"><?php echo $value['inventory_id'] ?></td>
                                <td class="staff_list_title"><?php echo $value['product'] ?></td>
                                <td class="staff_list_title"><?php echo $value['product_code'] ?></td>
                                <td class="staff_list_title"><?php echo $value['producer'] ?></td>
                                <td class="staff_list_title"><?php echo $value['amount'] ?></td>
                                <td class="staff_list_title"><?php echo $value['input_price'] ?></td>
                                <td class="staff_list_title"><?php echo $value['output_price'] ?></td>
                                                           
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
        </div>


    </div>

</div>

    
</body>
</html>