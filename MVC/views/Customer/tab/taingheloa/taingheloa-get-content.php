<div class="taingheloa-content">
    <?php
    // Kiểm tra và lấy tham số "infinity" từ URL
    $infinity = isset($_GET["infinity"]) ? $_GET["infinity"] : "";

    // Kiểm tra và lấy tham số "option" từ URL
    $option = isset($_GET["option"]) ? $_GET["option"] : "";



    // Xử lý nội dung dựa trên tham số truyền vào
    switch ($infinity) {
        case 'taingheloa':
            switch ($option) {
                case 'op1':
                    require("option/tatca.php");
                    break;
                case 'op2':
                    require("option/tainghe.php");
                    break;
                case 'op3':
                    require("option/loa.php");
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