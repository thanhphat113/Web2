<?php
	class E_phieunhap_detail{
		private $mapn;
		private $mact;
		private $gianhap;
		private $soluong;
		private $tongtien;

		public function __construct($mapn, $mact, $gianhap, $soluong, $tongtien) {
			$this->mapn = $mapn;
			$this->mact = $mact;
			$this->gianhap = $gianhap;
			$this->soluong = $soluong;
			$this->tongtien = $tongtien;
		}

		public function getMapn() {
			return $this->mapn;
		}

		public function getMmact() {
			return $this->mact;
		}
		public function getGianhap() {
			return $this->gianhap;
		}

		public function getSoluong() {
			return $this->soluong;
		}

		public function getTongtien() {
			return $this->tongtien;
		}
	}
?>