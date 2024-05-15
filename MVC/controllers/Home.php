<?php

class Home extends Controller{

    public $SanphamModel;

    public function __construct(){
        $this->SanphamModel = $this->models("SanphamModel");
    }

    public function Iphone($title){

        if($title == "") $title = "tatca";
        
        $sanpham = $this->SanphamModel->getAllIphoneByblack();
        $sanphamByMaloai = $this->SanphamModel->getIphoneByBlackToMaLoai($title);
        $this->view("Customer/trangchu", [
            "Page"=>"iphone",
            "Title"=>$title,
            "Data"=>$sanpham,
            "DataByMaloai"=> $sanphamByMaloai
        ]);
        
    }
    
    public function Home(){
        $this->view("Customer/header", []);
    }

    
    public function Ipad($title){
        if($title == "") $title = "tatca";
        $sanpham = $this->SanphamModel->getAllIpadBySilver();
        $sanphamByMaloai = $this->SanphamModel->getIpadBySilverToMaloai($title);
        // Call Views
        $this->view("Customer/trangchu", [
            "Page"=>"ipad",
            "Title"=>$title,
            "Data"=>$sanpham,
            "DataByMaloai"=> $sanphamByMaloai
        ]);
    }
    public function Mac($title){
        if($title == "") $title = "tatca";
        $sanpham = $this->SanphamModel->getAllMacBySilver();
        $sanphamByMaloai = $this->SanphamModel->getMacBySilverToMaloai($title);
        // Call Views
        $this->view("Customer/trangchu", [
            "Page"=>"mac",
            "Title"=>$title,
            "Data"=>$sanpham,
            "DataByMaloai"=> $sanphamByMaloai
        ]);
    }


    public function logout(){
        session_unset();
        // Hủy bỏ phiên làm việc
        session_destroy();
        // Chuyển hướng người dùng về trang đăng nhập
        header("Location: ".BASE_URL ."Home");
    }

    public function productdetail($id){
        $this->view("Customer/trangchu", [
            "Page"=>"productdetail",
            
        ]);
    }
}
?>