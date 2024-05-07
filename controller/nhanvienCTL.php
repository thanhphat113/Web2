<?php
class nhanvienCTL{
	public function __construct(){
		$this->db = new connectiondb();
	}

	public function findById($id){
		$query = "select * from nhanvien where MaNV = '".$id."'";
		$result = $this->db->execute_fetch_one($query);
		
		if(!empty($result)){
			return new nhanvien($result['MaNV'],$result['TenNV'],$result['Email'],$result['SoDienThoai'],$result['MaTK'],$result['GioiTinh'],$result['NgaySinh'],$result['DiaChi']);
		}
		else return null;
	}

	function newMaNV(){
		$query = "SELECT MAX(SUBSTRING(manv, 3)) AS max_id FROM nhanvien";
		return $this->db->newId('NV',$query);
	}

	public function findAll(){
		$result = array();
		if(isset($_POST["search"])){
			$result = array();
			$dcnv = $_POST['addres-epl-search'];
			$gtnv = $_POST['gender-epl-search'];
			if(!empty($nsnv) && !empty($dcnv) && !empty($gtnv)){
				$query = "SELECT * FROM nhanvien WHERE DiaChi LIKE '%$dcnv%' AND NgaySinh LIKE '%$nsnv%' AND GioiTinh LIKE '%$gtnv%'";
			}
			elseif(empty($nsnv) && !empty($dcnv) && !empty($gtnv)){
				$query = "SELECT * FROM nhanvien WHERE DiaChi LIKE '%$dcnv%' AND GioiTinh='$gtnv'";
			}
			elseif(!empty($nsnv) && empty($dcnv) && !empty($gtnv)){
				$query = "SELECT * FROM nhanvien WHERE NgaySinh='$nsnv' AND GioiTinh='$gtnv'";
			}
			elseif(!empty($nsnv) && !empty($dcnv) && empty($gtnv)){
				$query = "SELECT * FROM nhanvien WHERE NgaySinh='$nsnv' AND DiaChi LIKE '%$dcnv%'";
			}
			elseif(!empty($nsnv) && empty($dcnv) && empty($gtnv)){
				$query = "SELECT * FROM nhanvien WHERE NgaySinh LIKE '%$nsnv%'";
			}
			elseif(empty($nsnv) && !empty($dcnv) && empty($gtnv)){
				$query = "SELECT * FROM nhanvien WHERE DiaChi LIKE '%$dcnv%'";
			}
			elseif(empty($nsnv) && empty($dcnv) && !empty($gtnv)){
				$query = "SELECT * FROM nhanvien WHERE GioiTinh='$gtnv'";
			}
			elseif(empty($nsnv) && empty($dcnv) && empty($gtnv)){
				$query = "SELECT * FROM nhanvien ";
			}
			$list = $this->db->execute_fetch_all($query);
			if(!empty($list)){
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
			} 
		}
		else if(isset($_POST["search-id"])){
			$result = array();
			$search = $_POST['id-epl-search'];
			if(!empty($search)){
				$query = "SELECT * FROM nhanvien WHERE MaNV LIKE '%$search%' OR TenNV LIKE '%$search%'";
				$list = $this->db->execute_fetch_all($query);
				if(!empty($list)){
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
				} 
			}
		}
		else {
			$result = array();
			$query = "select * from nhanvien";
			$list = $this->db->execute_fetch_all($query);
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
		}
		
		return $result;
	}
	public function delete(){
		if(isset($_POST["delete"])){
			$result= "dang xoa";
			$manv = $_POST['delete'];
			$query = "delete from nhanvien where MaNV = '".$manv."'";
			$result = $this->db->execute_query($query);
				
		}
		return "";	
	}

	public function add(){
		if(isset($_POST["add"])){
			$manv = $_POST["id-epl-input"];
			$tennv = $_POST["name-epl-input"];
			$email = $_POST["email-epl-input"];
			$sdt = $_POST["phone-epl-input"];
			$matk = $_POST["idtk-epl-input"];
			$nsnv = $_POST["birt-epl-input"];
			$dcnv = $_POST["addres-epl-input"];
			$gtnv = $_POST['gender'];
            $query = "insert into nhanvien values ('{$manv}','{$tennv}','{$email}','{$sdt}','{$matk}','{$dcnv}','{$gtnv}','{$nsnv}')";
			$result = $this->db->execute_query($query);
			if ($result){
				return 'Thêm hoá đơn thành công';
			}
			else {
				return 'Thêm hoá đơn thất bại';
			}
		}
		else{
			return "";
		}
	}
	public function search(){
		$result = array();
		if(isset($_POST["search"])){
			$nsnv = $_POST['birt-epl-search'];
			$dcnv = $_POST['addres-epl-search'];
			$query = "select *from nhanvien where NgaySinh='$nsnv' or DiaChi='$dcnv'";
			$list = $this->db->execute_fetch_all($query);
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

	public function edit(){
		if(isset($_POST["edit"])){
			$manv = $_POST["id-epl-edit"];
			$tennv = $_POST["name-epl-edit"];
			$email = $_POST["email-epl-edit"];
			$sdt = $_POST["phone-epl-edit"];
			$matk = $_POST["idtk-epl-edit"];
			$nsnv = $_POST["birt-epl-edit"];
			$dcnv = $_POST["addres-epl-edit"];
			$gtnv = $_POST['gender'];
			$query = "update nhanvien set TenNV = '{$tennv}', Email = '{$email}', SoDienThoai = '{$sdt}', MaTK = '{$matk}', DiaChi = '{$dcnv}', GioiTinh = '{$gtnv}', NgaySinh = '{$nsnv}' where MaNV = '{$manv}'";
			$result = $this->db->execute_query($query);
			if ($result){
				return 'Cập nhật hoá đơn thành công';
			}
			else {
				return 'Cập nhật hoá đơn thất bại ' ;
			}
		}
		else{
			return "";
		}
	}

	public function insert($nhanvien){
		$query = "insert into nhanvien values ('{$nhanvien->getManv()}','{$nhanvien->getTennv()}','{$nhanvien->getEmail()}','{$nhanvien->getSdt()}','{$nhanvien->getMatk()}','{$nhanvien->getGtnv()}','{$nhanvien->getNsnv()}','{$nhanvien->getDcnv()}')";
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
