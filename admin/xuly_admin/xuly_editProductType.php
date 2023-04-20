<?php
    include('../../database/config.php');

    $maloai = $_POST['maloai'];
    $tenloai = $_POST['tenloaihh'];
    
    $sql = "UPDATE loaihanghoa
            SET TenLoaiHang='$tenloai'
            WHERE MaLoaiHang='$maloai'";
    
    if($con->query($sql) === TRUE){
        setcookie('thongbao_success','Chỉnh sửa loại hàng hóa thành công', time() + 3, '/');
        header('Location: ../loaihang.php');
    }else{
        setcookie('thongbao_fail','Chỉnh sửa loại hàng hóa thất bại', time() + 3, '/');
        header('Location: ../loaihang.php');
    }

?>