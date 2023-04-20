<?php
    require_once('../../database/config.php');
    $mshh = $_GET['mshh'];

    $result_img = $con->query("SELECT TenHinh FROM hinhhanghoa WHERE MSHH='$mshh'");
    while($row = $result_img->fetch_assoc()){
        $path_del = "../../img/product/".$row['TenHinh'];
        unlink($path_del);
    }

    //Xử lý trạng thái đơn hàng
    // $chitiet = $con->query("SELECT SoDonDH FROM chitietdathang WHERE MSHH='$mshh'");
    // while($row_chitiet = $chitiet->fetch_assoc()){
    //     $sodondh = $row_chitiet['SoDonDH'];

    //     $dathang = $con->query("SELECT TrangThaiDH FROM dathang WHERE SoDonDH='$sodondh'")->fetch_assoc();
    //     if($dathang['TrangThaiDH'] != 'Đã hoàn thành'){
    //         //Cập nhật trạng thái cho đơn hàng do sản phẩm trong đơn hàng bị xóa
    //         $con->query("UPDATE dathang SET TrangThaiDH='Thất bại' TrangThaiDH WHERE ");
    //     }
    // }

    $result_del_chitiet = $con->query("DELETE FROM chitietdathang WHERE MSHH='$mshh'");
    $result_del_giohang = $con->query("DELETE FROM giohang WHERE MSHH='$mshh'");
    $result_del_img = $con->query("DELETE FROM hinhhanghoa WHERE MSHH='$mshh'");
    $result_del_hh = $con->query("DELETE FROM hanghoa WHERE MSHH='$mshh'");
    
    if($result_del_hh === TRUE && $result_del_img === TRUE){
        setcookie('thongbao_success', 'Xóa sản phẩm thành công', time()+5, '/');
        header('Location: ../sanpham.php');
    }else{
        setcookie('thongbao_fail', 'Xóa sản phẩm thất bại', time()+5, '/');
        header('Location: ../sanpham.php');
    }
?>