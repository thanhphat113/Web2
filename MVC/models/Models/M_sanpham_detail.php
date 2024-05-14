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

	public function getNameList() {
		$query = "SELECT DISTINCT sp.MaSP,sp.TenSP FROM chitiet_sp ct join sanpham sp on sp.MaSP=ct.MaSP";
		$list = $this->execute_fetch_all( $query );
		return $list;
	}

	public function getMauListById($masp) {
		$query = "SELECT ct.MaCT,ct.Mau FROM chitiet_sp ct join sanpham sp on ct.MaSP=sp.MaSP WHERE sp.MaSP = '".$masp."'";
		$list = $this->execute_fetch_all( $query );
		return $list;
	}
}
?>