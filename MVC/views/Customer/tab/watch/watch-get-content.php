<div class="watch-content">
    <?php
    // Kiểm tra và lấy tham số "infinity" từ URL
    $infinity = isset($_GET["infinity"]) ? $_GET["infinity"] : "";

    // Kiểm tra và lấy tham số "option" từ URL
    $option = isset($_GET["option"]) ? $_GET["option"] : "";

    

    // Xử lý nội dung dựa trên tham số truyền vào
    switch ($infinity) {
        case 'watch':
            switch ($option) {
                case 'op1':
                    require("option/tatca.php");
                    break;
                case 'op2':
                    require("option/watchultra.php");
                    break;
                case 'op3':
                    require("option/watchs9.php");
                    break;
                case 'op4':
                    require("option/watchse23.php");
                    break;
                case 'op5':
                    require("option/watchs8.php");
                    break;
                case 'op6':
                    require("option/watchse22.php");
                    break;
                default:
                    require("option/tatca.php");
                    break;
            }
            break;
        default:
            require("option/tatca.php");
            break;
    }

    
    ?>
</div>