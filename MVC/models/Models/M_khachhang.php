<?php
class khachhangCTL{
	public function __construct(){
		$this->db = new connectiondb();
	}

	public function findById($id){
		$query = "select * from khachhang where MaKH = '".$id."'";
		$result = $this->db->execute_fetch_one($query);
		
		if(!empty($result)){
			return new khachhang($result['MaKH'],$result['TenKH'],$result['Email'],$result['SoDienThoai'],$result['MaTK'],$result['DiaChi']);
		}
		else return null;
	}

	function newMaKH(){
		$query = "SELECT MAX(SUBSTRING(makh, 3)) AS max_id FROM khachhang";
		return $this->db->newId('KH',$query);
	}

	public function findAll(){
		$result = array();
		if(isset($_POST["search"])){
			$result = array();
			$sdt = $_POST['sdt-cus-search'];
			$dckh = $_POST['addres-cus-search'];
			if(!empty($sdt) && !empty($dckh)){
				$query = "SELECT * FROM khachhang WHERE DiaChi LIKE '%$dckh%' AND SoDienThoai='$sdt'";
			}
			elseif(empty($sdt) && !empty($dckh)){
				$query = "SELECT * FROM khachhang WHERE DiaChi LIKE '%$dckh%'";
			}
			elseif(!empty($sdt) && empty($dckh)){
				$query = "SELECT * FROM khachhang WHERE SoDienThoai LIKE '%$sdt%'";
			}
			elseif(empty($sdt) && !empty($dckh)){
				$query = "SELECT * FROM DiaChi LIKE '%$dckh%'";
			}
			elseif(empty($sdt) && empty($dckh)){
				$query = "SELECT * FROM khachhang ";
			}
			$list = $this->db->execute_fetch_all($query);
			if(!empty($list)){
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
			} 
		}
		else if(isset($_POST["search-id"])){
			$result = array();
			$search = $_POST['id-cus-search'];
			if(!empty($search)){
				$query = "SELECT * FROM khachhang WHERE MaKH LIKE '%$search%' OR TenKH LIKE '%$search%'";
				$list = $this->db->execute_fetch_all($query);
				if(!empty($list)){
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
				} 
			}
		}
		else {
			$result = array();
			$query = "select * from khachhang";
			$list = $this->db->execute_fetch_all($query);
			foreach ($list as $nv) {
				$makh = $nv['MaKH'];
				$tenkh = $nv['TenKH'];
				$email = $nv['Email'];
				$sdt = $nv['SoDienThoai'];
				$matk = $nv['MaTK'];
				$dckh = $nv['DiaChi'];
				$khachhang = new khachhang($makh,$tenkh,$email,$sdt,$matk,$dckh);
				$result[] = $khachhang;
			}
		}
		
		return $result;
	}
	public function delete(){
		if(isset($_POST["delete-cus"])){
			$makh = $_POST['delete-cus'];
			$query = "delete from khachhang where MaKH = '".$makh."'";
			$result = $this->db->execute_query($query);
				
		}
		return "";	
	}

	public function add(){
		if(isset($_POST["add-cus"])){
			$makh = $_POST["id-cus-input"];
			$tenkh = $_POST["name-cus-input"];
			$email = $_POST["email-cus-input"];
			$sdt = $_POST["phone-cus-input"];
			$matk = $_POST["idtk-cus-input"];
			$dckh = $_POST["addres-cus-input"];
            $query = "insert into khachhang values ('{$makh}','{$tenkh}','{$email}','{$sdt}','{$matk}','{$dckh}')";
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
		if(isset($_POST["edit-cus"])){
			$makh = $_POST["id-cus-edit"];
			$tenkh = $_POST["name-cus-edit"];
			$email = $_POST["email-cus-edit"];
			$sdt = $_POST["phone-cus-edit"];
			$matk = $_POST["idtk-cus-edit"];
			$dckh = $_POST["addres-cus-edit"];
			$query = "update khachhang set TenKH = '{$tenkh}', Email = '{$email}', SoDienThoai = '{$sdt}', MaTK = '{$matk}', DiaChi = '{$dckh}' where MaKH = '{$makh}'";
			$result = $this->db->execute_query($query);
			if ($result){
				return '';
			}
			else {
				return 'Cập nhật hoá đơn thất bại '.$makh .$tenkh .$email .$sdt .$matk .$dckh ;
			}
		}
		else{
			return "";
		}
	}
}

?>
