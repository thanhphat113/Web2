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
}
?>