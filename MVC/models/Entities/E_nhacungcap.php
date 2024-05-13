<?php
class E_nhacungcap{
	private $mancc;
	private $tenncc;
	private $email;
	private $sdt;

	public function __construct($mancc,$tenncc,$email,$sdt){
		$this->mancc = $mancc;
		$this->tenncc = $tenncc;
		$this->email = $email;
		$this->sdt = $sdt;
	}

	public function getMancc(){
		return $this->mancc;
	}

	public function gettenncc(){
		return $this->tenncc;
	}

	public function getEmail(){
		return $this->email;
	}

	public function getSdt(){
		return $this->sdt;
	}

	public function setMancc($mancc){
		$this->mancc = $mancc;
	}

	public function settenncc($tenncc){
		$this->tenncc = $tenncc;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function setSdt($sdt){
		$this->sdt = $sdt;
	}
}
?>