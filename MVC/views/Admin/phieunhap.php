
<div class="hoadon-menu_top">
		<h1 style="margin-left: 10px;">Quản lý phiếu nhập</h1>
	</div>
	<input type="hidden" id="year-choise-chart">
	<div class="hoadon-content">
		<input type="text" id="search-input" class="txtSearch" placeholder="Nhập thông tin tìm kiếm"/>
		<button style="transition: all .75s ease;" class="btn-add" onclick="showModel('myModel')">Thêm</button>
		<div class="showList" >
		
			<table id="viewTable">
				<thead>
					<tr>
						<th onclick="sortTable(0)" style="width: 100px;">Mã phiếu nhập</th>
						<th onclick="sortTable(1)"> Nhà cung cấp</th>
						<th onclick="sortTable(2)">Ngày tạo</th>
						<th onclick="sortTable(3)">Tổng tiền<small> (vnđ)</small></th>
						<th onclick="sortTable(4)" style="width: 90px;">Xem chi tiết</th>
						<th onclick="sortTable(5)">Chức năng</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data['pn_list'] as $pn):?>
						<tr>
							
							<td><?php echo $pn->getMapn(); ?></td>
							<td><?php echo $pn->getNcc()->gettenncc(); ?></td>
							<td><?php echo $pn->getNgayTao(); ?></td>
							<td><?php echo number_format($pn->getTongTien(), 0, ',', '.'); ?></td>
							<td style="width:100px">
								<button id="detail-pn" value=<?php echo '"'.$pn->getMapn().'"'; ?>><i class="fas fa-info-circle action" style="color: #5d88a2;"></i></button>
							</td>
							<td style="width:200px">
							<form action="./admin/phieunhap" method="post">
								<input type="hidden" name="mapn" value=<?php echo '"'.$pn->getMapn().'"'; ?> />
								<button type="submit" name="type" value="delete"><i class="fas fa-trash-alt action" style="color: #e13737;"></i></button>
							</form>
							</td>
						</tr>
						<?php endforeach; ?>
				</tbody>
			</table>
		</form>
		</div>

		<div id="myModel" class="model <?php if ($data["openModel"]) echo 'show';?>" >
			<input type="hidden" id="MaPN-model" value="<?php echo $data["mapn"] ;?>">
			<div class="model-content">
				<div class="model-click">
					<div  style="margin-bottom: 20px;">
						<span class="close" onclick="closeModal('myModel')" >&times;</span>
					</div>
				</div>

				<div class="model-top">
					<h1>THÊM PHIẾU NHẬP</h1>
				</div>
				<div class="model-content-bottom">
					<input type="hidden" id="mapn"/>
					<div class="form-input">
						<div class="half">
							<div class="choise">
								<span>Nhà cung cấp</span>
								<select id="ncc" class="model-choise">
									<option value="0">-- Nhà cung cấp --</option>
									<?php foreach ($data['ncc_list'] as $ncc){
										echo '<option value="'.$ncc->getMancc().'">'.$ncc->gettenncc().'</option>';
										}
										?>
								</select>
							</div>
							<div class="choise">
								<span>Sản phẩm</span>
									<select id="sanpham" name="selectedValue" class="model-choise" >
										<option value="0">-- Chọn sản phẩm --</option>
										<?php foreach ($data['detail_name_list'] as $dtsp){
												echo '<option value="'.$dtsp['MaSP'].'">'. $dtsp['TenSP'] .'</option>';
												}
												?>
									</select>
							</div>
							<div class="choise">
								<span>Màu sắc</span>
								<select id="mau" class="model-choise" ;?>>
								</select>
							</div>
							<div class="choise">
								<span>Cấu hình</span>
								<select id="cauhinh" class="model-choise" ;?>>
								</select>
							</div>
							<div class="choise">
								<span>Số lượng</span>
								<input id="sl" type="text" />
							</div>
							<div class="choise">
								<span>Giá nhập</span>
								<input id="gianhap" type="text" />
							</div>
						</div>
						<div class="half">
							<button type="button" id="model-btn-add" class="model-btn-add action-model">Thêm</button><br>
							<button type="button" onclick="themPN()" name="type" value="them-phieunhap" style="margin-top:10px;" id="model-btn-add-pn" class="model-btn-add action-model">Thêm phiếu nhập</button>
						</div>


					</div>
				</div>
				<div class="model-table">
					<table id="myTable-Model">
						<thead style="height:30px;">
							<th>Mã chi tiết</th>
							<th>Tên sản phẩm</th>
							<th>Màu sắc</th>
							<th>Cấu hình</th>
							<th>Giá nhập<small>(vnđ)</small></th>
							<th>Số lượng</th>
							<th>Tổng tiền<small>(vnđ)</small></th>
							<th>Chức năng</th>
						</thead>
						<tbody class="tableBody">
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="model-detail" class="model">
			<div class="model-content-detail">
				<input type="hidden" id="MaPN-detail">
				<div class="model-click">
					<div  style="margin-bottom: 20px;">
						<span class="close" onclick="closeModal('model-detail')" >&times;</span>
					</div>
				</div>
				<div class="model-top">
					<h1>Chi Tiết Phiếu Nhập</h1>
				</div>
				<span id="ncc-detail"></span>
				<div class="model-center">
					<table id="table-detail">
						<thead>
							<th>Tên sản phẩm</th>
							<th>Màu</th>
							<th>Cấu hình</th>
							<th>Giá nhập<small>(vnđ)</small></th>
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

