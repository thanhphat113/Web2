<div class="arrange" id="dropbox" onclick="toggleDropdown()">
    <button id="dropbtn" class="dropbtn">Xếp theo: Nổi bật</button>
        
    <div id="dropdownContent" class="dropdown-content">
        <a href="#" data-option="popular">Xếp theo: Nổi bật</a>
        <a href="#" data-option="newest">Xếp theo: Mới ra mắt</a>
        <a href="#" data-option="bestseller">Xếp theo: Bán chạy</a>
        <a href="#" data-option="lowtohigh">Xếp theo: Giá thấp đến cao</a>
        <a href="#" data-option="hightolow">Xếp theo: Giá cao đến thấp</a>
    </div>
        
    <form id="selectedForm" action="your_php_script.php" method="post">
        <input type="hidden" id="selectedOption" name="selectedOption">
    </form>
</div>