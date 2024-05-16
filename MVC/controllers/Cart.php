<?php 
class Cart extends Controller{
    public $MaTk;
    public $CartModel;
    public $ChitietSanpham_GiaModel;
    public $ChitietSanphamModel;
    public $SanphamModel;
    public $M_hoadon;
    public $KhachhangModel;
    public $HoaDonDetailModel;
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
        $this->M_hoadon = $this->models("M_hoadon");
        $this->KhachhangModel = $this->models("KhachhangModel");
        $this->HoaDonDetailModel = $this->models("HoaDonDetailModel");

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

    public function buyproduct($id){
        // Fetch price and configuration details of the product by shop ID
        $ThongtinGiaCa = mysqli_fetch_assoc($this->ChitietSanpham_GiaModel->getCTSPByMaCH($id));
        $ListCart = array(); // Initialize the ListCart array

        if ($ThongtinGiaCa) {
            // Extract configuration and product detail ID
            $CauHinh = $ThongtinGiaCa['CauHinh'];
            $MaCT = $ThongtinGiaCa['MaCT'];
            $Gia = $ThongtinGiaCa['DonGia'];

            // Fetch detailed information using the product detail ID
            $ThongtinChiTiet = mysqli_fetch_assoc($this->ChitietSanphamModel->getCTSPByMaCT($MaCT));
            
            if ($ThongtinChiTiet) {
                // Extract specific details
                $Mau = $ThongtinChiTiet['Mau'];
                $Hinhanh = $ThongtinChiTiet['HinhAnh'];
                $MaSp = $ThongtinChiTiet['MaSP'];

                // Fetch product information using the product ID
                $ThongtinSanpham = $this->SanphamModel->getProductById($MaSp);
                
                if ($ThongtinSanpham) {
                    $TiLeKhuyenMai = $this->SanphamModel->getTiLeKMByID($ThongtinSanpham["MaKM"]);

                    // Extract product name
                    $TenSP = $ThongtinSanpham['TenSP'];

                    // Add information to the cart array
                    $row['Mau'] = $Mau;
                    $row['CauHinh'] = $CauHinh;
                    $row['TenSP'] = $TenSP;
                    $row['Hinhanh'] = $Hinhanh;
                    $row['tileKM'] = $TiLeKhuyenMai;
                    $row['gia'] = $Gia;
                    $row['CH'] = $id;
                    $ListCart[] = $row;
                }
            }
        }

        // Pass the data to the view
        $this->view("Customer/Cart", [
                "thongtincart" => $ListCart
        ]);

    }

    public function xuly($id, $total){
        $IdHDnew = $this->M_hoadon->newMaHD();
        
        $currentDate = date("Y-m-d"); // Format: YYYY-MM-DD
        $Ngaytao = $currentDate;
        $MaKH = mysqli_fetch_assoc($this->KhachhangModel->getKhachhangbyMaTK($this->MaTk))['MaKH'];
        $check_insert = $this->M_hoadon->insertHD($IdHDnew, $MaKH,  $total);
        $check_insertCT = $this->HoaDonDetailModel->insertCTHD($IdHDnew, $id, 1, $total);
        if($check_insert && $check_insertCT){
            header("Location: ".BASE_URL ."Home");
            exit;
        }else{
            echo "<script>alert('".$MaKH."');</script>";
        }
        

    }
}

?>