<?php
class TaikhoanModel extends connectiondb{
    public function getTaikhoanbyUsername($username){
    
        // Truy vấn SQL để kiểm tra thông tin đăng nhập
        $sql = "SELECT * FROM taikhoan WHERE BINARY username='$username'";
        return mysqli_query($this->con, $sql);
    }

    public function UpdatePassByUsername($username, $hashedPassword){
        $sql = "UPDATE taikhoan SET password='$hashedPassword' WHERE BINARY username='$username'";
        $this->con->query($sql);
    }

    public function getMaxMaTK(){
        $matkmax_query = "SELECT MaTK FROM TaiKhoan ORDER BY MaTK DESC LIMIT 1";
        return mysqli_query($this->con, $matkmax_query);
    }

    public function registerTaiKhoanCustomer($IdUserNew,$username, $hashedPassword){
        $insert_queryUser = "INSERT INTO taikhoan VALUES ('$IdUserNew','$username', '$hashedPassword', 1, 2)";
        if($this->con->query($insert_queryUser)){
            return true;
        }
        return false;
    }
}


?>