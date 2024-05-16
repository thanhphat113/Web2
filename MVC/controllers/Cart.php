<?php 
class Cart extends Controller{
    public $MaTk;
    public $CartModel;
    public $ChitietSanpham_GiaModel;
    public $ChitietSanphamModel;
    public $SanphamModel;
    function __construct() {
        // if(!isset($_SESSION['MaTK'])){
        //     header("Location: ".BASE_URL ."Home");
        //     exit(); // Dừng việc thực thi kịch bản tiếp theo sau lệnh header
        // }
        $this->MaTk = $_SESSION['Matk'];
        $this->CartModel = $this->models("CartModel");
        $this->ChitietSanpham_GiaModel = $this->models("ChitietSanpham_GiaModel");
        $this->ChitietSanphamModel = $this->models("ChitietSanphamModel");
        $this->SanphamModel = $this->models("SanphamModel");

    }

    public function Cart(){
        $thongtincart = $this->CartModel->getCartById($this->MaTk);
        $ListCart = array();
        while ($row = mysqli_fetch_assoc($thongtincart)) {
            $MaCH = $row['MaCH'];
            $ThongtinGiaCa=mysqli_fetch_assoc($this->ChitietSanpham_GiaModel->getCTSPByMaCH($MaCH));
            $CauHinh = $ThongtinGiaCa['CauHinh'];
            $MaCT = $ThongtinGiaCa['MaCT'];
            $ThongtinChiTiet = mysqli_fetch_assoc($this->ChitietSanphamModel->getCTSPByMaCT($MaCT));
            $Mau = $ThongtinChiTiet['Mau'];
            $Hinhanh = $ThongtinChiTiet['HinhAnh'];
            $MaSp = $ThongtinChiTiet['MaSP'];
            $ThongtinSanpham =$this->SanphamModel->getProductById($MaSp);
            $TenSP = $ThongtinSanpham['TenSP'];
            // Thêm các thông tin vào mảng ListCart
            $row['Mau'] = $Mau;
            $row['CauHinh'] = $CauHinh;
            $row['TenSP'] = $TenSP;
            $row['Hinhanh'] = $Hinhanh;
            $ListCart[] = $row;
            }

        $this->view("Customer/Cart", [
            "thongtincart" => $ListCart
        ]);


    }
}

?>