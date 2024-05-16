<?php

class Login extends Controller{

    public $TaikhoanModel;


    public function __construct()
    {
        if(isset($_SESSION['username'])) {
            header("Location: ".BASE_URL ."Home");
            exit(); // Dừng việc thực thi kịch bản tiếp theo sau lệnh header
        }
        $this->TaikhoanModel = $this->models("TaikhoanModel");

    }

    public function Login(){
        $usernameInCookies ="";
        $passwordInCookies ="";
        if(isset($_COOKIE["username"]) && $_COOKIE["password"]){
            $usernameInCookies = $_COOKIE["username"];
            $passwordInCookies = $_COOKIE["password"];
        }
        $this->view("Customer/Login", [
            "usernameInCookies"=>$usernameInCookies,
            "passwordInCookies"=>$passwordInCookies,
        ]);
        // checkCookies
        
    }

    public function xuly(){
        if (isset($_POST['login'])){
            // Lấy thông tin đăng nhập từ form
            $username = $_POST['username'];
            $password = $_POST['password'];
            $result = $this->TaikhoanModel->getTaikhoanbyUsername($username);
            if ($result->num_rows > 0) {
                //lấy mật khẩu mã hóa trong database
                $rowMatk = $result->fetch_assoc();
                $PassInDB = $rowMatk['Password'];
                $Role = $rowMatk['MaQuyen'];
                $Status = $rowMatk ['TrangThai'];
                $Matk = $rowMatk['MaTK'];
        //         //Kiểm tra trạng thái tài khoản nếu mở
                if($Status == 1){
                    //kiểm tra mật khẩu nếu đúng
                    // if(password_verify($password, $PassInDB)){ 
                    if($password == $PassInDB){   
                        // Kiểm tra xem người dùng đã chọn "Remember password" hay không
                        if (isset($_POST["remember"])) {
                            // Lưu mật khẩu vào cookie, thời gian sống là 30 ngày
                            setcookie("username", $username, time() + (30 * 24 * 60 * 60));
                            setcookie("password", $password, time() + (30 * 24 * 60 * 60));
                        } else {
                            // Xóa cookie nếu người dùng không chọn "Remember password"
                            setcookie("username", "", time() - 3600);
                            setcookie("password", "", time() - 3600);
                        }       
                        // Lưu tên đăng nhập và vai trò vào session
                        $message = "Đăng nhập thành công.";
                        $_SESSION['username'] = $username;
                        $_SESSION['role'] = $Role;
                        $_SESSION['Matk'] = $Matk;

                        // Chuyển hướng đến trang dựa theo role
                        if(['role'] == 2){
                            header("Location: ".BASE_URL ."Home");
                        }else if(['role'] == 1){
                            header("Location: ".BASE_URL ."admin");
                        }else{
                            header("Location: ".BASE_URL ."admin");
                        }

                    }else{
                        // Đăng nhập không thành công, gửi thông báo lỗi
                        $error = "Mật khẩu không chính xác.";
                        $this->view("Customer/Login", [
                            "erorr"=>$error

                        ]);
                    }
                }else{
                    // Đăng nhập không thành công, gửi thông báo tài khoản bị khóa
                    $error = "Tài khoản bị khóa!";
                    $this->view("Customer/Login", [
                        "erorr"=>$error

                    
                    ]);
                }
            } else {
                // Đăng nhập không thành công, gửi thông báo lỗi
                $error = "Tên đăng nhập không tồn tại.";
                $this->view("Customer/Login", [
                    "erorr"=>$error

                ]);
            }
        }else{
            header("Location: ".BASE_URL ."login");
            exit(); // Dừng việc thực thi kịch bản tiếp theo sau lệnh header
        }
    }


}

?>