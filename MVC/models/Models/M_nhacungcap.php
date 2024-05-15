<?php

class M_nhacungcap extends connectiondb {
	public function findAll(){
		// $result = array();
		$query = "select * from nhacungcap";
		$list = $this->execute_fetch_all( $query );
		foreach ($list as $hd) {
			$mancc = $hd['MaNCC'];
			$tenncc = $hd['TenNCC'];
			$email = $hd['Email'];
			$sdt = $hd['SoDienThoai'];
			$ncc = new E_nhacungcap($mancc, $tenncc, $email, $sdt);
			$result[] = $ncc;
		}
		return $result;
	}

	public function findById($id){
		$query = "select * from nhacungcap where MaNCC='".$id."'";
		$sub = $this->execute_fetch_one( $query );
		if ($sub != null){
			$mancc = $sub['MaNCC'];
			$tenncc = $sub['TenNCC'];
			$email = $sub['Email'];
			$sdt = $sub['SoDienThoai'];
			$ncc = new E_nhacungcap($mancc, $tenncc, $email, $sdt);
			return $ncc;
		}
		return null;
	}
}
?>