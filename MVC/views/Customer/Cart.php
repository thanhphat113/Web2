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
                                    <span class="left" id="tensp"><?php echo $giohang['TenSP'] ; ?> <?php echo $giohang['CauHinh'] ; ?> </span>
                                    <span class="right"
                                        id="giahientai"><?php echo $giohang['gia']*(1-$giohang['tileKM'])?> Đ</span>

                                </div>

                                <div class="line" id="line2">
                                    <span class="right"
                                        id="giacu"><?php echo $giohang['gia']?></span>

                                </div>

                                <div class="line" id="line3">
                                    <span class="left" id="khuyenmai">Giảm giá <?php echo $giohang['tileKM']*100?>%</span>

                                </div>

                                <div class="line" id="line4">
                                    <div class="right" id="tanggiamsoluong">
                                        <!-- <button class="button">-</button> -->
                                        <span class="soluong">1 sản phẩm</span>
                                        <!-- <button class="button">+</button> -->
                                    </div>

                                </div>
                            </div>
                            <?php }
        }
                    ?>
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
                        <div class="line">
                                <input type="text" id="ghichu"
                                    placeholder="Nhập ghi chú (nếu có)"
                                    class="left">
                        </div>
                        
                            
                            <div class="line">
                                <span class="left">Tổng tiền</span>
                                <span class="right" id="giacuoicung"><?php echo $giohang['gia']*(1-$giohang['tileKM'])?></span>
                            </div>
                            <?php 
                                $total = $giohang['gia']*(1-$giohang['tileKM']);
                            ?>

                        <div class="left">
                            <input type="checkbox" id="checkbox4">
                            <label for="checkbox4">Tôi đồng ý với Chính sách xử
                                lý dữ liệu cá nhân của Infinity</label>
                        </div>
                            
                        <a href="<?php echo BASE_URL;?>Cart/xuly/<?php echo $giohang['CH'];?>/<?php echo $total?>" class="button">Đặt hàng</a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>