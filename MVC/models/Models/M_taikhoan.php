<?php

class M_taikhoan extends connectiondb{

	// public function findById($id){
	// 	$query = "select * from nhanvien where MaNV = '".$id."'";
	// 	$result = $this->db->execute_fetch_one($query);
		
	// 	if(!empty($result)){
	// 		return new nhanvien($result['MaNV'],$result['TenNV'],$result['Email'],$result['SoDienThoai'],$result['MaTK'],$result['GioiTinh'],$result['NgaySinh'],$result['DiaChi']);
	// 	}
	// 	else return null;
	// }
	// 	if(!empty($result)){
	// 		return new nhanvien($result['MaNV'],$result['TenNV'],$result['Email'],$result['SoDienThoai'],$result['MaTK'],$result['GioiTinh'],$result['NgaySinh'],$result['DiaChi']);
	// 	}
	// 	else return null;
	// }

	function newMaTK(){
		$query = "SELECT MAX(SUBSTRING(MaTK, 3)) AS max_id FROM taikhoan";
		return $this->newId('TK',$query);
	}

	public function search($maquyen,$trangthai){
		$result = array();
		$query = "SELECT * FROM taikhoan WHERE TrangThai = $trangthai AND MaQuyen=$maquyen";
		$list = $this->execute_fetch_all($query);
		foreach ($list as $tk) {
			$matk = $tk['MaTK'];
			$tentk = $tk['Username'];
			$password = $tk['Password'];
			$trangthai = $tk['TrangThai'];
			$maquyen = $tk['MaQuyen'];
			$taikhoan = new taikhoan($matk,$tentk,$password,$trangthai,$maquyen);
			$result[] = $taikhoan;
		}
		return $result;
	}

	public function quick_search($search){
		$result = array();
		$query = "SELECT * FROM taikhoan WHERE MaTK LIKE '%$search%' OR Username LIKE '%$search%'";
		$list = $this->execute_fetch_all($query);
		foreach ($list as $tk) {
			$matk = $tk['MaTK'];
			$tentk = $tk['Username'];
			$password = $tk['Password'];
			$trangthai = $tk['TrangThai'];
			$maquyen = $tk['MaQuyen'];
			$taikhoan = new taikhoan($matk,$tentk,$password,$trangthai,$maquyen);
			$result[] = $taikhoan;
		}
		return $result;
	}

	public function showAll(){
		$result = array();
		$query = "select * from taikhoan";
		$list = $this->execute_fetch_all($query);
		foreach ($list as $tk) {
			$matk = $tk['MaTK'];
			$tentk = $tk['Username'];
			$password = $tk['Password'];
			$trangthai = $tk['TrangThai'];
			$maquyen = $tk['MaQuyen'];
			$taikhoan = new taikhoan($matk,$tentk,$password,$trangthai,$maquyen);
			$result[] = $taikhoan;
		}
		return $result;
	}
	public function delete($matk){
			$query = "delete from taikhoan where MaTK = '$matk'";
			$result = $this->execute_query($query);
	}

	public function add($matk,$tentk,$password,$trangthai,$maquyen){
            $query = "insert into taikhoan values ('{$matk}','{$tentk}','{$password}','{$trangthai}','{$maquyen}')";
			$result = $this->execute_query($query);
	}

	public function edit($matk,$tentk,$password,$trangthai,$maquyen){
			$query = "update taikhoan set Username = '{$tentk}', Password = '{$password}', TrangThai = '{$trangthai}', MaQuyen = '{$maquyen}' where MaTK = '{$matk}'";
			$result = $this->execute_query($query);
	}
}

?>
