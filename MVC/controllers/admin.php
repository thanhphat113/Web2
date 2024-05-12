<?php
	class admin extends Controller{
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
	}
?>