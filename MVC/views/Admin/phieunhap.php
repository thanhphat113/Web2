
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

		<div id="myModel" class="model">
				<div class="model-content">
					<div class="model-top">
						<h1>THÊM PHIẾU NHẬP</h1>
					</div>
					<div class="model-content-bottom">
						<input type="hidden" id="mapn"/>
						<div class="form-input">
							<div class="half">
								<div class="choise">
									<span>Nhà cung cấp</span>
									<select class="model-choise">
										<option value="1">NCC 1</option>
										<option value="2">NCC 2</option>
										<option value="3">NCC 3</option>
									</select>
								</div>
								<div class="choise">
									<span>Sản phẩm</span>
									<select class="model-choise">
										<option value="1">SP1</option>
										<option value="2">SP2</option>
										<option value="3">SP3</option>
									</select>
								</div>
								<div class="choise">
									<span>Số lượng</span>
									<input type="text" />
								</div>
								<div class="choise">
									<span>Giá nhập</span>
									<input type="text" />
								</div>
							</div>
							<div class="half">
								<button class="model-btn-add" style="">Thêm</button>
							</div>
						</div>
					</div>
					<div class="model-table">
						<table >
							<thead style="height:30px;">
								<th>Mã chi tiết</th>
								<th>Tên sản phẩm</th>
								<th>Màu sắc</th>
								<th>Số lượng</th>
								<th>Tổng tiền</th>
								<th>Chức năng</th>
							</thead>
							<tbody>
								<th>1</th>
								<th>Iphone 15</th>
								<th>Titan</th>
								<th>5</th>
								<th>100</th>
								<th>
									<button><i class="far fa-edit action" style="color: #74C0FC;"></i></button>
									<button><i class="fas fa-trash-alt action" style="color: #e13737;"></i></button>
								</th>
							</tbody>
						</table>
					</div>
				</div>
		</div>
	</div>
