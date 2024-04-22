<?php
	class khachhang{
		private $makh;
		private $tenkh;
		private $email;
		private $sdt;
		private $matk;

		public function __construct($makh,$tenkh,$email,$sdt,$matk){
			$this->makh=$makh;
			$this->tenkh=$tenkh;
			$this->email=$email;
			$this->sdt=$sdt;
			$this->matk=$matk;
		}

		public function getMakh(){
			return $this->makh;
		}
	
		public function setMakh($makh){
			$this->makh = $makh;
		}

		public function getTenkh(){
			return $this->tenkh;
		}
	
		public function setTenkh($tenkh){
			$this->tenkh = $tenkh;
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