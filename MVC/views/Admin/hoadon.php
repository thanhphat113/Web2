
	<div class="hoadon-menu_top">
		<h1 style="margin-left: 10px;">Quản lý hoá đơn</h1>
	</div>
	<div class="hoadon-content">
		<input id="search-input" type="text" class="txtSearch" placeholder="Nhập thông tin tìm kiếm"/>
		<div class="showList" >
			<input id="year-choise-chart" type="hidden">
			<input id="sanpham" type="hidden">
			<input id="mau" type="hidden">
			<input id="model-btn-add" type="hidden">
			<input id="detail-pn" type="hidden">


			<table id="viewTable">
				<thead>
					<tr>
						<th style="width: 100px;">Mã hoá đơn</th>
						<th>Nhân viên </th>
						<th>Khách hàng</th>
						<th>Mã KM</th>
						<th>Ngày tạo</th>
						<th>Tổng tiền<small>(vnđ)</small></th>
						<th>Tình trạng</th>
						<th style="width: 90px;">Xem chi tiết</th>
						<th>Chức năng</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($data['hoadon_list'] as $hd) {
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
										<td>';
										if ($hd->getNv() != null)
											echo $hd->getNv()->getTennv().'</td>';
								echo	'<td style="width:200px">'.$hd->getKh()->getTenkh().'</td>
										<td>'.$hd->getMakm() .'</td>
										<td>'.$hd->getNgaytao() .'</td>
										<td>'.number_format($hd->getTongtien(), 0, ',', '.').'</td>
										<td style="color:'.$color.'">'.$trangthai.'</td>
										
										<td style="width:100px">
											<button id="detail-hd" value="'.$hd->getMahd().'"> <i class="fas fa-info-circle action" style="color: #5d88a2;"></i></button>
										</td>
										<td style="width:200px">
										<form action="./admin/hoadon" method="post">
											<input type="hidden" name="mahd" value="'.$hd->getMahd().'">
											<input type="hidden" name="manv" value="'.$_SESSION["MaNV"].'">';
										
										
										 if ($hd->getTrangthai() == 0)	echo '<button type="submit" name="type" value="update"><i class="far fa-check-circle action" style="color: #63E6BE"></i></button>
										<button type="submit" name="type" value="delete" id="delete-hd"><i class="fas fa-trash-alt action" style="color: #e13737;"></i></button>
										</td>
										</form>
									</tr>';
								}
					?>
				</tbody>
			</table> 
		</div>

		<div id="model-detail-detail" class="model">
			<div class="model-content-detail">
				<input type="hidden" id="MaPN-detail">
				<div class="model-click">
					<div  style="margin-bottom: 20px;">
						<span class="close" onclick="closeModal('model-detail-detail')" >&times;</span>
					</div>
				</div>
				<div class="model-top">
					<h1>Chi Tiết Hoá Đơn</h1>
				</div>
				<span id="ncc-detail"></span>
				<div class="model-center">
					<table id="table-detail-hd">
						<thead>
							<th>Tên sản phẩm</th>
							<th>Màu</th>
							<th>Cấu hình</th>
							<th>Giá bán<small>(vnđ)</small></th>
							<th>Số lượng</th>
							<th>Giá tiền<small>(vnđ)</small></th>
						</thead>
						<tbody>
							
							
						</tbody>
					</table>
				</div>
				<span id="tong-detail"></span>
			</div>
		</div>					

	</div>

	