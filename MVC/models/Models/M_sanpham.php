<?php
class M_sanpham extends connectiondb{
	public function findById($id){
		$sanpham = null;
		$sql = "select * from sanpham where MaSP = '".$id."'";
		$result = $this->execute_fetch_one( $sql );
		if ($result !== null){
			$sanpham = new E_sanpham($result["MaSp"],$result["MaLoai"],$result["TenSP"],$result["BaoHanh"],$result["TrangThai"],$result["MaKM"]);
			return $sanpham;
		}
		else return null;
	}

	public function getQuantity(){
		$sql = "select * from sanpham";
		$result = $this->count( $sql );
		return $result;
	}

	
}
?>