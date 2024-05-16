<?php 
class ChitietSanpham_GiaModel extends connectiondb{
    public function getAllByid($MaCT){
        $query = "SELECT * FROM sp_giaban where MaCT = '$MaCT'";
        return mysqli_query($this->conn, $query);
    }
    
    public function getSanPhamTheoDungLuong($Id, $DungLuong){
        $query = "SELECT * FROM sp_giaban where MaCT = '$Id' AND CauHinh = '$DungLuong'";
        $result = mysqli_query($this->conn, $query);
        
        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } 
     
        else {
            return null; // or handle the case where no product is found
        }
    }

    public function getCTSPByMaCH($MaCH){
        $query = "SELECT * FROM sp_giaban where MaCH = '$MaCH'";
        return mysqli_query($this->conn, $query);
    }
}

?>