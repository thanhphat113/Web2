<?php
if(!is_array($row_detail)){
    echo 'Sản phẩm này KHÔNG TỒN TẠI!!!';
}
else{
    require('connect.php');
    $query_dungluong ="SELECT DISTINCT sp_giaban.CauHinh, sp_giaban.DonGia";
    $query_dungluong .=" FROM sanpham, chitiet_sp, sp_giaban";
    $query_dungluong .=" WHERE 1 and sanpham.MaSP = chitiet_sp.MaSP AND";
    $query_dungluong .= " chitiet_sp.MaCT = sp_giaban.MaCT";
    $query_dungluong .= " AND sanpham.MaSP = '".$row_detail['MaSP']."'";
    $res_dungluong = mysqli_query($conn,$query_dungluong);
    $query_chitiet = "select distinct *";
    $query_chitiet .= "from chitiet_sp where MaSP = '".$row_detail['MaSP']."'";
    $res_chitiet = mysqli_query($conn, $query_chitiet);
    $query_tile = "select * from khuyenmai_sp where MaKM = '".$row_detail['MaKM']."'";
    $res_tile = mysqli_query($conn,$query_tile);
?>

<div class = "detail" style ="
    margin: 0;
    width: 100%;
    background-color: #333333;">

    <div class="product-left"
        style ="
        width: 45vw;
        padding-left: 20px;
        background-color: #333333;
        float:left;"
    >
        <div class="product-view"
            style = "
            width: 100%;
            padding: 10px;  ">
            <img src="Pictures/15promax-black.jpg" alt="Điện thoại"
                style = "
                border: 0;
                width: 80%;">
        </div>
        <div class="img-picker" id="image-picker"
            style = "
            height: 17%;
            margin: 2;">
            <img src="Pictures/15promax-black.jpg" alt="Điện thoại"
            style = "width: 17%; border: 10px; border-radius: 15%;">
            <img src="Pictures/15promax-black-1.jpg" alt="Điện thoại"
                style = "width: 17%; border: 10px; border-radius: 15%;">
            <img src="Pictures/15promax-black-2.jpg" alt="Điện thoại"
                style = "width: 17%; border: 10px; border-radius: 15%;">
            <img src="Pictures/15promax-black-3.jpg" alt="Điện thoại"
                style = "width: 17%; border: 10px; border-radius: 15%;">
        </div>
    </div>
    <div class="product-right"
        style = "            
        background-color: #333333;
        color: #FFFFFF;
        width: 45vw;
        padding: 15px;
        float: left;">
        <div class="product-name">
            <h1 style = "color:#FFFFFF"><?=
            $row_detail['TenSP'] ?></h1>
        </div>
        <br>
        <div class="product-price" style = "color: #FFFFFF;">
            <strong style ="
                float: left;
                font-size: 26px;
                padding: 0 0 20px;">255</strong>
            <strike style = "
                float: left;
                font-size: 18px;
                padding: 0 10px;"></strike>
            <?php
            if(mysqli_num_rows($res_tile)>0){
                while ($row_tile = mysqli_fetch_assoc($res_tile)){
                    
                        ?>
                        <small data-tile="0.55" style = "
            float: left;
            font-size: 18px">-<?=$row_tile['TiLe']*100?>%</small>
                        <?php
                        
                    
                }
            } 
            ?>
        </div>
        <br>
        <br>
        <div class="product-capacity">
            <p style ="font-size: 18px; font-weight:bold;">Dung lượng:</p>
            <?php
                if(mysqli_num_rows($res_dungluong) > 0){
                    while($row_dungluong = mysqli_fetch_assoc($res_dungluong)){
                        // Kiểm tra nếu cấu hình là "256GB" thì gán class active
                        $isActive = ($row_dungluong['CauHinh'] == "256GB") ? " active" : "";
                        // Lưu ý thêm dấu cách trước "active" để phân cách các class
            ?>
            <span class="loai-dungluong<?=$isActive?>" data-price="<?=$row_dungluong['DonGia']?>" style="cursor: pointer; font-size: 18px; margin: 2px; padding: 2px; border: 1px solid #FFFFFF; border-radius: 15%;"><?=$row_dungluong['CauHinh']?></span>&nbsp;
            <?php
    }
}

            ?>
        </div>
        <div class="product-color">
            <p>Màu: Titan Xanh</p>
            <?php
            if(mysqli_num_rows($res_chitiet) > 0){
                while ($row_chitiet = mysqli_fetch_assoc($res_chitiet)){
                    ?><span class ='loai-mau' data-mact ="<?=$row_chitiet['MaCT']?>" style = "font-size: 18px;
                    margin: 2px;
                    padding: 2px;
                    border: 1px solid #FFFFFF;
                    border-radius: 15%; "><?=$row_chitiet['Mau'] ?></span>&nbsp;
                    <?php
                }
            }?>
        </div>
        <br>
        <div class="sale-info"
        style = "width: 520px;
        margin: 0 0 20px;
        padding: 20px 15px 10px">
            <h3 style = "font-size: 15px;">Khuyến mãi</h3>
            <small style ="
            width: 100%;
            display: block;
            overflow: hidden;
            line-height: 18px;
            font-size: 13px;
            border-bottom: 1px solid #414141;
            padding: 0px 5px 13px;
            margin: 0px 5px 16px;">Bảo hành lên đến <?=$row_detail['BaoHanh']?> tháng</small>
            <div class="sale-content"
            style = "
            width: 90%;
            display: block;
            overflow: hidden;
            margin-bottom: 10px;">
                <i></i>
                <b style = "font-size: 14px;">Thu cũ Đổi mới: Giảm đến 2 triệu (Tuỳ model máy cũ, Không kèm thanh toán qua cổng online, mua kèm)<a Xem chi tiết></b>
                <br>
                <i></i>
                <b style = "font-size: 14px;">Nhập mã VNPAYTGDD2 giảm ngay 1% (tối đa 200.000đ) khi thanh toán qua VNPAY-QR, áp dụng cho đơn hàng từ 3 Triệu (<a Xem chi tiết tại đây>)</b>
            </div>
        </div>
        <div class="buy-options">
            <a href="" class="buy-btn"
            style = "float: left;
            width: 15vw;
            margin-right: 20px;
            font-size: 20px;
            line-height: 25px;
            color: #fff;
            border-radius: 12px;
            text-align: center;
            padding: 18px 0;
            background: #0071e3;
            font-weight: 700;
            font-style:normal;
            " style=":hover{background-color: #FFFFFF;
                color:#0071e3;

            }">MUA NGAY</a>
            <button type="button" class="add-to-cart"
            style = "
                margin: 0 0 10px;
                width: 15vw;
                font-size: 20px;
                line-height: 25px;
                color: #666666;
                border-radius: 12px;
                text-align: center;
                padding: 18px 0;
                background: #FFFFFF;
                font-weight: 700;
                cursor:pointer;
                :hover{
                    background-color:#666666;
                    color:#FFFFFF;
                }"
                >THÊM VÀO GIỎ HÀNG</button>

    </div>
    </div>
</div>
<?php 
}
?>
<script>
/*----------Tạo phần lựa chọn hình ảnh trong chi tiếtp sp -------------*/
const img_view = document.querySelector('.detail .product-left .product-view img');

