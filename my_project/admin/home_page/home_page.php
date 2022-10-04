<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home_page</title>
    <link rel="stylesheet" href="./home_page_style.css">
    <link rel="stylesheet" href="./staff/staff.css">
</head>
<body>

<?php 
require_once '../connect.php';
if(isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = $_POST['id'];
}


$admin = "select * from admin where id = '$id'";
$admin_query = mysqli_query($connect, $admin);
$admin_array = mysqli_fetch_array($admin_query);
$admin_name = $admin_array['name'];

$staff_id_select = '';
if(isset($_GET['staff_id'])) {
    $staff_id_select = $_GET['staff_id'];
}


$table_name = 'order_table'.$id;
$staff_table = 'staff_table'.$id;

$staff = "select * from $staff_table";
$staff_query = mysqli_query($connect, $staff);

$producer = "select DISTINCT producer from $table_name";
$producer_query = mysqli_query($connect, $producer);

$find = '';
if(isset($_GET['find'])) {
    $find = $_GET['find'];
}

$list_staff = "select * from $table_name where request = 'xác nhận' and product like '%$find%'";
$list_staff_query = mysqli_query($connect, $list_staff);


$request = '';
if(isset($_POST['request'])) {
    $order_id = $_POST['order_id'];
    $request = $_POST['request'];
    if($request == 'xóa') {
        $delele = "delete from $table_name where order_id = $order_id";
        mysqli_query($connect, $delele);
        header("location: home_page.php?id=$id");
    }
    if($request == 'xác nhận') {
        $update = "update $table_name set request = 'checked' where order_id = $order_id";
        mysqli_query($connect, $update);
        header("location: input_inventory.php?id=$id&order_id=$order_id");
    }
}
?>


<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <h2><a href="./home_page.php?id=<?php echo $id ?>">
                    TRANG CHỦ
                </a></h2>
            </li>
            <li>
                <h3><a href="./staff/staff.php?id=<?php echo $id ?>" class = "sidebar_link">quản lý nhân viên</a></h3>
            </li>
            <li>
                <h3><a href="./show_order/show_order.php?id=<?= $id?>" class = "sidebar_link">đơn hàng</a></h3>
            </li>
            <li>
                <h3><a href="./inventory/inventory.php?id=<?= $id?>" class = "sidebar_link">sản phẩm trong kho</a></h3>
            </li>
            <li>
                <h3><a href="./producer/producer.php?id=<?= $id?>" class = "sidebar_link">nhà cung cấp</a></h3>
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
            <h2> <a href="../index.php" class="header_link"> ĐĂNG XUẤT</a></h2>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: flex-end;">
            <div class="show_admin" style="padding: 0px 24px;">
                <div class="admin_name">
                    <p class="admin">ID kho: <span style="font-weight: 700;"><?php echo $id ?></span></p>
                    <p class="admin">Admin: <span style="font-weight: 700;"><?php echo $admin_name ?></span></p>
                </div>

                <button class="change_infor_admin"><a href="./change_infor_admin/change_infor_admin.php?id=<?php echo $id ?>" class="change_infor_admin_link">sửa</a></button>
            </div>


            <div class="staff_content_header">
                <div class="staff_content_header_item">



                    
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
                            <th class="staff_list_title">yêu cầu</th>
                            <th class="staff_list_title">hủy yêu cầu</th>



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
                                <td class="staff_list_title" style="width: 100px;padding: 0;">
                                    <form action="home_page.php" method="POST">
                                        <input type="hidden" value="<?php echo $value['request'] ?>" name="request">
                                        <input type="hidden" value="<?php echo $value['order_id'] ?>" name="order_id">
                                        <input type="hidden" value="<?php echo $id ?>" name="id">
                                        <?php if($value['request'] == 'xác nhận'){ ?>
                                            <button class="accept"><?php echo $value['request'] ?></button>
                                        <?php }?>
                                    </form>                                   
                                </td>  
                                <td class="staff_list_title">
                                    <form action="home_page.php" method="POST">
                                        <input type="hidden" value="<?php echo $value['order_id'] ?>" name="order_id">
                                        <input type="hidden" value="<?php echo $id ?>" name="id">
                                        <input type="hidden" value="xóa" name="request">
                                        <button class="delete">xóa</button>
                                        
                                    </form>
                                </td>                          

                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
        </div>


    </div>

</div>

    
</body>
</html>