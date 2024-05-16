<?php 
class HoaDonDetailModel extends connectiondb{

    public function getCTHDbyID($MaHD){
        $query = "select * from chitiet_hd where MaHD='$MaHD'";
		return mysqli_query($this->conn, $query);
    }
    public function insertCTHD($MaHD,$MaCH, $Soluong, $tongtien){
        $insert_query = "INSERT INTO chitiet_hd VALUES ('$MaHD','$MaCH', '$Soluong', '$tongtien')";
        if($this->conn->query($insert_query)){
            return true;
        }
        return false;
    }

}
    
?>