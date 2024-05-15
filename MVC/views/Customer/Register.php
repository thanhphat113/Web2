<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <script>
        var BASEE_URL = "<?php echo BASE_URL; ?>";
    </script>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/login.css">
</head>
<body>
    <div class="container">
        <div id="register-form">
            <form id="register" action="<?php echo BASE_URL; ?>Register/xuly" method="post">
                <h2>Đăng ký</h2>
                <div class="input-group">
                    <label for="register-username">Tên đăng nhập:</label>
                    <input type="text" id="register-username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="register-password">Mật khẩu:</label>
                    <div class="password-container">
                        <input type="password" id="register-password" name="password" required>
                        <span class="toggle-password" onclick="togglePasswordVisibility('register-password')">
                            <img class="eye-icon" src="<?php echo BASE_URL; ?>public/Pictures/login/showPass.png" alt="Show/Hide Password">
                        </span>
                    </div>    
                </div>
                <div class="input-group">
                    <label for="register-password-confirmed">Xác nhận mật khẩu:</label>
                    <div class="password-container">
                        <input type="password" id="register-password-confirmed" name="password-confirmed" required>
                        <span class="toggle-password" onclick="togglePasswordVisibility('register-password-confirmed')">
                            <img class="eye-icon" src="<?php echo BASE_URL; ?>public/Pictures/login/showPass.png" alt="Show/Hide Password">
                        </span>
                    </div> 
                    <span id="password-match-message" style="display: none;"></span>   
                </div>
                <div class="input-group">
                    <label for="register-fullname">Họ và tên:</label>
                    <input type="text" id="register-fullname" name="fullname">
                </div>
                <div class="input-group">
                    <label for="register-email">Email:</label>
                    <input type="email" id="register-email" name="email">
                </div>
                <div class="input-group">
                    <label for="register-phone">Số điện thoại:</label>
                    <input type="tel" id="register-phone" name="phone" pattern="[0-9]{1}[1-9]{1}[0-9]{8}">
                </div>
                <button type="submit" name="register"  class="btn" id="btn-register">Đăng ký</button>
                <p>Đã có tài khoản? <a href="<?php echo BASE_URL; ?>login">Đăng nhập</a></p>
            </form>
        </div>
    </div>
    <script src="<?php echo BASE_URL; ?>public/js/login.js"></script>
</body>
</html>