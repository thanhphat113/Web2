<?php 
class SanphamKhuyenmaiModel extends connectiondb{
    public function getById($id){
        $query = "select * from khuyenmai_sp where '".$id."'";
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