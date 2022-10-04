<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home_page</title>
    <link rel="stylesheet" href="../home_page_style.css">
    <link rel="stylesheet" href="./staff.css">
</head>
<body>

<?php 
$id = $_GET['id'];

require_once '../connect.php';

$table_name = 'staff_table'.$id;
$count_staff = "select count('staff_id') from $table_name";
$count_staff_query = mysqli_query($connect, $count_staff);
$count_staff_string = mysqli_fetch_array($count_staff_query);

$find = '';
if(isset($_GET['find'])) {
    $find = $_GET['find'];
}

$list_staff = "select * from $table_name where name like '%$find%'";
$list_staff_query = mysqli_query($connect, $list_staff);

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
                <h3><a href="http://localhost/my_project/admin/home_page/staff/staff.php?id=<?php echo $id ?>" class = "sidebar_link index">quản lý nhân viên</a></h3>
            </li>
            <li>
                <h3><a href="../show_order/show_order.php?id=<?= $id?>" class = "sidebar_link">đơn hàng</a></h3>
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
                <div class="staff_content_header_item">
                    <h3 class="amount_staff">số lượng nhân viên: <?php echo $count_staff_string[0] ?></h3>

                    <form class="find_staff">
                        <input type="search" name = "find" placeholder="tên nhân viên" class="find_staff_input">
                        <input type="hidden"  name="id" value="<?php echo $id ?>">
                        <button type="submit" class="find_staff_button">tìm</button>
                    </form>
                </div>

                <div class="staff_content_header_item">
                <button class="add_button"><a href="./add_staff.php?id=<?php echo $id ?>" class="add_button_link">thêm nhân viên</a></button>
                </div>

            </div>

            <div class="staff_content_list">
                    <table class="staff_list_table">
                        <tr>
                            <th class="staff_list_title">id</th>
                            <th class="staff_list_title">tên</th>
                            <th class="staff_list_title">giới tính</th>
                            <th class="staff_list_title">email</th>
                            <th class="staff_list_title">số điện thoại</th>
                            <th class="staff_list_title">ngày sinh</th>
                            <th class="staff_list_title">sửa</th>
                            <th class="staff_list_title">xóa</th>
                        </tr>

                        <?php foreach ($list_staff_query as  $value): ?>
                            <tr>
                                <td class="staff_list_title"><?php echo $value['staff_id'] ?></td>
                                <td class="staff_list_title"><?php echo $value['name'] ?></td>
                                <td class="staff_list_title"><?php echo $value['gender'] ?></td>
                                <td class="staff_list_title"><?php echo $value['email'] ?></td>
                                <td class="staff_list_title"><?php echo $value['phone_num'] ?></td>
                                <td class="staff_list_title"><?php echo $value['birth'] ?></td>
                                <td><button class="staff_button"><a href="./update_staff.php?id=<?php echo $value['staff_id'] ?>&table_name=<?php echo $table_name ?>" class="staff_link update">SỬA</a></button></td>    
                                <td><button class="staff_button"><a href="delete.php?id=<?php echo $value['staff_id'] ?>&table_name=<?php echo $table_name ?>" class="staff_link delete" style="padding: 0;">XÓA</a></button></td>    

                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
        </div>


    </div>

</div>

    
</body>
</html>