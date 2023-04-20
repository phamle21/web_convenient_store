<?php
include('../../database/config.php');
$maloai = (int) $_GET['maloai'];

$result_hanghoa = $con->query("SELECT * FROM hanghoa WHERE MaLoaiHang=$maloai");
if ($result_hanghoa->num_rows > 0) {
    while ($row_hanghoa = $result_hanghoa->fetch_assoc()) {
        $mshh = $result_hanghoa['MSHH'];

        $result_img = $con->query("SELECT TenHinh FROM hinhhanghoa WHERE MSHH=$mshh");
        while ($row = $result_img->fetch_assoc()) {
            $path_del = "../../img/product/" . $row['TenHinh'];
            unlink($path_del);
        }

        $result_del_chitiet = $con->query("DELETE FROM chitietdathang WHERE MSHH=$mshh");
        $result_del_giohang = $con->query("DELETE FROM giohang WHERE MSHH=$mshh");
        $result_del_img = $con->query("DELETE FROM hinhhanghoa WHERE MSHH=$mshh");
        $result_del_hh = $con->query("DELETE FROM hanghoa WHERE MSHH=$mshh");
    }
}

$result_del_loaihh = $con->query("DELETE FROM loaihanghoa WHERE MaLoaiHang=$maloai");
if ($result_del_loaihh === TRUE) {
    setcookie('thongbao_success', 'Xóa loại hàng hóa thành công', time() + 3, '/');
    header('Location: ../loaihang.php');
} else {
    setcookie('thongbao_fail', 'Xóa loại hàng hóa thất bại', time() + 3, '/');
    header('Location: ../loaihang.php');
}
