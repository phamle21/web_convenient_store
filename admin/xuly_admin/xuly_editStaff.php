<?php
    include('../../database/config.php');

    $msnv = $_POST['msnv'];
    $hoten = $_POST['hoten'];
    $chucvu = $_POST['chucvu'];
    $diachi = $_POST['diachi'];
    if(isset($_POST['matkhau_moi'])){
        $new_pass = md5($_POST['matkhau_moi']);
        $sql = "UPDATE nhanvien
                SET HoTenNV='$hoten', ChucVu='$chucvu', DiaChi='$diachi', MatKhau='$new_pass'
                WHERE MSNV='$msnv'";
    }else{
        $sql = "UPDATE nhanvien
                SET HoTenNV='$hoten', ChucVu='$chucvu', DiaChi='$diachi'
                WHERE MSNV='$msnv'";
    }
    
    if($con->query($sql) === TRUE){
        setcookie('thongbao_success','Chỉnh sửa thành công', time() + 3, '/');
        header('Location: ../staff.php');
    }else{
        setcookie('thongbao_fail','Chỉnh sửa thất bại', time() + 3, '/');
        header('Location: ../staff.php');
    }

?>