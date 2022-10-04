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

$producer_select = '';
if(isset($_GET['producer'])) {
    $producer_select = $_GET['producer'];
}



require_once '../connect.php';

$order_table = 'order_table'.$id;
$staff_table = 'staff_table'.$id;
$inventory_table = 'inventory_table'.$id;

$count_order = 0;


$staff = "select * from $staff_table";
$staff_query = mysqli_query($connect, $staff);

$producer = "select DISTINCT producer from $inventory_table";
$producer_query = mysqli_query($connect, $producer);

$product_code = "select DISTINCT product_code from $order_table";
$product_code_query = mysqli_query($connect, $product_code);


$find = '';
if(isset($_GET['find'])) {
    $find = $_GET['find'];
}

$show_producer = "select * from $inventory_table where  product like '%$find%'";
    $show_producer_query = mysqli_query($connect, $show_producer);

    $order = "select * from $order_table where product like '%$find%'";
    $order_query = mysqli_query($connect, $order);

    $in = 0;
    $out = 0;
    foreach($product_code_query as $value) {
        foreach($order_query as $order_value) {
            if($order_value['product_code'] == $value['product_code']) {
                if($order_value['status'] == 'xuất') {
                    $out += $order_value['amount'];
                    
                } else {
                    $in += $order_value['amount'];
                    
                }
            }    
        }
        
        $in_arrays[$value['product_code']] = $in;
        $out_arrays[$value['product_code']] = $out;

        $in = 0;
        $out = 0;
    }

if(!isset($_GET['producer']) || $_GET['producer'] == 'tất cả') {
    // $show_producer = "select * from $inventory_table where  product like '%$find%'";
    // $show_producer_query = mysqli_query($connect, $show_producer);

    // $order = "select * from $order_table where product like '%$find%'";
    // $order_query = mysqli_query($connect, $order);

    // $input_order_count = 0;
    // $input_order_sum = 0;
    // foreach($input_order_query as $the_input_order) {
    //     $input_order_count += 1;
    //     $input_order_sum += $the_input_order['price']*$the_input_order['amount'];
    //     $count_order += 1;
    // }

    // $output_order = "select price, amount from $order_table where status = 'xuất'";
    // $output_order_query = mysqli_query($connect, $output_order);
    // $output_order_count = 0;
    // $output_order_sum = 0;
    // foreach($output_order_query as $the_output_order) {
    //     $output_order_count+= 1;
    //     $output_order_sum += $the_output_order['price']*$the_output_order['amount'];
    //     $count_order += 1;
    // }
} else {
    $producer = $_GET['producer'];
    $show_producer = "select * from $inventory_table where producer = '$producer' and  product like '%$find%' ";
    $show_producer_query = mysqli_query($connect, $show_producer);


    // $input_order = "select price, amount from $order_table where producer = $producer and status = 'nhập'";
    // $input_order_query = mysqli_query($connect, $input_order);
    // $input_order_count = 0;
    // $input_order_sum = 0;
    // foreach($input_order_query as $the_input_order) {
    //     $input_order_count += 1;
    //     $input_order_sum += $the_input_order['price']*$the_input_order['amount'];
    //     $count_order += 1;
    // }

    // $output_order = "select price, amount from $order_table where producer = $producer and status = 'xuất'";
    // $output_order_query = mysqli_query($connect, $output_order);
    // $output_order_count = 0;
    // $output_order_sum = 0;
    // foreach($output_order_query as $the_output_order) {
    //     $output_order_count+= 1;
    //     $output_order_sum += $the_output_order['price']*$the_output_order['amount'];
    //     $count_order += 1;
    // }
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
                <h3><a href="../show_order/show_order.php?id=<?php echo $id ?>" class = "sidebar_link" >đơn hàng</a></h3>
            </li>
            <li>
                <h3><a href="../inventory/inventory.php?id=<?= $id?>" class = "sidebar_link">sản phẩm trong kho</a></h3>
            </li>
            <li>
                <h3><a href="producer.php?id=<?= $id?>" class = "sidebar_link" style="background-color: rgba(255,255,255,0.2 )">nhà cung cấp</a></h3>
            </li>
            <li>
            
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
                    

                    <div class="find_order">
                        <form class="find_staff" action="producer.php">
                            <div class="select_wrap">
                                <label for="">Chọn nhà sản xuất:</label>
                                <select id="" name="producer" class="select_staff" >
                                    <option <?php echo $producer_select == 'tất cả'?'selected':''?>>tất cả</option>
                                    <?php foreach ($producer_query as  $value): ?>                            
                                        <option class="staff_list_title" <?=$producer_select == $value['producer']?'selected':''?>><?php echo $value['producer'] ?> </option>                                                          
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
                            <th class="staff_list_title">nhà sản xuất</th>
                            <th class="staff_list_title">tên sản phẩm</th>
                            <th class="staff_list_title">mã sản phẩm</th>
                            <th class="staff_list_title">tồn kho</th>
                            <th class="staff_list_title">đơn giá nhập</th>
                            <th class="staff_list_title">đơn giá xuất</th>
                            <th class="staff_list_title">tổng hàng đã nhập</th>
                            <th class="staff_list_title">tổng hàng đã xuất</th>


                        

                        </tr>

                        <?php foreach ($show_producer_query as  $value): ?>
                            <tr>
                                <td class="staff_list_title"><?php echo $value['producer'] ?></td>
                                <td class="staff_list_title"><?php echo $value['product'] ?></td>
                                <td class="staff_list_title"><?php echo $value['product_code'] ?></td>
                                <td class="staff_list_title"><?php echo $value['amount'] ?></td>
                                <td class="staff_list_title"><?php echo $value['input_price'] ?></td>
                                <td class="staff_list_title"><?php echo $value['output_price'] ?></td>   
                                <td class="staff_list_title"><?php echo $in_arrays[$value['product_code']] ?></td> 
                                <td class="staff_list_title"><?php echo $out_arrays[$value['product_code']] ?></td>                         

                            </tr>
                        <?php endforeach ?>    
                    </table>
                </div>
        </div>


    </div>

</div>

    
</body>
</html>