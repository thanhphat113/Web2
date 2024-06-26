<?php
class connectiondb{
    public $conn;
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "cuahangdienthoai";

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
        mysqli_query($this->conn,"SET NAMES 'utf8'");
    }

    function count($sql){
        $cursor = $this->conn->query($sql);
        $count = $cursor->num_rows; // Đếm số lượng dòng trong kết quả
        return $count;
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
        if( $cursor === false){
            return false;
        }else{
            if ($this->conn->affected_rows > 0) {
                return true;
            } else {
                return false;
            }
        }
        ;
    }
}



?>