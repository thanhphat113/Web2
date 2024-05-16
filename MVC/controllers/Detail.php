<?php
class Detail extends Controller{

    protected $SanphamModel;
    protected $ChitietSanphamModel;
    protected $HinhanhModel;
    protected $ChitietSanpham_GiaModel;

    function __construct() {
        
        $this->SanphamModel = $this->models("SanphamModel");
        
        $this->ChitietSanphamModel = $this->models("ChitietSanphamModel");
        $this->HinhanhModel = $this->models("HinhanhModel");
        
        $this->ChitietSanpham_GiaModel = $this->models("ChiTietSanPham_GiaModel");
    }

    public function detailproduct($IdProduct){
        if($IdProduct == ""){
            $this->view("Customer/home", []);
        }else{
            
            $sanpham = $this->SanphamModel->getProductById($IdProduct);     
            
            $ChitietSP = $this->ChitietSanphamModel->getCT_SpByID($IdProduct);
            $FirstChitietSP = $this->ChitietSanphamModel->getFirstRecordById($IdProduct);
           
            $ImageSP = $this->HinhanhModel->getImageById($FirstChitietSP["MaCT"]);
            $ChitietSP_Gia = $this->ChitietSanpham_GiaModel->getAllByid($FirstChitietSP["MaCT"]);
            $TiLeKhuyenMai = $this->SanphamModel->getTiLeKMByID($sanpham["MaKM"]);
            
            if($sanpham){
                $this->view("Customer/trangchu", [
                    "Page"=>"detailproduct",
                    "ProductInfor"=>$sanpham,
                    "ProductDetail"=>$ChitietSP,
                    "ProductImage"=>$ImageSP,
                    "ProductDetail_Price"=>$ChitietSP_Gia,
                    "TiLe"=>$TiLeKhuyenMai
                ]);
            }else $this->view("Customer/home", []);
        }
        
    }

    public function ajaxdetailproduct($IdProduct){
        $Mau = $_POST["Mau"];
        $DungLuong = $_POST["DungLuong"];
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ajax']) && $_POST['ajax'] == "1" ){
            $sanpham = $this->SanphamModel->getProductById($IdProduct);            
            $SanPhamTheoMau = $this->ChitietSanphamModel->getSanPhamTheoMau($IdProduct, $Mau);
            $SanPhamTheoDungLuong = $this->ChitietSanpham_GiaModel->getSanPhamTheoDungLuong($SanPhamTheoMau["MaCT"], $DungLuong);
            $image = $this->HinhanhModel->getImageById($SanPhamTheoMau["MaCT"]);
            $imageFirst = mysqli_fetch_assoc($image);
            $imageData = array(); // Khởi tạo mảng để chứa dữ liệu hình ảnh
            // Chuyển đổi kết quả từ mysqli_result thành một mảng dữ liệu
            while ($row = mysqli_fetch_assoc($image)) {
                $imageData[] = $row;
            }
            mysqli_data_seek($image, 0);
            
            $TiLe = $this->SanphamModel->getTiLeKMByID($sanpham["MaKM"]);
            http_response_code(200);
            echo json_encode(array("Mau" => $SanPhamTheoMau, 
            "Dungluong" => $SanPhamTheoDungLuong, "image" => $imageData, "imagefir" => $imageFirst,"TiLe" => $TiLe, "MaCH"=>['MaCH'] ));
            exit;
        }else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ajax']) && $_POST['ajax'] == "2" ){
            $sanpham = $this->SanphamModel->getProductById($IdProduct);            
            $SanPhamTheoMau = $this->ChitietSanphamModel->getSanPhamTheoMau($IdProduct, $Mau);
            $SanPhamTheoCauHinh = $this->ChitietSanpham_GiaModel->getSanPhamTheoDungLuong($SanPhamTheoMau["MaCT"], $DungLuong);
            $TiLe = $this->SanphamModel->getTiLeKMByID($sanpham["MaKM"]);
            http_response_code(200);
            echo json_encode(array(
            "price" => $SanPhamTheoCauHinh["DonGia"],"TiLe" => $TiLe , "MaCH"=> $SanPhamTheoCauHinh['MaCH']));
            exit;
        }
    }
}


?>