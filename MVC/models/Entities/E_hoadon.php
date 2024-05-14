	<?php
	class hoadon{
	
		private $khCTL;
		private $nvCTL;
		private $mahd;
		private $manv;
		private $nhanvien = null;
		private $makh;
		private $khachhang = null;
		private $makm;
		private $ngaytao;
		private $tongtien;
		private $trangthai;


		public function __construct($mahd,$manv,$makh,$makm,$ngaytao,$tongtien,$trangthai){
			// $this->khCTL = new khachhangCTL();
			$this->nvCTL = new M_nhanvien();
			$this->mahd=$mahd;
			$this->manv=$manv;
			$this->nhanvien= $this->nvCTL->findById($manv);
			$this->makh=$makh;
			// $this->khachhang = $this->khCTL->findById($makh);
			$this->makm=$makm;
			$this->ngaytao=$ngaytao;
			$this->tongtien=$tongtien;
			$this->trangthai=$trangthai;
		}

		public function getMahd(){
			return $this->mahd;
		}

		public function setMahd($mahd){
			$this->mahd = $mahd;
		}

		public function getTrangthai(){
			return $this->trangthai;
		}

		public function setTrangthai($trangthai){
			$this->trangthai = $trangthai;
		}



		public function getManv(){
			return $this->manv;
		}

		public function setManv($manv){
			$this->manv = $manv;
		}

		public function getMakh(){
			return $this->makh;
		}

		public function setMakh($makh){
			$this->makh = $makh;
		}

		public function getKh(){
			return $this->khachhang;
		}

		public function getNv(){
			return $this->nhanvien;
		}

		public function getMakm(){
			return $this->makm;
		}

		public function setMakm($makm){
			$this->makm = $makm;
		}

		public function getNgaytao(){
			return $this->ngaytao;
		}

		public function setNgaytao($ngaytao){
			$this->ngaytao = $ngaytao;
		}

		public function getTongtien(){
			return $this->tongtien;
		}

		public function setTongtien($tongtien){
			$this->tongtien = $tongtien;
		}
	}
	?>