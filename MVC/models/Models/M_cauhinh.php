<?php
	class M_cauhinh extends connectiondb{
		public function getNameList() {
			$query = "SELECT DISTINCT sp.MaSP,sp.TenSP FROM chitiet_sp ct join sanpham sp on sp.MaSP=ct.MaSP";
			$list = $this->execute_fetch_all( $query );
			return $list;
		}

		public function findListById($id) {
			$result= array();
			$query = "select sp.MaCH,sp.CauHinh from sp_giaban sp where MaCT = '".$id."'";
			$list = $this->execute_fetch_all( $query );
			return $list;
		}

		function findById($id){
			$query = "select * from sp_giaban where MaCH = '".$id."'";
			$result = $this->execute_fetch_one( $query );
			if ($result != null) {
				$ch = new E_cauhinh($result["MaCT"], $result["MaCH"], $result["CauHinh"], $result["SoLuong"],$result["DonGia"]);
				return $ch;
			}
			return null;
		}

		function getListTop(){
			$sql ="SELECT MaCH, SUM(soluong) AS tong
					FROM chitiet_hd
					GROUP BY MaCH
					ORDER BY tong DESC;";
			$result = $this->execute_fetch_all( $sql );
			return $result;
		}
	}
?>