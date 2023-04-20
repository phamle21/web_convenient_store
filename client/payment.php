<style>
    #number_cart{
        display:none;
    }
    
</style>
<?php
	include('header.php');
	require_once('../database/config.php');

    if(isset($_COOKIE['thongbao_dathang'])){
        alert($_COOKIE['thongbao_dathang']);
    }
?>

<div class="top_shop"></div>

	<!-- Shoping Cart -->
    <style>
        th{
            border: 0.5px solid #e6e6e6 !important;
            text-align: center !important;
        }
        #show_product_payment tr{
            height: 100px;
            /* padding: 10px; */
        }
        #show_product_payment tr td{
            padding: 10px;
        }
        .img-product{
            width: 60px;
            margin-right: -100px;
            padding: 0;
        }
        .img-product img{
            width: 100%;
        }
    </style>
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
                        <form action="" method="post"></form>
                            <div class="wrap-table-shopping-cart">
                                <table class="table-shopping-cart">
                                    <thead>
                                        <tr class="table_head">
                                            <th class="column-1" colspan="2" >Product</th>
                                            <th class="column-3">Price</th>
                                            <th class="column-4">Quantity</th>
                                            <th class="column-5">Total</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody id="show_product_payment">
                                        <?php
                                            $count_cart = 0;
                                            $tongthanhtien = 0;
                                            if(isset($_COOKIE['login_kh'])):
                                                $mskh = $_COOKIE['login_kh'];
                                                $result_cart = $con->query("SELECT *
                                                                            FROM giohang as a
                                                                            LEFT JOIN hanghoa as b ON a.MSHH=b.MSHH
                                                                            WHERE a.MSKH='$mskh'");
                                                $result_count_cart = $con->query("SELECT COUNT(*) as total FROM giohang WHERE MSKH='$mskh'");
                                                $count = $result_count_cart->fetch_assoc();
                                                
                                                if($count['total'] >0):
                                                    $count_cart = $count['total'];
                                                    while($row = $result_cart->fetch_assoc()):
                                                        $thanhtien = $row['Gia']*$row['SoLuongMua'];
                                                        $tongthanhtien += $thanhtien;
                                                        $sl_kho = $row['SoLuongHang'];
                                                        $magh = $row['MaGH'];

                                        ?>
                                                        <tr class="table_row">
                                                            <td class="column-1" >
                                                                <div class="img-product" style="width:60px; text-align:center">
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
                                                else:
                                                    echo "<tr><td style='text-align:center' colspan='5'>Giỏ hàng rỗng!</td></tr>";
                                                endif;
                                            else:
                                                echo "<tr><td style='text-align:center' colspan='5'>Giỏ hàng rỗng!</td></tr>";
                                            endif;
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </from>
					</div>
				</div>
                    
                
                    <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                        <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                            <h4 class="mtext-109 cl2 p-b-30">
                                Cart Totals
                            </h4>
                            <div class="flex-w flex-t bor12 p-b-13">
                                <div class="size-208">
                                    <span class="stext-110 cl2">
                                        Tổng:
                                    </span>
                                </div>

                                <div class="size-209">
                                    <span class="mtext-110 cl2" id="show_tongtien">
                                        <?=number_format($tongthanhtien)?> 
                                    </span> VNĐ
                                </div>
                            </div>
                            <form action="./xuly/xuly_dathang.php" method="post" id="form_dathang" onsubmit="return check_dathang(<?=$count_cart?>)">
                                <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                                    <div class="size-208 w-full-ssm">
                                        <span class="stext-110 cl2">
                                            Địa chỉ:
                                        </span>
                                    </div>
                                    <a class="toggle_address" id="btn_diachi_cu"> Nhập địa chỉ mới</a>
                                    <a class="toggle_address" id="btn_diachi_moi"> Chọn địa chỉ cũ</a>
                                    
                                        <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                            <select name="diachi_GH_cu" id="diachi_cu" style="width: 285px;height: 30px;">
                                                <?php
                                                    $mskh = $_COOKIE['login_kh'];
                                                    $result_diachi = $con->query("SELECT * FROM diachikh WHERE MSKH='$mskh'");

                                                    while($row = $result_diachi->fetch_assoc()){
                                                        echo "<option value=".$row['MaDC'].">".$row['DiaChi']."</option>";
                                                    }
                                                ?>
                                            </select>
                                            <input type="text" id="diachi_moi" value="" name="diachi_GH_moi" style="width: 285px;height: 30px;" placeholder="Nhập địa chỉ mới" >
                                        </div>
                                    
                                </div>
                            </form>
                                <?php if(isset($_COOKIE['login_kh'])): ?>
                                    
                                    <button type="submit" form="form_dathang" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                                        Thanh Toán
                                    </button>
                                <?php endif; ?> 
                        </div>
                    </div>
                
			</div>
		</div>
    </div>
<?php
	include('footer.php');
?>