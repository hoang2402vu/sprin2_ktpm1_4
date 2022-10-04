<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="./staff_style.css">
</head>
<body>
    
    <?php 
    $error = '';
    if(isset($_GET['error'])) {
        $error = $_GET['error'];
    }
    ?>

    <div class="error_email">
        <h3 class="error_title"><?php echo $error ?></h3>
    </div>

    <a href="../admin/index.php">vào trang chủ</a>
    <div class="login">
      <div class="login-header">
        <h4 class="header_title">VÀO KHO</h4>
      </div>
      <form class="login-form"  method = "post" action = 'login_process.php'>
      <div class="wrap_input">
            <h3>tên nhân viên:<span id="name_error" class="error"></span></h3>
            <input type="text" value="" id="name" name="name" class="login_input"/>
        </div>
        
        <div class="wrap_input">
            <h3>ID nhân viên: <span id="id_staff_error" class="error"></span></h3>
            <input type="number" class="login_input" id="id_staff" name="id_staff"/>
        </div>

        <div class="wrap_input">
            <h3>ID kho: <span id="id_admin_error" class="error"></span></h3>
            <input type="number" class="login_input" id="id_admin" name="id_admin"/>
        </div>
        <div class="login_submit">
            <input type="submit" value="xác nhận" onclick="return login()" class="login_button"/>
        </div>



      </form>
    </div>
    <script src="./action.js"></script>
</body>
</html>