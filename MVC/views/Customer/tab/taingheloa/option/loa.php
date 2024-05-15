<?php
require("connect.php");

// Câu truy vấn SQL mới với giới hạn của số lượng sản phẩm trên trang và vị trí bắt đầu
$query = "
SELECT sanpham.MaSP, chitiet_sp.HinhAnh, TenSP, TiLe, loaisp.MaLoai, chitiet_sp.MaCT, CauHinh, DonGia
FROM loaisp, sanpham, khuyenmai_sp, chitiet_sp, sp_giaban
WHERE loaisp.MaLoai = sanpham.MaLoai
AND sanpham.MaKM = khuyenmai_sp.MaKM
AND loaisp.MaDM = 'LO'
AND sanpham.MaSP = chitiet_sp.MaSP
AND chitiet_sp.MaCT = sp_giaban.MaCT
AND chitiet_sp.HinhAnh LIKE '%avatar%';
";

$sanpham = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($sanpham)) {
    // Lấy thông tin sản phẩm từ dòng kết quả
    $maSP = $row['MaSP'];
    $HinhAnh = $row['HinhAnh'];
    $tenSP = $row['TenSP'];
    $tiLe = $row['TiLe'];
    $maLoai = $row['MaLoai'];
    $maCT = $row['MaCT'];
    $cauHinh = $row['CauHinh'];
    $donGia = $row['DonGia'];

    // Hiển thị thông tin sản phẩm
    echo "<div class=\"iphone-item\">";
    echo "<a href=\"?infinity=productdetail&id=".$maSP."\">";
    echo "<img src='$HinhAnh' alt='$tenSP'><br>";
    echo "<b  style = \"color: white;\">$tenSP</b><br>";
    echo "<p style = \"color: white;\">Dung lượng: $cauHinh</p>";

    // Chuyển đổi giá trị của $donGia và $tiLe thành số
    $giamGia = $donGia * (100 - $tiLe) / 100;
    echo "<p class=\"current-price\">Giá: $giamGia VNĐ</p>";
    echo "<p class=\"original-price\">$donGia VNĐ</p>";
    echo "<p class=\"discount-percentage\">-$tiLe%</p>";

    echo "</a>";
    echo "</div>";
}