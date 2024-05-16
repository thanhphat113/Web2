<?php
require_once("./MVC/models/Entities/E_sanpham.php");
require_once("./MVC/models/Entities/E_giabansanpham.php");
require_once("./MVC/models/Entities/E_loaisanpham.php");
require_once("./MVC/models/Entities/E_chitietsanpham.php");
class M_sanpham extends connectiondb{
	public function findById($id){
		$sanpham = null;
		$sql = "select * from sanpham where MaSP = '".$id."'";
		$result = $this->execute_fetch_one( $sql );
		if ($result !== null){
			$sanpham = new E_sanpham($result["MaSp"],$result["MaLoai"],$result["TenSP"],$result["BaoHanh"],$result["TrangThai"],$result["MaKM"]);
			return $sanpham;
		}
		else return null;
	}

	function newMaSP(){
		$query = "SELECT MAX(SUBSTRING(masp, 3)) AS max_id FROM sanpham";
		return $this->newId('SP',$query);
	}

	public function findIPhone(){
		$result = array();
		$query = "SELECT gsp.MaCT, gsp.MaCH, gsp.CauHinh, gsp.SoLuong, gsp.DonGia
				FROM sp_giaban gsp
				INNER JOIN chitiet_sp ctsp ON gsp.MaCT = ctsp.MaCT
				INNER JOIN sanpham sp ON sp.MaSP = ctsp.MaSP
				INNER JOIN loaisp lsp ON lsp.MaLoai = sp.MaLoai
				WHERE lsp.MaDM = 'IP' ";
		$list = $this->execute_fetch_all($query);
		foreach ($list as $gbsp) {
			$mact = $gbsp['MaCT'];
			$mach = $gbsp['MaCH'];
			$cauhinh = $gbsp['CauHinh'];
			$soluong = $gbsp['SoLuong'];
			$dongia = $gbsp['DonGia'];
			$giabansanpham = new giabansanpham($mact,$mach,$cauhinh,$soluong,$dongia);
			$result[] = $giabansanpham;
		}
		return $result;
	}

	public function quick_search($value){
		$result = array();
		$query = "SELECT gsp.MaCT, gsp.MaCH, gsp.CauHinh, gsp.SoLuong, gsp.DonGia
				FROM sp_giaban gsp
				INNER JOIN chitiet_sp ctsp ON gsp.MaCT = ctsp.MaCT
				INNER JOIN sanpham sp ON sp.MaSP = ctsp.MaSP
				WHERE sp.TenSP  LIKE '%$value%' OR sp.MaSP LIKE '%$value%'";
		$list = $this->execute_fetch_all($query);
		foreach ($list as $gbsp) {
			$mact = $gbsp['MaCT'];
			$mach = $gbsp['MaCH'];
			$cauhinh = $gbsp['CauHinh'];
			$soluong = $gbsp['SoLuong'];
			$dongia = $gbsp['DonGia'];
			$giabansanpham = new giabansanpham($mact,$mach,$cauhinh,$soluong,$dongia);
			$result[] = $giabansanpham;
		}
		return $result;
	}

	public function findIPad(){
		$result = array();
		$query = "SELECT gsp.MaCT, gsp.MaCH, gsp.CauHinh, gsp.SoLuong, gsp.DonGia
				FROM sp_giaban gsp
				INNER JOIN chitiet_sp ctsp ON gsp.MaCT = ctsp.MaCT
				INNER JOIN sanpham sp ON sp.MaSP = ctsp.MaSP
				INNER JOIN loaisp lsp ON lsp.MaLoai = sp.MaLoai
				WHERE lsp.MaDM = 'IPa' ";
		$list = $this->execute_fetch_all($query);
		foreach ($list as $gbsp) {
			$mact = $gbsp['MaCT'];
			$mach = $gbsp['MaCH'];
			$cauhinh = $gbsp['CauHinh'];
			$soluong = $gbsp['SoLuong'];
			$dongia = $gbsp['DonGia'];
			$giabansanpham = new giabansanpham($mact,$mach,$cauhinh,$soluong,$dongia);
			$result[] = $giabansanpham;
		}
		return $result;
	}

	public function findMacbook(){
		$result = array();
		$query = "SELECT gsp.MaCT, gsp.MaCH, gsp.CauHinh, gsp.SoLuong, gsp.DonGia
				FROM sp_giaban gsp
				INNER JOIN chitiet_sp ctsp ON gsp.MaCT = ctsp.MaCT
				INNER JOIN sanpham sp ON sp.MaSP = ctsp.MaSP
				INNER JOIN loaisp lsp ON lsp.MaLoai = sp.MaLoai
				WHERE lsp.MaDM = 'MB' ";
		$list = $this->execute_fetch_all($query);
		foreach ($list as $gbsp) {
			$mact = $gbsp['MaCT'];
			$mach = $gbsp['MaCH'];
			$cauhinh = $gbsp['CauHinh'];
			$soluong = $gbsp['SoLuong'];
			$dongia = $gbsp['DonGia'];
			$giabansanpham = new giabansanpham($mact,$mach,$cauhinh,$soluong,$dongia);
			$result[] = $giabansanpham;
		}
		return $result;
	}

