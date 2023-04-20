<?php
    include('../../database/config.php');
    $msnv = $_GET['msnv'];

    $result_del = $con->query("DELETE FROM nhanvien WHERE MSNV='$msnv'");
    if($result_del === TRUE){
        setcookie('thongbao_success','Xóa nhân viên thành công', time() + 3, '/');
        header('Location: ../staff.php');
    }else{
        setcookie('thongbao_fail','Xóa nhân viên thất bại', time() + 3, '/');
        header('Location: ../staff.php');
    }
?>