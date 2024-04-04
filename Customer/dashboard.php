<?php
session_start(); // Bắt đầu phiên làm việc

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit(); // Dừng việc thực thi kịch bản tiếp theo sau lệnh header
}
$role = $_SESSION['role'];
echo "<h1>Đăng nhập thành công với vai trò $role</h1>";
// Xử lý logout
if(isset($_POST['logout'])) {
    // Xóa tất cả các biến phiên
    session_unset();
    // Hủy bỏ phiên làm việc
    session_destroy();
    // Chuyển hướng người dùng về trang đăng nhập
    header("Location: login.php");
    exit();
}

?>

<form method="post" action="">
    <button type="submit" name="logout">Logout</button>
</form>