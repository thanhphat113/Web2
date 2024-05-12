<div class="top">
	<a href="index.php?id=sanpham" class="box box1">
			<span class="title-box">Sản Phẩm</span>
			<p class="box-content">100</p>
	</a>
	<a href="index.php?id=khachhang" class="box box2">
			<span class="title-box">Khách Hàng</span>
			<p class="box-content">100</p>
	</a>
	<a href="index.php?id=nhanvien" class="box box3">
			<span class="title-box">Nhân viên</span>
			<p class="box-content">100</p>
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
			<div class="table-list">
			<form action="detail_bill.php" method="get">
				<table  class = "table_view">
					<thead>
						<tr>
						<th>Mã hoá đơn</th>
						<th>Nhân viên </th>
						<th>Khách hàng</th>
						<th>Mã KM</th>
						<th>Ngày tạo</th>
						<th>Tổng tiền</th>
						<th>Trạng thái</th>
						<th>Chức năng</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data['hoadon_list'] as $hd) {
								$color = "#FF3300";
								$trangthai = "Chưa xác nhận";
								if ($hd->getTrangthai() == 0) {
									$trangthai = "Chưa xác nhận";
								} else {
									$color = "#00FF99";
									$trangthai = "Đã xác nhận";
								}
									echo'<tr> 
											<td>'.$hd->getMahd().'</td>
									 		<td>'.$hd->getMaNV().'</td>';
											// if ($hd->getNv() != null)
											// 	echo $hd->getNv()->getTennv().'</td>';
									echo	'<td>'.$hd->getMakh().'</td>
											<td>'.$hd->getMakm() .'</td>
											<td>'.$hd->getNgaytao() .'</td>
											<td>'.$hd->getTongtien().'</td>
											<td style="color:'.$color.'">'.$trangthai.'</td>
											<td>
												<button style="background-color:#00FFFF;border-radius:10px;" type="button" id="mahd" value="'.$hd->getMahd().'"><i class="far fa-eye"></i> Xem</button>
											</td>
										</tr>';
									}
								
						?>
					</tbody>
				</table>
			</form>
			</div>
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
		<!-- <div class="box-title"> -->
		<h3><i class="fas fa-chart-bar"></i> Doanh thu theo năm</h3><hr>
		<!-- </div> -->
		<canvas id="myChart"></canvas>
	</div>
	<div class="boxex chart-box">
		<h3><i class="fas fa-chart-pie"></i> Thị phần các loại sản phẩm bán được</h3><hr>
		<canvas id="myDonutChart" width="50" height="50"></canvas>
	</div>
</div>