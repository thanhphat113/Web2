<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/login.css">
</head>
<body>
    <div class="container">
    <form id="forgot-pass" action="<?php echo BASE_URL; ?>ResetPassWord/valiablePassword" method="post">
        <div class="form-title">
            <h2>Đặt lại mật khẩu</h2>
        </div>
        <div class="input-group">
            <label for="new_password">Mật khẩu mới:</label>
            <input type="password" id="new_password" class="input-field" name="new-password" required>
        </div>
        <div class="input-group">
            <label for="confirm_password">Xác nhận mật khẩu mới:</label>
            <input type="password" id="confirm_password" class="input-field" name="new-password-confirmed" required>
            <span id="password-reset-message-confirmed" style="display: none;"></span>
        </div>
        <button type="submit" class="btn" name="reset_password" id="btn-reset-password">Đặt lại mật khẩu</button>
    </form>
    </div>
    <script>
        // Comfirm password 
        document.getElementById("btn-reset-password").disabled = true;
        function checkPasswordMatch(inputPasswordId, confirmPasswordId, passwordMatchMessageId) {
            var password = document.getElementById(inputPasswordId).value;
            var confirmPassword = document.getElementById(confirmPasswordId).value;
            var passwordMatchMessage = document.getElementById(passwordMatchMessageId);
            
            if(password ==""){
                document.getElementById("btn-reset-password").disabled = true;
            }else{
                if (password === confirmPassword) {
                passwordMatchMessage.innerText = "Mật khẩu trùng khớp";
                passwordMatchMessage.style.color = "green";
                passwordMatchMessage.style.display = "inline-block";
                document.getElementById("btn-reset-password").disabled = false;
                }else {
                    passwordMatchMessage.innerText = "Mật khẩu không trùng khớp";
                    passwordMatchMessage.style.color = "red";
                    passwordMatchMessage.style.display = "inline-block";
                    document.getElementById("btn-reset-password").disabled = true;
                }
            }
            
        }
        // Sử dụng hàm checkPasswordMatch để kiểm tra sự trùng khớp của mật khẩu in resetpassword
        document.getElementById("confirm_password").addEventListener("input", function(event) {
            checkPasswordMatch("new_password", "confirm_password", "password-reset-message-confirmed");
        });

        document.getElementById("new_password").addEventListener("input", function(event) {
            checkPasswordMatch("new_password", "confirm_password", "password-reset-message-confirmed");
        });
    </script>
</body>
</html>