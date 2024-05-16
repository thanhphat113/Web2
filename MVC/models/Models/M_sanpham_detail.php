<?php 
class M_sanpham_detail extends connectiondb {
	public function findAll() {
		$query = "select * from chitiet_sp";
		$list = $this->execute_fetch_all( $query );
		foreach ($list as $hd) {
			$masp = $hd['MaSP'];
			$mact = $hd['MaCT'];
			$mau = $hd['Mau'];
			$hinhanh = $hd['HinhAnh'];
			$mota = $hd['MoTa'];
			$sp_detail = new E_sanpham_detail($masp,$mact,$mau,$mota,$hinhanh);
			$result[] = $sp_detail;
		}
		return $result;
	}

	function findById($id){
		$sql = "select * from chitiet_sp where MaCT = '".$id."'";
		$result = $this->execute_fetch_one( $sql );
		if ($result != null) {
			$ctsp = new E_sanpham_detail( $result["MaSP"], $result["MaCT"], $result["Mau"], $result["HinhAnh"], $result["MoTa"] );
			return $ctsp;
		}
		return null;
	}

	public function getNameList() {
		$query = "SELECT DISTINCT sp.MaSP,sp.TenSP FROM chitiet_sp ct join sanpham sp on sp.MaSP=ct.MaSP";
		$list = $this->execute_fetch_all( $query );
		return $list;
	}

	public function getMauListById($masp) {
		$query = "SELECT ct.MaCT,ct.Mau FROM chitiet_sp ct  WHERE ct.MaSP = '".$masp."'";
		$list = $this->execute_fetch_all( $query );
		return $list;
	}
}
?>