<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/styles.css">
    <style>
        .selected {
            background-color: blue !important;
        }
    </style>

    <title>Infinity Store</title>
</head>
<body>
    <div class="wrapper">
        <div class="Customer">
            <div class="trangchu">
                <?php
                require('header.php');
                require('content.php');
                require('footer.php');
                ?>
            </div>
        </div>
    </div>
    <script src="<?php echo BASE_URL; ?>public/js/script.js"></script>
</body>
</html>