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
$staff_id = $_GET['staff_id'];
$id = $_GET['id'];
$status = $_GET['status'];
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
        <h4 class="header_title">NHẬP HÀNG</h4>
      </div>
      <form class="login-form"  method = "post" action = 'order_process.php'>

            <input type="hidden" value="<?= $staff_id?>" name = "staff_id">
            <input type="hidden" value="<?= $id?>" name = "id">
            <input type="hidden" value="<?= $status?>" name = "status">


            <div class="wrap_wrap_input">
                <div class="wrap_input">
                    <h3>tên sản phẩm:<span id="product_name_error" class="error"></span></h3>
                    <input type="text" value="" id="product_name" name="product_name" class="login_input"/>
                </div>

                <div class="wrap_input">
                    <h3>mã sản phẩm:<span id="product_id_error" class="error"></span></h3>
                    <input type="number" value="" id="product_id" name="product_id" class="login_input"/>
                </div>
            </div>

            <div class="wrap_wrap_input">
                <div class="wrap_input">
                    <h3>số lượng:<span id="amount_error" class="error"></span></h3>
                    <input type="text" value="" id="amount" name="amount" class="login_input"/>
                </div>

                <div class="wrap_input">
                    <h3>đơn giá/1 sản phẩm:<span id="price_error" class="error"></span></h3>
                    <input type="number" value="" id="price" name="price" class="login_input"/>
                </div>
            </div>

            <div class="wrap_wrap_input">
                <div class="wrap_input">
                    <h3>tên nhà sản xuất:<span id="producer_error" class="error"></span></h3>
                    <input type="text" value="" id="producer" name="producer" class="login_input"/>
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
                    <input type="time" value="" id = "time" name = "time" class="login_input"/>
                    <input type="date" value="" id = "date" name = "date" class="login_input"/>    
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

