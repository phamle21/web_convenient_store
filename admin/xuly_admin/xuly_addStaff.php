<?php
include('../../database/config.php');
$hoten = $_POST['hoten'];
$chucvu = $_POST['chucvu'];
$diachi = $_POST['diachi'];
$sdt = $_POST['sdt'];
$matkhau = md5($_POST['matkhau']);

$result = $con->query("CALL admin_add_staff('$hoten', '$chucvu', '$diachi', '$sdt', '$matkhau' )");
$con->next_result();
if ($result === TRUE) {
    setcookie('thongbao_success', 'Thêm nhân viên thành công', time() + 3, '/');
    header('Location: ../staff.php');
} else {
    setcookie('thongbao_fail', 'Thêm nhân viên thất bại', time() + 3, '/');
    header('Location: ../staff.php');
}