const img_picker = document.querySelectorAll('.detail .product-left .img-picker img');
    img_picker.forEach(function(imgitem,x){
        imgitem.addEventListener('click',function(){
            img_view.src = imgitem.src;
});

});
document.addEventListener("DOMContentLoaded", function() {
    var capacities = document.querySelectorAll(".loai-dungluong");
    capacities.forEach(function(capacity) {
        capacity.addEventListener("click", function() {
            var price = this.getAttribute('data-price');
            var tile =this.getAttribute('data-tile');
            alert(tile);
            document.querySelector(".product-price strike").innerText = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(price);
            document.querySelector(".product-price strong").innerText = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(price*(1-tile));    
            // Cập nhật class active
            capacities.forEach(c => c.classList.remove('active'));
            this.classList.add('active');
        });
    });

    var colorChoices = document.querySelectorAll(".loai-mau");
    colorChoices.forEach(function(choice) {
        choice.addEventListener("click", function() {
            var mact = this.getAttribute('data-mact');
            fetch('?mact=' + mact) // Sử dụng cùng một file PHP
                .then(response => response.json())
                .then(images => {
                    const imgPicker = document.getElementById('image-picker');
                    imgPicker.innerHTML = ''; // Xóa các hình ảnh hiện tại
                    images.forEach(img => {
                        let imgElement = document.createElement('img');
                        imgElement.src = img.img;
                        imgElement.alt = "Điện thoại";
                        imgElement.style = "width: 17%; border: 10px; border-radius: 15%;";
                        imgPicker.appendChild(imgElement);
                    });
                    updateImageClickEvents(); // Gọi hàm này để cập nhật sự kiện click
                });
        });
    });

    function updateImageClickEvents() {
        document.querySelectorAll('.img-picker img').forEach(img => {
            img.addEventListener('click', function() {
                document.getElementById('main-product-image').src = this.src;
            });
        });
    }

    function updateImageClickEvents() {
        document.querySelectorAll('.img-picker img').forEach(img => {
            img.addEventListener('click', function() {
                document.querySelector('.product-view img').src = this.src;
            });
        });
    }
    
    <?php
        include('connect.php');

        if (isset($_GET['mact'])) {
        $mact = $_GET['mact'];
        $stmt = $conn->prepare("SELECT img FROM sanpham_img WHERE MaCT = ?");
        $stmt->bind_param("s", $mact);
        $stmt->execute();
        $result = $stmt->get_result();

        $images = [];
        while ($row = $result->fetch_assoc()) {
        $images[] = ['img' => $row['img']];
        }

        header('Content-Type: application/json');
        echo json_encode($images);
        exit; // Dừng script để không xuất thêm HTML
    }
?>
});

</script>