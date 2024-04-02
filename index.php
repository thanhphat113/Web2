<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<link rel="stylesheet" href="styles.css">
	<title>Infinity Store</title>
</head>
<body>
	<div class="wrapper">
		<?php
			require("Admin/sidebar.php");
		?>
		<div class="content">
			<?php
				if ($_GET["id"] == "thongke") {
					require("Admin/thongke.php");
				}
				else{
					require("example.php");
				}
				
			?>
		</div>
	</div>
	<script src="script.js"></script>
</body>
</html>