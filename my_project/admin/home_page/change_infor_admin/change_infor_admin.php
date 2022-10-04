<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="../home_page_style.css">
</head>
<body>
    <?php 
    $error = '';
    if(isset($_GET['error'])) {
        $error = $_GET['error'];
    }
    ?>

    <?php 
    $id = $_GET['id'];

    require_once '../connect.php';

    $check_id = "select * from admin where id = '$id'";
    $admin = mysqli_query($connect, $check_id);
    $admin_array = mysqli_fetch_array($admin);

    ?>

    <div class="error_email">
        <h3 class="error_title"><?php echo $error ?></h3>
    </div>
    <div class="login">
      <div class="login-header">
        <h4 class="header_title">SỬA THÔNG TIN</h4>
      </div>
      <form class="login-form" method = "post" action = 'process_change_infor_admin.php'>

        <div class="wrap_input">

            <input type="hidden" value="<?php echo $id ?>" name="id" >

            <h3>họ và tên:<span id="name_error" class="error"></span></h3>
            <input type="text" value="<?php echo $admin_array['name'] ?>" id="name" name="name" class="login_input"/>
        </div>

        <div class="wrap_input">
            <h3>địa chỉ:<span id="address_error" class="error"></span></h3>
            <input type="text" value="<?php echo $admin_array['address'] ?>" id = "address" name = "address" class="login_input"/>
        </div>

        <div class="wrap_input">
            <h3>Email: <span id="email_error" class="error"></span></h3>
            <input type="email" value="<?php echo $admin_array['email'] ?>" id="email" name = "email" class="login_input"/>
        </div>

        <div class="wrap_input">
            <h3>Số điện thoại: <span id="phone_number_error" class="error"></span></h3>
            <input type="number" value="<?php echo $admin_array['phone_number'] ?>" id="phone_number" name = "phone_number" class="login_input"/>
        </div>
        
        <div class="wrap_input">
            <h3>Mật Khẩu:<span id="password_error" class="error"></span></h3>
            <input type="password" value="" id = "password" name = "password" class="login_input"/>
        </div>

        <div class="wrap_input">
            <h3>Nhập lại mật Khẩu:<span id="re_password_error" class="error"></span></h3>
            <input type="password" value="" id = "re_password" class="login_input"/>
        </div>
        <div class="login_submit">
            <input type="submit" onclick="return register()" value="XÁC NHẬN" class="login_button"/>
        </div>

      </form>
    </div>
    

    <script src="../action.js"></script>
</body>
</html>