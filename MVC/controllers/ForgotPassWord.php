<?php
class ForgotPassWord extends Controller{
    public $TaikhoanModel;
    public $KhachhangModel;

    public function __construct(){
        if(isset($_SESSION['username'])) {
            header("Location: ".BASE_URL ."Home");
            exit(); // Dừng việc thực thi kịch bản tiếp theo sau lệnh header
        }
        $this->TaikhoanModel = $this->models("TaikhoanModel");
        $this->KhachhangModel = $this->models("KhachhangModel");
    }

    public function ForgotPassword(){
        $this->view("Customer/ForgotPassword", [
            
        ]);
    }

    public function sentOTPtoGmail(){
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn-otp'])) {
            $username = $_POST['username'];
            $PhoneOrGmail = $_POST['gmail-or-phone'];
    
            // Truy vấn SQL để kiểm tra thông tin đăng nhập
            $result = $this->TaikhoanModel->getTaikhoanbyUsername($username);
            if ($result->num_rows > 0) {
                $rowMatk = $result->fetch_assoc();
                $MaTK = $rowMatk['MaTK'];
                $resultt = $this->KhachhangModel->getKhachhangbyMaTK($MaTK);
                $rowKhachHang = $resultt->fetch_assoc();
                $email = $rowKhachHang['Email'];
                $username = $rowMatk['Username'];
                $OTP = rand(100000, 999999);
                if($PhoneOrGmail == $email){
                    // Gửi email chứa mã OTP
                    sentOTPtoGmail($email, $OTP);
                    $_SESSION['OTP-Email'] = array($OTP, $email, $username);
                    http_response_code(200);
                    echo json_encode(array("success" => true, "message" => "Xử lý thành công"));
                    exit;
                } else {
                    // Xử lý thất bại
                    http_response_code(200);
                    echo json_encode(array("success" => false, "message" => "Số điện thoại hoặc gmail không hợp lệ"));
                    exit;
                }
            } else {
                http_response_code(200);
                echo json_encode(array("success" => false, "message" => "Tên đăng nhập không tồn tại"));
                exit;
            }
        }else{
            header("Location: ".BASE_URL ."ForgotPassword");
            exit(); // Dừng việc thực thi kịch bản tiếp theo sau lệnh header
        }
    }
    

    public function ConfirmOTP(){
        if (isset($_POST['Comfirm-otp'])) {
            $Otp = $_POST['otp'];
            $emailorPhone = $_POST['gmail-or-phone'];
            $username = $_POST['username'];
            if($_SESSION['OTP-Email'][0] == $Otp && $_SESSION['OTP-Email'][1] == $emailorPhone && $_SESSION['OTP-Email'][2] == $username) {
                header("Location: ".BASE_URL ."ResetPassword");
                exit();
            }else{
                $errorMessage = "Mã OTP không chính xác.";
                $this->view("Customer/ForgotPassword", [
                    "errorMessage" => $errorMessage
                ]);
            }
        }else{
            header("Location: ".BASE_URL ."ForgotPassword");
            exit(); // Dừng việc thực thi kịch bản tiếp theo sau lệnh header
        }
    }
}

?>