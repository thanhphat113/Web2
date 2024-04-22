<?php

class khachhangCTL{

	public function __construct(){
		$this->db = new connectiondb();
	}

	public function findById($id){
		$query = "select * from khachhang where MaKH = '".$id."'";
		$result = $this->db->execute_fetch_one($query);
		
		if(!empty($result)){
			return new khachhang($result['MaKH'],$result['TenKH'],$result['Email'],$result['SoDienThoai'],$result['MaTK']);
		}
		else return null;
	}
}

?>
