<div class="cus-h1">
    <h1>Danh sách đơn hàng</h1>
    <a href="" class="all" id = "all">Tất cả</a>
    <a href="" class="done" id ="done">Đã hoàn thành</a>
    <a href="" class="confirm" id="confirm">Đợi xác nhận</a>
    <br>
    <hr>
</div>
    <!--HTML của danh sách đơn hàng-->
<div class="cus-orders">
    <?php
        // Kiểm tra xem $data['HoaDon'] có tồn tại và không rỗng
        if (isset($data['HoaDon'])) { 
            foreach ($data['HoaDon'] as $donhang) {
    ?>
                <!--HTML của một đơn hàng-->
                <div class="cus-order">
                    <div class="cus-order-h1">
                        <h1><?php echo $donhang['MaHD'];?></h1>
                        <p>
                            <?php if ($donhang['trangthai'] ) { echo "Đã hoàn thành";}
                                    else {echo "Đợi xác nhận";}
                            ?>
                        </p>
                    </div>
                    <?php foreach ($donhang['ChiTietHoaDon'] as $chitiet) { ?>  
                    <div class="cus-order-item">
                        <table>
                            <colgroup span="4"></colgroup>
                            <th class="item-img" id="item-img"> <img src="<?php echo BASE_URL; ?>public/<?php echo $chitiet['Hinhanh'] ;?>" alt="ảnh sản phẩm" class="img"></th>
                            <th class="item-info">
                                <div class="item-name"><?php echo $chitiet['TenSP'] ; ?></div>
                                <div class="item-color"><?php echo $chitiet['Mau'] ;  ?></div>
                                <div class="item-capacity"><?php echo $chitiet['CauHinh'] ;  ?></div>
                            </th>
                            <th class="item-quantity">x<?php echo $chitiet['Soluong']?></th>
                            <th class="item-price"><?php echo $chitiet['TongTien']?></th>
                        </table>
                    </div>
                    <?php }?>
                    <div class="cus-order-costs">
                        <p>Thành tiền: </p>
                        <div class="cus-order-total"><?php echo $donhang['TongTien'];?></div>
                    </div>
                </div>
                    <!--Kết thúc HTML của một đơn hàng-->
        <?php }
        }
                    ?>
</div>
