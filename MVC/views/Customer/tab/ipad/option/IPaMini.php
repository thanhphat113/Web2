<?php

while ($row = mysqli_fetch_assoc($data["DataByMaloai"])) {
    // Lấy thông tin sản phẩm từ dòng kết quả
    $maSP = $row['MaSP'];
    $img = BASE_URL . "public/" . $row['HinhAnh'];
    $tenSP = $row['TenSP'];
    $tiLe = $row['TiLe'];
    $maLoai = $row['MaLoai'];
    $maCT = $row['MaCT'];
    $cauHinh = $row['CauHinh'];
    $donGia = $row['DonGia'];

    // Hiển thị thông tin sản phẩm
    echo "<div class=\"iphone-item\">";
    echo "<a href= ".BASE_URL."detail/detailproduct/".$maSP.">";
    echo "<img src='$img' alt='$tenSP'><br>";
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