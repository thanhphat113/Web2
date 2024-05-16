<?php
	class loaisanpham{
		private $madm;
		private $maloai;
		private $tenloai;

		public function __construct($madm,$maloai,$tenloai){
			$this->madm=$madm;
			$this->maloai=$maloai;
			$this->tenloai=$tenloai;
		}

		public function getMadm(){
			return $this->madm;
		}
	
		public function setMadm($madm){
			$this->madm = $madm;
		}
		public function getMaloai(){
			return $this->maloai;
		}
	
		public function setMaloai($maloai){
			$this->maloai = $maloai;
		}

		public function getTenloai(){
			return $this->tenloai;
		}
	
		public function setTenloai($tenloai){
			$this->tenloai = $tenloai;
		}
	}
?>