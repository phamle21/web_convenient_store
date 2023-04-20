<?php
    require_once('../../database/config.php');
    $msnv = $_POST['msnv'];
    $result = $con->query("SELECT * FROM nhanvien WHERE MSNV='$msnv'");
    $row = $result->fetch_assoc();

    $hoten = $row['HoTenNV'];
    $chucvu = $row['ChucVu'];
    $diachi = $row['DiaChi'];
    $sdt = $row['SoDienThoai'];
?>
<style>
    form{
        color:white;
    }
</style>
<form action="./xuly_admin/xuly_editStaff.php" id="edit_staff" method="post" onsubmit="return check_submit()">
    <input type="hidden" name='msnv' value="<?=$msnv?>">
    <div class="form-group">
        <label for="exampleInputName" class="sr-only">Name</label>
        <div class="position-relative has-icon-right">
            <input type="text" id="exampleInputName" value="<?=$hoten?>" name="hoten" class="form-control input-shadow" placeholder="Enter Your Name" required>
            <div class="form-control-position">
                <i class="icon-user"></i>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputName" class="sr-only">Chức vụ</label>
        <div class="position-relative has-icon-right">
            <input type="text" id="exampleInputChucVu" value="<?=$chucvu?>" name="chucvu" class="form-control input-shadow" placeholder="Enter Your Chức vụ" required>
            <div class="form-control-position">
                <i class="fa fa-layer-group"></i>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputName" class="sr-only">Địa Chỉ</label>
        <div class="position-relative has-icon-right">
            <input type="text" id="exampleInputDiaChi" value="<?=$diachi?>" name="diachi" class="form-control input-shadow" placeholder="Enter Your Địa Chỉ" required>
            <div class="form-control-position">
                <i class="fa fa-map-marker-alt"></i>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputName" class="sr-only">Số điện thoại</label>
        <div class="position-relative has-icon-right">
            <input type="text" id="inputSdt" name="sdt" disabled value="<?=$sdt?>" class="form-control input-shadow" placeholder="Enter Your Phone" required>
            <div class="form-control-position">
                <i class="icon-phone"></i>
            </div>
        </div>
        <div id="check_sdt"></div>
    </div>
    <p>Bỏ trống nếu không cần đổi mật khẩu</p>
    <div class="form-group">
        <label for="exampleInputPassword" class="sr-only">Password</label>
        <div class="position-relative has-icon-right">
            <input type="password" id="pass_edit" name="matkhau_moi" value="" class="form-control input-shadow" placeholder="Choose Password">
            <div class="form-control-position">
                <i class="icon-lock"></i>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword" class="sr-only">Confirm Password</label>
        <div class="position-relative has-icon-right">
            <input type="password" id="repass_edit" class="form-control input-shadow" placeholder="Confirm Your Password">
            <div class="form-control-position">
                <i class="icon-lock"></i>
            </div>
        </div>
        <p id="error_repass_edit" style="color:#fff700;"></p>
    </div>
</form>

<script>
   
    function check_submit(){
        var pass = document.getElementById('pass_edit').value;
        var repass = document.getElementById('repass_edit').value;
        if(pass.length>0){
            if(pass != repass){
                document.getElementById('error_repass_edit').innerHTML = "Mật khẩu xác nhận sai";
                return false;
            }else{
                return true;
            }
        }else{
            return true;
        }
    }
</script>