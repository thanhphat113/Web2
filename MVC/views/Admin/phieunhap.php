
<div class="hoadon-menu_top">
		<h1 style="margin-left: 10px;">Quản lý phiếu nhập</h1>
	</div>
	<div class="hoadon-content">
		<input type="text" id="search-input" class="txtSearch" placeholder="Nhập thông tin tìm kiếm"/>
		<button style="transition: all .75s ease;" class="btn-add" onclick="thongbao('phieunhap')">Thêm</button>
		<div class="showList" >
			<table id="viewTable">
				<thead>
					<tr>
						<th style="width: 100px;">Mã phiếu nhập</th>
						<th>Nhà cung cấp</th>
						<th>Ngày tạo</th>
						<th>Tổng tiền</th>
						<th style="width: 90px;">Xem chi tiết</th>
						<th>Chức năng</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($data['list'] as $pn) {
								echo'<tr> 
										<th>'.$pn->getMapn(). '</th>
										<th>'.$pn->getMancc().'</th>
										<th>'.$pn->getNgayTao().'</th>
										<th>'.$pn->getTongTien().'</th>
										<th style="width:100px">
											<button><i class="fas fa-info-circle action" style="color: #5d88a2;"></i></button>
										</th>
										<th style="width:200px">
											<button><i class="far fa-check-circle action" style="color: #63E6BE"></i></button>
											<button><i class="far fa-edit action" style="color: #74C0FC;"></i></button>
											<button><i class="fas fa-trash-alt action" style="color: #e13737;"></i></button>
										</th>
									</tr>';
								}
					?>
				</tbody>
			</table>
		</div>

		<div style="background-color:aqua; width: 100%;position:fixed;z-index:1" class="myModel">
				<div class="content">
					<div class="model-top">
						<h1>THÊM PHIẾU NHẬP</h1>
					</div>
					<div class="model-content">
						<span>Mã phiếu nhập</span>
						<span>Nhà cung cấp</span>
						<span>Ngày tạo</span>
					</div>
				</div>
		</div>
	</div>
