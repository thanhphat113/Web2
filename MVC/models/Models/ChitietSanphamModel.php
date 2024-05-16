<?php 
class ChitietSanphamModel extends connectiondb{
    public function getCT_SpByID($MaSP){
        $query = "SELECT * FROM chitiet_sp where MASP = '$MaSP'";
        return mysqli_query($this->conn, $query);
    }

    public function getFirstRecordById($MaSP){
        $query = "SELECT * FROM chitiet_sp where MASP = '$MaSP'";
        $result = mysqli_query($this->conn, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } 
     
    else {
            return null; // or handle the case where no product is found
        }
    }

    public function getSanPhamTheoMau($id, $mau){
        $query = "SELECT * FROM chitiet_sp where MaSP = '$id' and Mau = '$mau'";
        $result = mysqli_query($this->conn, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } 
     
        else {
            return null; // or handle the case where no product is found
        }
    }
}

?>