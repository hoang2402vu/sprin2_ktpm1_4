<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update_staff</title>
    <link rel="stylesheet" href="../home_page_style.css">
    <link rel="stylesheet" href="./staff.css">
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
    $table_name = $_GET['table_name'];

    require_once '../connect.php';

    $staff = "select * from $table_name where staff_id = '$id'";
    $get_staff = mysqli_query($connect, $staff);
    $staff_array = mysqli_fetch_array($get_staff);
    
    $name = $staff_array['name'];
    $phone_num = $staff_array['phone_num'];
    $email = $staff_array['email'];
    $date = $staff_array['birth'];
    $gender = $staff_array['gender'];
    
    ?>

    <div class="error_email">
        <h3 class="error_title"><?php echo $error ?></h3>
    </div>
    <div class="login">
      <div class="login-header">
        <h4 class="header_title">SỬA THÔNG TIN NHÂN VIÊN</h4>
      </div>
      <form class="login-form" method = "post" action = 'update_staff_process.php'>

      <input type="hidden" name="id" value="<?php echo $id ?>">

      <input type="hidden" name="table_name" value="<?php echo $table_name ?>">


        <div class="wrap_input">
            <h3>họ và tên:<span id="name_error" class="error"></span></h3>
            <input type="text"  id="name" name="name" value="<?php echo $name ?>" class="login_input"/>
        </div>

        <div class="wrap_input">
            <h3>giới tính:<span id="gender_error" class="error"></span></h3>
            <div class="gender_choose">
                <div class="gender">
                    <input type="radio" value="nam"  name="gender" checked = "<?php echo $gender == $name ? true : false ?>"/><span>nam</span>
                </div>

                <div class="gender">
                    <input type="radio" value="nữ"  name="gender" checked = "<?php echo $gender == $name ? true : false ?>"/><span>nữ</span>
                </div>
            </div>

        </div>

        <div class="wrap_input">
            <h3>Email: <span id="email_error" class="error"></span></h3>
            <input type="email"  id="email"  name ="email" value="<?php echo $email ?>" class="login_input"/>
        </div>

        <div class="wrap_input">
            <h3>Số điện thoại: <span id="phone_number_error" class="error"></span></h3>
            <input type="number"  id="phone_number" name = "phone_number" value="<?php echo $phone_num ?>" class="login_input"/>
        </div>
        
        <div class="wrap_input">
            <h3>Ngày sinh:<span id="date_error" class="error"></span></h3>
            <input type="date"  id = "date" name = "date" value="<?php echo $date ?>" class="login_input"/>
        </div>

        <div class="login_submit">
            <input type="submit" onclick="return insert_staff()" value="XÁC NHẬN" class="login_button"/>
        </div>

      </form>
    </div>
    

    <script src="../action.js"></script>
</body>
</html>