<?php
	include('header.php');
	require_once('../database/config.php');
?>

<div class="top_shop"></div>


	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140" id="frame_product">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					WELCOME SHOP
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<a href="shop.php?#frame_product" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" style="cursor:pointer">
						All Products
					</a>
					<?php 
						$result_loaihh = $con->query("SELECT * FROM loaihanghoa");
						while($row = $result_loaihh->fetch_assoc()):
					?>
					<a href="shop.php?show_theoloai=<?= $row['MaLoaiHang']?>#frame_product" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" style="cursor:pointer">
						<?= $row['TenLoaiHang']?>
					</a>
					<?php endwhile; ?>
				</div>
				
			</div>

			<div class="row isotope-grid" id="show_hanghoa">
				<?php 

					$limit = 12;
					if(isset($_GET['limit_load'])){
						$limit = $_GET['limit_load'] + 12;
					}
					if(isset($_GET['show_theoloai'])):
						$maloai = $_GET['show_theoloai'];
						$result_hh = $con->query("SELECT a.*, b.TenLoaiHang 
													FROM hanghoa as a 
													LEFT JOIN loaihanghoa as b ON a.MaLoaiHang=b.MaLoaiHang
													WHERE a.MaLoaiHang='$maloai'");
					?>
						<style>
							.load_more{
								display: none;
							}
						</style>
					<?php
					else:
						$result_hh = $con->query("SELECT a.*, b.TenLoaiHang 
													FROM hanghoa as a 
													LEFT JOIN loaihanghoa as b ON a.MaLoaiHang=b.MaLoaiHang
													LIMIT $limit");
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

			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45 load_more">
				<a href="./shop.php?limit_load=<?=$limit?>" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
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