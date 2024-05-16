<div class="top">
	<a href="./admin/sanpham" class="box box1">
			<span class="title-box">Sản Phẩm</span>
			<p class="box-content"><?php echo $data["sp"];?></p>
	</a>
	<a href="./admin/khachhang" class="box box2">
			<span class="title-box">Khách Hàng</span>
			<p class="box-content"><?php echo $data["kh"];?></p>
	</a>
	<a href="./admin/nhanvien" class="box box3">
			<span class="title-box">Nhân viên</span>
			<p class="box-content"><?php echo $data["nv"];?></p>
	</a>
	<a href="#bottom" class="box box4">
			<span class="title-box">Doanh Thu</span>
			<p style="font-size:25px" class="box-content"><?php echo number_format($data["doanhthu"], 0, ',', '.');?> <small style="font-size:10px">(vnđ)</small></p>
	</a>
</div>
<div class="center">
		<div class="boxex">
			<div class="box-title">
				<h1><i class="far fa-money-bill-alt"></i>Doanh thu theo năm</h1>
			</div>
			<div>
				<span>Chọn năm</span>
				<select name="year" id="year-choise-chart" class="">
					<?php
					$currentYear = date("Y");

					$startYear = $currentYear - 10;

					for ($year = $startYear; $year <= $currentYear; $year++) {
						echo "<option";
						if ($year == $currentYear) echo " selected";
						echo " value='$year'>$year</option>";
					}
					?>
				</select>
			</div>
			<canvas id="myChart" width="400" height="180"></canvas>
			<?php
				foreach($data["tk"] as $vl){
					$datas[$vl["thang"]] = $vl["tong_tien"];
				}
	
				$labels = [];
				$values = [];
	
				for ($i = 1; $i <= 12; $i++) {
					$labels[] = "Tháng $i";
					$values[] = isset($datas[$i]) ? $datas[$i] : 0;
				}
			?>
		</div>
		<div class="boxex">
			<div>
				<h1><i class="fas fa-star" style="color: #FFD43B;"></i> Top sản phẩm bán chạy</h1><hr>
				<div class="Top-content">
					<table class="Top-table" style="width: 100%;">
						<tbody>
							<?php
								$count = 1;
								$spModel = new M_cauhinh();
								foreach ($data["listtop"] as $vl):
									$ch = $spModel->findById($vl["MaCH"]);
								?>
							<tr>
								<td style="font-size:50px;width:35px;padding-left:3px"><?php echo $count;?>.</td>
								<td style="width:100px;"><img style="width: 100px;height:auto;" src=<?php echo "\"./public/Pictures/".$ch->get_chitiet()->get_hinhanh()."\"" ;?> alt=<?php echo "\"".$ch->get_chitiet()->get_hinhanh()."\"";?> ></tdư>
								<td><?php echo $ch->get_chitiet()->get_sanpham()->getTensp();?></td>
							</tr>
							<?php $count++; endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="boxex">
			<div class="box-title">
				<h1><i class="fas fa-money-bill-wave"></i>Độ tuổi khách hàng sử dụng web	</h1><hr>
			</div>
			<div class="donutContainer" style="position: relative; width: 700px; height: 700px;">
			<canvas id="myDonutChart" style="width:100%"></canvas>
			</div>
			<?php
				foreach($data["donut"] as $vl){
					$dataDonut[] = $vl["nhom_tuoi"];
					$valueDonut[] = $vl["so_luong"];
				}
				
			?>

		</div>

		<div class="boxex">
			<h1><i class="fas fa-star" style="color: #FFD43B;"></i> Top khách hàng</h1><hr>
			<div class="Top-content">
					<table class="Top-table" style="width: 100%;">
						<tbody>
							<?php
								$count = 1;
								$khModel = new M_khachhang();
								foreach ($data["listkh"] as $vl):
									$ch = $khModel->findById($vl["MaKH"]);
								?>
							<tr>
								<td style="font-size:50px;width:35px;padding-left:3px"><?php echo $count;?>.</td>
								<td style="width:180px;"><?php echo $ch->getTenkh();?></td>
								<td><?php echo number_format($vl["tong"], 0, ',', '.')."<small> đ</small>"; ?></td>
							</tr>
							<?php $count++; endforeach; ?>
						</tbody>
					</table>
				</div>
		</div>
		
</div>
<input type="hidden" id="delete-hd">

<input type="hidden" id="tr"></input>

<script>
		var donutContainer = document.getElementById('donutContainer');
		var donutCanvas = document.getElementById('myDonutChart');
		var donut = donutCanvas.getContext('2d');

        var myDonutChart = new Chart(donut, {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($dataDonut); ?>,
                datasets: [{
                    label: 'Phân phối lứa tuổi',
                    data: <?php echo json_encode($valueDonut); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right'
                    }
                }
            }
        });



	var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Tổng doanh thu theo năm',
                    data: <?php echo json_encode($values); ?>,
                    backgroundColor: 'rgb(75, 192, 192)',
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
</script>
