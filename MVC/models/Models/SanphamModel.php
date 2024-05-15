<?php
class SanphamModel extends connectiondb{
    public function getAllIphoneByblack(){
        $query = "
            SELECT sanpham.MaSP, chitiet_sp.HinhAnh, TenSP, TiLe, loaisp.MaLoai, chitiet_sp.MaCT, CauHinh, DonGia
            FROM loaisp, sanpham, khuyenmai_sp, chitiet_sp, sp_giaban
            WHERE loaisp.MaLoai = sanpham.MaLoai
            AND sanpham.MaKM = khuyenmai_sp.MaKM
            AND loaisp.MaDM = 'IP'
            AND sanpham.MaSP = chitiet_sp.MaSP
            AND chitiet_sp.MaCT = sp_giaban.MaCT
            AND chitiet_sp.HinhAnh LIKE '%black%';
                ";

        return mysqli_query($this->con, $query);
    }

    public function getIphoneByBlackToMaLoai($Maloai){
        $query = "
                SELECT sanpham.MaSP, chitiet_sp.HinhAnh, TenSP, TiLe, loaisp.MaLoai, chitiet_sp.MaCT, CauHinh, DonGia
                FROM loaisp, sanpham, khuyenmai_sp, chitiet_sp, sp_giaban
                WHERE loaisp.MaLoai = sanpham.MaLoai
                AND sanpham.MaKM = khuyenmai_sp.MaKM
                AND loaisp.MaDM = 'IP'
                AND sanpham.MaSP = chitiet_sp.MaSP
                AND chitiet_sp.MaCT = sp_giaban.MaCT
                AND chitiet_sp.HinhAnh LIKE '%black%'
                AND loaisp.MaLoai = '".$Maloai."';
                ";

        return mysqli_query($this->con, $query);
    }

    public function getAllIpadBySilver(){
        $query = "
                SELECT sanpham.MaSP, chitiet_sp.HinhAnh, TenSP, TiLe, loaisp.MaLoai, chitiet_sp.MaCT, CauHinh, DonGia
                FROM loaisp, sanpham, khuyenmai_sp, chitiet_sp, sp_giaban
                WHERE loaisp.MaLoai = sanpham.MaLoai
                AND sanpham.MaKM = khuyenmai_sp.MaKM
                AND loaisp.MaDM = 'IPa'
                AND sanpham.MaSP = chitiet_sp.MaSP
                AND chitiet_sp.MaCT = sp_giaban.MaCT
                AND chitiet_sp.HinhAnh LIKE '%silver%';
                ";
        return mysqli_query($this->con, $query);
    }

    public function getIpadBySilverToMaloai ($Maloai){
        $query = "
                    SELECT sanpham.MaSP, chitiet_sp.HinhAnh, TenSP, TiLe, loaisp.MaLoai, chitiet_sp.MaCT, CauHinh, DonGia
                    FROM loaisp, sanpham, khuyenmai_sp, chitiet_sp, sp_giaban
                    WHERE loaisp.MaLoai = sanpham.MaLoai
                    AND sanpham.MaKM = khuyenmai_sp.MaKM
                    AND loaisp.MaDM = 'IPa'
                    AND sanpham.MaSP = chitiet_sp.MaSP
                    AND chitiet_sp.MaCT = sp_giaban.MaCT
                    AND chitiet_sp.HinhAnh LIKE '%silver%'
                    AND loaisp.MaLoai = '".$Maloai."';
                    ";
        return mysqli_query($this->con, $query);

    }

    public function getAllMacBySilver(){
        $query = "
                    SELECT sanpham.MaSP, chitiet_sp.HinhAnh, TenSP, TiLe, loaisp.MaLoai, chitiet_sp.MaCT, CauHinh, DonGia
                    FROM loaisp, sanpham, khuyenmai_sp, chitiet_sp, sp_giaban
                    WHERE loaisp.MaLoai = sanpham.MaLoai
                    AND sanpham.MaKM = khuyenmai_sp.MaKM
                    AND loaisp.MaDM = 'MB'
                    AND sanpham.MaSP = chitiet_sp.MaSP
                    AND chitiet_sp.MaCT = sp_giaban.MaCT
                    AND chitiet_sp.HinhAnh LIKE '%silver%';
                    ";
        return mysqli_query($this->con, $query);
    }

    public function getMacBySilverToMaloai ($Maloai){
        $query = "
                    SELECT sanpham.MaSP, chitiet_sp.HinhAnh, TenSP, TiLe, loaisp.MaLoai, chitiet_sp.MaCT, CauHinh, DonGia
                    FROM loaisp, sanpham, khuyenmai_sp, chitiet_sp, sp_giaban
                    WHERE loaisp.MaLoai = sanpham.MaLoai
                    AND sanpham.MaKM = khuyenmai_sp.MaKM
                    AND loaisp.MaDM = 'MB'
                    AND sanpham.MaSP = chitiet_sp.MaSP
                    AND chitiet_sp.MaCT = sp_giaban.MaCT
                    AND chitiet_sp.HinhAnh LIKE '%silver%'
                    AND loaisp.MaLoai = '".$Maloai."';
                    ";
        return mysqli_query($this->con, $query);

    }

    public function getProductById($id){
        $query = "SELECT * FROM sanpham WHERE MASP= '".$id."'";
        $result = mysqli_query($this->con, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } 
     
    else {
            return null; // or handle the case where no product is found
        }
    }

    public function getTiLeKMByID($id){
        $query = "select * from khuyenmai_sp where MaKM ='".$id."'";
        $result = mysqli_query($this->con, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result)["TiLe"];
        } 
     
        else {
                return null; // or handle the case where no product is found
        }
        
    }
}


?>