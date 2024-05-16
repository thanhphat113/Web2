<?php 
class HoaDonDetailModel extends connectiondb{

    public function getCTHDbyID($MaHD){
        $query = "select * from chitiet_hd where MaHD='$MaHD'";
		return mysqli_query($this->conn, $query);
    }
}

?>