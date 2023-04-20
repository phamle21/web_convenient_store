<?php
    require_once('../../database/config.php');
    $keyword = $_POST['keyword'];

    $result_loaihh = $con->query("SELECT * 
                                  FROM loaihanghoa 
                                  WHERE TenLoaiHang LIKE '%$keyword%'
                                  OR MaLoaiHang LIKE '%$keyword%'");
    if($result_loaihh->num_rows >0):
        while($row = $result_loaihh->fetch_assoc()):
        ?>
            <tr>
                <td><?=$row['MaLoaiHang']?></td>
                <td><?=$row['TenLoaiHang']?></td>
                <td>
                    <a href="javasript:void();" onclick="edit_productType(<?=$row['MaLoaiHang']?>)" data-toggle="modal" data-target="#modalEditProductType"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a> 
                    <a href="./xuly_admin/xuly_delete_productType.php?maloai=<?=$row['MaLoaiHang']?>"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                    
                </td>
            </tr>
        <?php 
        endwhile;
    else:
        echo "<tr><td colspan='3' style='text-align:center'>Không có loại hàng hóa nào!</td></tr>";
    endif;
?>