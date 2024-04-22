<?php
	class nhanvien{
		private $manv;
		private $tennv;
		private $email;
		private $sdt;
		private $matk;

		public function __construct($manv,$tennv,$email,$sdt,$matk){
			$this->manv=$manv;
			$this->tennv=$tennv;
			$this->email=$email;
			$this->sdt=$sdt;
			$this->matk=$matk;
		}

		public function getManv(){
			return $this->makh;
		}
	
		public function setManv($makh){
			$this->manv = $makh;
		}

		public function getTennv(){
			return $this->tennv;
		}
	
		public function setTennv($tennv){
			$this->tennv = $tennv;
		}
	
		public function getEmail(){
			return $this->email;
		}
	
		public function setEmail($email){
			$this->email = $email;
		}
	
		public function getSdt(){
			return $this->sdt;
		}
	
		public function setSdt($sdt){
			$this->sdt = $sdt;
		}
	
		public function getMatk(){
			return $this->matk;
		}
	
		public function setMatk($matk){
			$this->matk = $matk;
		}
	}
?>