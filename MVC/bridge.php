<?php
	require_once "./MVC/core/App.php";
	require_once "./MVC/core/Controller.php";
	require_once "./MVC/core/connectiondb.php";
	$directory_E = "./MVC/models/Entities/";

	$files_E = scandir($directory_E);

	foreach ($files_E as $file) {
		// Kiểm tra xem tên tệp có kết thúc bằng .php không
		if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
			require_once $directory_E.$file;
		}
	}

	$directory_M = "./MVC/models/Models/";

	$files_M = scandir($directory_M);

	foreach ($files_M as $file) {	
		// Kiểm tra xem tên tệp có kết thúc bằng .php không
		if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
			require_once $directory_M.$file;
		}
	}
?>