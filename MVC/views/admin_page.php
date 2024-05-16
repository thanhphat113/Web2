<!DOCTYPE html>
<html lang="en">
<head>
	<base href="http://localhost/Web2/" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
	<link rel="stylesheet" href="./public/styles.css">
	<title>Infinity Store</title>
</head>
<body>
	<div class="wrapper">
		<?php
			require_once("./MVC/views/Admin/sidebar.php");
		?>
		<div class="content">
			<?php
			    
				require_once "./MVC/views/Admin/". $data['Page'] .".php";
			?>
		</div>
	</div>

	<div class="thongbao">
        <div class="process"></div>
        <div class="circle">
			<i class="fas fa-bullhorn" style="color: #0ebaec;"></i>
        </div>
        <span class="mess">Thông báo</span>
    </div>

	<script src="public/script.js"></script>
	
	<?php
		 	if ($data["mess"] !== null) {
				$mess = $data["mess"];
				echo "
				<script>
				thongbao('".$mess."')
				</script>";
			}
		?>
</body>
</html>