<?php
    require_once('../../database/config.php');
    $keyword = $_POST['keyword'];

    $result = $con->query("SELECT *
                            FROM nhanvien
                            WHERE (HoTenNV LIKE '%$keyword%'
                            OR MSNV LIKE '%$keyword%')
                            AND MSNV <> 1");
    if($result->num_rows >0):
        while($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td><?=$row['MSNV']?></td>
                <td><?=$row['HoTenNV']?></td>
                <td><?=$row['ChucVu']?></td>
                <td><?=$row['DiaChi']?></td>
                <td><?=$row['SoDienThoai']?></td>
                <td class="action_icon">
                    <a href="javasript:void();" onclick="edit_staff(<?=$row['MSNV']?>)" data-toggle="modal" data-target="#modalEditStaff"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a> 
                    <a href="./xuly_admin/xuly_delete_staff.php?msnv=<?=$row['MSNV']?>"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                </td>
            </tr>
        <?php 
        endwhile;
    else:
        echo "<tr><td colspan='6' style='text-align:center'>Không tìm thấy với từ khóa \"".$keyword."\"</td></tr>";
    endif;
?>
