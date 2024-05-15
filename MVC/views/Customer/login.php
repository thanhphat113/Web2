<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/login.css">
</head>
<body>
    <div class="container">
        <div id="login-form">
            <form id="login" action="<?php echo BASE_URL; ?>Login/xuly" method="post">
                <h2>Đăng nhập</h2>
                <div class="input-group">
                    <label for="login-username">Tên đăng nhập:</label>
                    <input type="text" id="login-username" name="username" value="<?php if (isset($data["usernameInCookies"])) echo $data["usernameInCookies"]?>" required>
                </div>
                <div class="input-group">
                    <label for="login-password">Mật khẩu:</label>
                    <div class="password-container">
                        <input type="password" id="login-password" name="password" value = "<?php if (isset($data["passwordInCookies"])) echo $data["passwordInCookies"]?>" required>
                        <span class="toggle-password" onclick="togglePasswordVisibility('login-password')">
                            <img class="eye-icon" src="<?php echo BASE_URL; ?>public/Pictures/login/showPass.png" alt="Show/Hide Password">
                        </span>
                    </div>       
                </div>
                <div class="checkboxRemember">
                    <input type="checkbox" id="rememberPassword" name="remember">
                    <label for="rememberPassword">Nhớ mật khẩu</label>  
                </div>
                <button type="submit" name="login"  class="btn">Đăng nhập</button>
                <a href="<?php echo BASE_URL; ?>ForgotPassword" name = "forgot-password" class="forgot-password" id="forgot-password">Quên mật khẩu?</a>
                <p id="register">Bạn chưa có tài khoản? <a href="<?php echo BASE_URL; ?>Register">Đăng ký ngay tại đây</a></p>
            </form>
        </div>
    </div>
    <script>
        var BASEE_URL = "<?php echo BASE_URL; ?>";
        function togglePasswordVisibility(inputId) {
            var passwordInput = document.getElementById(inputId);
            var eyeIcon = document.querySelector('#' + inputId + ' + .toggle-password .eye-icon');

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.src = BASEE_URL+"public/Pictures/login/hidePass.png";
            } else {
                passwordInput.type = "password";
                eyeIcon.src = BASEE_URL+"public/Pictures/login/showPass.png";
            }
        }
    </script>
</body>
</html>
