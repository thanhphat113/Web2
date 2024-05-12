<?php
session_start(); // Bắt đầu phiên làm việc

// Include file kết nối CSDL
include '../database/connection.php';
$conn = connectToDatabase();
// Kiểm tra nếu người dùng đã đăng nhập, chuyển hướng đến trang dashboard
if(isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit(); // Dừng việc thực thi kịch bản tiếp theo sau lệnh header
}

// Kiểm tra nếu có dữ liệu được gửi từ form đăng ký
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    // Lấy thông tin đăng ký từ form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Bảo vệ khỏi SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $fullname = mysqli_real_escape_string($conn, $fullname);
    $email = mysqli_real_escape_string($conn, $email);
    $phone = mysqli_real_escape_string($conn, $phone);

    // Truy vấn SQL để kiểm tra xem tên người dùng đã tồn tại chưa
    $check_query = "SELECT * FROM taikhoan WHERE username='$username'";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        // Tên người dùng đã tồn tại, gửi thông báo lỗi
        $error = "Tên đăng nhập đã được sử dụng. Vui lòng chọn một tên đăng nhập khác.";
        echo "<script>alert('$error');</script>";
    } else {
        // Lấy mã tài khoản lớn nhất + 1
        $matkmax_query = "SELECT MaTK FROM TaiKhoan ORDER BY MaTK DESC LIMIT 1";
        $resultMatk = $conn->query($matkmax_query);
        $rowMatk = $resultMatk->fetch_assoc();
        $IdUserNew = $rowMatk['MaTK'] + 1;
        //thêm tài khoản
        $insert_queryUser = "INSERT INTO taikhoan VALUES ('$IdUserNew','$username', '$hashedPassword', 1, 2)";

        // Lấy mã khách hàng lớn nhất + 1
        $IdCustomerMax_query = "SELECT MaKH FROM KhachHang ORDER BY MaKH DESC LIMIT 1";
        $resultCustomer = $conn->query($IdCustomerMax_query);
        $rowCustomer = $resultCustomer->fetch_assoc(); 
        $IdCustomerMax  = $rowCustomer['MaKH'];
        // Tách lấy phần số từ chuỗi
        $number  = intval(substr($IdCustomerMax , 2));
        // Tăng giá trị số lên 1
        $number++;

        // Định dạng lại chuỗi mã KH với số mới
        $IdCustomerNew = "KH" . str_pad($number, 3, '0', STR_PAD_LEFT);
        //Thêm khách hàng sau khi đăng ký
        $insert_queryCustomer = "INSERT INTO KhachHang VALUES ('$IdCustomerNew','$fullname', '$email', '$phone', '$IdUserNew')";
        if ($conn->query($insert_queryUser) === TRUE && $conn->query($insert_queryCustomer)) {
            // Đăng ký thành công, chuyển hướng đến trang đăng nhập
            echo "<script>alert('Đăng ký thành công');</script>";
            header("Location: login.php");
            exit; 
        } else {
            // Đăng ký không thành công, gửi thông báo lỗi
            $error = "Đã xảy ra lỗi. Vui lòng thử lại sau.";
            echo "<script>alert('$error');</script>";
        }
    }
}
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="container">
        <div id="register-form">
            <form id="register" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
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
                            <img class="eye-icon" src="../Pictures/hiệnpass.png" alt="Show/Hide Password">
                        </span>
                    </div>    
                </div>
                <div class="input-group">
                    <label for="register-password-confirmed">Xác nhận mật khẩu:</label>
                    <div class="password-container">
                        <input type="password" id="register-password-confirmed" name="password-confirmed" required>
                        <span class="toggle-password" onclick="togglePasswordVisibility('register-password-confirmed')">
                            <img class="eye-icon" src="../Pictures/hiệnpass.png" alt="Show/Hide Password">
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
                <p>Đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
            </form>
        </div>
    </div>
    <script src="../js/login.js"></script>
</body>
</html>