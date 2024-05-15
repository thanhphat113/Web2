<?php
class Register extends Controller{

    public $TaikhoanModel;
    public $KhachhangModel;
    public $messageError;

    public function __construct(){
        if(isset($_SESSION['username'])) {
            header("Location: ".BASE_URL ."Home");
            exit(); // Dừng việc thực thi kịch bản tiếp theo sau lệnh header
        }
        $this->TaikhoanModel = $this->models("TaikhoanModel");
        $this->KhachhangModel = $this->models("KhachhangModel");

    }

    public function Register(){
        $this->view("Customer/Register", [

        ]);
    }

    public function xuly(){
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
            // Lấy thông tin đăng ký từ form
            $username = $_POST['username'];
            $password = $_POST['password'];
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $check_result = $this->TaikhoanModel->getTaikhoanbyUsername($username);
        
            if ($check_result->num_rows > 0) {
                // Tên người dùng đã tồn tại, gửi thông báo lỗi
                $error = "Tên đăng nhập đã được sử dụng. Vui lòng chọn một tên đăng nhập khác.";
                echo "<script>alert('$error');</script>";
                $this->view("Customer/Register", [

                ]);
            } else {
                // Lấy mã tài khoản lớn nhất + 1
                $resultMatk =  $this->TaikhoanModel->getMaxMaTK();
                $rowMatk = $resultMatk->fetch_assoc();
                $IdUserNew = $rowMatk['MaTK'] + 1;
                //thêm tài khoản
                $check_insertTK = $this->TaikhoanModel->registerTaiKhoanCustomer($IdUserNew, $username, $hashedPassword);
        
                // Lấy mã khách hàng lớn nhất + 1
                $resultCustomer = $this->KhachhangModel->getMaxMaKH();
                $rowCustomer = $resultCustomer->fetch_assoc(); 
                $IdCustomerMax  = $rowCustomer['MaKH'];
                // Tách lấy phần số từ chuỗi
                $number  = intval(substr($IdCustomerMax , 2));
                // Tăng giá trị số lên 1
                $number++;
        
                // Định dạng lại chuỗi mã KH với số mới
                $IdCustomerNew = "KH" . str_pad($number, 3, '0', STR_PAD_LEFT);
                //Thêm khách hàng sau khi đăng ký
                $check_insertKH = $this->KhachhangModel->insertKH($IdCustomerNew, $fullname, $email, $phone, $IdUserNew);

                if ($check_insertTK && $check_insertKH) {
                    // Đăng ký thành công, chuyển hướng đến trang đăng nhập
                    echo "<script>alert('Đăng ký thành công');</script>";
                    header("Location: ".BASE_URL ."login");
                    exit; 
                } else {
                    // Đăng ký không thành công, gửi thông báo lỗi
                    $error = "Đã xảy ra lỗi. Vui lòng thử lại sau.";
                    echo "<script>alert('$error');</script>";
                }
            }
        }else{
            header("Location: ".BASE_URL ."Register");
            exit(); // Dừng việc thực thi kịch bản tiếp theo sau lệnh header
        }
    }

}


?>
