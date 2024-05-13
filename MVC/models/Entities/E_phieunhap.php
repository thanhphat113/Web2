<?php
class E_phieunhap{
	private $mapn;
	private $mancc;
	private $ngaytao;
	private $tongtien;

	public function __construct($mapn,$mancc,$ngaytao,$tongtien){
		$this->mapn = $mapn;
		$this->mancc = $mancc;
		$this->ngaytao = $ngaytao;
		$this->tongtien = $tongtien;
	}

	public function getMapn(){
		return $this->mapn;
	}

	public function setMapn($pn){
		$this->mapn = $pn;
	}

	public function getMancc(){
		return $this->mancc;
	}

	public function setMancc($ncc){
		$this->mancc = $ncc;
	}
	
	public function getTongtien(){
		return $this->tongtien;
	}

	public function setTongtien($tt){
		$this->tongtien = $tt;
	}
	public function getNgayTao(){
		return $this->ngaytao;
	}

	public function setNgayTao($ngaytao){
		$this->ngaytao = $ngaytao;
	}
	
}
?>