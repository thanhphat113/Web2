<?php
	class admin extends Controller{
		private $hoaDonModel;

		private $cauhinhModel;

		private $phieunhap_detailModel;

		private $sanpham_detailModel;
		private $phieunhapModel;
		private $nhacungcapModel;
		public $taikhoanModel;
		private $hoadon_detailModel;
		public $khachhangModel;
		public $nhanvienModel;
		public $sanphamModel;

		public function __construct(){
			$this->hoadon_detailModel = $this->model("M_hoadon_detail");
			$this->sanphamModel = $this->model("M_sanpham");
			$this->cauhinhModel = $this->model("M_cauhinh");
			$this->phieunhap_detailModel = $this->model("M_phieunhap_detail");
			$this->hoaDonModel = $this->model("M_hoadon");
			$this->phieunhapModel = $this->model("M_phieunhap");
			$this->nhacungcapModel = $this->model("M_nhacungcap");
			$this->sanpham_detailModel = $this->model("M_sanpham_detail");
			$this->taikhoanModel=$this->model("M_taikhoan");
			$this->khachhangModel=$this->model("M_khachhang");
			$this->nhanvienModel=$this->model("M_nhanvien");
			$this->sanphamModel=$this->model("M_sanpham");
		}
		


		function thongke() {
			$matk = $_SESSION['Matk'];

			$nv = $this->nhanvienModel->getNameBytk($matk);
			$donut = $this->khachhangModel->getDonutChart();
			$tk = $this->hoaDonModel->getThongKe("2024");

			$_SESSION["MaNV"] = $nv["MaNV"];
            
			$oop = $this->model("M_hoadon");
			$hoadon_list = $oop -> findAll();
			$listTopsp = $this->cauhinhModel->getListTop();
			$listTopkh = $this->khachhangModel->getListTop();
			$slSP = $this->sanphamModel->getQuantity();
			$this->view('admin_page',$data = [
				"nvien"=> $nv,
				"Page" => 'thongke',
				"sp" => $slSP,
				"kh" => $this->khachhangModel->getQuantity(),
				"nv" => $this->nhanvienModel->getQuantity(),
				"listtop" => $listTopsp,
				"listkh" => $listTopkh,
				"tk" => $tk,
				"donut" => $donut,
				"doanhthu" => $this->hoaDonModel->tongTien(),
				"hoadon_list" => $hoadon_list]);
		}


		function loadBarChart(){
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				// Lấy nội dung của request body
				$request_body = file_get_contents('php://input');
				// Parse JSON để lấy dữ liệu
				$data = json_decode($request_body, true);
				
				if (json_last_error() === JSON_ERROR_NONE && isset($data["selected"])) {
					$selectedValue = $data["selected"];
	
					// Giả sử bạn có phương thức để lấy danh sách màu sắc
					$tk = $this->hoaDonModel->getThongKe( $selectedValue );

					foreach($tk as $vl){
						$datas[$vl["thang"]] = $vl["tong_tien"];
					}
		
					$labels = [];
					$values = [];
					
					for ($i = 1; $i <= 12; $i++) {
						$labels[] = "Tháng $i";
						$values[] = isset($datas[$i]) ? $datas[$i] : 0;
					}

					
					$responData= array(
						"lb" => $labels,
						"vl" => $values
					);


					echo json_encode($responData);
					exit; // Dừng script PHP sau khi gửi kết quả JSON
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

		function loadDetailHD() {
			if ($_SERVER["REQUEST_METHOD"] === "POST") {
				// Lấy dữ liệu JSON được gửi từ trình duyệt
				$json_data = file_get_contents("php://input");

				// Giải mã dữ liệu JSON thành mảng PHP
				$data = json_decode($json_data, true);

				// Kiểm tra xem dữ liệu đã được giải mã thành công hay không
				if (json_last_error() === JSON_ERROR_NONE && isset($data["selected"])) {
					
					$list = $this->hoadon_detailModel->findById($data["selected"]);
					echo json_encode(array("list"=> $list));
				}
			}
		}

		function hoadon() {
			$mess= null;
			$oop = $this->model("M_hoadon");
			
			if (isset($_POST["type"])) {
				if(	$_POST["type"] == "update") {
					$mess = $this->hoaDonModel->updateTT($_POST["mahd"],$_POST["manv"]);
				}
				if ( $_POST["type"] == "delete") {
					$mess = $this->hoaDonModel->delete($_POST["mahd"]);
				}
			}
			$hoadon_list = $oop -> findAll();
			$this->view('admin_page',$data = [
				"Page" => 'hoadon',
				"mess" => $mess,
				"hoadon_list" => $hoadon_list]);
		}

		public function loadCH() {
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				// Lấy nội dung của request body
				$request_body = file_get_contents('php://input');
				// Parse JSON để lấy dữ liệu
				$data = json_decode($request_body, true);
				
				if (json_last_error() === JSON_ERROR_NONE && isset($data["selected"])) {
					$selectedValue = $data["selected"];
	
					// Giả sử bạn có phương thức để lấy danh sách màu sắc
					$ch_list = $this->cauhinhModel->findListById($selectedValue);
					$responseData = array();
					if ($ch_list == null) echo json_encode($responseData);
					else{
						foreach ($ch_list as $ch) {
							$ch_option = array(
								"value" => $ch["MaCH"], // Thay "MaCT" bằng tên cột chứa giá trị
								"text" => $ch["CauHinh"]    // Thay "Mau" bằng tên cột chứa văn bản hiển thị
							);
							array_push($responseData, $ch_option);
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

		function taikhoan() {
			$result_mess = "";
			$oop = $this->model("M_taikhoan");
			$taikhoan_list = $oop -> showAll();
			$newid = $oop->newMaTK();

			if(isset($_POST["search"])){
				$maquyen =	(int) $_POST['permission-acc-search'];
				$trangthai =(int) $_POST['state-acc-search'];
				$taikhoan_list = $oop -> search($maquyen,$trangthai);
			}

			else if(isset($_POST["quick_search"])){
				$search = $_POST['id-acc-search'];
				$taikhoan_list = $oop -> quick_search($search);
			}

			else if(isset($_POST["delete-acc"])){
				$matk = $_POST["delete-acc"];
				$result_mess="Đã xóa '$matk' thành công !";
				$this->taikhoanModel->delete($matk);
				$taikhoan_list = $oop -> showAll();
			}

			else if(isset($_POST["add-acc"])){
				$matk = $_POST['id-acc-input'];
				$tentk = $_POST['user-acc-input'];
				$password = $_POST['pass-acc-input'];
				$trangthai = 1;
				$maquyen = $_POST['quyen-acc-input'];
				$result_mess="Đã thêm '$matk' thành công !";
                $this->taikhoanModel->add($matk,$tentk,$password,$trangthai,$maquyen);
				$taikhoan_list = $oop -> showAll();
			}

			else if(isset($_POST["edit-acc"])){
				$matk = $_POST['id-acc-edit'];
				$tentk = $_POST['user-acc-edit'];
				$password = $_POST['pass-acc-edit'];
				$trangthai = $_POST['trangthai-acc-edit'];
				$maquyen = $_POST['quyen-acc-edit'];
				$result_mess="Đã cập nhật '$matk' thành công !";
                $this->taikhoanModel->edit($matk,$tentk,$password,$trangthai,$maquyen);
				$taikhoan_list = $oop -> showAll();
			}

			$this->view('admin_page',$data = [
				"Page" => 'taikhoanView',
				"result"=>$result_mess,
				"newid"=>$newid,
				"taikhoan_list" => $taikhoan_list]);
		}

		function khachhang() {
			$result_mess = "";
			$oop = $this->model("M_khachhang");
			$oopTK = $this->model("M_taikhoan");
			$khachhang_list = $oop -> showAll();
			$newid = $oop->newMaKH();
			$newidTK = $oopTK->newMaTK();

			if(isset($_POST["search"])){
				$diachi = $_POST['addres-cus-search'];
				$khachhang_list = $oop -> search($diachi);
			}
			else if(isset($_POST["quick_search"])){
				$search = $_POST['id-cus-search'];
				$khachhang_list = $oop -> quick_search($search);
			}

			else if(isset($_POST["delete-cus"])){
				$makh = $_POST["delete-cus"];
				$result_mess="Đã xóa '$makh' thành công !";
				$this->khachhangModel->delete($makh);
				$khachhang_list = $oop -> showAll();
			}

            else if(isset($_POST["edit-cus"])){
				$makh = $_POST["id-cus-edit"];
                $tenkh = $_POST["name-cus-edit"];
                $email = $_POST["email-cus-edit"];
                $sdt = $_POST["phone-cus-edit"];
                $matk = $_POST["idtk-cus-edit"];
                $dckh = $_POST["addres-cus-edit"];
				$result_mess="Đã cập nhật '$makh' thành công !";
				$this->khachhangModel->edit($makh,$tenkh,$email,$sdt,$matk,$dckh);
				$khachhang_list = $oop -> showAll();
			}
            else if(isset($_POST["add-cus"])){
				$makh = $_POST["id-cus-input"];
                $tenkh = $_POST["name-cus-input"];
                $email = $_POST["email-cus-input"];
                $sdt = $_POST["phone-cus-input"];
                $matk = $_POST["idtk-cus-input"];
                $dckh = $_POST["addres-cus-input"];
				$result_mess="Đã thêm '$makh' thành công !";
				$this->khachhangModel->add($makh,$tenkh,$email,$sdt,$matk,$dckh);
				$this->taikhoanModel->add($newidTK,$email,'123456Aa',1,2);
				$khachhang_list = $oop -> showAll();
			}
			

			$this->view('admin_page',$data = [
				"Page" => 'khachhangView',
				"result"=>$result_mess,
				"newid"=>$newid,
				"newidTK"=>$newidTK,
				"khachhang_list" => $khachhang_list]);
		}
		
		function nhanvien() {
			$result_mess = "";
			$oop = $this->model("M_nhanvien");
			$oopTK = $this->model("M_taikhoan");
			$nhanvien_list = $oop -> showAll();
			$newid = $oop->newMaNV();
			$newidTK = $oopTK->newMaTK();

			if(isset($_POST["search"])){
				$dcnv = $_POST['addres-epl-search'];
			    $gtnv = $_POST['gender-epl-search'];
				$nhanvien_list = $oop -> search($dcnv,$gtnv);
			}

			else if(isset($_POST["quick_search"])){
				$search = $_POST['id-epl-search'];
				$nhanvien_list = $oop -> quick_search($search);
			}

			else if(isset($_POST["delete"])){
				$manv = $_POST["delete"];
				$result_mess="Đã xóa '$manv' thành công !";
				$this->nhanvienModel->delete($manv);
				$nhanvien_list = $oop -> showAll();
			}

            else if(isset($_POST["edit"])){
				$manv = $_POST["id-epl-edit"];
				$tennv = $_POST["name-epl-edit"];
				$email = $_POST["email-epl-edit"];
				$sdt = $_POST["phone-epl-edit"];
				$matk = $_POST["idtk-epl-edit"];
				$nsnv = $_POST["birt-epl-edit"];
				$dcnv = $_POST["addres-epl-edit"];
				$gtnv = $_POST['gender'];
				$result_mess="Đã cập nhật '$manv' thành công !";
				$this->nhanvienModel->edit($manv,$tennv,$email,$sdt,$matk,$gtnv,$nsnv,$dcnv);
				$nhanvien_list = $oop -> showAll();
			}

            else if(isset($_POST["add-epl"])){
				$manv = $_POST["id-epl-input"];
				$tennv = $_POST["name-epl-input"];
				$email = $_POST["email-epl-input"];
				$sdt = $_POST["phone-epl-input"];
				$matk = $_POST["idtk-epl-input"];
				$nsnv = $_POST["birt-epl-input"];
				$dcnv = $_POST["addres-epl-input"];
				$gtnv = $_POST['gender'];
				$result_mess="Đã thêm '$manv' thành công !";
				$this->nhanvienModel->add($manv,$tennv,$email,$sdt,$matk,$gtnv,$nsnv,$dcnv);
				$this->taikhoanModel->add($newidTK,$email,'123456Aa',1,1);
				$nhanvien_list = $oop -> showAll();
			}

			$this->view('admin_page',$data = [
				"Page" => 'nhanvienView',
				"result"=>$result_mess,
				"newid"=>$newid,
				"newidTK"=>$newidTK,
				"nhanvien_list" => $nhanvien_list]);
		}

		function sanpham() {
			$result_mess = "";
			$oop = $this->model("M_sanpham");
			$sanpham_list = $oop -> showAll();
			$ctsanpham_list = $oop -> findChiTietSanPham();
			$loaisanpham_list = $oop -> findLoaiSanPham();
			$giasanpham_list = $oop -> findGiaBanSanPham();
			$newid = $oop->newMaSP();

			if(isset($_POST["search"])){
				$danhmuc = $_POST['danhmuc-pro-search'];
				if($danhmuc == 'IPhone'){
					$giasanpham_list = $oop -> findIPhone();
				}
				else if($danhmuc == 'IPad'){
					$giasanpham_list = $oop -> findIPad();
				}
				else if($danhmuc == 'Macbook'){
					$giasanpham_list = $oop -> findMacbook();
				}
			}
			if(isset($_POST["loc"])){
				$min = $_POST['min-pro-search'];
				$max = $_POST['max-pro-search'];
				$giasanpham_list = $oop -> findPrice($min,$max);
			}

			else if(isset($_POST["quick_search"])){
				$value = $_POST['id-pro-search'];
				$giasanpham_list = $oop -> quick_search($value);
			}

			else if(isset($_POST["add-pro"])){
				$matk = $_POST['id-acc-input'];
				$tentk = $_POST['user-acc-input'];
				$password = $_POST['pass-acc-input'];
				$trangthai = 1;
				$maquyen = $_POST['quyen-acc-input'];
				$result_mess="Đã thêm '$matk' thành công !";
                $this->taikhoanModel->add($matk,$tentk,$password,$trangthai,$maquyen);
				$taikhoan_list = $oop -> showAll();
			}

			else if(isset($_POST["edit-pro"])){
				$mach = $_POST["idloai-pro-edit"];
				$masp = $_POST["idsp-pro-edit"];
                $tensp = $_POST["tensp-pro-edit"];
				$baohanh = $_POST["baohanh-pro-edit"];
                $trangthai = $_POST["trangthai-pro-edit"];
                $gia = $_POST["gia-pro-edit"];
				$result_mess="Đã cập nhật '$tensp' thành công !";
				$this->sanphamModel->edit($masp,$mach,$tensp,$baohanh,$trangthai,$gia);
				$giasanpham_list = $oop -> findGiaBanSanPham();

				$sanpham_list = $oop -> showAll();
				$ctsanpham_list = $oop -> findChiTietSanPham();
				$loaisanpham_list = $oop -> findLoaiSanPham();
			}

			else if(isset($_POST["delete"])){
				$masp = $_POST["delete"];
				$result_mess="Đã xóa '$masp' thành công !";
				$this->sanphamModel->delete($masp);
				$giasanpham_list = $oop -> findGiaBanSanPham();
			}

			$this->view('admin_page',$data = [
				"Page" => 'sanphamView',
				"result"=>$result_mess,
				"newid"=>$newid,
				"loaisanpham_list" => $loaisanpham_list,
				"ctsanpham_list" => $ctsanpham_list,
				"giasanpham_list" => $giasanpham_list,
				"sanpham_list" => $sanpham_list]);
		}

	}
?>
