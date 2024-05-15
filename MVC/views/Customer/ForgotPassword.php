<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên Mật Khẩu</title>
    <script>
        var BASEE_URL = "<?php echo BASE_URL; ?>";
    </script>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/login.css">
</head>
<body>
    <div class="container">
        <div id="forgot-pasword-form">
            <form id="forgot-pass" action="<?php echo BASE_URL; ?>ForgotPassWord/ConfirmOTP" method="post">
                <h2>Đặt lại mật khẩu</h2>
                <div class="input-group">
                    <label for="username">Tên đăng nhập:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="gmail-or-phone">Nhập địa chỉ email:</label>
                    <input type="text" id="gmail-or-phone" name="gmail-or-phone" required>
                </div>
                <div class="input-group-otp">
                    <input type="text" id="otp" name="otp">
                    <button type="button" name="btn-otp" id="btn-otp" class="btn-otp">Gửi OTP</button>
                </div>
                <span id="password-otp-message"><?php if(isset($data["errorMessage"])) { echo $data["errorMessage"]; } ?></span></br>  
                <button type="submit" name="Comfirm-otp"  class="btn" id="confirmButton">Xác nhận</button>   
                <p id="login-forgot">Đăng nhập. <a href="<?php echo BASE_URL; ?>login" >Đăng nhập</a></p>
                <p id="register-forgot">Chưa có tài khoản? <a href="<?php echo BASE_URL; ?>Register" >Đăng ký ngay</a></p>
            </form>
        </div>
    </div>
    <script src="<?php echo BASE_URL; ?>public/js/ForgotPass.js">
        
    </script>
</body>
</html>
