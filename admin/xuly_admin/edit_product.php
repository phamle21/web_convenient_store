<?php
    require_once('../../database/config.php');
    $mshh = $_POST['mshh'];
    $result_hh = $con->query("SELECT a.*,b.TenLoaiHang 
                                FROM hanghoa as a 
                                LEFT JOIN loaihanghoa as b ON a.MaLoaiHang=b.MaLoaiHang
                                WHERE a.MSHH='$mshh'");
    $row = $result_hh->fetch_assoc();
    $tenhh = $row['TenHH'];
    $gia = $row['Gia'];
    $loai = $row['MaLoaiHang'];
    $sl = $row['SoLuongHang'];
    $mota = $row['MoTa'];
?>
<form action="./xuly_admin/xuly_editProduct.php" id="editProductForm" method="post" enctype="multipart/form-data">
    <div>
        <label for="">ID:</label>
        <input type="text" value="<?=$mshh?>" name="mshh" class="form-control" readonly placeholder="Auto">
    </div>
    <div>
        <label for="">Product Type:</label>
        <select name="loaihh" class="form-control" id="" required>
            <?php
                $result_loaihh = $con->query("SELECT * FROM loaihanghoa");
                while($row = $result_loaihh->fetch_assoc()){
                    if($row['MaLoaiHang'] == $loai){
                        echo "<option selected value='".$row['MaLoaiHang']."'>".$row['TenLoaiHang']."</option>";
                    }else{
                        echo "<option value='".$row['MaLoaiHang']."'>".$row['TenLoaiHang']."</option>";
                    }
                    
                }
            ?>
        </select>
    </div>
    <div>
        <label for="">Product Name:</label>
        <input type="text" value="<?=$tenhh?>" name="tenhh" class="form-control" placeholder="Product Name" required>
    </div>
    <div>
        <label for="">Description:</label>
        <textarea type="text" name="mota" class="form-control" placeholder="Desscription" required><?=$mota?></textarea>
    </div>
    <div>
        <label for="">Product Price: <a id="price_demo_edit"></a></label>
        <input type="text" onkeyup="format_price(this.value)" value="<?=$gia?>" name="gia" id="giasp" class="form-control" placeholder="Product Price" required>
    </div>
    <div>
        <label for="">Product Quantity:</label>
        <input type="text" value="<?=$sl?>" name="soluong" class="form-control" placeholder="Product Quantity" required>
    </div>
    <div>
        <label class="img_product" for="">Product Images:</label>
        <i>Ảnh mô tả: </i><input type="file" name="img1" accept='image/*'><br>
        <i>Ảnh phụ 1: </i><input type="file" name="img2" accept='image/*'><br>
        <i>Ảnh phụ 2: </i><input type="file" name="img3" accept='image/*'>
    </div>
</form>