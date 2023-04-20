<?php
    require_once('../../database/config.php');
    $sodondh = $_POST['sodondh'];
    $result = $con->query("SELECT a.*, b.TenHH, b.HinhMoTa
                            FROM chitietdathang as a
                            LEFT JOIN hanghoa as b ON a.MSHH=b.MSHH
                            WHERE SoDonDH='$sodondh'");
    
?>
<style>
    .table{
        /* color: black !important; */
    }
</style>
<table class="table align-items-center table-flush table-borderless">
    <thead>
        <tr>
            <th>ID Order</th>
            <th>Photo</th>
            <th style="max-width: 100px">Product Name</th>
            <th>Price (VNĐ)</th>
            <th>Quantity</th>
            <th>Amount</th>
        </tr>
        </thead>
    <tbody id="show_product">
        <?php   
            if($result->num_rows >0):
                while($row = $result->fetch_assoc()):
                ?>
                    <tr>
                        <td><?=$row['SoDonDH']?></td>
                        <td><img src="../img/product/<?=$row['HinhMoTa']?>" style="width: 100px;height:100px" class="product-img" alt="product img"></td>
                        <td style="width:200px;white-space:break-spaces"><?=$row['TenHH']?></td>
                        <td><?=number_format($row['GiaDatHang'])?></td>
                        <td style="text-align:center"><?=$row['SoLuong']?></td>
                        <td><?=number_format($row['GiaDatHang']*$row['SoLuong'])?> VNĐ</td>
                    </tr>
                <?php 
                endwhile;
            else:
                echo "<tr><td colspan='7' style='text-align:center'>Không có hàng hóa!</td></tr>";
            endif;
        ?>
    </tbody>
</table>