	public function showAll(){
		$result = array();
		$query = "SELECT *FROM sanpham ";
		$list = $this->execute_fetch_all($query);
		foreach ($list as $sp) {
			$maloai = $sp['MaLoai'];
			$masp = $sp['MaSP'];
			$tensp = $sp['TenSP'];
			$baohanh = $sp['BaoHanh'];
			$trangthai = $sp['TrangThai'];
			$makm = $sp['MaKM'];
			$sanpham = new E_sanpham($maloai,$masp,$tensp,$baohanh,$trangthai,$makm);
			$result[] = $sanpham;
		}
		return $result;
	}

	public function findChiTietSanPham(){
		$result = array();
		$query = "SELECT * FROM chitiet_sp ";
		$list = $this->execute_fetch_all($query);
		foreach ($list as $ctsp) {
			$masp = $ctsp['MaSP'];
			$mact = $ctsp['MaCT'];
			$mau = $ctsp['Mau'];
			$hinhanh = $ctsp['HinhAnh'];
			$mota = $ctsp['MoTa'];
			$chitietsanpham = new chitietsanpham($masp,$mact,$mau,$hinhanh,$mota);
			$result[] = $chitietsanpham;
		}
		return $result;
	}

	public function findGiaBanSanPham(){
		$result = array();
		$query = "SELECT * FROM sp_giaban ";
		$list = $this->execute_fetch_all($query);
		foreach ($list as $gbsp) {
			$mact = $gbsp['MaCT'];
			$mach = $gbsp['MaCH'];
			$cauhinh = $gbsp['CauHinh'];
			$soluong = $gbsp['SoLuong'];
			$dongia = $gbsp['DonGia'];
			$giabansanpham = new giabansanpham($mact,$mach,$cauhinh,$soluong,$dongia);
			$result[] = $giabansanpham;
		}
		return $result;
	}

	public function findLoaiSanPham(){
		$result = array();
		$query = "SELECT * FROM loaisp ";
		$list = $this->execute_fetch_all($query);
		foreach ($list as $ctsp) {
			$madm = $ctsp['MaDM'];
			$maloai = $ctsp['MaLoai'];
			$tenloai = $ctsp['TenLoai'];
			$loaisanpham = new loaisanpham($madm,$maloai,$tenloai);
			$result[] = $loaisanpham;
		}
		return $result;
	}

	public function edit($masp,$mach,$tensp,$baohanh,$trangthai,$gia){
		$query = "update sanpham set TenSP = '{$tensp}', BaoHanh = '{$baohanh}', TrangThai = '{$trangthai}' where MaSP = '{$masp}'";
		$result = $this->execute_query($query);
		$query = "update sp_giaban set DonGia = '{$gia}' where MaCH = '{$mach}'";
		$result = $this->execute_query($query);
    }

	public function delete($masp){
		$query = "delete from sp_giaban where MaCH = '$masp'";
		$result = $this->execute_query($query);
    }

	public function findPrice($min,$max){
		$result = array();
		$query = "SELECT * FROM sp_giaban WHERE DonGia >= $min AND DonGia <= $max";
		$list = $this->execute_fetch_all($query);
		foreach ($list as $gbsp) {
			$mact = $gbsp['MaCT'];
			$mach = $gbsp['MaCH'];
			$cauhinh = $gbsp['CauHinh'];
			$soluong = $gbsp['SoLuong'];
			$dongia = $gbsp['DonGia'];
			$giabansanpham = new giabansanpham($mact,$mach,$cauhinh,$soluong,$dongia);
			$result[] = $giabansanpham;
		}
		return $result;
	}

	public function search($baohanh,$trangthai){
		$result = array();
		$query = "SELECT * FROM sanpham WHERE TrangThai = $trangthai AND BaoHanh = $baohanh";
		$list = $this->execute_fetch_all($query);
		foreach ($list as $sp) {
			$maloai = $sp['MaLoai'];
			$masp = $sp['MaSP'];
			$tensp = $sp['TenSP'];
			$baohanh = $sp['BaoHanh'];
			$trangthai = $sp['TrangThai'];
			$makm = $sp['MaKM'];
			$sanpham = new E_sanpham($maloai,$masp,$tensp,$baohanh,$trangthai,$makm);
			$result[] = $sanpham;
		}
		return $result;
	}
}
?>