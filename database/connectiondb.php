<?php
class connectiondb{
    private $conn;
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "cuahangdienthoai";

    public function __construct() {
        // Thông tin kết nối đến cơ sở dữ liệu
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);

        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $this->conn->connect_error);
        }
        return $this->conn;
    }

    function addFormat($number){
        $number = number_format($number, 1, '.', ','). ' <sup>đ</sup>';
        return $number;
    }

    function execute_fetch_all($sql){
        $list = array();
        $result = $this->conn->query($sql);
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                $list[] = $row;
            }
        return $list;
        }
    }

    function execute_fetch_one($sql){
        $result = $this->conn->query($sql);
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    function newId($type,$query){
        $result = $this->conn->query($query);
        $row = $result->fetch_array();
        $max_id = $row['max_id'];
		if ($max_id === null) {
			$max_id = 0;
		}
        
		$new_id = $max_id + 1;
        $new_mahd = $type . str_pad($new_id, 3, '0', STR_PAD_LEFT);
        return $new_mahd;
    }
    
    function execute_query($sql){
        $cursor = $this->conn->query($sql);
        return $cursor;
    }
}



?>