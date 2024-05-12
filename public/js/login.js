
// Ẩn hiện mật khẩu
function togglePasswordVisibility(inputId) {
    var passwordInput = document.getElementById(inputId);
    var eyeIcon = document.querySelector('#' + inputId + ' + .toggle-password .eye-icon');

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.src = "../public/Pictures/hidePass.png";
    } else {
        passwordInput.type = "password";
        eyeIcon.src = "../public/Pictures/showPass.png";
    }
}
// Comfirm password 
function checkPasswordMatch(inputPasswordId, confirmPasswordId, passwordMatchMessageId) {
    var password = document.getElementById(inputPasswordId).value;
    var confirmPassword = document.getElementById(confirmPasswordId).value;
    var passwordMatchMessage = document.getElementById(passwordMatchMessageId);

    if (password === confirmPassword) {
        passwordMatchMessage.innerText = "Mật khẩu trùng khớp";
        passwordMatchMessage.style.color = "green";
        passwordMatchMessage.style.display = "inline-block";
        document.getElementById("btn-register").disabled = false;
    } else {
        passwordMatchMessage.innerText = "Mật khẩu không trùng khớp";
        passwordMatchMessage.style.color = "red";
        passwordMatchMessage.style.display = "inline-block";
        document.getElementById("btn-register").disabled = true;
    }
}

// Sử dụng hàm checkPasswordMatch để kiểm tra sự trùng khớp của mật khẩu in register
document.getElementById("register-password-confirmed").addEventListener("input", function(event) {
    checkPasswordMatch("register-password", "register-password-confirmed", "password-match-message");
});

document.getElementById("register-password").addEventListener("input", function(event) {
    checkPasswordMatch("register-password", "register-password-confirmed", "password-match-message");
});







