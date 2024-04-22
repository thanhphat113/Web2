<?php

class hoadonCTL{
	private $db;
	
	public function __construct(){
		$this->db = new connectiondb();
	}

	public function findAll(){
		$result = array();
		$query = "select * from hoadon";
		$list = $this->db->execute_fetch_all($query);
		foreach ($list as $hd) {
			$mahd = $hd['MaHD'];
			$manv = $hd['MaNV'];
			$makh = $hd['MaKH'];
			$makm = $hd['MaKM'];
			$ngaytao = $hd['NgayTao'];
			$tien = $hd['TongTien'];
			$hoadon = new hoadon($mahd,$manv,$makh,$makm,$ngaytao,$tien);
			$result[] = $hoadon;
		}
		return $result;
	}

	function newMaHD(){
		$query = "SELECT MAX(SUBSTRING(mahd, 3)) AS max_id FROM hoadon";
		return $this->db->newId('HD',$query);
	}

	public function insert($hoadon){
		$new_id = $this->newMaHD();
		$query = "insert into hoadon values ('{$new_id}','{$hoadon->getManv()}','{$hoadon->getMakh()}','{$hoadon->getMakm()}','{$hoadon->getNgaytao()}','{$hoadon->getTongtien()}')";
		$result = $this->db->execute_query($query);
		if ($result){
			return 'Thêm hoá đơn thành công';
		}
		else {
			return 'Thêm hoá đơn thất bại';
		}
	}
}

?>