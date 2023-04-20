<?php
    include('../../database/config.php');
    $tenloaihang = $_POST['tenloaihh'];

    $result = $con->query("INSERT INTO loaihanghoa(TenLoaiHang) VALUES ('$tenloaihang')");

    if($result === TRUE){
        setcookie('thongbao_success','Thêm loại hàng hóa thành công', time() + 3, '/');
        header('Location: ../loaihang.php');
    }else{
        setcookie('thongbao_fail','Thêm loại hàng hóa thất bại', time() + 3, '/');
        header('Location: ../loaihang.php');
    }
?>