<?php
	require_once('../database/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cris Store</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../img/system/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../build/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../build/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../build/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../build/fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../build/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../build/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../build/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../build/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../build/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../build/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../build/vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../build/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../build/css/util.css">
	<link rel="stylesheet" type="text/css" href="../build/css/main.css">
	<link rel="stylesheet" type="text/css" href="../build/css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="./" class="logo">
						<img src="../img/system/icons/logo2.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="menu-header">
								<a href="index.php">Home</a>
							</li>

							<li class="menu-header">
								<a href="shop.php">Shop</a>
							</li>

							<li class="menu-header">
								<a href="payment.php">Payment</a>
							</li>
<!-- 
							<li class="menu-header">
								<a href="about.php">About</a>
							</li> -->
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">

						<?php if(isset($_COOKIE['login_kh'])): 
							$mskh = $_COOKIE['login_kh'];
							$sql_login_kh = "SELECT * FROM khachhang WHERE MSKH = '$mskh'";
							$result_loginkh = $con->query($sql_login_kh);
		
							while($row = $result_loginkh->fetch_assoc()){
								$ten_kh = $row['HoTenKH'];
							}

							// $result_count_cart = $con->query("SELECT COUNT(*) as total FROM giohang WHERE MSKH='$mskh'");
							// $count = $result_count_cart->fetch_assoc();
						?>
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" id="number_cart" >
								<i class="zmdi zmdi-shopping-cart"></i>
							</div>

							<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 " >
								<a id="btn_dropdown"><i class="fa fa-user"></i> <?=$ten_kh?></a>
							</div>
							<div class="user_dropdown" id="user_dropdown">
								<ul>
									<!-- <li><i class="fa fa-id-card"></i><a href="./xuly/xuly_logout.php"> Profile</a></li> -->
									<li><i class="fa fa-sign-out"></i><a href="./xuly/xuly_logout.php"> Logout</a></li>
								</ul>
							</div>
						<?php else: ?>
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" >
								<a data-toggle="modal" data-target="#modalLoginForm" style="color: black"><i class="fa fa-user-circle"></i></a>
							</div>
						<?php endif; ?>

					</div>
				</nav>
			</div>	
		</div>
		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="./"><img src="../img/system/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="../img/system//icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25" style="padding: 0px 30px;width:30%">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart 
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full" id="showcart">
				<?php
				$show_cart = $con->query("SELECT *
                                  FROM giohang as a
                                  LEFT JOIN hanghoa as b ON a.MSHH=b.MSHH
								  WHERE a.MSKH='$mskh'");
				$tong_thanhtien=0;
				while($row = $show_cart->fetch_assoc()):
					$MaGH = $row['MaGH'];
					$gia = number_format($row['Gia']);
					$slmua = $row['SoLuongMua'];
					$thanhtien = $row['Gia']*$slmua;
					$tong_thanhtien+=$thanhtien;
				?>
				<li class="header-cart-item flex-w flex-t m-b-12 product_cart">
					<a onclick="delete_cart(<?=$MaGH?>)">
						<div class="header-cart-item-img">
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
				<?php endwhile; ?>
				</ul>
				
				<div class="w-full">

					<div class="header-cart-buttons flex-w w-full">
						<a href="./payment.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							Thanh Toán
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- MODAL LOGIN -->
<div class="modal fade" id="modalLoginForm" tabindex="1000" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index: 10000000">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Đăng nhập</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
		<form action="./xuly/xuly_login.php" method="post">
			<div class="modal-body mx-3">

				<div class="md-form mb-5 div_input">
				<i class="fa fa-phone" style=""> Số điện thoại:</i>
				<input type="text"  name="sdt" class="form-control validate" maxlength="10" placeholder="Nhập số điện thoại">
				</div>

				<div class="md-form mb-4 div_input">
				<i class="fa fa-lock"> Mật khẩu:</i>
				<input type="password" id="defaultForm-pass" name="matkhau" class="form-control validate" placeholder="Nhập mật khẩu">
				</div>

			</div>
			<div class="modal-footer d-flex justify-content-center">
				<button type="submit" class="btn btn-default btn_login">Đăng nhập</button>
			</div>
			<div class="modal-footer d-flex justify-content-center">
				Bạn chưa có tài khoản? <a data-toggle="modal" data-target="#modalRegisterForm" style="margin-left: 5px; cursor:pointer"> Đăng ký</a>
			</div>
		</form>
    </div>
  </div>
</div>

<!-- MODAL REGISTER -->
<div class="modal fade" id="modalRegisterForm" tabindex="1000" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index: 10000000">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign up</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
		<form action="./xuly/xuly_register.php" method="post" onsubmit="return check_dky(this)">
			<div class="modal-body mx-3">

				<div class="md-form mb-5 div_input">
					<i class="fa fa-user" style=""> Họ tên:</i>
					<input type="text"  name="hoten" class="form-control validate" placeholder="Nhập họ tên" required>
				</div>
				<div class="md-form mb-5 div_input">
					<i class="fa fa-building" style=""> Tên Công Ty (nếu có):</i>
					<input type="text"  name="tencty" class="form-control validate" placeholder="Nhập tên công ty">
				</div>

				<div class="md-form mb-5 div_input">
					<i class="fa fa-fax" style=""> Số fax (nếu có):</i>
					<input type="text"  name="sofax" class="form-control validate" placeholder="Nhập số Fax">
				</div>

				<div class="md-form mb-5 div_input">
					<i class="fas fa-map-marker-alt" style=""> Địa chỉ:</i>
					<input type="text"  name="diachi" class="form-control validate" placeholder="Nhập địa chỉ" required>
				</div>

				<div class="md-form mb-5 div_input">
					<i class="fa fa-phone" style=""> Số điện thoại:</i>
					<input type="text"  name="sdt" class="form-control validate" maxlength="10" placeholder="Nhập số điện thoại" required>
				</div>
				<div class="md-form mb-4 div_input">
					<i class="fa fa-lock"> Mật khẩu:</i>
					<input type="password" id="password" name="matkhau" class="form-control validate" placeholder="Nhập mật khẩu" required>
				</div>
				<div class="md-form mb-4 div_input">
					<i class="fa fa-lock"> Xác nhận mật khẩu:</i>
					<input type="password" id="repassword" name="rematkhau" class="form-control validate" placeholder="Nhập lại mật khẩu" required>
					<p id="error_repass" style="color: red"></p>
				</div>

			</div>
			<div class="modal-footer d-flex justify-content-center">
				<button type="submit" class="btn btn-default btn_login">Đăng ký</button>
			</div>
		</form>
    </div>
  </div>
</div>
<?php 
	if(isset($_COOKIE['thongbao_login'])){
		alert($_COOKIE['thongbao_login']);
	}
	if(isset($_COOKIE['thongbao_dky_KH'])){
		alert($_COOKIE['thongbao_dky_KH']);
	}
?>
