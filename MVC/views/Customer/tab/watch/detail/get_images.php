<?php
$mact = isset($_GET['mact']) ? $_GET['mact'] : '';

if (!empty($mact)) {
    $stmt = $conn->prepare("SELECT img FROM sanpham_img WHERE MaCT = ?");
    $stmt->bind_param("s", $mact);
    $stmt->execute();
    $result = $stmt->get_result();

    $images = [];
    while($row = $result->fetch_assoc()) {
        $images[] = ['img' => $row['img']];
    }

    echo json_encode($images);
}
 ?>