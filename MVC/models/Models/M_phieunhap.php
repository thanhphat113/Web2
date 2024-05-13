<?php
	class M_phieunhap extends connectiondb{
		public function findAll(){
			// $result = array();
			$query = "select * from phieunhap";
			$list = $this->execute_fetch_all( $query );
			foreach ($list as $pn) {
				$mapn = $pn['MaPN'];
				$mancc = $pn['MaNCC'];
				$ngaytao = $pn['NgayTao'];
				$tongtien = $pn['TongTien'];
				$phieunhap = new E_phieunhap($mapn,$mancc,$ngaytao,$tongtien);
				$result[] = $phieunhap;
			}
			return $result;
		}

		public function delete($mapn){
			$query = "delete from phieunhap where MaPN = '".$mapn."'";
			$result = $this->execute_query($query);
			if ($result){
				return "Xoá thành công";
			}else{
				return "Xoá thất bại";
			}
		}
	}

?>