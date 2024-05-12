<?php
	class admin extends Controller{
		function showPage($page) {
			$oop = $this->model("M_hoadon");
			$hoadon_list = $oop -> findAll();

			$this->view('admin_page',$data = [
				"Page" => $page,
				"hoadon_list" => $hoadon_list]);
		}
	}
?>