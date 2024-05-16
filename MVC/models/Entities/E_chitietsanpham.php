<?php
	class chitietsanpham{
		private $masp;
		private $mact;
		private $mau;
		private $hinhanh;
		private $mota;

		public function __construct($masp,$mact,$mau,$hinhanh,$mota){
			$this->masp=$masp;
			$this->mact=$mact;
			$this->mau=$mau;
			$this->hinhanh=$hinhanh;
			$this->mota=$mota;
		}

		public function getMasp(){
			return $this->masp;
		}
	
		public function setMasp($masp){
			$this->masp = $masp;
		}
		public function getMact(){
			return $this->mact;
		}
	
		public function setMact($mact){
			$this->mact = $mact;
		}

		public function getMau(){
			return $this->mau;
		}
	
		public function setMau($mau){
			$this->mau = $mau;
		}

		public function getHinhanh(){
			return $this->hinhanh;
		}
	
		public function setHinhanh($hinhanh){
			$this->hinhanh = $hinhanh;
		}

		public function getMota(){
			return $this->mota;
		}
	
		public function setMota($mota){
			$this->mota = $mota;
		}
	}
?>