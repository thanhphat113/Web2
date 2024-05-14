<?php
require_once("./MVC/models/Entities/E_khachhang.php");
class M_khachhang extends connectiondb{

	function newMaKH(){
		$query = "SELECT MAX(SUBSTRING(makh, 3)) AS max_id FROM khachhang";
		return $this->newId('KH',$query);
	}

	public function findById($id){
		$query = "select * from khachhang where MaKH = '".$id."'";
		$result = $this->execute_fetch_one($query);
		
		if(!empty($result)){
			return new nhanvien($result['MaKH'],$result['TenKH'],$result['Email'],$result['SoDienThoai'],$result['MaTK'],$result['GioiTinh'],$result['NgaySinh'],$result['DiaChi']);
		}
		else return null;
	}

	public function search($diachi){
		$result = array();
		$query = "SELECT * FROM khachhang WHERE DiaChi LIKE '%$diachi%' ";
		$list = $this->execute_fetch_all($query);
		foreach ($list as $kh) {
			$makh = $kh['MaKH'];
			$tenkh = $kh['TenKH'];
			$email = $kh['Email'];
			$sdt = $kh['SoDienThoai'];
			$matk = $kh['MaTK'];
			$dckh = $kh['DiaChi'];
			$khachhang = new khachhang($makh,$tenkh,$email,$sdt,$matk,$dckh);
			$result[] = $khachhang;
		}
		return $result;
	}

	public function quick_search($search){
		$result = array();
		$query = "SELECT * FROM khachhang WHERE MaKH LIKE '%$search%' OR TenKH LIKE '%$search%'";
		$list = $this->execute_fetch_all($query);
		foreach ($list as $kh) {
			$makh = $kh['MaKH'];
			$tenkh = $kh['TenKH'];
			$email = $kh['Email'];
			$sdt = $kh['SoDienThoai'];
			$matk = $kh['MaTK'];
			$dckh = $kh['DiaChi'];
			$khachhang = new khachhang($makh,$tenkh,$email,$sdt,$matk,$dckh);
			$result[] = $khachhang;
		}
		return $result;
	}

	public function showAll(){
		$result = array();
		$query = "select * from khachhang";
		$list = $this->execute_fetch_all($query);
		foreach ($list as $kh) {
			$makh = $kh['MaKH'];
			$tenkh = $kh['TenKH'];
			$email = $kh['Email'];
			$sdt = $kh['SoDienThoai'];
			$matk = $kh['MaTK'];
			$dckh = $kh['DiaChi'];
			$khachhang = new khachhang($makh,$tenkh,$email,$sdt,$matk,$dckh);
			$result[] = $khachhang;
		}
		return $result;
	}
	public function delete($makh){
			$query = "delete from khachhang where MaKH = '$makh'";
			$result = $this->execute_query($query);
	}

	public function edit($makh,$tenkh,$email,$sdt,$matk,$dckh){
			$query = "update khachhang set TenKH = '{$tenkh}', Email = '{$email}', SoDienThoai = '{$sdt}', MaTK = '{$matk}', DiaChi = '{$dckh}' where MaKH = '{$makh}'";
			$result = $this->execute_query($query);
	}

	public function add($makh,$tenkh,$email,$sdt,$matk,$dckh){
            $query = "insert into khachhang values ('{$makh}','{$tenkh}','{$email}','{$sdt}','{$matk}','{$dckh}')";
			$result = $this->execute_query($query);
	}
}

?>
