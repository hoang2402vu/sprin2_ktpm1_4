<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>input_order</title>
    <link rel="stylesheet" href="../staff_style.css">
</head>
<body>
<?php 

require_once '../connect.php';

$id = $_GET['id'];
$order_id = $_GET['order_id'];
$staff_id = $_GET['staff_id'];
$table_name = "order_table".$id;
$order = "select * from $table_name where order_id = $order_id";
$order_query = mysqli_query($connect, $order);
$order_array = mysqli_fetch_array($order_query);

$time = substr($order_array['date_order'],0, 5);
$date = substr($order_array['date_order'],6);

$hour = substr($time, 0, 1);




?>

<?php 
    $error = '';
    if(isset($_GET['error'])) {
        $error = $_GET['error'];
    }

?>

<div class="error_email">
        <h3 class="error_title"><?php echo $error ?></h3>
</div>
    

    <div class="login">
      <div class="login-header">
        <h4 class="header_title">SỬA ĐƠN HÁNG</h4>
      </div>
      <form class="login-form"  method = "post" action = 'order_process.php'>

            <input type="hidden" value="<?= $staff_id?>" name = "staff_id">
            <input type="hidden" value="<?= $id?>" name = "id">
            <input type="hidden" value="3" name = "status">
            <input type="hidden" value="<?= $order_array['order_id'] ?>" name = "order_id">


            


            <div class="wrap_wrap_input">
                <div class="wrap_input">
                    <h3>tên sản phẩm:<span id="product_name_error" class="error"></span></h3>
                    <input type="text" value="<?= $order_array['product']?>" id="product_name" name="product_name" class="login_input"/>
                </div>

                <div class="wrap_input">
                    <h3>mã sản phẩm:<span id="product_id_error" class="error"></span></h3>
                    <input type="number" value="<?= $order_array['product_code']?>" id="product_id" name="product_id" class="login_input"/>
                </div>
            </div>

            <div class="wrap_wrap_input">
                <div class="wrap_input">
                    <h3>số lượng:<span id="amount_error" class="error"></span></h3>
                    <input type="text" value="<?= $order_array['amount']?>" id="amount" name="amount" class="login_input"/>
                </div>

                <div class="wrap_input">
                    <h3>đơn giá/1 sản phẩm:<span id="price_error" class="error"></span></h3>
                    <input type="number" value="<?= $order_array['price']?>" id="price" name="price" class="login_input"/>
                </div>
            </div>

            <div class="wrap_wrap_input">
                <div class="wrap_input">
                    <h3>tên nhà sản xuất:<span id="producer_error" class="error"></span></h3>
                    <input type="text" value="<?= $order_array['producer']?>" id="producer" name="producer" class="login_input"/>
                </div>
            </div>
                

                

            <div class="wrap_wrap_input">
                <div class="wrap_input">
                    <h3>tên nhân viên:<span id="name_error" class="error"></span></h3>
                    <input type="text" value="" id="name" name="name" class="login_input"/>
                </div>
        
                <div class="wrap_input">
                    <h3>ID nhân viên: <span id="id_staff_error" class="error"></span></h3>
                    <input type="number" class="login_input" id="id_staff" name="id_staff"/>
                </div>
            </div>

            <div class="wrap_input">
                <h3>thời gian nhập hàng:<span id="date_error" class="error"></span></h3>
                <div class="wrap_wrap_input">
                    <input type="time" value="<?= $time ?>" id = "time" name = "time" class="login_input"/>
                    <input type="date" value="<?= $date ?>" id = "date" name = "date" class="login_input"/>    
                </div>
            </div>

            <div class="login_submit">
                <input type="submit" value="xác nhận" onclick="return input_product()" class="login_button"/>
            </div>

            <p id = "note" class="error"></p>
      </form>
    </div>
    <script src="../action.js"></script>
</body>
</html>