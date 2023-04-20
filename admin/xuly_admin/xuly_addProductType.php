<?php
include('../../database/config.php');
$tenloaihang = $_POST['tenloaihh'];

$result = $con->query("call admin_add_type_product('$tenloaihang')");

if ($result === TRUE) {
    setcookie('thongbao_success', 'Thêm loại hàng hóa thành công', time() + 3, '/');
    header('Location: ../loaihang.php');
} else {
    setcookie('thongbao_fail', 'Thêm loại hàng hóa thất bại', time() + 3, '/');
    header('Location: ../loaihang.php');
}
