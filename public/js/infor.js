document.addEventListener("DOMContentLoaded",function (){
    document.getElementById("cus-per-info").addEventListener("click",function(event){
        event.preventDefault();
        var divContent = document.getElementById("cus-right");
        divContent.innerHTML='                <div class="cus-h1">'+
        '<h1>Hồ sơ của tôi</h1>'+
        '<p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>'+
        '<hr>'+
    '</div>'+
    '<div class="cus-info">'+
        '<div class="cus-username">'+
            '<p class="cus-maTK">Mã tài khoản: </p>'+
            '<br>'+
            '<p class="cus-username">Tên đăng nhập: </p>'+
        '</div>'+
        '<form action ="#">'+
            '<label for="fullname">Tên: </label>'+
            '<input type="text" id="fullname" name="fullname" placeholder="">'+
            '<br>'+
            '<label for="sdt">Số điện thoại: </label>'+
            '<input type="text" id="sdt" name="sdt" placeholder="">'+
            '<br>'+
            '<label for="email">Email: </label>'+
            '<input type="text" name="email" id="email" placeholder="">'+
            '<br>'+
            'Địa chỉ:'+
            '<div class="cus-diachi">'+
                '<br>'+
                '<label for="sonha">Số nhà: </label>'+
                '<input type = "text" id="sonha" name="sonha" placeholder="">'+
                '<label for = "tenduong">Tên đường: </label>'+
                '<input type = "text" id="tenduong" name="tenduong" placeholder="">'+
                '<br>'+
                '<label for="phuong">Phường: </label>'+
                '<input type = "text" id ="phuong" name="phuong" placeholder="">'+
                '<label for="quan">Quận: </label>'+
                '<input type = "text" id="quan" name="quan" placeholder="">'+
            '</div>'+
            '<input type="submit" value="Lưu">'+
        '</form>'+
        
    '</div>';
    })
    document.getElementById('cus-orders').addEventListener('click',function(event){
        event.preventDefault();
        var divContent = document.getElementById('cus-right')
        divContent.innerHTML ='';
    })
    document.getElementById('cus-psswd').addEventListener('click',function(event){
        event.preventDefault();
        var divContent = document.getElementById('cus-right')
        divContent.innerHTML ='<div class="cus-change-pssd">'+
        '<div class="cus-h1">'+
            '<h1>Thay đổi mật khẩu</h1>'+
            '<p>Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</p>'+
            '<hr>'+
        '</div>'+
        '<div class="cus-info">'+
        '<form action="#">'+
            '<label for="cus-old-passwd">Mật khẩu cũ: </label>'+
            '<input type="password" id="cus-old-passwd" name="cus-old-passwd" placeholder="">'+
            '<br>'+
            '<label for="cus-new-passwd">Mật khẩu mới: </label>'+
            '<input type="password" id="cus-new-passwd" name="cus-old-passwd" placeholder="">'+
            '<br>'+
            '<label for="cus-cfm-passwd">Xác nhận mật khẩu: </label>'+
            '<input type="password" id="cus-cfm-passwd" name="cus-old-passwd" placeholder="">'+
            '<br>'+
            '<input type="submit" value="Lưu">'+
        '</form>'+
        '</div>'+
    '</div>';
    })
});
