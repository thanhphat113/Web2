<?php
class M_khachhang extends connectiondb{

	public function findById($id){
		$query = "select * from khachhang where MaKH = '".$id."'";
		$result = $this->execute_fetch_one($query);
		
		if(!empty($result)){
			return new khachhang($result['MaKH'],$result['TenKH'],$result['Email'],$result['SoDienThoai'],$result['MaTK'],$result['DiaChi']);
		}

		else return null;
	}

	function getQuantity(){
		$query = "select * from khachhang";
		$result = $this->count($query);
		return $result;
	}

	function getListTop(){
		$query = "SELECT MaKH, SUM(tongtien) AS tong FROM hoadon GROUP BY MaKH ORDER BY `tong` DESC";
		$result = $this->execute_fetch_all($query);
		return $result;
	}

	function getDonutChart(){
		$query = "SELECT
						CASE
							WHEN tuoi >= 15 AND tuoi <= 18 THEN '15-18'
							WHEN tuoi >= 19 AND tuoi <= 24 THEN '19-24'
							WHEN tuoi >= 25 AND tuoi <= 30 THEN '25-30'
							ELSE 'Trên 30'
						END AS nhom_tuoi,
						COUNT(*) AS so_luong
					FROM (
						SELECT
							MaKH,
							ngaysinh,
							DATEDIFF(CURRENT_DATE(), ngaysinh) / 365 AS tuoi
						FROM
							khachhang
					) AS kh
					GROUP BY
						nhom_tuoi
					ORDER BY
						FIELD(nhom_tuoi, '15-18', '19-24', '25-30', 'Trên 30')";

		$result = $this->execute_fetch_all($query);
		return $result;
	}

	function newMaKH(){
		$query = "SELECT MAX(SUBSTRING(makh, 3)) AS max_id FROM khachhang";
		return $this->newId('KH',$query);
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
