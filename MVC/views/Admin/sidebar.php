<div class="sidebar" onmouseover="changeContentWidth(true)" onmouseout="changeContentWidth(false)">
	<div class="top">
		<p align="center">Admin</p><hr>
		<ul align="left">
			<li><a href="./admin">
				<i class="fas fa-list-ul sidebar-icon"></i>
				Trang chủ</a></li>
			<li><a href="./admin/sanpham">
				<i class="fas fa-mobile sidebar-icon"></i>
				Quản lý sản phẩm</a></li>
			<li><a href="./admin/nhanvien">
				<i class="fas fa-user-tie sidebar-icon"></i>
				Quản lý nhân viên</a></li>
			<li><a href="./admin/khachhang">
				<i class="fas fa-user sidebar-icon"></i>
				Quản lý khách hàng</a></li>
			<li><a href="./admin/taikhoan">
				<i class="fas fa-clipboard-list sidebar-icon"></i>
				Quản lý tài khoản</a></li>
			<li><a href="./admin/phieunhap">
				<i class="fas fa-file-invoice sidebar-icon"></i>
				Quản lý phiếu nhập</a></li>
			<li><a href="./admin/hoadon">
				<i class="fas fa-money-bill-alt sidebar-icon"></i>
				Quản lý hoá đơn</a></li>
		</ul>
	</div>
	<div class="bottom">
		<p>Xin chào,<?php echo $data["nvien"]["TenNV"] ?><a href="./home/logout" style="margin-left:5px;"><u> Đăng xuất</u></a></p>
	</div>
</div>