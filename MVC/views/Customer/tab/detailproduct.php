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
                <img id="product-image" src="<?php echo BASE_URL . "public/" . mysqli_fetch_assoc($data["ProductImage"])["img"]; ?>" alt="Điện thoại"
                    style = "
                    border: 0;
                    width: 80%;">
            </div>
            <div class="img-picker" id="image-picker"
                style = "
                height: 17%;
                margin: 2;">
                <?php 
                    while ($row = mysqli_fetch_assoc($data["ProductImage"])) {
                        echo '<img id = "product-image-title" src="' . BASE_URL . 'public/' . $row["img"] . '" alt="Điện thoại" style="width: 17%; border: 10px; border-radius: 15%; margin: 0 10px 0 10px">';
                    }
                ?>

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
                <?php
                    if ($data["ProductInfor"]) {
                        echo '<h1 style="color:#FFFFFF">' . $data["ProductInfor"]["TenSP"] . '</h1>';
                    } else {
                        echo "Product information not found.";
                    }
                ?>
            </div>
            <br>
            
            <div class="product-price" style = "color: #FFFFFF;">
            <?php if ($data["ProductInfor"]["MaKM"] == "NONE") { ?>
                <strong style ="
                    float: left;
                    font-size: 26px;
                    padding: 0 0 20px;"><?= mysqli_fetch_assoc($data["ProductDetail_Price"])["DonGia"] ?></strong>
            <?php }else{?>
                    <?php
                    // Fetch the original price once
                    $originalPrice = mysqli_fetch_assoc($data["ProductDetail_Price"])["DonGia"];
                    ?>
                    <strong style ="
                    float: left;
                    font-size: 26px;
                    padding: 0 0 20px;">
                    <?php 
                        // Calculate the discounted price based on the percentage
                    $discountedPrice = $originalPrice * (1 - $data["TiLe"]);
                    echo number_format($discountedPrice, 2); // Format the price if needed               
                    ?></strong>
                    <small data-tile="0.55" style = "
                        float: left;
                        font-size: 18px">-<?= $data["TiLe"] *100?>% </small>
                    <strike style = "
                        float: left;
                        font-size: 18px;
                        padding: 0 10px;">    <?= $originalPrice ?></strike>
                    <?php } ?>
            </div>
            <br>
            <br>
            <div class="product-color">
                <p style="font-size: 18px; font-weight:bold;">Màu sắc</p>
                <?php
                mysqli_data_seek($data["ProductDetail"], 0);
                while ($row_chitiet = mysqli_fetch_assoc($data["ProductDetail"])) {
                ?>
                    <span id="<?= $row_chitiet['Mau'] ?>" class="mau-span" style="cursor: pointer; font-size: 18px; margin: 2px; padding: 2px; border: 1px solid #FFFFFF; border-radius: 15%; "><?= $row_chitiet['Mau'] ?></span>&nbsp;
                <?php
                }
                ?>
            </div>
            <div class="product-capacity">
                <p style="font-size: 18px; font-weight:bold;">Dung lượng:</p>
                <?php
                mysqli_data_seek($data["ProductDetail_Price"], 0);
                while ($row_dungluong = mysqli_fetch_assoc($data["ProductDetail_Price"])) {
                    // Kiểm tra nếu cấu hình là "256GB" thì gán class active
                ?>
                    <span  id="<?= $row_dungluong['CauHinh'] ?>" class="dungluong-span" style="cursor: pointer; font-size: 18px; margin: 2px; padding: 2px; border: 1px solid #FFFFFF; border-radius: 15%;"><?= $row_dungluong['CauHinh'] ?></span>&nbsp;
                <?php
                }
                ?>
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
                margin: 0px 5px 16px;">Bảo hành lên đến <?=$data["ProductInfor"]["BaoHanh"]?> tháng</small>
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
                <?php                 mysqli_data_seek($data["ProductDetail_Price"], 0);?>
                <a href="<?php echo BASE_URL; ?>cart/buyproduct/<?php echo mysqli_fetch_assoc($data["ProductDetail_Price"])['MaCH']?>" class="buy-btn" id="buyBtn"
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
    <script>
        <?php
            mysqli_data_seek($data["ProductDetail_Price"], 0);
            mysqli_data_seek($data["ProductDetail"], 0);

            // Lấy giá trị IdDungLuongDefault và IdMauDefault từ dữ liệu PHP và chuyển đổi chúng thành JavaScript
            $IdDungLuongDefault = mysqli_fetch_assoc($data["ProductDetail_Price"])['CauHinh'];
            $IdMauDefault = mysqli_fetch_assoc($data["ProductDetail"])['Mau'];

            // Sử dụng echo để truyền giá trị từ PHP sang JavaScript
            echo "var IdDungLuongDefault = '" . $IdDungLuongDefault . "';";
            echo "var IdMauDefault = '" . $IdMauDefault . "';";
            echo "var BASEE_URL = '" . BASE_URL . "';";
            echo "var MaSP = '" . $data["ProductInfor"]["MaSP"] . "';";
        ?>

        // Thực hiện thay đổi màu sắc của các phần tử có IdDungLuongDefault và IdMauDefault
            document.getElementById(IdDungLuongDefault).style.backgroundColor = "blue"; 
            document.getElementById(IdMauDefault).style.backgroundColor = "blue"; 

        // Lắng nghe sự kiện click cho các span có class mau-span và dungluong-span
        document.querySelectorAll('.mau-span').forEach(item => {
            item.addEventListener('click', function() {
                var value = this.textContent.trim(); // Lấy giá trị của span được click
                if (this.classList.contains('mau-span')) {
                    var Mau = value; // Gán giá trị vào biến Mau nếu là span màu
                } else if (this.classList.contains('dungluong-span')) {
                    var Dungluong = value; // Gán giá trị vào biến Duongluong nếu là span dungluong
                }

                // Tạo một đối tượng XMLHttpRequest
                var xhr = new XMLHttpRequest();

                // Xử lý khi có phản hồi từ server
                xhr.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // Đặt lại màu cho các span màu khác về màu ban đầu
                        document.querySelectorAll('.mau-span').forEach(span => {
                            span.style.backgroundColor = ""; // Đặt lại màu về mặc định
                        });

                        // Đặt lại màu cho span màu đã được chọn
                        item.style.backgroundColor = "blue"; 
                        var response = JSON.parse(this.responseText);
                        var imagefir = response.imagefir;
                        document.getElementById("product-image").src = BASEE_URL+"public/"+ imagefir.img;

                        // Trong hàm xử lý AJAX
                        var images = response.image;
                        // Lặp qua mảng hình ảnh và tạo các thẻ <img> tương ứng
                        var imageContainer = document.getElementById("image-picker");
                        imageContainer.innerHTML = ""; // Xóa nội dung cũ trước khi thêm mới

                        images.forEach(function(image) {
                            var imgElement = document.createElement("img");
                            imgElement.src = BASEE_URL + "public/" + image.img;
                            imgElement.alt = "Điện thoại";
                            imgElement.style.width = "17%";
                            imgElement.style.border = "10px";
                            imgElement.style.borderRadius = "15%";
                            imgElement.style.margin = "0 10px 0 10px";
                            imageContainer.appendChild(imgElement); // Thêm hình ảnh vào phần tử container
                        });

                    }

                };
                // Thiết lập yêu cầu AJAX
                xhr.open("POST", BASEE_URL+"Detail/ajaxdetailproduct/"+ MaSP, true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                // Gửi dữ liệu form lên server
                xhr.send("ajax=1&Mau=" + Mau + "&DungLuong=" + Dungluong);
            });

        });

        document.querySelectorAll('.dungluong-span').forEach(item => {
            item.addEventListener('click', function() {
                var value = this.textContent.trim(); // Lấy giá trị của span được click
                if (this.classList.contains('dungluong-span')) {
                    var Dungluong = value; // Gán giá trị vào biến Mau nếu là span màu
                } 
                // Lấy tất cả các phần tử <span> có class "color"
                var spans = document.querySelectorAll('.mau-span');
                var Color= "Trắng";
                // Duyệt qua từng phần tử <span> và kiểm tra background color
                spans.forEach(function(span) {
                    var computedStyle = window.getComputedStyle(span); // Lấy các thuộc tính CSS tính toán của phần tử
                    var backgroundColor = computedStyle.backgroundColor; // Lấy background color tính toán

                    // Kiểm tra nếu background color là "blue"
                    if (backgroundColor === 'rgb(0, 0, 255)') { // rgb(0, 0, 255) là màu blue
                        Color = span.textContent.trim(); // Lấy giá trị của phần tử <span>
                        // Đã tìm thấy phần tử mong muốn, bạn có thể thực hiện các hành động khác ở đây
                        console.log(Color);
                    }
                });

                // Tạo một đối tượng XMLHttpRequest
                var xhr = new XMLHttpRequest();

                // Xử lý khi có phản hồi từ server
                xhr.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // Đặt lại màu cho các span dung lượng khác về màu ban đầu
                        document.querySelectorAll('.dungluong-span').forEach(span => {
                            span.style.backgroundColor = ""; // Đặt lại màu về mặc định
                        });
                        
                        // Đặt lại màu cho span dung lượng đã được chọn
                        item.style.backgroundColor = "blue";
                        var response = JSON.parse(this.responseText);
                        
                        var tile = response.TiLe;
                        var originalPrice = response.price;
                        var discountedPrice = originalPrice * (1 - tile);
                        

                        // Cập nhật giá trị cho thẻ <small>
                        var smallElement = document.querySelector('small[data-tile]');
                        smallElement.textContent = "-" + (tile * 100) + "%";

                        // Cập nhật giá trị cho thẻ <strike>
                        var strikeElement = document.querySelector('strike');
                        strikeElement.textContent = originalPrice;
                        // Cập nhật giá trị cho thẻ <strong>
                        var strongElement = document.querySelector('strong');
                        strongElement.textContent = discountedPrice.toFixed(2);


                        var mach = response.MaCH;
                        document.getElementById("buyBtn").href = "<?php echo BASE_URL; ?>cart/buyproduct/" + encodeURIComponent(mach);
                        
                    }
                };
                // Thiết lập yêu cầu AJAX
                xhr.open("POST", BASEE_URL+"Detail/ajaxdetailproduct/"+ MaSP, true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                // Gửi dữ liệu form lên server
                xhr.send("ajax=2&Mau=" + Color + "&DungLuong=" + Dungluong);
            });
        });



    </script>