<?php 
class Thongtin extends Controller{

    public $KhachhangModel;
    public $MaTk;
    public $Username;
    public $TaikhoanModel;
    public $M_hoadon;
    public $HoaDonDetailModel;
    public $ChitietSanpham_GiaModel;
    public $ChitietSanphamModel;
    public $SanphamModel;

    function __construct()
    {
        $this->MaTk = $_SESSION['Matk'];
        $this->Username = $_SESSION['username'];
        $this->KhachhangModel = $this->models("KhachhangModel");
        $this->TaikhoanModel = $this->models("TaikhoanModel");
        $this->M_hoadon = $this->models("M_hoadon");
        $this->HoaDonDetailModel = $this->models("HoaDonDetailModel");
        $this->ChitietSanpham_GiaModel = $this->models("ChitietSanpham_GiaModel");
        $this->ChitietSanphamModel = $this->models("ChitietSanphamModel");
        $this->SanphamModel = $this->models("SanphamModel");

    }
    
    public function thongtincanhan(){

        $InforKH = $this->KhachhangModel->getKhachhangbyMaTK($this->MaTk);
        $ThongtinKH = mysqli_fetch_assoc($InforKH);
        mysqli_data_seek($InforKH, 0);

        $InforTK = mysqli_fetch_assoc($this->TaikhoanModel->getTaikhoanbyUsername($this->Username));
        $this->view("Customer/thongtincanhan", [
            "Page" => "Thongtincanhan",
            "ThongtinKH" => $ThongtinKH,
            "ThongtinTK" =>$InforTK
        ]);
        
    }

    public function SaveInfor(){
        
    }

    public function lichsudonhang() {
        $ThongtinKH = $this->KhachhangModel->getKhachhangbyMaTK($this->MaTk);
        mysqli_data_seek($ThongtinKH, 0);
        $ThongtinKH1 = mysqli_fetch_assoc($ThongtinKH);
        $MaKH = $ThongtinKH1['MaKH'];
        $HoaDon = $this->M_hoadon->getHDByKH($MaKH);
        $ListHD = array();
        while ($row = mysqli_fetch_assoc($HoaDon)) {
            $MaHD = $row['MaHD'];
            $CTHD = $this->HoaDonDetailModel->getCTHDbyID($MaHD);
            $ChiTietHoaDon = mysqli_fetch_all($CTHD, MYSQLI_ASSOC);

            // Lặp qua mỗi chi tiết hóa đơn và truy xuất dữ liệu từ bảng khác
            foreach ($ChiTietHoaDon as &$item) {
                $MaCH = $item['MaCH'];
                $ThongtinGiaCa=mysqli_fetch_assoc($this->ChitietSanpham_GiaModel->getCTSPByMaCH($MaCH));
                $CauHinh = $ThongtinGiaCa['CauHinh'];
                $MaCT = $ThongtinGiaCa['MaCT'];
                $ThongtinChiTiet = mysqli_fetch_assoc($this->ChitietSanphamModel->getCTSPByMaCT($MaCT));
                $Mau = $ThongtinChiTiet['Mau'];
                $Hinhanh = $ThongtinChiTiet['HinhAnh'];
                $MaSp = $ThongtinChiTiet['MaSP'];
                $ThongtinSanpham =$this->SanphamModel->getProductById($MaSp);
                $TenSP = $ThongtinSanpham['TenSP'];
                // Thêm thông tin mới vào mỗi phần tử của mảng ChiTietHoaDon
                $item['Mau'] = $Mau;
                $item['CauHinh'] = $CauHinh;
                $item['Hinhanh'] = $Hinhanh;
                $item['TenSP'] = $TenSP;

            }

            // Gán mảng chi tiết hóa đơn đã được cập nhật vào mỗi hàng của $ListHD
            $row['ChiTietHoaDon'] = $ChiTietHoaDon;
            $ListHD[] = $row;
        }
        $this->view("Customer/thongtincanhan", [
            "Page" => "OrderHistory",
            "HoaDon" => $ListHD
        ]);
    }
    
    public function EditPassword(){
        $this->view("Customer/thongtincanhan", [
            "Page" => "EditPass"
        ]);
    }
    public function SavePass(){
        
    }
}

?>