<?php
class ResetPassword extends Controller{
    public $TaikhoanModel;

    public function __construct(){
        if(!isset($_SESSION['OTP-Email'])) {
            header("Location: ".BASE_URL ."ForgotPassword");
            exit(); // Dừng việc thực thi kịch bản tiếp theo sau lệnh header
        }
        $this->TaikhoanModel = $this->models("TaikhoanModel");

    }

    public function ResetPassword(){
        $this->view("Customer/ResetPassword", [

        ]);
    }

    public function valiablePassword(){
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reset_password'])) {
            $newpassword = $_POST['new-password'];
            $hashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);
            $this->TaikhoanModel->UpdatePassByUsername($_SESSION['OTP-Email'][2],$newpassword);
            // Xóa tất cả các biến phiên
            session_unset();
            // Hủy bỏ phiên làm việc
            session_destroy();
            // Chuyển hướng người dùng về trang đăng nhập
            header("Location: ".BASE_URL ."login");
            exit(); // Dừng việc thực thi kịch bản tiếp theo sau lệnh header
    
        }else{
            header("Location: ".BASE_URL ."ForgotPassword");
            exit(); // Dừng việc thực thi kịch bản tiếp theo sau lệnh header
        }
    }
}

?>