<?php
	class E_sanpham{
		private $maloai;
		private $masp;
		private $tensp;
		private $baohanh;
		private $trangthai;
		private $makm;

		public function __construct($maloai,$masp,$tensp,$baohanh,$trangthai,$makm){
			$this->maloai=$maloai;
			$this->masp=$masp;
			$this->tensp=$tensp;
			$this->baohanh=$baohanh;
			$this->trangthai=$trangthai;
			$this->makm=$makm;
		}

		public function getMaloai(){
			return $this->maloai;
		}
	
		public function setMaloai($maloai){
			$this->maloai = $maloai;
		}
		public function getMasp(){
			return $this->masp;
		}
	
		public function setMasp($masp){
			$this->masp = $masp;
		}

		public function getTensp(){
			return $this->tensp;
		}
	
		public function setTensp($tensp){
			$this->tensp = $tensp;
		}

		public function getBaohanh(){
			return $this->baohanh;
		}
	
		public function setBaohanh($baohanh){
			$this->baohanh = $baohanh;
		}

		public function getTrangthai(){
			return $this->trangthai;
		}
	
		public function setTrangthai($trangthai){
			$this->trangthai = $trangthai;
		}
	
		public function getMakm(){
			return $this->makm;
		}
	
		public function setMakm($makm){
			$this->makm = $makm;
		}
	}
?>