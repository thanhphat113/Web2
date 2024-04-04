<?php
session_start(); // Bắt đầu phiên làm việc

// Include file kết nối CSDL
include '../database/connection.php';
//require đến thư viện gửi mail
require_once '../Library/sengmail.php';

if(isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit(); // Dừng việc thực thi kịch bản tiếp theo sau lệnh header
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn-otp'])) {
    $username = $_POST['username'];
    $PhoneOrGmail = $_POST['gmail-or-phone'];

    // Bảo vệ khỏi SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $PhoneOrGmail = mysqli_real_escape_string($conn, $PhoneOrGmail);
    // Truy vấn SQL để kiểm tra thông tin đăng nhập
    $sql = "SELECT * FROM taikhoan WHERE BINARY username='$username' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $rowMatk = $result->fetch_assoc();
        $MaTK = $rowMatk['MaTK'];
        $sqll = "SELECT * FROM khachhang WHERE MaTK='$MaTK'";
        $resultt = $conn->query($sqll);
        $rowKhachHang = $resultt->fetch_assoc();
        $email = $rowKhachHang['Email'];
        $username = $rowMatk['Username'];
        $OTP = rand(100000, 999999);
        if($PhoneOrGmail == $email){
            // Gửi email chứa mã OTP
            sentOTPtoGmail($email, $OTP);
            $_SESSION['OTP-Email'] = array($OTP, $email, $username);
            header("Content-Type: text/plain"); // Đặt header
            exit;
        }else{
            header("Content-Type: text/plain"); // Đặt header
            echo htmlspecialchars ("Số điện thoại hoặc gmail không hợp lệ"); 
            exit;
        }
    }else{
        header("Content-Type: text/plain"); // Đặt header
        echo htmlspecialchars ("Không tìm thấy tên đăng nhập"); 
        exit;
    }
    
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Comfirm-otp'])) {
    $Otp = $_POST['otp'];
    $emailorPhone = $_POST['gmail-or-phone'];
    $username = $_POST['username'];
    if($_SESSION['OTP-Email'][0] == $Otp && $_SESSION['OTP-Email'][1] == $emailorPhone && $_SESSION['OTP-Email'][2] == $username) {
        header("Location: ResetPassword.php");
        exit();
    }else if ($_SESSION['OTP-Email'][0] != $Otp){
        $errorMessage = "Mã OTP không chính xác.";
        deleteSeasion();
    }else if ($_SESSION['OTP-Email'][1] != $emailorPhone){
        $errorMessage = "email không khớp với email đã nhập..";
        deleteSeasion();
    }else{
        $errorMessage = "Tên đăng nhập không khớp với tên đăng nhập đã nhập..";
        deleteSeasion();
    }
}
function deleteSeasion(){
    // Xóa tất cả các biến phiên
    session_unset();
    // Hủy bỏ phiên làm việc
    session_destroy();
    // Chuyển hướng người dùng về trang đăng nhập
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên Mật Khẩu</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="container">
        <div id="forgot-pasword-form">
            <form id="forgot-pass" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
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
                <span id="password-otp-message"><?php if(isset($errorMessage)) { echo $errorMessage; } ?></span></br>  
                <button type="submit" name="Comfirm-otp"  class="btn" id="confirmButton">Xác nhận</button>   
                <p id="login-forgot">Đăng nhập. <a href="login.php" >Đăng nhập</a></p>
                <p id="register-forgot">Chưa có tài khoản? <a href="Register.php" >Đăng ký ngay</a></p>
            </form>
        </div>
    </div>
    <script>
        document.getElementById("confirmButton").disabled = true; // Vô hiệu hóa nút
        document.getElementById("btn-otp").addEventListener("click", function() {
            var username = document.getElementById("username").value;
            var gmailOrPhone = document.getElementById("gmail-or-phone").value;
            
            // Tạo một đối tượng XMLHttpRequest
            var xhr = new XMLHttpRequest();

            // Xử lý khi có phản hồi từ server
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var response = this.responseText;
                    var passwordOtpMessage = document.getElementById("password-otp-message");
                    console.log(response);
                    
                    // Hiển thị thông báo từ server
                    if (response.trim() !== "") {
                        passwordOtpMessage.innerText = response;
                    }else{
                        passwordOtpMessage.innerText = "";
                        document.getElementById("confirmButton").disabled = false; // tắt vô hiệu hóa nút
                        document.getElementById("btn-otp").disabled = true; // Vô hiệu hóa gửi OTP
                    }
                }
            };

            // Thiết lập yêu cầu AJAX
            xhr.open("POST", "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            // Gửi dữ liệu form lên server
            xhr.send("btn-otp=1&username=" + username + "&gmail-or-phone=" + gmailOrPhone);
        });

    </script>
</body>
</html>
