<!DOCTYPE html>
<html>
    <head>
        <title>Hello World</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href = "<?php echo BASE_URL; ?>public/css/infor.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/styles.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body>
        <div class="cus-content">
            <div class="cus-left">
                <a href="<?php echo BASE_URL; ?>Thongtin/thongtincanhan" id="cus-per-info">Tài khoản của tôi</a>
                <br>
                <a href="<?php echo BASE_URL; ?>Thongtin/lichsudonhang" id ="cus-orders">Đơn mua</a>
                <br>
                <a href="<?php echo BASE_URL; ?>Thongtin/EditPassword" id="cus-psswd">Đổi mật khẩu</a>
            </div>
            <div class="cus-right" id = "cus-right">
            <?php  
                require("tab/".$data["Page"].".php");
            ?>
            </div>
            <div class="bottom"></div>
        </div>
        <script src="<?php echo BASE_URL; ?>public/js/script.js"></script>

    </body>
</html>