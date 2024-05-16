<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trang Mẫu</title>
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/cart.css">
    </head>
    <body>
        <div class="Customer">
            <div class="cart">

                <div class="flexcolumn">
                    <div class="top">
                        <a href = "<?php echo BASE_URL; ?>Home" id="bogach">Về trang chủ Infinity</a>
                        <span>Giỏ hàng của bạn</span>
                    </div>
                </div>

                <div class="mid">
                    <div class="frame">
                        <div class="info-1">
                        <?php
                            // Kiểm tra xem $data['HoaDon'] có tồn tại và không rỗng
                            if (isset($data['thongtincart'])) { 
                                foreach ($data['thongtincart'] as $giohang) {
                        ?>
                            <div class="left" id="hinhsp">
                                <img src="<?php echo BASE_URL; ?>public/<?php echo $giohang['Hinhanh'] ;?>">
                            </div>

                            <div class="right" id="thongtinsp">
                                <div class="line" id="line1">
                                    <span class="left" id="tensp"><?php echo $giohang['TenSP'] ; ?></span>
                                    <span class="right"
                                        id="giahientai">29.590.000đ</span>

                                </div>

                                <div class="line" id="line2">
                                    <span class="right"
                                        id="giacu">34.990.000đ</span>

                                </div>

                                <div class="line" id="line3">
                                    <span class="left" id="khuyenmai">2 Khuyến
                                        mãi</span>

                                </div>

                                <div class="line" id="line4">
                                    <div class="right" id="tanggiamsoluong">
                                        <button class="button">-</button>
                                        <span class="soluong">1</span>
                                        <button class="button">+</button>
                                    </div>

                                </div>
                            </div>
                            <?php }
        }
                    ?>
                        </div>
                        

                        <div class="info-2">
                            <div class="line">
                                <span class="left">Tạm tính (1 sản phẩm):</span>
                                <span class="right"
                                    id="giahientai">29.590.000đ</span>
                            </div>

                        </div>

                    </div>

                    <div class="frame">
                        <p class="left">Thông tin khách hàng</p>

                        <div class="line">
                            <input type="radio" id="anh" name="gioitinh">
                            <label for="anh">Anh</label>
                            <input type="radio" id="chi" name="gioitinh">
                            <label for="chi">Chị</label>
                        </div>
                        <div class="line" id="tensdt">
                            <input type="text" id="fullname"
                                placeholder="Họ và Tên">
                            <input type="text" id="phonenumber"
                                placeholder="Số điện thoại">
                        </div>

                    </div>

                    <div class="frame" id="giaohang">
                        <p class="left">Chọn hình thức nhận hàng</p>
                        <div class="left">
                            <input type="radio" id="tannoi"
                                name="hinhthucnhanhang">
                            <label for="anh">Giao tận nơi</label>
                            <input type="radio" id="cuahang"
                                name="hinhthucnhanhang">
                            <label for="chi">Nhận tại cửa hàng</label>
                        </div>

                        <div class="frame" id="tannoi">
                            <div class="line">
                                <select id="thanhphoSelected" class="left">
                                    <option value="hochiminh" selected>Hồ Chí
                                        Minh</option>
                                    <option value="hanoi">Hà Nội</option>
                                    <option value="cantho">Cần Thơ</option>
                                </select>
                                <select id="quanhuyenSelected" class="right">
                                    <option value="chonquanhuyen" selected>Chọn
                                        Quận/Huyện</option>
                                    <option value="quan1">Quận 1</option>
                                    <option value="tpthuduc">TP. Thủ
                                        Đức</option>
                                </select>
                            </div>

                            <div class="line">
                                <select id="phuongxaSelected" class="left">
                                    <option value="chonphuongxa" selected>Chọn
                                        Phường/Xã</option>
                                    <option value="phuong1">Phường 1</option>
                                    <option value="phuong2">Phường 2</option>
                                </select>
                                <input type="text" id="sonhatenduong"
                                    placeholder="Số nhà, tên đường"
                                    class="right">
                            </div>

                            <div class="line">
                                <input type="text" id="ghichu"
                                    placeholder="Nhập ghi chú (nếu có)"
                                    class="left">
                            </div>

                            <div class="flexcolumn">
                                <div class="left">
                                    <input type="checkbox" id="checkbox1" >
                                    <label for="checkbox1">Gọi người khác nhận
                                        hàng</label>
                                </div>

                                <div class="left">
                                    <input type="checkbox" id="checkbox2">
                                    <label for="checkbox2">Chuyển danh bạ, dữ
                                        liệu
                                        qua
                                        máy mới</label>
                                </div>

                                <div class="left">
                                    <input type="checkbox" id="checkbox3">
                                    <label for="checkbox3">Xuất hóa đơn công
                                        ty</label>
                                </div>
                            </div>

                        </div>

                        <div class="frame" id="cuahang">
                            <div class="line">
                                <select id="thanhphoSelected" class="left">
                                    <option value="hochiminh" selected>Hồ Chí
                                        Minh</option>
                                    <option value="hanoi">Hà Nội</option>
                                    <option value="cantho">Cần Thơ</option>
                                </select>
                                <select id="quanhuyenSelected" class="right">
                                    <option value="chonquanhuyen" selected>Chọn
                                        Quận/Huyện</option>
                                    <option value="quan1">Quận 1</option>
                                    <option value="tpthuduc">TP. Thủ
                                        Đức</option>
                                </select>
                            </div>

                            <div class="flexcolumn">
                                <div class="left">
                                    <input type="radio" id="diachi1"
                                        name="diachicuahang">
                                    <label for="diachi1">229 Nguyễn Thị
                                        Tú</label>
                                </div>
                                <div class="left">
                                    <input type="radio" id="diachi2"
                                        name="diachicuahang">
                                    <label for="diachi2">451 Lê Trọng
                                        Tấn</label>

                                </div>

                            </div>

                            <div class="line">
                                <input type="text" id="ghichu"
                                    placeholder="Nhập ghi chú (nếu có)"
                                    class="left">
                            </div>

                            <div class="flexcolumn">
                                <div class="left">
                                    <input type="checkbox" id="checkbox3" >
                                    <label for="checkbox3">Xuất hóa đơn công ty</label>
                                </div>
                            </div>
                    
                        </div>

                        <div class="frame">
                            <div class="line">
                                <input type="text" id="tmagiamgia"
                                    placeholder="Nhập mã giảm giá/ Phiếu mua hàng" class="left">
                                <button class="right" id="bmagiamgia">Áp dụng</button>
                            </div>
                            <div class="line">
                                <span class="left">Tổng tiền</span>
                                <span class="right" id="giacuoicung">29.590.000đ</span>
                            </div>
                        <div class="left">
                            <input type="checkbox" id="checkbox4">
                            <label for="checkbox4">Tôi đồng ý với Chính sách xử
                                lý dữ liệu cá nhân của Infinity</label>
                        </div>
                            
                            <button id="dathang">Đặt hàng</button>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>