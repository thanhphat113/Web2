<div class="topmenu">
    <!-- Hình logo shop -->
    <a href="<?php echo BASE_URL; ?>">
        <img src="<?php echo BASE_URL; ?>public/Pictures/logo1.jpg" alt="logo" class="logo">
    </a>

    <!-- 9 mục lựa chọn -->
    <div class="tab">
        <a href="<?php echo BASE_URL; ?>home/iphone/tatca" class="tab-item active">iPhone</a>
        <a href="<?php echo BASE_URL; ?>home/mac/tatca" class="tab-item">Mac</a>
        <a href="<?php echo BASE_URL; ?>home/ipad/tatca" class="tab-item">iPad</a>
        
        <a href="?infinity=watch" class="tab-item">Watch</a>
        <a href="?infinity=tai-nghe-loa" class="tab-item">Tai nghe, Loa</a>
        <a href="?infinity=phu-kien" class="tab-item">Phụ kiện</a>
        <a href="?infinity=tekzone" class="tab-item">TekZone</a>
        <a href="?infinity=topcare" class="tab-item">TopCare</a>
        <?php if (isset($_SESSION['username'])) { ?>
            <a href="<?php echo BASE_URL; ?>Home/logout" class="tab-item">Đăng xuất</a>
        <?php } else {?>
            <a href="<?php echo BASE_URL; ?>login" class="tab-item">Đăng nhập</a>

        <?php }?>
    </div>

    <div class="timkiem"></div>
    <div class="giohang"></div>
</div>
