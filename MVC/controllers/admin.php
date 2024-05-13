<?php
	class admin extends Controller{
		private $hoaDonModel;
		private $phieunhapModel;
		private $nhacungcapModel;

		public function __construct(){
			$this->hoaDonModel = $this->model("M_hoadon");
			$this->phieunhapModel = $this->model("M_phieunhap");
			$this->nhacungcapModel = $this->model("M_nhacungcap");
		}

		function thongke() {
			$oop = $this->model("M_hoadon");
			$hoadon_list = $oop -> findAll();

			$this->view('admin_page',$data = [
				"Page" => 'thongke',
				"hoadon_list" => $hoadon_list]);
		}

		function hoadon() {
			$oop = $this->model("M_hoadon");
			$hoadon_list = $oop -> findAll();

			$this->view('admin_page',$data = [
				"Page" => 'hoadon',
				"hoadon_list" => $hoadon_list]);
		}

		function phieunhap() {
			$mess = null;
			if (isset($_POST["type"]) == "delete") {
				$mapn = $_POST["mapn"];
				$mess = $this->phieunhapModel->delete($mapn);
			}
			$ncc_list = $this->nhacungcapModel->findAll();
			$pn_list = $this->phieunhapModel->findAll();
			$this->view('admin_page',$data = [
				"Page" => 'phieunhap',
				"mess" => $mess,
				"ncc_list" => $ncc_list,
				"pn_list" => $pn_list]);
		}


	}	
?>