<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="./login_style.css">
</head>
<body>
    <?php 
    include './connect.php';
    ?>

    <?php 
    $id_login = '';
    $email = '';
    $password = '';
    if(isset($_GET['id'])) {
        $id_login = $_GET['id'];
        $admin = "select * from admin where id = '$id_login'";
        $get_admin = mysqli_query($connect, $admin);
        $admin_array = mysqli_fetch_array($get_admin);
        $email = $admin_array['email'];
        $password = $admin_array['password'];
    }
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

    <a href="../staff/index.php">vào trang nhận đơn hàng</a>
    <div class="login">
      <div class="login-header">
        <h4 class="header_title">ĐĂNG NHẬP</h4>
      </div>
      <form class="login-form"  method = "post" action = 'login_process.php'>
        <div class="wrap_input">
            <h3>Email: <span id="email_error" class="error"></span></h3>
            <input type="email" value="<?php echo $email ?>" class="login_input" id="email" name="email"/>
        </div>
        
        <div class="wrap_input">
            <h3>Mật Khẩu: <span id="password_error" class="error"></span></h3>
            <input type="password" value="<?php echo $password ?>" class="login_input" id="password" name="password"/>
        </div>
        <div class="login_submit">
            <input type="submit" value="ĐĂNG NHẬP" onclick="return login()" class="login_button"/>
        </div>
        <div class="register">
            <h4 class="or">hoặc</h4>
            <button class=" login_button_register"><a href="./register/register.php" class="register_link">ĐĂNG KÝ</a></button>
        </div>

        <div class="forgot_pass">
            <h4 class="no-access"> <a href="./resest_password/resest_password.php"> Bạn quên mật khẩu?</a></h4>
        </div>

      </form>
    </div>
    <script src="./action.js"></script>
</body>
</html>