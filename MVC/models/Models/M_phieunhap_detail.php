<?php
	class M_phieunhap_detail extends connectiondb {
		public function findById($id) {
			$query = "SELECT sp.TenSP,ctsp.Mau,ct.*  FROM chitiet_pn ct join chitiet_sp ctsp on ct.MaCT=ctsp.MaCT join sanpham sp on sp.MaSP = ctsp.MaSP WHERE MaPN = '".$id."'";
			$list = $this->execute_fetch_all($query);
			return $list;
		}
	}
?>