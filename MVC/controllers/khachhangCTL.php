<?php
	class khachhangCTL extends Controller{
		public $khachhangModel ;

		function __construct(){
			$this->khachhangModel=$this->model("M_khachhang");
		}

		function showTable() {
			$result_mess = "";
			$oop = $this->model("M_khachhang");
			$khachhang_list = $oop -> showAll();
			$newid = $oop->newMaKH();

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
				$khachhang_list = $oop -> showAll();
			}

			$this->view('admin_page',$data = [
				"Page" => 'khachhangView',
				"result"=>$result_mess,
				"newid"=>$newid,
				"khachhang_list" => $khachhang_list]);
		}
	}
?>