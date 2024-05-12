<?php
// Xác định giao thức (http hoặc https)
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";

// Xác định hostname
$hostname = $_SERVER['HTTP_HOST'];

// Xác định đường dẫn cơ sở
$base_url = $protocol . "://" . $hostname . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . '/';

// Định nghĩa đường dẫn cơ sở
define('BASE_URL', $base_url);
?>
