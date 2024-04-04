<?php
    session_start(); // Bắt đầu phiên làm việc

    // Include file kết nối CSDL
    include '../database/connection.php';

    if(!isset($_SESSION['OTP-Email'])) {
        header("Location: ForgotPassword.php");
        exit(); // Dừng việc thực thi kịch bản tiếp theo sau lệnh header
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reset_password'])) {
        $newpassword = $_POST['new-password'];

        // Bảo vệ khỏi SQL injection
        $newpassword = mysqli_real_escape_string($conn, $newpassword);
        $hashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);

        $sql = "UPDATE taikhoan SET password='$hashedPassword' WHERE BINARY username='". $_SESSION['OTP-Email'][2]. "'";
        $result = $conn->query($sql);
        // Xóa tất cả các biến phiên
        session_unset();
        // Hủy bỏ phiên làm việc
        session_destroy();
        // Chuyển hướng người dùng về trang đăng nhập
        header("Location: login.php");
        exit(); // Dừng việc thực thi kịch bản tiếp theo sau lệnh header

    }
    $conn->close();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="container">
    <form id="forgot-pass" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
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
        function checkPasswordMatch(inputPasswordId, confirmPasswordId, passwordMatchMessageId) {
            var password = document.getElementById(inputPasswordId).value;
            var confirmPassword = document.getElementById(confirmPasswordId).value;
            var passwordMatchMessage = document.getElementById(passwordMatchMessageId);

            if (password === confirmPassword) {
                passwordMatchMessage.innerText = "Mật khẩu trùng khớp";
                passwordMatchMessage.style.color = "green";
                passwordMatchMessage.style.display = "inline-block";
                document.getElementById("btn-reset-password").disabled = false;
            } else {
                passwordMatchMessage.innerText = "Mật khẩu không trùng khớp";
                passwordMatchMessage.style.color = "red";
                passwordMatchMessage.style.display = "inline-block";
                document.getElementById("btn-reset-password").disabled = true;
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