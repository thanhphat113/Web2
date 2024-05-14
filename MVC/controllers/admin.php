<?php
	class admin extends Controller{
		private $hoaDonModel;

		private $sanpham_detailModel;
		private $phieunhapModel;
		private $nhacungcapModel;

		public function __construct(){
			$this->hoaDonModel = $this->model("M_hoadon");
			$this->phieunhapModel = $this->model("M_phieunhap");
			$this->nhacungcapModel = $this->model("M_nhacungcap");
			$this->sanpham_detailModel = $this->model("M_sanpham_detail");
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
		
		function themPN() {
			// Kiểm tra xem yêu cầu có phải là yêu cầu POST không
			if ($_SERVER["REQUEST_METHOD"] === "POST") {
				// Lấy dữ liệu JSON được gửi từ trình duyệt
				$json_data = file_get_contents("php://input");

				// Giải mã dữ liệu JSON thành mảng PHP
				$data = json_decode($json_data, true);

				// Kiểm tra xem dữ liệu đã được giải mã thành công hay không
				if ($data !== null) {
					// Dữ liệu có sẵn trong mảng $data, bạn có thể thực hiện các thao tác xử lý dữ liệu ở đây
					// Ví dụ:
					foreach ($data as $item) {
						$maPhieuNhap = $item["maPhieuNhap"];
						$soLuong = $item["soLuong"];
						$donGia = $item["donGia"];
						$thanhTien = $item["thanhTien"];
						
						// $ctt_pn = new E_phieunhap($maPhieuNhap,);
					}
				} else {
					echo "data rỗng";
				}
			} else {
				echo "lỗi nặng";
			}

		}
		function phieunhap() {
			$mess = null;
			$masp = null;
			$mancc = null;

			if (isset($_POST["ncc"]) && $_POST["type"] != 0) {
				$mancc = $_POST["ncc"];
			}

			$openModel = True;
			if (isset($_POST["type"]) && $_POST["type"] == "delete") {
				$mapn = $_POST["mapn"];
				$mess = $this->phieunhapModel->delete($mapn);
			}
			if (isset($_POST["selectedValue"])) {
				$masp= $_POST["selectedValue"];
			}else{
				$openModel = False;
			}
			$color_list = $this->sanpham_detailModel->getMauListById($masp);
			$detail = $this->sanpham_detailModel->getNameList();
			$ncc_list = $this->nhacungcapModel->findAll();
			$pn_list = $this->phieunhapModel->findAll();
			$mapn = $this->phieunhapModel->newMaPN() ;
			$this->view('admin_page',$data = [
				"Page" => 'phieunhap',
				"mess" => $mess,
				"openModel" => $openModel,
				"mapn" => $mapn,
				"mancc" => $mancc,
				"masp_selected" => $masp,
				"color_list" => $color_list,
				"detail_name_list" => $detail,
				"ncc_list" => $ncc_list,
				"pn_list" => $pn_list]);
		}


	}	
?>