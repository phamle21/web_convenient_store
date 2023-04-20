<?php
    require_once('../../database/config.php');
    $keyword = $_POST['keyword'];

    $result = $con->query("SELECT a.*,b.TenLoaiHang
                            FROM hanghoa as a
                            LEFT JOIN loaihanghoa as b ON a.MaLoaiHang=b.MaLoaiHang
                            WHERE a.TenHH LIKE '%$keyword%'
                            OR b.TenLoaiHang LIKE '%$keyword%'
                            OR a.MSHH LIKE '%$keyword%'");
    if($result->num_rows >0):
        while($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td><?=$row['MSHH']?></td>
                <td><?=$row['TenLoaiHang']?></td>
                <td><img src="../img/product/<?=$row['HinhMoTa']?>" class="product-img" alt="product img"></td>
                <td style="width:300px;white-space:break-spaces"><?=$row['TenHH']?></td>
                <td><?=number_format($row['Gia'])?></td>
                <td style="text-align:center"><?=$row['SoLuongHang']?></td>
                <td class="action_icon">
                <a href="javasript:void();" onclick="viewProductDetails(<?=$row['MSHH']?>)" data-toggle="modal" data-target="#modalViewProductDetails"><i class="fa fa-eye" aria-hidden="true"></i> View</a> 
                    <a href="javasript:void();" onclick="edit_product(<?=$row['MSHH']?>)" data-toggle="modal" data-target="#modalEditProduct"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a> 
                    <a href="./xuly_admin/xuly_delete_product.php?mshh=<?=$row['MSHH']?>"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                    
                </td>
            </tr>
        <?php
        endwhile;
    else:
        echo "<tr><td colspan='7'>Không tìm thấy với từ khóa \"".$keyword."\"</td></tr>";
    endif;
?>