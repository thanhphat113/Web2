<?php
	class taikhoan{
		private $matk;
		private $tentk;
		private $password;
		private $trangthai;
		private $maquyen;

		public function __construct($matk,$tentk,$password,$trangthai,$maquyen){
			$this->matk=$matk;
			$this->tentk=$tentk;
			$this->password=$password;
			$this->trangthai=$trangthai;
			$this->maquyen=$maquyen;
		}

        public function setMatk($matk){
            $this->matk = $matk;
        }
        
        public function getMatk(){
            return $this->matk;
        }
        
        public function setTentk($tentk){
            $this->tentk = $tentk;
        }
        
        public function getTentk(){
            return $this->tentk;
        }
        
        public function setPassword($password){
            $this->password = $password;
        }
        
        public function getPassword(){
            return $this->password;
        }
        
        public function setTrangthai($trangthai){
            $this->trangthai = $trangthai;
        }
        
        public function getTrangthai(){
            return $this->trangthai;
        }
        
        public function setMaquyen($maquyen){
            $this->maquyen = $maquyen;
        }
        
        public function getMaquyen(){
            return $this->maquyen;
        }
        
	}
?>