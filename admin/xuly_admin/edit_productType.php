<?php
    require_once('../../database/config.php');
    $maloai = $_POST['maloai'];
    $result_loaihh = $con->query("SELECT * FROM loaihanghoa
                                WHERE MaLoaiHang='$maloai'");
    $row = $result_loaihh->fetch_assoc();
    $tenloaihh = $row['TenLoaiHang'];
?>
<form action="./xuly_admin/xuly_editProductType.php" id="editProductTypeForm" method="post" >
    <div>
        <label for="">ID:</label>
        <input type="text" name="maloai" class="form-control" value="<?=$maloai?>"  readonly placeholder="Auto">
    </div>
    <div>
        <label for="">Product Type Name:</label>
        <input type="text" name="tenloaihh" value="<?=$tenloaihh?>" class="form-control" placeholder="Product Name" required>
    </div>
</form>