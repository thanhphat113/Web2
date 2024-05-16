<div class="cus-h1">
                <h1>Hồ sơ của tôi</h1>
                <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                <hr>
            </div>
            <div class="cus-info">
                <div class="cus-username">
                    <p class="cus-username">Tên đăng nhập: <?php echo $data['ThongtinTK']['Username'] ?>     </p>
                </div>
                <form action ="<?php echo BASE_URL; ?>Login/SaveInfor" method="post">
                    <label for="fullname">Tên: </label>
                    <input type="text" id="fullname" name="fullname" placeholder="" value="<?php echo $data['ThongtinKH']['TenKH']  ?>">
                    <br>
                    <label for="sdt">Số điện thoại: </label>
                    <input type="text" id="sdt" name="sdt" placeholder="" value="<?php echo $data['ThongtinKH']['SoDienThoai'] ?>">
                    <br>
                    <label for="email">Email: </label>
                    <input type="text" name="email" id="email" placeholder="" value="<?php echo $data['ThongtinKH']['Email'] ?>">
                    <br>
                    <label for="address">Địa chỉ: </label>
                    <input type="text" name="address" id="address" placeholder="" value="<?php echo $data['ThongtinKH']['DiaChi'] ?>">
                    <br>
                    <input type="submit" name = "saveinfor" value="Lưu">
                </form>
                 
            </div>