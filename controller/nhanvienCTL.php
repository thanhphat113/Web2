<?php

class nhanvienCTL{

	public function __construct(){
		$this->db = new connectiondb();
	}

	public function findById($id){
		$query = "select * from nhanvien where MaNV = '".$id."'";
		$result = $this->db->execute_fetch_one($query);
		
		if(!empty($result)){
			return new nhanvien($result['MaNV'],$result['TenNV'],$result['Email'],$result['SoDienThoai'],$result['MaTK']);
		}
		else return null;
	}
}

?>
