<?php
	class admin extends Controller{
		private $hoaDonModel;

		private $phieunhap_detailModel;

		private $sanpham_detailModel;
		private $phieunhapModel;
		private $nhacungcapModel;

		public function __construct(){
			$this->phieunhap_detailModel = $this->model("M_phieunhap_detail");
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
		
		public function loadColor() {
			// Kiểm tra phương thức request và dữ liệu JSON được gửi
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				// Lấy nội dung của request body
				$request_body = file_get_contents('php://input');
				// Parse JSON để lấy dữ liệu
				$data = json_decode($request_body, true);
	
				if (json_last_error() === JSON_ERROR_NONE && isset($data["selected"])) {
					$selectedValue = $data["selected"];
	
					// Giả sử bạn có phương thức để lấy danh sách màu sắc
					$color_list = $this->sanpham_detailModel->getMauListById($selectedValue);
					$responseData = array();
					if ($color_list == null) echo json_encode($responseData);
					else{
						// Xử lý giá trị và trả về danh sách tùy chọn cho combobox 2
						
						foreach ($color_list as $color) {
							$color_option = array(
								"value" => $color["MaCT"], // Thay "MaCT" bằng tên cột chứa giá trị
								"text" => $color["Mau"]    // Thay "Mau" bằng tên cột chứa văn bản hiển thị
							);
							array_push($responseData, $color_option);
						}
		
						// Đặt header để chỉ ra rằng đây là một response JSON
						header('Content-Type: application/json');
						echo json_encode($responseData);
						exit; // Dừng script PHP sau khi gửi kết quả JSON
					}
				} else {
					// Trả về lỗi nếu JSON không hợp lệ hoặc thiếu dữ liệu
					header('Content-Type: application/json');
					echo json_encode(array("status" => "error", "message" => "Invalid JSON or missing data"));
					exit;
				}
			} else {
				// Trả về lỗi nếu không phải là phương thức POST
				header('Content-Type: application/json');
				echo json_encode(array("status" => "error", "message" => "Invalid request method"));
				exit;
			}
		}
		function themPN() {
			// Kiểm tra xem yêu cầu có phải là yêu cầu POST không
			if ($_SERVER["REQUEST_METHOD"] === "POST") {
				// Lấy dữ liệu JSON được gửi từ trình duyệt
				$json_data = file_get_contents("php://input");

				// Giải mã dữ liệu JSON thành mảng PHP
				$data = json_decode($json_data, true);

				// Kiểm tra xem dữ liệu đã được giải mã thành công hay không
				if (json_last_error() === JSON_ERROR_NONE) {
					
					$phieunhap= $data["pn"];
					$chitiet = $data["ct"];

					$result = $this->phieunhapModel->insert($phieunhap["mapn"],$phieunhap["mancc"],$chitiet);
					$mapn = $this->phieunhapModel->newMaPN();
					echo json_encode(array("mapn"=> $mapn,"mess" => $result));
				} else {
					echo json_encode(array("mapn"=> null,"mess" =>"Invalid JSON or missing data"));
				}
			} else {
				echo json_encode(array("mapn"=> null,"mess" =>"Invalid request method"));
			}
		}

		function loadDetail(){
			if ($_SERVER["REQUEST_METHOD"] === "POST") {
				// Lấy dữ liệu JSON được gửi từ trình duyệt
				$json_data = file_get_contents("php://input");

				// Giải mã dữ liệu JSON thành mảng PHP
				$data = json_decode($json_data, true);

				

				// Kiểm tra xem dữ liệu đã được giải mã thành công hay không
				if (json_last_error() === JSON_ERROR_NONE && isset($data["selected"])) {
					$list = $this->phieunhap_detailModel->findById($data["selected"]);
					echo json_encode(array("list"=> $list));
				}
			}
		}


		function phieunhap() {
			$mess = null;
			$masp = null;
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
			$detail = $this->sanpham_detailModel->getNameList();
			$ncc_list = $this->nhacungcapModel->findAll();
			$pn_list = $this->phieunhapModel->findAll();
			$mapn = $this->phieunhapModel->newMaPN() ;
			$this->view('admin_page',$data = [
				"Page" => 'phieunhap',
				"mess" => $mess,
				"openModel" => $openModel,
				"mapn" => $mapn,
				"masp_selected" => $masp,
				"detail_name_list" => $detail,
				"ncc_list" => $ncc_list,
				"pn_list" => $pn_list]);
		}

	}
?>