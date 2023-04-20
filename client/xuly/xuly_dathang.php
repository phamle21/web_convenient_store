<?php
    require_once('../../database/config.php');

    $mskh = $_COOKIE['login_kh'];

    if(isset($_POST['diachi_GH_cu'])){
        $ma_address = $_POST['diachi_GH_cu'];
        $restul_dc = $con->query("SELECT DiaChi FROM diachikh WHERE MaDC='$ma_address' LIMIT 1");
        while($row = $restul_dc->fetch_assoc()){
            $diachi_kh = $row['DiaChi'];
        }
    }else{
        $diachi_kh = $_POST['diachi_GH_moi'];
        $con->query("INSERT INTO diachikh(DiaChi, MSKH) VALUES ('$diachi_kh','$mskh')");
    }

    $sql_donhang = "INSERT INTO dathang(MSKH, DiaChiGH) VALUES ('$mskh', '$diachi_kh')";
    $result_donhang = $con->query($sql_donhang);
    $last_id_donhang = $con->insert_id;

    if($result_donhang === TRUE){

        $result_giohang = $con->query("SELECT a.*, b.Gia 
                                    FROM giohang as a 
                                    LEFT JOIN hanghoa as b ON a.MSHH=b.MSHH
                                    WHERE MSKH='$mskh'");
        while($row = $result_giohang->fetch_assoc()){
            $mshh = $row['MSHH'];
            $slmua = $row['SoLuongMua'];
            $gia = $row['Gia'];
            $result_chitiet = $con->query("INSERT INTO chitietdathang(SoDonDH, MSHH, SoLuong, GiaDatHang) 
                                            VALUES ('$last_id_donhang', '$mshh', '$slmua', '$gia')");
        }

        if($result_chitiet === TRUE){
            //Xoá giỏ hàng của khách hàng
            $con->query("DELETE FROM giohang WHERE MSKH='$mskh'");
            setcookie('thongbao_dathang', 'Bạn đã đặt hàng thành công!', time()+3, '/');
            header('Location: '. $_SERVER['HTTP_REFERER']);
        }else{
            setcookie('thongbao_dathang', 'Bạn đã đặt hàng thất bại!', time()+3, '/');
            header('Location: '. $_SERVER['HTTP_REFERER']);
        }
        
    }else{
        setcookie('thongbao_dathang', 'Bạn đã đặt hàng thất bại!', time()+3, '/');
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }
?>
