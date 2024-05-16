<div class="cus-change-pssd">
    <div class="cus-h1">
        <h1>Thay đổi mật khẩu</h1>
    <p>Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</p>
    <hr>
    </div>
    <div class="cus-info">
        <form action="<?php echo BASE_URL; ?>thongtin/SavePass" method="post">
            <label for="cus-old-passwd">Mật khẩu cũ: </label>
            <input type="password" id="cus-old-passwd" name="cus-old-passwd" placeholder="">
            <br>
            <label for="cus-new-passwd">Mật khẩu mới: </label>
            <input type="password" id="cus-new-passwd" name="cus-old-passwd" placeholder="">
            <br>
            <label for="cus-cfm-passwd">Xác nhận mật khẩu: </label>
            <input type="password" id="cus-cfm-passwd" name="cus-old-passwd" placeholder="">
            <br>
            <input type="submit" name = "savepass" value="Lưu">
        </form>
    </div>
</div>