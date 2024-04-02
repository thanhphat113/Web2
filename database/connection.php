<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quanlycuahang";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

function findAllProducts($conn) {
    // Truy vấn để lấy tất cả các sản phẩm từ bảng products
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    // Kiểm tra và trả về kết quả nếu truy vấn thành công
    if ($result->num_rows > 0) {
        $products = array();
        while($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        return $products;
    } else {
        return []; // Trả về một mảng rỗng nếu không có sản phẩm nào được tìm thấy
    }
}
?>
