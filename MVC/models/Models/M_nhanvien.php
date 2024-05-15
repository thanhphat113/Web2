<?php
require_once("./MVC/models/Entities/E_nhanvien.php");
class M_nhanvien extends connectiondb{
	
	public function findById($id){
		$query = "select * from nhanvien where MaNV = '".$id."'";
		$result = $this->execute_fetch_one($query);
		
		if(!empty($result)){
			return new nhanvien($result['MaNV'],$result['TenNV'],$result['Email'],$result['SoDienThoai'],$result['MaTK'],$result['GioiTinh'],$result['NgaySinh'],$result['DiaChi']);
		}
		else return null;
	}

	function newMaNV(){
		$query = "SELECT MAX(SUBSTRING(manv, 3)) AS max_id FROM nhanvien";
		return $this->newId('NV',$query);
	}

	public function showAll(){
		$result = array();
		$query = "select * from nhanvien";
		$list = $this->execute_fetch_all($query);
		foreach ($list as $nv) {
			$manv = $nv['MaNV'];
			$tennv = $nv['TenNV'];
			$email = $nv['Email'];
			$sdt = $nv['SoDienThoai'];
			$matk = $nv['MaTK'];
			$gtnv = $nv['GioiTinh'];
			$nsnv = $nv['NgaySinh'];
			$dcnv = $nv['DiaChi'];
			$nhanvien = new nhanvien($manv,$tennv,$email,$sdt,$matk,$gtnv,$nsnv,$dcnv);
			$result[] = $nhanvien;
		}
		return $result;
	}

	public function search($diachi,$gioitinh){
		$result = array();
		$query = "SELECT * FROM nhanvien WHERE DiaChi LIKE '%$diachi%' AND GioiTinh = '$gioitinh' ";
		$list = $this->execute_fetch_all($query);
		foreach ($list as $nv) {
			$manv = $nv['MaNV'];
			$tennv = $nv['TenNV'];
			$email = $nv['Email'];
			$sdt = $nv['SoDienThoai'];
			$matk = $nv['MaTK'];
			$gtnv = $nv['GioiTinh'];
			$nsnv = $nv['NgaySinh'];
			$dcnv = $nv['DiaChi'];
			$nhanvien = new nhanvien($manv,$tennv,$email,$sdt,$matk,$gtnv,$nsnv,$dcnv);
			$result[] = $nhanvien;
		}
		return $result;
	}

	public function add($manv,$tennv,$email,$sdt,$matk,$gtnv,$nsnv,$dcnv){
            $query = "insert into nhanvien values ('{$manv}','{$tennv}','{$email}','{$sdt}','{$matk}','{$dcnv}','{$gtnv}','{$nsnv}')";
			$result = $this->execute_query($query);
	}

	public function delete($manv){;
			$query = "delete from nhanvien where MaNV = '".$manv."'";
			$result = $this->execute_query($query);
	}

	public function edit($manv,$tennv,$email,$sdt,$matk,$gtnv,$nsnv,$dcnv){
			$query = "update nhanvien set TenNV = '{$tennv}', Email = '{$email}', SoDienThoai = '{$sdt}', MaTK = '{$matk}', DiaChi = '{$dcnv}', GioiTinh = '{$gtnv}', NgaySinh = '{$nsnv}' where MaNV = '{$manv}'";
			$result = $this->execute_query($query);
	}

	public function quick_search($search){
		$result = array();
		$query = "SELECT * FROM nhanvien WHERE MaNV LIKE '%$search%' OR TenNV LIKE '%$search%'";
		$list = $this->execute_fetch_all($query);
		foreach ($list as $nv) {
			$manv = $nv['MaNV'];
			$tennv = $nv['TenNV'];
			$email = $nv['Email'];
			$sdt = $nv['SoDienThoai'];
			$matk = $nv['MaTK'];
			$gtnv = $nv['GioiTinh'];
			$nsnv = $nv['NgaySinh'];
			$dcnv = $nv['DiaChi'];
			$nhanvien = new nhanvien($manv,$tennv,$email,$sdt,$matk,$gtnv,$nsnv,$dcnv);
			$result[] = $nhanvien;
		}
		return $result;
	}

}

?>
