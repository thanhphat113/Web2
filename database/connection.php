<?php
function connectToDatabase() {
    // Thông tin kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "cuahangdienthoai";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    return $conn;
}

function addFormat($number){
    $number = number_format($number, 1, '.', ','). ' <sup>đ</sup>';
    return $number;
}


function countEmployee(){
    $conn = connectToDatabase();
	$query = "SELECT COUNT(*) as total FROM nhanvien";
    $result = $conn->query($query);
    $conn->close();

	if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['total'];
    } else {
        return 0;
    }

}

function countCus(){
    $conn = connectToDatabase();
	$query = "SELECT COUNT(*) as total_customers FROM khachhang";
    $result = $conn->query($query);
    $conn->close();

	if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['total_customers'];
    } else {
        return 0;
    }
}

function countProducts(){
    $conn = connectToDatabase();
	$query = "SELECT COUNT(*) as total FROM sanpham";
    $result = $conn->query($query);

	if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['total'];
    } else {
        return 0;
    }
    $conn->close();
}

function HoaDon_list(){
    $list = array();
    $conn = connectToDatabase();
    $query = "SELECT hd.MaHD,nv.TenNV,kh.TenKH,hd.MaKM,hd.NgayTao,hd.TongTien FROM hoadon as hd join nhanvien as nv on nv.MaNV=hd.MaNV
    join khachhang as kh on kh.MaKH=hd.MaKH";
    $result = $conn->query($query);
    $conn->close();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $hoadon = array(
                "MaHD" => $row["MaHD"],
                "TenNV" => $row["TenNV"],
                "TenKH" => $row["TenKH"],
                "MaKM" => $row["MaKM"],
                "NgayTao" => $row["NgayTao"],
                "TongTien" => $row["TongTien"]
            );
            array_push($list, $hoadon);
        }
    }
    return $list;
}
?>
