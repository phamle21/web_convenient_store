<?php
require_once('../../database/config.php');
$mshh = $_GET['mshh'];

$result_img = $con->query("SELECT TenHinh FROM hinhhanghoa WHERE MSHH='$mshh'");
while ($row = $result_img->fetch_assoc()) {
    $path_del = "../../img/product/" . $row['TenHinh'];
    if (is_file($path_del))
        unlink($path_del);
}

// Procudure admin_delete_product
$result_del_hh = $con->query("call admin_delete_product($mshh)");

if ($result_del_hh === TRUE) {
    setcookie('thongbao_success', 'Xóa sản phẩm thành công', time() + 5, '/');
    header('Location: ../sanpham.php');
} else {
    setcookie('thongbao_fail', 'Xóa sản phẩm thất bại', time() + 5, '/');
    header('Location: ../sanpham.php');
}
?>