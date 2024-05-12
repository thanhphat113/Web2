<?php
	class nhanvien{
		private $manv;
		private $tennv;
		private $gtnv;
		private $nsnv;
		private $dcnv;
		private $email;
		private $sdt;
		private $matk;

		public function __construct($manv,$tennv,$email,$sdt,$matk,$gtnv,$nsnv,$dcnv){
			$this->manv=$manv;
			$this->tennv=$tennv;
			$this->email=$email;
			$this->sdt=$sdt;
			$this->matk=$matk;
			$this->gtnv=$gtnv;
			$this->nsnv=$nsnv;
			$this->dcnv=$dcnv;
		}

		public function getGtnv(){
			return $this->gtnv;
		}
	
		public function setGtnv($gtnv){
			$this->gtnv = $gtnv;
		}
		public function getNsnv(){
			return $this->nsnv;
		}
	
		public function setNsnv($nsnv){
			$this->nsnv = $nsnv;
		}

		public function getDcnv(){
			return $this->dcnv;
		}
	
		public function setDcnv($dcnv){
			$this->dcnv = $dcnv;
		}

		public function getManv(){
			return $this->manv;
		}
	
		public function setManv($manv){
			$this->manv = $manv;
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