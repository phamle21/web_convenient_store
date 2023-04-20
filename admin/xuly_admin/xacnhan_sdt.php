<?php
    require_once('../../database/config.php');
    $sdt = $_POST['sdt'];
    $check = "/^[0-9-+]*$/";
    $result = $con->query("SELECT * FROM nhanvien WHERE SoDienThoai='$sdt'");

    if(preg_match($check, $sdt, $match) == false || strlen($sdt) <10){
        echo "<p id='comfirm_sdt_staff' style='color: red'>Số điện thoại không hợp lệ!</p>";
    }else if($result->num_rows >0){
        echo "<p id='comfirm_sdt_staff' style='color: red'>Số điện thoại đã tồn tại!</p>";
    }else{
        echo "<p id='comfirm_sdt_staff' style='color: green'>Số điện thoại có thể sử dụng</p>";
    }
?>
