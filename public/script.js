function changeContentWidth(isHovered) {
	var content = document.querySelector('.content');
	if (isHovered) {
	  content.classList.add('expanded');
	} else {
	  content.classList.remove('expanded');
	}
  }


//ADMIN
//Hiện Modal thêm
function moveModal(modal){
    document.getElementById(modal).style.display = 'block';
}
function xacnhanDelete(modal,id,text){
    document.getElementById(modal).style.display = 'block';
    document.getElementById(text).innerHTML = id;
    document.getElementById('btn-delete').value = id;
}
function moveEdit(modal,ma,ten,ns,mail,sdt,dc,matk,gt){
    if(modal == "modal-edit-employee"){
        document.getElementById(modal).style.display = 'block';
        document.getElementById('email-current').value = mail;
        document.getElementById('phone-current').value = sdt;
        document.getElementById('id-epl-edit').value = ma;
        document.getElementById('name-epl-edit').value = ten;
        document.getElementById('birt-epl-edit').value = ns;
        document.getElementById('email-epl-edit').value = mail;
        document.getElementById('phone-epl-edit').value = sdt;
        document.getElementById('addres-epl-edit').value = dc;
        document.getElementById('idtk-epl-edit').value = matk;
        if(gt === "Nam"){
            document.getElementById('Nam').checked = true;
        }else{
            document.getElementById('Nu').checked = true;
        }
    }
    else if(modal == "modal-edit-customer"){
        document.getElementById(modal).style.display = 'block';
        document.getElementById('email-current').value = mail;
        document.getElementById('phone-current').value = sdt;
        document.getElementById('id-cus-edit').value = ma;
        document.getElementById('name-cus-edit').value = ten;
        document.getElementById('email-cus-edit').value = mail;
        document.getElementById('phone-cus-edit').value = sdt;
        document.getElementById('addres-cus-edit').value = dc;
        document.getElementById('idtk-cus-edit').value = matk;
    }
    else if(modal == "modal-edit-accout"){
        document.getElementById(modal).style.display = 'block';
        document.getElementById('id-acc-edit').value = ma;
        document.getElementById('user-current').value = ten;
        document.getElementById('user-acc-edit').value = ten;
        document.getElementById('pass-acc-edit').value = ns;
        document.getElementById('pass2-acc-edit').value = ns;
        document.getElementById('quyen-acc-edit').value = sdt;
        document.getElementById('trangthai-acc-edit').value = dc;
    }
    
}
//Ẩn Modal thêm
function exitAdd(item){
    document.getElementById(item).style.display = 'none';
    var gender = document.getElementsByName('gender');
    if(item == "modal-add-employee"){
        let errors = ["error-ten-nv","error-ma-nv","error-matk-nv","error-gioitinh-nv","error-sdt-nv","error-mail-nv","error-diachi-nv","error-ngaysinh-nv"]
        errors.forEach(function(item){
            document.getElementById(item).innerHTML=""
        })
        let texts = ["name-epl-input","email-epl-input","birt-epl-input","addres-epl-input","phone-epl-input","idtk-epl-input"]
        texts.forEach(function(item){
        document.getElementById(item).value = "";
        })
    }
    for (var i = 0; i < gender.length; i++) {
        if (gender[i].checked) {
            gender[i].checked = false;
        }
    }
}
function exitXacnhan(item){
    document.getElementById(item).style.display = 'none';
}
function xacNhanEdit(item) {
    if(item == "nhanvien"){
        var phones = document.getElementById('span-phones').textContent;
        let mail_current = document.getElementById('email-current').value;
        let phone_current = document.getElementById('phone-current').value;
        var emails = document.getElementById('span-email').textContent;
		let ma= document.getElementById('id-epl-edit').value;
        let ten= document.getElementById('name-epl-edit').value;
        let ngaysinh = document.getElementById('birt-epl-edit').value;
		let mail = document.getElementById('email-epl-edit').value;
		let sdt = document.getElementById('phone-epl-edit').value;
        let diachi = document.getElementById('addres-epl-edit').value;
		let matk = document.getElementById('idtk-epl-edit').value;
        var gioitinh = document.getElementsByName('gender');
        var value;
        var check_phone=true;
        var check_mail=true;
        var phone_list = JSON.parse(phones);
        var email_list = JSON.parse(emails);
 
        for (var i = 0; i < gioitinh.length; i++) {
            if (gioitinh[i].checked) {
                value = gioitinh[i].value;
            }
        }
        if(phone_current == sdt){
            check_phone == true;
        }
        else{
            for (var i = 0; i < phone_list.length; i++) {
                if (phone_list[i] === sdt) {
                    check_phone = false;
                }
            }
        }

        if(mail_current == mail){
            check_mail == true;
        }
        else{
            for (var i = 0; i < email_list.length; i++) {
                if (email_list[i] === mail) {
                    check_mail = false;
                }
            }
        }
        
        if(check_mail == true && check_phone == true && ma != "" && ten != "" && matk != "" && ngaysinh != "" && sdt != "" && diachi != "" && mail != "" && (value === 'Nam' || value ==='Nữ') && matk.match(/^[a-zA-Z0-9]*$/) && sdt.match(/^[0-9]{10}$/) && mail.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/) && ten.match(/^[A-Za-z\sáàảãạâấầẩẫậăắằẳẵặéèẻẽẹêếềểễệíìỉĩịóòỏõọôồốổỗộơờớởỡợúùủũụưứừửữựýỳỷỹỵ]+$/)){
            let errors = ["error-ten-nv-edit","error-ma-nv-edit","error-matk-nv-edit","error-gioitinh-nv-edit","error-sdt-nv-edit","error-mail-nv-edit","error-diachi-nv-edit","error-ngaysinh-nv-edit"]
            errors.forEach(function(item){
                document.getElementById(item).innerHTML = "";
            })
            document.getElementById('id-edit').innerHTML = ma;
            document.getElementById("edit-xacnhan-employee").style.display="block"
        }
        else { 
            if(ten == ""){
            document.getElementById("error-ten-nv-edit").innerHTML = "Vui lòng nhập tên nhân viên !";
            }
			else if(!ten.match(/^[A-Za-z\sáàảãạâấầẩẫậăắằẳẵặéèẻẽẹêếềểễệíìỉĩịóòỏõọôồốổỗộơờớởỡợúùủũụưứừửữựýỳỷỹỵ]+$/)){
				document.getElementById("error-ten-nv-edit").innerHTML = "Tên nhân viên chỉ gồm chữ cái !";
				}
            else{
                document.getElementById("error-ten-nv-edit").innerHTML = "";
            }
            if(matk == ""){
                document.getElementById("error-matk-nv-edit").innerHTML = "Vui lòng nhập mã tài khoản !";
            }
			else if(!matk.match(/^[a-zA-Z0-9]*$/)){
                document.getElementById("error-matk-nv-edit").innerHTML = "Mã tài khoản chỉ gồm chữ cái và số !";
            }
            else{
                document.getElementById("error-matk-nv-edit").innerHTML = "";
            }
            if(value === 'Nam' || value ==='Nữ'){
                document.getElementById("error-gioitinh-nv-edit").innerHTML = "";
            }
            else{
                document.getElementById("error-gioitinh-nv-edit").innerHTML = "Vui lòng chọn giới tính !";
            }
            if(diachi == ""){
                document.getElementById("error-diachi-nv-edit").innerHTML = "Vui lòng nhập địa chỉ !";
            }
            else{
                document.getElementById("error-diachi-nv-edit").innerHTML = "";
            }
            if(mail == ""){
                document.getElementById("error-mail-nv-edit").innerHTML = "Vui lòng nhập email !";
            }
			else if(!mail.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/)){
                document.getElementById("error-mail-nv-edit").innerHTML = "Email không hợp lệ !";
            }
            else if(check_mail === false){
                document.getElementById("error-mail-nv-edit").innerHTML = "Email da ton tai !";
            }
            else{
                document.getElementById("error-mail-nv-edit").innerHTML = "";
            }
            if(sdt == ""){
                document.getElementById("error-sdt-nv-edit").innerHTML = "Vui lòng nhập số điện thoại !";
            }
			else if(!sdt.match(/^[0-9]{10}$/)){
                document.getElementById("error-sdt-nv-edit").innerHTML = "Sô điện thoại gồm 10 chữ số !";
            }
            else if(check_phone === false){
                document.getElementById("error-sdt-nv-edit").innerHTML = "Sô điện thoại ton tai!";
            }
            else{
                document.getElementById("error-sdt-nv-edit").innerHTML = "";
            }
            if(ngaysinh == ""){
                document.getElementById("error-ngaysinh-nv").innerHTML = "Vui lòng chọn ngày sinh !";
            }
            else{
                document.getElementById("error-ngaysinh-nv").innerHTML = "";
            }
        }
    }
    if(item == "khachhang"){
        var phones = document.getElementById('span-phones-kh').textContent;
        let mail_current = document.getElementById('email-current').value;
        let phone_current = document.getElementById('phone-current').value;
        var emails = document.getElementById('span-email-kh').textContent;
		let ma= document.getElementById('id-cus-edit').value;
        let ten= document.getElementById('name-cus-edit').value;
		let mail = document.getElementById('email-cus-edit').value;
		let sdt = document.getElementById('phone-cus-edit').value;
        let diachi = document.getElementById('addres-cus-edit').value;
		let matk = document.getElementById('idtk-cus-edit').value;
        var check_phone=true;
        var check_mail=true;
        var phone_list = JSON.parse(phones);
        var email_list = JSON.parse(emails);
        if(phone_current == sdt){
            check_phone == true;
        }
        else{
            for (var i = 0; i < phone_list.length; i++) {
                if (phone_list[i] === sdt) {
                    check_phone = false;
                }
            }
        }

        if(mail_current == mail){
            check_mail == true;
        }
        else{
            for (var i = 0; i < email_list.length; i++) {
                if (email_list[i] === mail) {
                    check_mail = false;
                }
            }
        }
        
        if(check_mail == true && check_phone == true && ma != "" && ten != "" && matk != "" && sdt != "" && diachi != "" && mail != "" && matk.match(/^[a-zA-Z0-9]*$/) && sdt.match(/^[0-9]{10}$/) && mail.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/) && ten.match(/^[A-Za-z\sáàảãạâấầẩẫậăắằẳẵặéèẻẽẹêếềểễệíìỉĩịóòỏõọôồốổỗộơờớởỡợúùủũụưứừửữựýỳỷỹỵ]+$/)){
            let errors = ["error-ten-kh-edit","error-ma-kh-edit","error-matk-kh-edit","error-sdt-kh-edit","error-mail-kh-edit","error-diachi-kh-edit"]
            errors.forEach(function(item){
                document.getElementById(item).innerHTML = "";
            })
            document.getElementById('id-edit-cus').innerHTML = ma;
            document.getElementById("edit-xacnhan-customer").style.display="block"
        }
        else { 
            if(ten == ""){
            document.getElementById("error-ten-kh-edit").innerHTML = "Vui lòng nhập tên nhân viên !";
            }
			else if(!ten.match(/^[A-Za-z\sáàảãạâấầẩẫậăắằẳẵặéèẻẽẹêếềểễệíìỉĩịóòỏõọôồốổỗộơờớởỡợúùủũụưứừửữựýỳỷỹỵ]+$/)){
				document.getElementById("error-ten-kh-edit").innerHTML = "Tên nhân viên chỉ gồm chữ cái !";
				}
            else{
                document.getElementById("error-ten-kh-edit").innerHTML = "";
            }
            if(matk == ""){
                document.getElementById("error-matk-kh-edit").innerHTML = "Vui lòng nhập mã tài khoản !";
            }
			else if(!matk.match(/^[a-zA-Z0-9]*$/)){
                document.getElementById("error-matk-kh-edit").innerHTML = "Mã tài khoản chỉ gồm chữ và số !";
            }
            else{
                document.getElementById("error-matk-kh-edit").innerHTML = "";
            }
            if(diachi == ""){
                document.getElementById("error-diachi-kh-edit").innerHTML = "Vui lòng nhập địa chỉ !";
            }
            else{
                document.getElementById("error-diachi-kh-edit").innerHTML = "";
            }
            if(mail == ""){
                document.getElementById("error-mail-kh-edit").innerHTML = "Vui lòng nhập email !";
            }
			else if(!mail.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/)){
                document.getElementById("error-mail-kh-edit").innerHTML = "Email không hợp lệ !";
            }
            else if(check_mail === false){
                document.getElementById("error-mail-kh-edit").innerHTML = "Email da ton tai !";
            }
            else{
                document.getElementById("error-mail-kh-edit").innerHTML = "";
            }
            if(sdt == ""){
                document.getElementById("error-sdt-kh-edit").innerHTML = "Vui lòng nhập số điện thoại !";
            }
			else if(!sdt.match(/^[0-9]{10}$/)){
                document.getElementById("error-sdt-kh-edit").innerHTML = "Sô điện thoại gồm 10 chữ số !";
            }
            else if(check_phone === false){
                document.getElementById("error-sdt-kh-edit").innerHTML = "Sô điện thoại ton tai!";
            }
            else{
                document.getElementById("error-sdt-kh-edit").innerHTML = "";
            }
        }
    }
    if(item == "taikhoan"){
        var users = document.getElementById('span-user-tk').textContent;
        let user_current = document.getElementById('user-current').value;
		let ma= document.getElementById('id-acc-edit').value;
        let user= document.getElementById('user-acc-edit').value;
		let pass = document.getElementById('pass-acc-edit').value;
		let pass2 = document.getElementById('pass2-acc-edit').value;
        
        var check_user = true;

        var user_list = JSON.parse(users);
        
        if(user_current == user){
            check_user == true;
        }
        else{
            for (var i = 0; i < user_list.length; i++) {
                if (user_list[i] === user) {
                    check_user = false;
                }
            }
        }
        
        if(check_user == true && ma != "" && user != "" && pass != "" && pass2 != "" && pass2 == pass &&  pass.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/) && user.match(/^[a-zA-Z0-9]*$/) ){
            let errors = ["error-ma-tk-edit","error-user-tk-edit","error-pass-tk-edit","error-pass2-tk-edit","error-quyen-tk-edit"]
            errors.forEach(function(item){
                document.getElementById(item).innerHTML = "";
            })
            document.getElementById('id-edit-acc').innerHTML = ma;
            document.getElementById("edit-xacnhan-accout").style.display="block"
        }
        else { 
            if(user == ""){
                document.getElementById("error-user-tk-edit").innerHTML = "Vui lòng nhập tài khoản !";
            }
            else if(check_user === false){
                document.getElementById("error-user-tk-edit").innerHTML = "Tên tài khoản đã tồn tại !";
            }
			else if(!user.match(/^[a-zA-Z0-9]*$/)){
				document.getElementById("error-user-tk-edit").innerHTML = "Tên khách hàng chỉ gồm chữ cái hoa, thường và số !";
				}
            else{
                document.getElementById("error-user-tk-edit").innerHTML = "";
            }
            if(pass == ""){
                document.getElementById("error-pass-tk-edit").innerHTML = "Vui lòng nhập mật khẩu !";
            }
			else if(!pass.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/)){
                document.getElementById("error-pass-tk-edit").innerHTML = "Sai định dạng! Mật khẩu gồm(chữ hoa, thường và số)!";
            }
            else{
                document.getElementById("error-pass-tk-edit").innerHTML = "";
            }
            if(pass2 == ""){
                document.getElementById("error-pass2-tk-edit").innerHTML = "Vui lòng nhập mật khẩu !";
            }
            else if(pass != pass2){
                document.getElementById("error-pass2-tk-edit").innerHTML = "Sai mật khẩu !";
            }
            else{
                document.getElementById("error-pass2-tk-edit").innerHTML = "";
            }
        }
    }
}
function xacnhanAdd(item) {
    if(item == "nhanvien"){
        var phones = document.getElementById('span-phones').textContent;
        var emails = document.getElementById('span-email').textContent;
		let ma= document.getElementById('id-epl-input').value;
        let ten= document.getElementById('name-epl-input').value;
        let ngaysinh = document.getElementById('birt-epl-input').value;
		let mail = document.getElementById('email-epl-input').value;
		let sdt = document.getElementById('phone-epl-input').value;
        let diachi = document.getElementById('addres-epl-input').value;
		let matk = document.getElementById('idtk-epl-input').value;
        var gioitinh = document.getElementsByName('gender');
        var value;
        var check_phone=true;
        var check_mail=true;
        var phone_list = JSON.parse(phones);
        var email_list = JSON.parse(emails);
 
        for (var i = 0; i < gioitinh.length; i++) {
            if (gioitinh[i].checked) {
                value = gioitinh[i].value;
            }
        }

        for (var i = 0; i < email_list.length; i++) {
            if (email_list[i] === mail) {
                check_mail = false;
            }
        }

        for (var i = 0; i < phone_list.length; i++) {
            if (phone_list[i] === sdt) {
                check_phone = false;
            }
        }
        
        if(check_mail == true && check_phone == true && ma != "" && ten != "" && matk != "" && ngaysinh != "" && sdt != "" && diachi != "" && mail != "" && (value === 'Nam' || value ==='Nữ') && matk.match(/^[a-zA-Z0-9]*$/) && sdt.match(/^[0-9]{10}$/) && mail.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/) && ten.match(/^[A-Za-z\sáàảãạâấầẩẫậăắằẳẵặéèẻẽẹêếềểễệíìỉĩịóòỏõọôồốổỗộơờớởỡợúùủũụưứừửữựýỳỷỹỵ]+$/)){
            let errors = ["error-ten-nv","error-ma-nv","error-matk-nv","error-gioitinh-nv","error-sdt-nv","error-mail-nv","error-diachi-nv","error-ngaysinh-nv"]
            errors.forEach(function(item){
                document.getElementById(item).innerHTML = "";
            })
            document.getElementById('id-add').innerHTML = ma;
            document.getElementById("add-xacnhan-employee").style.display="block"
        }
        else { 
            if(ten == ""){
            document.getElementById("error-ten-nv").innerHTML = "Vui lòng nhập tên nhân viên !";
            }
			else if(!ten.match(/^[A-Za-z\sáàảãạâấầẩẫậăắằẳẵặéèẻẽẹêếềểễệíìỉĩịóòỏõọôồốổỗộơờớởỡợúùủũụưứừửữựýỳỷỹỵ]+$/)){
				document.getElementById("error-ten-nv").innerHTML = "Tên nhân viên chỉ gồm chữ cái !";
				}
            else{
                document.getElementById("error-ten-nv").innerHTML = "";
            }
            if(matk == ""){
                document.getElementById("error-matk-nv").innerHTML = "Vui lòng nhập mã tài khoản !";
            }
			else if(!matk.match(/^[a-zA-Z0-9]*$/)){
                document.getElementById("error-matk-nv").innerHTML = "Mã tài khoản chỉ gồm chữ cái và số !";
            }
            else{
                document.getElementById("error-matk-nv").innerHTML = "";
            }
            if(value === 'Nam' || value ==='Nữ'){
                document.getElementById("error-gioitinh-nv").innerHTML = "";
            }
            else{
                document.getElementById("error-gioitinh-nv").innerHTML = "Vui lòng chọn giới tính !";
            }
            if(diachi == ""){
                document.getElementById("error-diachi-nv").innerHTML = "Vui lòng nhập địa chỉ !";
            }
            else{
                document.getElementById("error-diachi-nv").innerHTML = "";
            }
            if(mail == ""){
                document.getElementById("error-mail-nv").innerHTML = "Vui lòng nhập email !";
            }
			else if(!mail.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/)){
                document.getElementById("error-mail-nv").innerHTML = "Email không hợp lệ !";
            }
            else if(check_mail === false){
                document.getElementById("error-mail-nv").innerHTML = "Email da ton tai !";
            }
            else{
                document.getElementById("error-mail-nv").innerHTML = "";
            }
            if(sdt == ""){
                document.getElementById("error-sdt-nv").innerHTML = "Vui lòng nhập số điện thoại !";
            }
			else if(!sdt.match(/^[0-9]{10}$/)){
                document.getElementById("error-sdt-nv").innerHTML = "Sô điện thoại gồm 10 chữ số !";
            }
            else if(check_phone === false){
                document.getElementById("error-sdt-nv").innerHTML = "Sô điện thoại ton tai!";
            }
            else{
                document.getElementById("error-sdt-nv").innerHTML = "";
            }
            if(ngaysinh == ""){
                document.getElementById("error-ngaysinh-nv").innerHTML = "Vui lòng chọn ngày sinh !";
            }
            else{
                document.getElementById("error-ngaysinh-nv").innerHTML = "";
            }
        }
    }
    if(item == "khachhang"){
        var phones = document.getElementById('span-phones-kh').textContent;
        var emails = document.getElementById('span-email-kh').textContent;
		let ma= document.getElementById('id-cus-input').value;
        let ten= document.getElementById('name-cus-input').value;
		let mail = document.getElementById('email-cus-input').value;
		let sdt = document.getElementById('phone-cus-input').value;
        let diachi = document.getElementById('addres-cus-input').value;
		let matk = document.getElementById('idtk-cus-input').value;
        var check_phone=true;
        var check_mail=true;
        var phone_list = JSON.parse(phones);
        var email_list = JSON.parse(emails);
        for (var i = 0; i < email_list.length; i++) {
            if (email_list[i] === mail) {
                check_mail = false;
            }
        }
        for (var i = 0; i < phone_list.length; i++) {
            if (phone_list[i] === sdt) {
                check_phone = false;
            }
        }
        
        if(check_mail == true && check_phone == true && ma != "" && ten != "" && matk != "" && sdt != "" && diachi != "" && mail != "" &&  matk.match(/^[a-zA-Z0-9]*$/) && sdt.match(/^[0-9]{10}$/) && mail.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/) && ten.match(/^[A-Za-z\sáàảãạâấầẩẫậăắằẳẵặéèẻẽẹêếềểễệíìỉĩịóòỏõọôồốổỗộơờớởỡợúùủũụưứừửữựýỳỷỹỵ]+$/)){
            let errors = ["error-ten-kh","error-ma-kh","error-matk-kh","error-sdt-kh","error-mail-kh","error-diachi-kh"]
            errors.forEach(function(item){
                document.getElementById(item).innerHTML = "";
            })
            document.getElementById('id-add-cus').innerHTML = ma;
            document.getElementById("add-xacnhan-customer").style.display="block"
        }
        else { 
            if(ten == ""){
            document.getElementById("error-ten-kh").innerHTML = "Vui lòng nhập tên khách hàng !";
            }
			else if(!ten.match(/^[A-Za-z\sáàảãạâấầẩẫậăắằẳẵặéèẻẽẹêếềểễệíìỉĩịóòỏõọôồốổỗộơờớởỡợúùủũụưứừửữựýỳỷỹỵ]+$/)){
				document.getElementById("error-ten-kh").innerHTML = "Tên khách hàng chỉ gồm chữ cái !";
				}
            else{
                document.getElementById("error-ten-kh").innerHTML = "";
            }
            if(matk == ""){
                document.getElementById("error-matk-kh").innerHTML = "Vui lòng nhập mã tài khoản !";
            }
			else if(!matk.match(/^[a-zA-Z0-9]*$/)){
                document.getElementById("error-matk-kh").innerHTML = "Mã tài khoản chỉ gồm chữ và số !";
            }
            else{
                document.getElementById("error-matk-kh").innerHTML = "";
            }
            if(diachi == ""){
                document.getElementById("error-diachi-kh").innerHTML = "Vui lòng nhập địa chỉ !";
            }
            else{
                document.getElementById("error-diachi-kh").innerHTML = "";
            }
            if(mail == ""){
                document.getElementById("error-mail-kh").innerHTML = "Vui lòng nhập email !";
            }
			else if(!mail.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/)){
                document.getElementById("error-mail-kh").innerHTML = "Email không hợp lệ !";
            }
            else if(check_mail === false){
                document.getElementById("error-mail-kh").innerHTML = "Email da ton tai !";
            }
            else{
                document.getElementById("error-mail-kh").innerHTML = "";
            }
            if(sdt == ""){
                document.getElementById("error-sdt-kh").innerHTML = "Vui lòng nhập số điện thoại !";
            }
			else if(!sdt.match(/^[0-9]{10}$/)){
                document.getElementById("error-sdt-kh").innerHTML = "Sô điện thoại gồm 10 chữ số !";
            }
            else if(check_phone === false){
                document.getElementById("error-sdt-kh").innerHTML = "Sô điện thoại ton tai!";
            }
            else{
                document.getElementById("error-sdt-kh").innerHTML = "";
            }
        }
    }
    if(item == "taikhoan"){
        var users = document.getElementById('span-user-tk').textContent;
		let ma= document.getElementById('id-acc-input').value;
        let user= document.getElementById('user-acc-input').value;
		let pass = document.getElementById('pass-acc-input').value;
		let pass2 = document.getElementById('pass2-acc-input').value;
        
        var check_user = true;

        var user_list = JSON.parse(users);
        for (var i = 0; i < user_list.length; i++) {
            if (user_list[i] === user) {
                check_user = false;
            }
        }
        
        if(check_user == true && ma != "" && user != "" && pass != "" && pass2 != "" && pass2 == pass &&  pass.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/) && user.match(/^[a-zA-Z0-9]*$/) ){
            let errors = ["error-ma-tk","error-user-tk","error-pass-tk","error-pass2-tk","error-quyen-tk"]
            errors.forEach(function(item){
                document.getElementById(item).innerHTML = "";
            })
            document.getElementById('id-add-acc').innerHTML = ma;
            document.getElementById("add-xacnhan-accout").style.display="block"
        }
        else { 
            if(user == ""){
                document.getElementById("error-user-tk").innerHTML = "Vui lòng nhập tài khoản !";
            }
            else if(check_user === false){
                document.getElementById("error-user-tk").innerHTML = "Tên tài khoản đã tồn tại !";
            }
			else if(!user.match(/^[a-zA-Z0-9]*$/)){
				document.getElementById("error-user-tk").innerHTML = "Tên khách hàng chỉ gồm chữ cái hoa, thường và số !";
				}
            else{
                document.getElementById("error-user-tk").innerHTML = "";
            }
            if(pass == ""){
                document.getElementById("error-pass-tk").innerHTML = "Vui lòng nhập mật khẩu !";
            }
			else if(!pass.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/)){
                document.getElementById("error-pass-tk").innerHTML = "Sai định dạng! Mật khẩu gồm(chữ hoa, thường và số)!";
            }
            else{
                document.getElementById("error-pass-tk").innerHTML = "";
            }
            if(pass2 == ""){
                document.getElementById("error-pass2-tk").innerHTML = "Vui lòng nhập mật khẩu !";
            }
            else if(pass != pass2){
                document.getElementById("error-pass2-tk").innerHTML = "Sai mật khẩu !";
            }
            else{
                document.getElementById("error-pass2-tk").innerHTML = "";
            }
        }
    }
}

    var search = document.getElementById("search-input");
    var dataTable = document.getElementById("viewTable");
    var tableRows = dataTable.getElementsByTagName("tr");

    search.addEventListener("input", function () {
        var keyword = search.value.trim().toLowerCase();

        // Duyệt qua từng dòng của bảng
        for (var i = 1; i < tableRows.length; i++) {
            var row = tableRows[i];
            var cells = row.getElementsByTagName("th");
            var matchFound = false;

            // Duyệt qua từng ô dữ liệu trong dòng
            for (var j = 0; j < cells.length; j++) {
                var cell = cells[j];
                var cellText = cell.textContent.toLowerCase();

                // Nếu từ khóa khớp với nội dung của ô dữ liệu
                if (cellText.includes(keyword)) {
                    matchFound = true;
                    break;
                }
            }

            // Hiển thị hoặc ẩn dòng dựa trên kết quả tìm kiếm
            if (matchFound) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        }
    });

    function thongbao(message) {
        const tb = document.querySelector(".thongbao")
        tb.style.right = '20px'
        let length = 70
        let process = document.querySelector(".process")
        const mess = document.querySelector(".mess");
        mess.textContent = message;
        const run = setInterval(() => {
            process.style.height = length + 'px'
            length -= 5
            if (length <= -10) {
                clearInterval(run)
                tb.style.right = '-500px'
            }
        }, 200)
    }
    
