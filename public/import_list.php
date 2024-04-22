<?php
	require("database/connectiondb.php");

	// import model
	$model = "model/";
	$files1 = scandir($model);
	foreach ($files1 as $file) {
		if (is_file($model . $file) && pathinfo($model . $file, PATHINFO_EXTENSION) === 'php') {
			require($model.$file);
		}
		
	}

	// import controller
	$controller = "controller/";
	$files2 = scandir($controller);
	foreach ($files2 as $file) {
		if (is_file($controller . $file) && pathinfo($controller . $file, PATHINFO_EXTENSION) === 'php') {
			require($controller.$file);
		}
	}
?>