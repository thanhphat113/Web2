<?php 
class HinhanhModel extends connectiondb{
    public function getImageByid($MaCT){
        $query = "SELECT * FROM sanpham_img where MaCT = '$MaCT'";
        return mysqli_query($this->conn, $query);
    }
}

?>