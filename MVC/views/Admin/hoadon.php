
	<div class="hoadon-menu_top">
		<h1 style="margin-left: 10px;">Quản lý hoá đơn</h1>
	</div>
	<div class="hoadon-content">
		<input id="search-input" type="text" class="txtSearch" placeholder="Nhập thông tin tìm kiếm"/>
		<button class="btn-add" onclick="thongbao('hoá đơn')"> Thêm</button>
		<div class="showList" >
			<table id="viewTable">
				<thead>
					<tr>
						<th style="width: 100px;">Mã hoá đơn</th>
						<th>Nhân viên </th>
						<th>Khách hàng</th>
						<th>Mã KM</th>
						<th>Ngày tạo</th>
						<th>Tổng tiền</th>
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
								echo	'<td style="width:200px">'.$hd->getMakh().'</td>
										<td>'.$hd->getMakm() .'</td>
										<td>'.$hd->getNgaytao() .'</td>
										<td>'.$hd->getTongtien().'</td>
										<td style="color:'.$color.'">'.$trangthai.'</td>
										<td style="width:100px">
											<button><i class="fas fa-info-circle action" style="color: #5d88a2;"></i></button>
										</td>
										<td style="width:200px">
											<button><i class="far fa-check-circle action" style="color: #63E6BE"></i></button>
											<button><i class="far fa-edit action" style="color: #74C0FC;"></i></button>
											<button><i class="fas fa-trash-alt action" style="color: #e13737;"></i></button>
										</td>
									</tr>';
								}
					?>
				</tbody>
			</table> 
		</div>
	</div>
