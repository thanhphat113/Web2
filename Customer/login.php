<?php
session_start(); // Bắt đầu phiên làm việc

// Include file kết nối CSDL
include '../database/connection.php';
include 'message-login.php';
// Kiểm tra nếu người dùng đã đăng nhập, chuyển hướng đến trang dashboard
if(isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit(); // Dừng việc thực thi kịch bản tiếp theo sau lệnh header
}

//checkCookies
$usernameInCookies ="";
$passwordInCookies ="";
if(isset($_COOKIE["username"]) && $_COOKIE["password"]){
    $usernameInCookies = $_COOKIE["username"];
    $passwordInCookies = $_COOKIE["password"];
}

// Kiểm tra nếu có dữ liệu được gửi từ form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])){
    // Lấy thông tin đăng nhập từ form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Bảo vệ khỏi SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Truy vấn SQL để kiểm tra thông tin đăng nhập
    $sql = "SELECT * FROM taikhoan WHERE BINARY username='$username' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        //lấy mật khẩu mã hóa trong database
        $rowMatk = $result->fetch_assoc();
        $PassInDB = $rowMatk['Password'];
        $Role = $rowMatk['MaQuyen'];
        $Status = $rowMatk ['TrangThai'];
        //Kiểm tra trạng thái tài khoản nếu mở
        if($Status == 1){
            //kiểm tra mật khẩu nếu đúng
            if(password_verify($password, $PassInDB)){    
                // Kiểm tra xem người dùng đã chọn "Remember password" hay không
                if (isset($_POST["remember"])) {
                    // Lưu mật khẩu vào cookie, thời gian sống là 30 ngày
                    setcookie("username", $username, time() + (30 * 24 * 60 * 60));
                    setcookie("password", $password, time() + (30 * 24 * 60 * 60));
                } else {
                    // Xóa cookie nếu người dùng không chọn "Remember password"
                    setcookie("username", "", time() - 3600);
                    setcookie("password", "", time() - 3600);
                }       
                // Lưu tên đăng nhập và vai trò vào session
                $message = "Đăng nhập thành công.";
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $Role;
                // Chuyển hướng đến trang dựa theo role
                // Execute JavaScript to show message and redirect
                echo "<script>";
                echo "showMessage('$message', 'success');";
                echo "setTimeout(function() { window.location.href = 'dashboard.php'; }, 3000);"; // Chuyển hướng sau 3 giây
                echo "</script>";
            }else{
                // Đăng nhập không thành công, gửi thông báo lỗi
                $error = "Mật khẩu không chính xác.";
                echo "<script>showMessage('$error', 'error');</script>";
            }
        }else{
            // Đăng nhập không thành công, gửi thông báo tài khoản bị khóa
            $error = "Tài khoản bị khóa!";
            echo "<script>showMessage('$error', 'error');</script>";
        }
    } else {
        // Đăng nhập không thành công, gửi thông báo lỗi
        $error = "Tên đăng nhập không tồn tại.";
        echo "<script>showMessage('$error', 'error');</script>";
    }
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="container">
        <div id="login-form">
            <form id="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <h2>Đăng nhập</h2>
                <div class="input-group">
                    <label for="login-username">Tên đăng nhập:</label>
                    <input type="text" id="login-username" name="username" value="<?php echo $usernameInCookies?>" required>
                </div>
                <div class="input-group">
                    <label for="login-password">Mật khẩu:</label>
                    <div class="password-container">
                        <input type="password" id="login-password" name="password" <?php echo $passwordInCookies?> required>
                        <span class="toggle-password" onclick="togglePasswordVisibility('login-password')">
                            <img class="eye-icon" src="../Pictures/hiệnpass.png" alt="Show/Hide Password">
                        </span>
                    </div>       
                </div>
                <div class="checkboxRemember">
                    <input type="checkbox" id="rememberPassword" name="remember">
                    <label for="rememberPassword">Nhớ mật khẩu</label>  
                </div>
                <button type="submit" name="login"  class="btn">Đăng nhập</button>
                <a href="ForgotPassword.php" name = "forgot-password" class="forgot-password" id="forgot-password">Quên mật khẩu?</a>
                <p id="register">Bạn chưa có tài khoản? <a href="Register.php">Đăng ký ngay tại đây</a></p>
            </form>
        </div>
    </div>
    <script src="../js/login.js"></script>
</body>
</html>
