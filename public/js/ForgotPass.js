document.getElementById("confirmButton").disabled = true; // Vô hiệu hóa nút

document.getElementById("btn-otp").addEventListener("click", function() {
    var username = document.getElementById("username").value;
    var gmailOrPhone = document.getElementById("gmail-or-phone").value;
    console.log(BASEE_URL);
    
    
    // Tạo một đối tượng XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Xử lý khi có phản hồi từ server
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);
            var passwordOtpMessage = document.getElementById("password-otp-message");
            console.log(response.message);
            // Hiển thị thông báo từ server 
            if (response.success) {
                passwordOtpMessage.innerText = "";
                document.getElementById("confirmButton").disabled = false; // tắt vô hiệu hóa nút
                document.getElementById("btn-otp").disabled = true; // Vô hiệu hóa gửi OTP
                document.getElementById("username").readOnly  = true;
                document.getElementById("gmail-or-phone").readOnly  = true;
            } else {
                
                passwordOtpMessage.innerText = response.message;
            }
        }
    };
    // Thiết lập yêu cầu AJAX
    xhr.open("POST", BASEE_URL+"ForgotPassWord/sentOTPtoGmail", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Gửi dữ liệu form lên server
    xhr.send("btn-otp=1&username=" + username + "&gmail-or-phone=" + gmailOrPhone);

    
});