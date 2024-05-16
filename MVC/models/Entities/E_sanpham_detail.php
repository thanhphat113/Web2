<?php
class E_sanpham_detail {
	private $masp;

	private $m_sp;
	private $sanpham;
	private $mact;
	private $mau;
	private $hinhanh;

	private $mota;

	public function __construct($masp, $mact, $mau, $hinhanh, $mota) {
		$this->m_sp =  new M_sanpham() ;
		$this->masp = $masp;
		$this->sanpham = $this->m_sp->findById($masp);
		$this->mact = $mact;
		$this->mau = $mau;
		$this->hinhanh = $hinhanh;
		$this->mota = $mota;
	}

	public function get_masp() {
		return $this->masp;
	}

	public function get_sanpham() {
		return $this->sanpham;
	}

	public function get_mact() {
		return $this->mact;
	}

	public function get_mau() {
		return $this->mau;
	}

	public function get_hinhanh() {
		return $this->hinhanh;
	}

	public function get_mota() {
		return $this->mota;
	}
}	
?>