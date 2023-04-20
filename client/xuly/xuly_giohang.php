<?php
    require_once('../../database/config.php');

    // Thêm sản phẩm mới vào giỏ hàng 
    if(isset($_POST['themsp_cart']) ){
        $mshh = $_POST['mshh'];
        $slmua = $_GET['soluong_mua'];
        $mskh = $_COOKIE['login_kh'];

        //Lấy số lượng còn lại trong kho
        $result_hh = $con->query("SELECT SoLuongHang FROM hanghoa WHERE MSHH='$mshh'");
        $row_hh = $result_hh->fetch_assoc();
        $sl_kho = $row_hh['SoLuongHang'];

        //Nếu số lượng mua <= số lượng trong kho
        if($slmua <= $sl_kho && $slmua>0):
            //Kiểm tra sản phẩm đã có trong giỏ chưa
            $check_cart = $con->query("SELECT * FROM giohang WHERE MSHH='$mshh' AND MSKH='$mskh'");
            $row_check = $check_cart->fetch_assoc();
            //Nếu đã có sản phẩm trong giỏ hàng
            if($check_cart->num_rows > 0):
                if($row_check['SoLuongMua'] + $slmua >= $sl_kho){
                    $update_slmua = $sl_kho;
                }else{
                    $update_slmua = $slmua+$row_check['SoLuongMua'];
                }
                $con->query("UPDATE giohang SET SoLuongMua='$update_slmua' WHERE MSHH='$mshh' AND MSKH='$mskh'");
                
            else: //Nếu chưa có sản phẩm trong giỏ hàng
                $result_cart = $con->query("INSERT INTO giohang(MSHH,MSKH,SoLuongMua)
                                            VALUES ('$mshh','$mskh','$slmua')");
            endif;

            //in giỏ hàng mới
            $show_cart = $con->query("SELECT *
                                    FROM giohang as a
                                    LEFT JOIN hanghoa as b ON a.MSHH=b.MSHH
                                    WHERE a.MSKH='$mskh'");

            while($row = $show_cart->fetch_assoc()):
                $MaGH = $row['MaGH'];
                $gia = number_format($row['Gia']);
                $slmua = $row['SoLuongMua'];
                $thanhtien = $row['Gia']*$slmua;
            ?>
                <li class="header-cart-item flex-w flex-t m-b-12 product_cart">
                <!-- <a href="#aaaa"> -->
                    <div class="header-cart-item-img" onclick="delete_cart(<?=$MaGH?>)"> 
                        <img src="../img/product/<?=$row['HinhMoTa']?>" alt="IMG">
                    </div>
                <!-- </a> -->
                <div class="header-cart-item-txt p-t-8">
                <a class="header-cart-item-name m-b-18 js-show-modal1 hov-cl1 trans-04 cart_name_product" style="font-weight: bold">
                    <?=$row['TenHH']?>
                </a>

                <span class="header-cart-item-info">
                    <?=$slmua?> x <?=$gia?>VNĐ = <?=number_format($thanhtien)?>VNĐ
                </span>
                </div>
                </li>
            <?php
            endwhile;
        endif;   
    }
    //End add cart

    //Xóa giỏ hàng
    if(isset($_POST['delete_spcart'])){
        $ma_giohang = $_POST['magh'];
        $mskh = $_COOKIE['login_kh'];

        $con->query("DELETE FROM giohang WHERE MaGH='$ma_giohang'");

        //in giỏ hàng mới
        $show_cart = $con->query("SELECT *
                                FROM giohang as a
                                LEFT JOIN hanghoa as b ON a.MSHH=b.MSHH
                                WHERE a.MSKH='$mskh'");

        while($row = $show_cart->fetch_assoc()):
            $MaGH = $row['MaGH'];
            $gia = number_format($row['Gia']);
            $slmua = $row['SoLuongMua'];
            $thanhtien = $row['Gia']*$slmua;
        ?>
            <li class="header-cart-item flex-w flex-t m-b-12 product_cart">
                <a >
                    <div class="header-cart-item-img" onclick="delete_cart(<?=$MaGH?>)"> 
                        <img src="../img/product/<?=$row['HinhMoTa']?>" alt="IMG">
                    </div>
                </a>
                <div class="header-cart-item-txt p-t-8">
                    <a class="header-cart-item-name m-b-18 js-show-modal1 hov-cl1 trans-04 cart_name_product" style="font-weight: bold">
                        <?=$row['TenHH']?>
                    </a>

                    <span class="header-cart-item-info">
                        <?=$slmua?> x <?=$gia?>VNĐ = <?=number_format($thanhtien)?>VNĐ
                    </span>
                </div>
            </li>
        <?php
        endwhile;
    }

    //Đếm số lượng giỏ hàng
    if(isset($_POST['count_cart'])){
        $mskh = $_COOKIE['login_kh'];
        $result_count_cart = $con->query("SELECT COUNT(*) as total FROM giohang WHERE MSKH='$mskh'")->fetch_assoc();
        $count = $result_count_cart['total'];
        echo $count;
    }

    //Plus số lượng giỏ hàng
    if(isset($_POST['plus_cart'])){
        $ma_giohang = $_POST['magh'];

        $con->query("UPDATE giohang SET SoLuongMua=SoLuongMua+1 WHERE MaGH='$ma_giohang'");

        $mskh = $_COOKIE['login_kh'];
        //in giỏ hàng mới
        $result_cart = $con->query("SELECT *
                                    FROM giohang as a
                                    LEFT JOIN hanghoa as b ON a.MSHH=b.MSHH
                                    WHERE a.MSKH='$mskh'");

        while($row = $result_cart->fetch_assoc()):
            $thanhtien = $row['Gia']*$row['SoLuongMua'];
            $sl_kho = $row['SoLuongHang'];
            $magh = $row['MaGH'];

        ?>
            <tr class="table_row">
                <td class="column-1" >
                    <div class="how-itemcart1" style="width:60px; text-align:center">
                        <img src="../img/product/<?=$row['HinhMoTa']?>" alt="IMG">
                    </div>
                </td>
                <td class="column-2"><?=$row['TenHH']?></td>
                <td class="column-3" style="border: 0.5px solid #e6e6e6;"><?=number_format($row['Gia'])?> ₫</td>
                <td class="column-4" style="border: 0.5px solid #e6e6e6;">
                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" onclick="minus_product(<?=$magh?>, <?=$row['SoLuongMua']?>)">
                            <i class="fs-16 zmdi zmdi-minus"></i>
                        </div>
                        
                        <input id="slmua_product" class="mtext-104 cl3 txt-center num-product" type="number" name="slmua_update" value="<?=$row['SoLuongMua']?>" min="1" max="<?=$sl_kho?>">

                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m" onclick="plus_product(<?=$magh?>, <?=$sl_kho?>, <?=$row['SoLuongMua']?>)">
                            <i class="fs-16 zmdi zmdi-plus"></i>
                        </div>
                    </div>
                </td>
                <td class="column-5" style="border: 0.5px solid #e6e6e6;"><?=number_format($thanhtien)?> ₫</td>
            </tr>
        <?php 
        endwhile;
    }
    //Minus số lượng giỏ hàng
    if(isset($_POST['minus_cart'])){
        $ma_giohang = $_POST['magh'];
        
        $con->query("UPDATE giohang SET SoLuongMua=SoLuongMua-1 WHERE MaGH='$ma_giohang'");

        $mskh = $_COOKIE['login_kh'];
        //in giỏ hàng mới
        $result_cart = $con->query("SELECT *
                                    FROM giohang as a
                                    LEFT JOIN hanghoa as b ON a.MSHH=b.MSHH
                                    WHERE a.MSKH='$mskh'");

        while($row = $result_cart->fetch_assoc()):
            $thanhtien = $row['Gia']*$row['SoLuongMua'];
            $sl_kho = $row['SoLuongHang'];
            $magh = $row['MaGH'];

        ?>
            <tr class="table_row">
                <td class="column-1" >
                    <div class="how-itemcart1" style="width:60px; text-align:center">
                        <img src="../img/product/<?=$row['HinhMoTa']?>" alt="IMG">
                    </div>
                </td>
                <td class="column-2"><?=$row['TenHH']?></td>
                <td class="column-3" style="border: 0.5px solid #e6e6e6;"><?=number_format($row['Gia'])?> ₫</td>
                <td class="column-4" style="border: 0.5px solid #e6e6e6;">
                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" onclick="minus_product(<?=$magh?>, <?=$row['SoLuongMua']?>)">
                            <i class="fs-16 zmdi zmdi-minus"></i>
                        </div>
                        
                        <input id="slmua_product" class="mtext-104 cl3 txt-center num-product" type="number" name="slmua_update" value="<?=$row['SoLuongMua']?>" min="1" max="<?=$sl_kho?>">

                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m" onclick="plus_product(<?=$magh?>, <?=$sl_kho?>, <?=$row['SoLuongMua']?>)">
                            <i class="fs-16 zmdi zmdi-plus"></i>
                        </div>
                    </div>
                </td>
                <td class="column-5" style="border: 0.5px solid #e6e6e6;"><?=number_format($thanhtien)?> ₫</td>
            </tr>
        <?php 
        endwhile;
    }

    //Tổng tiền đơn hàng
    if(isset($_POST['tongtien'])){
        $mskh = $_COOKIE['login_kh'];
        $result_cart = $con->query("SELECT a.SoLuongMua, b.Gia 
                                    FROM giohang as a
                                    LEFT JOIN hanghoa as b ON a.MSHH=b.MSHH
                                    WHERE MSKH='$mskh'");
        $tongthanhtien = 0;
        while($row = $result_cart->fetch_assoc()){
            $tongthanhtien += $row['Gia']*$row['SoLuongMua'];
        }
        echo number_format($tongthanhtien);
    }
?>
