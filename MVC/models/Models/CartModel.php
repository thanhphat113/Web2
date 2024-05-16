<?php
class CartModel extends connectiondb{
    public function getCartById($MaTk){
        $sql = "SELECT * FROM giohang WHERE MaTk = '$MaTk'";
        return mysqli_query($this->conn, $sql);
    }
}

?>