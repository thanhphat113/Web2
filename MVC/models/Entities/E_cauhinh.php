<?php
class E_cauhinh{
	private $ct ;
	private $chitiet;
	private $mact;
	private $mach;
	private $cauhinh;

	private $soluong;
	private $dongia;

	public function __construct($mact, $mach, $cauhinh, $soluong, $dongia){
		$this->ct = new M_sanpham_detail();
		$this->chitiet = $this->ct->findById($mact);
		$this->mact = $mact;
		$this->mach = $mach;
		$this->cauhinh = $cauhinh;
		$this->soluong = $soluong;
		$this->dongia = $dongia;
	}

	public function get_mact(){
		return $this->mact;
	}

	public function get_chitiet(){
		return $this->chitiet;
	}
	public function get_mach(){
		return $this->mach;
	}

	public function get_cauhinh(){
		return $this->cauhinh;
	}

	public function get_soluong(){
		return $this->soluong;
	}
	public function get_dongia(){
		return $this->dongia;
	}
}
?>