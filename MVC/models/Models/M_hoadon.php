<?php
class M_hoadon extends connectiondb{
	public function findAll(){
		// $result = array();
		$query = "select * from hoadon";
		$list = $this->execute_fetch_all( $query );
		foreach ($list as $hd) {
			$mahd = $hd['MaHD'];
			$manv = $hd['MaNV'];
			$makh = $hd['MaKH'];
			$makm = $hd['MaKM'];
			$ngaytao = $hd['NgayTao'];
			$tien = $hd['TongTien'];
			$trangthai = $hd['trangthai'];
			$hoadon = new hoadon($mahd,$manv,$makh,$makm,$ngaytao,$tien,$trangthai);
			$result[] = $hoadon;
		}
		return $result;
	}

	function newMaHD(){
		$query = "SELECT MAX(SUBSTRING(mahd, 3)) AS max_id FROM hoadon";
		return $this->newId('HD',$query);
	}

	// function tongTienTheoThang($thang){
	// 	$query = "SELECT SUM(TongTien) FROM hoadon WHERE MONTH(NgayTao) = ".$thang;
	// 	$result = $this->execute_fletch_one($query);
	// 	if(!empty($result)){
	// 		return $result[0];
	// 	}
	// 	else return 0;
	// }

	public function insert($hoadon){
		$new_id = $this->newMaHD();
		$query = "insert into hoadon values ('{$new_id}','{$hoadon->getManv()}','{$hoadon->getMakh()}','{$hoadon->getMakm()}','{$hoadon->getNgaytao()}','{$hoadon->getTongtien()}')";
		$result = $this->execute_query($query);
		if ($result){
			return 'Thêm hoá đơn thành công';
		}
		else {
			return 'Thêm hoá đơn thất bại';
		}
	}
}
?>