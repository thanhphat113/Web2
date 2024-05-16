<?php
	class giabansanpham{
		private $mact;
		private $mach;
		private $cauhinh;
		private $soluong;
		private $dongia;

		public function __construct($mact,$mach,$cauhinh,$soluong,$dongia){
			$this->mact=$mact;
			$this->mach=$mach;
			$this->cauhinh=$cauhinh;
			$this->soluong=$soluong;
			$this->dongia=$dongia;
		}

		public function getMact(){
			return $this->mact;
		}
	
		public function setMact($mact){
			$this->mact = $mact;
		}
		public function getMach(){
			return $this->mach;
		}
	
		public function setMach($mach){
			$this->mach = $mach;
		}

		public function getSoluong(){
			return $this->soluong;
		}
	
		public function setSoluong($soluong){
			$this->soluong = $soluong;
		}

		public function getDongia(){
			return $this->dongia;
		}
	
		public function setDongia($dongia){
			$this->dongia = $dongia;
		}

		public function getCauhinh(){
			return $this->cauhinh;
		}
	
		public function setCauhinh($cauhinh){
			$this->cauhinh = $cauhinh;
		}
	}
?>