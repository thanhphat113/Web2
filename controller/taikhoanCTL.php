<?php
class taikhoanCTL{
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

	function newMaTK(){
		$query = "SELECT MAX(SUBSTRING(matk, 3)) AS max_id FROM taikhoan";
		return $this->db->newId('TK',$query);
	}

	public function findAll(){
		$result = array();
		if(isset($_POST["search"])){
			$result = array();
			$maquyen =	(int) $_POST['permission-acc-search'];
			$trangthai =(int) $_POST['state-acc-search'];

			if(isset($maquyen) && isset($trangthai)){
				$query = "SELECT * FROM taikhoan WHERE TrangThai = $trangthai AND MaQuyen=$maquyen";
			}
			if(isset($maquyen) && $trangthai==2){
				$query = "SELECT * FROM taikhoan WHERE MaQuyen = $maquyen ";
			}
			if($maquyen == 3 && isset($trangthai)){
				$query = "SELECT * FROM taikhoan WHERE TrangThai = $trangthai";
			}
			if($maquyen==3 && $trangthai==2){
				$query = "SELECT * FROM taikhoan ";
			}
			$list = $this->db->execute_fetch_all($query);
			if(!empty($list)){
				foreach ($list as $tk) {
					$matk = $tk['MaTK'];
					$tentk = $tk['Username'];
					$password = $tk['Password'];
					$trangthai = $tk['TrangThai'];
					$maquyen = $tk['MaQuyen'];
					$taikhoan = new taikhoan($matk,$tentk,$password,$trangthai,$maquyen);
					$result[] = $taikhoan;
				}
			} 
		}
		else if(isset($_POST["search-id"])){
			$result = array();
			$search = $_POST['id-acc-search'];
			if(!empty($search)){
				$query = "SELECT * FROM taikhoan WHERE MaTK LIKE '%$search%' OR Username LIKE '%$search%'";
				$list = $this->db->execute_fetch_all($query);
				if(!empty($list)){
					foreach ($list as $tk) {
						$matk = $tk['MaTK'];
						$tentk = $tk['Username'];
						$password = $tk['Password'];
						$trangthai = $tk['TrangThai'];
						$maquyen = $tk['MaQuyen'];
						$taikhoan = new taikhoan($matk,$tentk,$password,$trangthai,$maquyen);
						$result[] = $taikhoan;
					}
				} 
			}
		}
		else {
			$result = array();
			$query = "select * from taikhoan";
			$list = $this->db->execute_fetch_all($query);
			foreach ($list as $tk) {
				$matk = $tk['MaTK'];
                $tentk = $tk['Username'];
                $password = $tk['Password'];
                $trangthai = $tk['TrangThai'];
                $maquyen = $tk['MaQuyen'];
				$taikhoan = new taikhoan($matk,$tentk,$password,$trangthai,$maquyen);
				$result[] = $taikhoan;
			}
		}
		
		return $result;
	}
	public function delete(){
		if(isset($_POST["delete-acc"])){
			$matk = $_POST['delete-acc'];
			$query = "delete from taikhoan where MaTK = $matk";
			$result = $this->db->execute_query($query);
				
		}
	}

	public function add(){
		if(isset($_POST["add-acc"])){
			$matk = $_POST['id-acc-input'];
			$tentk = $_POST['user-acc-input'];
			$password = $_POST['pass-acc-input'];
			$trangthai = 1;
			$maquyen = $_POST['quyen-acc-input'];
            $query = "insert into taikhoan values ('{$matk}','{$tentk}','{$password}','{$trangthai}','{$maquyen}')";
			$result = $this->db->execute_query($query);
			if ($result){
				return '';
			}
			else {
				return 'Thêm khách hàng thất bại';
			}
		}
		else{
			return "";
		}
	}

	public function edit(){
		if(isset($_POST["edit-acc"])){
			$matk = $_POST['id-acc-edit'];
			$tentk = $_POST['user-acc-edit'];
			$password = $_POST['pass-acc-edit'];
			$trangthai = $_POST['trangthai-acc-edit'];
			$maquyen = $_POST['quyen-acc-edit'];
			$query = "update taikhoan set Username = '{$tentk}', Password = '{$password}', TrangThai = '{$trangthai}', MaQuyen = '{$maquyen}' where MaTK = '{$matk}'";
			$result = $this->db->execute_query($query);
			if ($result){
				return '';
			}
			else {
				return 'Cập nhật thất bại ';
			}
		}
		else{
			return "";
		}
	}
}

?>
