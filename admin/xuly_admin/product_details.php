<?php
    require_once('../../database/config.php');
    $mshh = $_POST['mshh'];
    $result_hh = $con->query("SELECT a.*,b.TenLoaiHang  
                                FROM hanghoa as a 
                                LEFT JOIN loaihanghoa as b ON a.MaLoaiHang=b.MaLoaiHang 
                                WHERE a.MSHH='$mshh'")->fetch_assoc();
    $hinhmota = $result_hh['HinhMoTa'];
    $tenhh = $result_hh['TenHH'];
    $mota = $result_hh['MoTa'];
    $loaihh = $result_hh['TenLoaiHang'];
    $soluong = $result_hh['SoLuongHang'];
    $gia = number_format($result_hh['Gia']);
?>
<style>
    p{
        color: white;
    }
    .hinhhanghoa img{
        border: 1px solid white;
        border-radius: 10px;
        width: 150px;
        height: 150px;
        max-height: 150px;
        margin: 10px;
    }
    .info_product{
        color: white;
    }
    .info_product table tr td{
        /* max-width: 400px; */
        white-space: break-spaces;
    }
    .info_product textarea{
        background-color: transparent;
        color: white;
        border: none;
        resize: vertical;
        width: 350px;
        max-width: 350px;
        overflow: hidden;
    }
</style>
<div>
    <div class="hinhhanghoa">
        <?php 
            $hinh = $con->query("SELECT * FROM hinhhanghoa WHERE MSHH='$mshh'");
            while($img = $hinh->fetch_assoc()){
                echo "<img src=../img/product/".$img['TenHinh']." alt='Hình hàng hóa'>";
            }
        ?>
    </div>
    <div class="info_product">
        <table >
            <tr>
                
                <td><li>MSHH</li></td>
                <td>:</td>
                <td> <?=$mshh?></td>
            </tr>
            <tr>
                <td style="vertical-align: top;"><li>Tên hàng hóa</li></td>
                <td style="vertical-align: top;">:</td>
                <td> <?=$tenhh?></td>
            </tr>
            <tr>
                <td><li>Loại hàng hóa</li></td>
                <td>:</td>
                <td> <?=$loaihh?></td>
            </tr>
            <tr>
                <td><li>Giá bán</li></td>
                <td>:</td>
                <td> <?=$gia?> VNĐ</td>
            </tr>
            <tr>
                <td><li>Số lượng còn lại</li></td>
                <td>:</td>
                <td> <?=$soluong?></td>
            </tr>
            <tr>
                <td style="vertical-align: top;"><li>Mô tả</li></td>
                <td style="vertical-align: top;">:</td>
                <td> <textarea rows="3" readonly><?=$mota?></textarea></td>
            </tr>
        </table>

    </div>
</div>
