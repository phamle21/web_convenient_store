<?php
    require_once('../../database/config.php');
    $mshh = $_POST['mshh'];

    $result_chitiet = $con->query("SELECT a.*, b.TenLoaiHang 
                                FROM hanghoa as a 
                                LEFT JOIN loaihanghoa as b ON a.MaLoaiHang=b.MaLoaiHang
                                WHERE a.MSHH='$mshh'");
    while($row = $result_chitiet->fetch_assoc()){
        $tenhh = $row['TenHH'];
        $loaihh = $row['TenLoaiHang'];
        $gia = number_format($row['Gia']);
        $mota = $row['MoTa'];
        $sl = $row['SoLuongHang'];
    }
?>
<form id="addCartForm" onsubmit="return add_cart(<?=$mshh;?>)">
    <div class="p-r-50 p-t-5 p-lr-0-lg">
        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
            <?=$tenhh?>
        </h4>

        <span class="mtext-106 cl2">
            <?=$gia?> VNĐ
        </span>

        <p class="stext-102 cl3 p-t-23" style="height: 230px">
            <?=$mota?> 
        </p>
        <p>
            Số lượng còn lại: <?=$sl?>
        </p>
        <!--  -->
        <div class="p-t-33">
            <div class="flex-w flex-r-m p-b-10">
                <div class="size-204 flex-w flex-m respon6-next">
                    <div class="wrap-num-product flex-w m-r-20 m-tb-10" >
                        <input type="number" name="soluong_mua" value="1" min="1" max="<?=$sl?>" required style="width: 100%;
                                                                                                                 border: 1px solid black;
                                                                                                                 height: max-content;">
                    </div>
                    <div>
                        <?php if(isset($_COOKIE['login_kh'])):?>
                            <button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                Add to cart
                            </button>
                        <?php else:?>
                            <button data-toggle="modal" onclick="return false" data-target="#modalLoginForm" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                Đăng nhập
                            </button>
                        <?php endif;?>
                    </div>
                </div>
            </div>	
        </div>
    </div>
</from>
