<?php 
	class M_hoadon_detail extends connectiondb{
		public function findById($id) {
			$query = "SELECT sp.TenSP,ctsp.Mau,gb.CauHinh,gb.DonGia  ,hd.*
			FROM chitiet_hd hd join sp_giaban gb on hd.MaCH=gb.MaCH
			join chitiet_sp ctsp on gb.MaCT = ctsp.MaCT
			join sanpham sp on sp.MaSP = ctsp.MaSP 
			WHERE MaHD ='".$id."'";
			$list = $this->execute_fetch_all($query);
			return $list;
		}
	}
?>													