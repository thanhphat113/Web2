<?php

	class E_hoadon_detail{
		private $mahd;
		private $mach;
		private $soluong;
		private $tongtien;

		public function __construct($mahd,$mach,$soluong,$tongtien){
			$this->mahd = $mahd;
			$this->mach = $mach;
			$this->soluong = $soluong;
			$this->tongtien = $tongtien;
		}
		public function getMahd(){
			return $this->mahd;
		}

		public function getMach(){
			return $this->mach;
		}

		public function getSoluong(){
			return $this->soluong;
		}

		public function getTongtien(){
			return $this->tongtien;
		}
	}
?>