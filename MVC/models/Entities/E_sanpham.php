<?php
class E_sanpham{
	private $masp;
	private $maloai;
	private $tensp;
	private $baohanh;
	private $trangthai;
	private $makm;

	public function __construct($masp, $maloai, $tensp, $baohanh, $trangthai, $makm){
		$this->masp = $masp;
		$this->maloai = $maloai;
		$this->tensp = $tensp;
		$this->baohanh = $baohanh;
		$this->trangthai = $trangthai;
		$this->makm = $makm;
	}

	public function get_masp(){
		return $this->masp;
	}

	public function get_maloai(){
		return $this->maloai;
	}

	public function get_tensp(){
		return $this->tensp;
	}

	public function get_baohanh(){
		return $this->baohanh;
	}

	public function get_trangthai(){
		return $this->trangthai;
	}

	public function get_makm(){
		return $this->makm;
	}
}
?>