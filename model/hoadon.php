<?php
class hoadon{
	private $mahd;
	private $manv;
	private $nhanvien;
	private $makh;
	private $khachhang;
	private $makm;
	private $ngaytao;
	private $tongtien;

	public function __construct($mahd,$manv,$makh,$makm,$ngaytao,$tongtien){
		$this->mahd=$mahd;
		$this->manv=$manv;
		$this->makh=$makh;
		$this->makm=$makm;
		$this->ngaytao=$ngaytao;
		$this->tongtien=$tongtien;
	}

	public function getMahd(){
		return $this->mahd;
	}

	public function setMahd($mahd){
		$this->mahd = $mahd;
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