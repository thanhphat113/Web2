<?php
class E_phieunhap{
	private $nccModel;
	private $mapn;
	private $mancc;

	private $ncc;
	private $ngaytao;
	private $tongtien;

	public function __construct($mapn,$mancc,$ngaytao,$tongtien){
		$this->nccModel = new M_nhacungcap();
		$this->ncc = $this->nccModel->findById($mancc);
		$this->mapn = $mapn;
		$this->mancc = $mancc;
		$this->ngaytao = $ngaytao;
		$this->tongtien = $tongtien;
	}

	public function getMapn(){
		return $this->mapn;
	}

	public function getNcc(){
		return $this->ncc;
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