<?php
	include('header.php');
	require_once('../database/config.php');
?>

		

	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1" style="background-image: url(../img/system/banner2.1.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false " data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									IPHONE 13 SERIES
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
								Oh. So. Pro.


								</h2>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="shop.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url(../img/system/banner1.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									MACBOOK PRO 2021
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
								Supercharged for pros.
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
								<a href="shop.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url(../img/system/banner3.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									APPLE WATCH
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
								It’s the ultimate device for a healthy life.
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
								<a href="shop.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140" id="frame_product">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Product Overview
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<a href="./#frame_product" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" style="cursor:pointer">
						All Products
					</a>
					<?php 
						$result_loaihh = $con->query("SELECT * FROM loaihanghoa");
						while($row = $result_loaihh->fetch_assoc()):
					?>
					<a href="index.php?show_theoloai=<?= $row['MaLoaiHang']?>#frame_product" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" style="cursor:pointer">
						<?= $row['TenLoaiHang']?>
					</a>
					<?php endwhile; ?>
				</div>
				
			</div>

			<div class="row isotope-grid" id="show_hanghoa">
				<?php 
					if(isset($_GET['show_theoloai'])):
						$maloai = $_GET['show_theoloai'];
						$result_hh = $con->query("SELECT a.*, b.TenLoaiHang 
													FROM hanghoa as a 
													LEFT JOIN loaihanghoa as b ON a.MaLoaiHang=b.MaLoaiHang
													WHERE a.MaLoaiHang='$maloai'
													LIMIT 12");
					else:
						$result_hh = $con->query("SELECT a.*, b.TenLoaiHang 
													FROM hanghoa as a 
													LEFT JOIN loaihanghoa as b ON a.MaLoaiHang=b.MaLoaiHang
													LIMIT 12");
					endif;
					while($row = $result_hh->fetch_assoc()):
				?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2 product-show">
						<div class="block2-pic hov-img0 product-img">
							<img src="../img/product/<?=$row['HinhMoTa']?>" alt="IMG-PRODUCT">

							<a onclick="show_chitiet(<?=$row['MSHH']?>)" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1 chitiet_btn">
								Chi tiết
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 name_product_show">
									<?=$row['TenHH']?>
								</a>

								<span class="stext-105 cl3">
									<?= number_format($row['Gia'])?>đ
								</span>
							</div>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
			</div>

		</div>
	</section>
	
	<!-- Modal1 -->
	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20" id="modalAddCart">
		<div class="overlay-modal1 js-hide-modal1"></div>

		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="../img/system/icons/icon-close.png" alt="CLOSE">
				</button>

				<div class="row" >
					<div class="col-md-6 col-lg-7 p-b-30" id="showchitiet_img">
						
					</div>

					<div class="col-md-6 col-lg-5 p-b-30" id="showchitiet_info">
						
					</div>
				</div>
			</div>
		</div>
	</div>

<?php
	include('footer.php');
?>