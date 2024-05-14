<?php
	class M_phieunhap extends connectiondb{
		public function findAll(){
			$result = array();
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

		function newMaPN(){
			$query = "SELECT MAX(SUBSTRING(maPN, 3)) AS max_id FROM phieunhap";
			return $this->newId('PN',$query);
		}

		function insert($mapn, $mancc, $chitiet){
			$query = "insert into phieunhap(MaPN,MaNCC,NgayTao) value ('". $mapn ."','". $mancc ."',NOW())";
			$result = $this->execute_query($query);
			if ($result){
				foreach ($chitiet as $ct){
					$query = "insert into chitiet_pn value ('". $mapn ."','". $ct["MaCT"] ."','". $ct["gianhap"] ."','".$ct["soluong"]."','". $ct["tongtien"] ."')";
					$result = $this->execute_query($query);
					if (!$result) return "Thêm chi tiết vào phiếu nhập thất bại";
				}
				$query = "UPDATE phieunhap as sp
								SET TongTien = (
									SELECT SUM(tongtien) 
									FROM chitiet_pn as ct
									WHERE ct.MaPN = sp.MaPN
								)";
				$result = $this->execute_query($query);
				return "Thêm phiếu nhập thành công";
			}else{
				return "Thêm phiếu nhập thất bại";
			}
		}

		public function delete($mapn){
			$query = "delete from chitiet_pn where MaPN = '".$mapn."'";
			$result = $this->execute_query($query);
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