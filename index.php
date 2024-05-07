<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<link rel="stylesheet" href="./public/styles.css">
	<title>Infinity Store</title>
	<?php
		require("public/import_list.php");
	?>
</head>
<body>
	<div class="wrapper">
		<?php
			require("view/Admin/sidebar.php");
		?>
		<div class="content">
			<?php
				if ($_GET["id"] == "thongke") {
					require("view/Admin/thongke.php");
				}
				else if ($_GET["id"] == "nhanvien") {
					require("view/Admin/nhanvienView.php");
				}
				else if ($_GET["id"] == "khachhang") {
					require("view/Admin/khachhangView.php");
				}
				else if ($_GET["id"] == "taikhoan") {
					require("view/Admin/taikhoanView.php");
				}
				else{
					require("example.php");
				}
				
			?>
		</div>
	</div>
	<script src="./public/script.js"></script>
</body>
</html>