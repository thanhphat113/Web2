<?php
class KhachhangModel extends connectiondb{
    public function getKhachhangbyMaTK($MaTK){
    
        // Truy vấn SQL để kiểm tra thông tin đăng nhập
        $sql = "SELECT * FROM khachhang WHERE MaTK='$MaTK'";
        return mysqli_query($this->con, $sql);
    }

    public function getMaxMaKH(){
        $maKHmax_query = "SELECT MaKH FROM KhachHang ORDER BY MaKH DESC LIMIT 1";
        return mysqli_query($this->con, $maKHmax_query);
    }

    public function insertKH($IdCustomerNew,$fullname, $email, $phone, $IdUserNew){
        $insert_queryCustomer = "INSERT INTO KhachHang VALUES ('$IdCustomerNew','$fullname', '$email', '$phone', '$IdUserNew')";
        if($this->con->query($insert_queryCustomer)){
            return true;
        }
        return false;
    }
}


?>