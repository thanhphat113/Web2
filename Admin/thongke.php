<?php
	require("./database/connection.php");
?>

<div class="top">
	<a href="index.php?id=sanpham" class="box box1">
			<span class="title-box">Sản Phẩm</span>
			<p class="box-content"><?php echo countProducts();?></p>
	</a>
	<a href="index.php?id=khachhang" class="box box2">
			<span class="title-box">Khách Hàng</span>
			<p class="box-content"><?php echo countCus(); ?></p>
	</a>
	<a href="index.php?id=nhanvien" class="box box3">
			<span class="title-box">Nhân viên</span>
			<p class="box-content"><?php echo countEmployee(); ?></p>
	</a>
	<a href="#bottom" class="box box4">
			<span class="title-box">Doanh Thu</span>
			<p class="box-content">100</p>
	</a>
</div>
<div class="center">
		<div class="boxex">
			<div class="box-title">
				<h1><i class="far fa-money-bill-alt"></i> Danh sách hoá đơn</h1>
			</div>
			<?php $hoadon_list = HoaDon_list(); ?>
				<table  class = "table_view">
					<thead>
						<tr>
						<th>Mã hoá đơn</th>
						<th>Nhân viên </th>
						<th>Khách hàng</th>
						<th>Mã KM</th>
						<th>Ngày tạo</th>
						<th>Tổng tiền</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($hoadon_list as $hoadon) {
									echo'<tr> 
											<td>'.$hoadon["MaHD"].'</td> 
											<td type="left">'.$hoadon["TenNV"] .'</td>
											<td type="left">'.$hoadon["TenKH"] .'</td>
											<td>'.$hoadon["MaKM"] .'</td>
											<td>'.$hoadon["NgayTao"] .'</td>
											<td>'.addFormat($hoadon["TongTien"]).'</td>
											</tr>';
									}
						?>
					</tbody>
				</table>
		</div>
		<div class="boxex">
			<h1><i class="fas fa-star" style="color: #FFD43B;"></i> Top sản phẩm bán chạy</h1><hr>
		</div>
		<div class="boxex">
				<h1><i class="fas fa-money-bill-wave"></i> Danh sách phiếu nhập</h1><hr>
		</div>
		<div class="boxex">
			<h1><i class="fas fa-star" style="color: #FFD43B;"></i> Top khách hàng</h1><hr>
		</div>
</div>
<div class="bottom">
	<div class="boxex chart-box">
		<h3><i class="fas fa-chart-bar"></i> Doanh thu theo năm</h3><hr>
	</div>
	<div class="boxex chart-box">
		<h3><i class="fas fa-chart-pie"></i> Thị phần các loại sản phẩm bán được</h3><hr>
	</div>
</div>