<?php
class M_hoadon extends connectiondb{
	public function findAll(){
		$result = array();
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

	function getThongKe($year){
		$sql = 'SELECT MONTH(ngaytao) AS thang, SUM(tongtien) AS tong_tien
					FROM hoadon
					WHERE YEAR(ngaytao) = "'.$year.'"
					GROUP BY thang
					ORDER BY thang';
		$results = $this->execute_fetch_all( $sql );
		return $results;
	}

	function tongTien() {
		$query = 'SELECT SUM(TongTien) AS tong_tien FROM hoadon';
		$result = $this->execute_fetch_one( $query );
		return $result["tong_tien"];
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

	function delete($id){
		$query = 'delete from hoadon where MaHD="'.$id.'"';
		$result = $this->execute_query($query);
		if ($result){
			return 'Xoá thành công';
		}
		else{	
			return 'Xoá thất bại';
		}
	}

	function updateTT($id){
		$query = 'update hoadon set trangthai = 1 where MaHD="'.$id.'"';
		$result = $this->execute_query($query);
		if ($result){
			return 'Cập nhật thành công';
		}
		else{	
			return 'Cập nhật thất bại';
		}
	}

	public function getHDByKH($MaKH){
		$query = "select * from hoadon where MaKH = '$MaKH'";
		return mysqli_query($this->conn, $query);
	}
}
?>