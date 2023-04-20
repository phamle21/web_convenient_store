<?php
    require_once('../database/config.php');
    if(isset($_POST['submit_login'])){
        $sdt = $_POST['sdt'];
        $matkhau = md5($_POST['matkhau']);
        $login = $con->query("SELECT * FROM nhanvien WHERE SoDienThoai='$sdt' AND MatKhau='$matkhau'");
        if($login->num_rows >0){
          $row = $login->fetch_assoc();
          setcookie('login_nv', $row['MSNV'], 0, '/');
          header("Location: ./");
        }else{
          setcookie('thongbao_login','Bạn đã nhập sai tài khoản hoặc mật khẩu', time()+3, '/');
          header('Location: ./login_admin.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>CRIS STORE ADMIN</title>
  <!-- loader-->
  <link href="./assets/css/pace.min.css" rel="stylesheet"/>
  <script src="./assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="./img/CIcon.png" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="./assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="./assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="./assets/css/app-style.css" rel="stylesheet"/>
  
</head>

<body class="bg-theme bg-theme1">

<!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">

	<div class="card card-authentication1 mx-auto my-4">
		<div class="card-body">
		 <div class="card-content p-2">
		 	<div class="text-center">
		 		<img src="./img/CIcon.png" alt="logo icon">
		 	</div>
		  <div class="card-title text-uppercase text-center py-3">L O G I N</div>
      <?php 
        if(isset($_COOKIE['thongbao_login'])){
          echo "<p style='color:red'>".$_COOKIE['thongbao_login']."</p>";
        }
      ?>
      
		    <form action="" method="post">
                <div class="form-group">
                    <label for="exampleInputName" ><i class="icon-phone"></i> Số điện thoại</label>
                    <div class="position-relative has-icon-right">
                        <input type="text" id="exampleInputPhone" name="sdt" class="form-control input-shadow" placeholder="Enter Your Phone" required>
                        <div class="form-control-position">
                            
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword" ><i class="icon-lock"></i> Password</label>
                    <div class="position-relative has-icon-right">
                        <input type="password" id="exampleInputPassword" name="matkhau" class="form-control input-shadow" placeholder="Choose Password" required>
                        <div class="form-control-position">
                            
                        </div>
                    </div>
                </div>	  
			 <button type="submit" name="submit_login" value="true" class="btn btn-light btn-block waves-effect waves-light">Login</button>
			 </form>
		   </div>
		  </div>
	     </div>
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--start color switcher-->
   <div class="right-sidebar">
    <div class="switcher-icon">
      <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">

      <p class="mb-0">Gaussion Texture</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

      <p class="mb-0">Gradient Background</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
		<li id="theme13"></li>
        <li id="theme14"></li>
        <li id="theme15"></li>
      </ul>
      
     </div>
   </div>
  <!--end color switcher-->
	
	</div><!--wrapper-->
	
  <!-- Bootstrap core JavaScript-->
  <script src="./assets/js/jquery.min.js"></script>
  <script src="./assets/js/popper.min.js"></script>
  <script src="./assets/js/bootstrap.min.js"></script>
	
  <!-- sidebar-menu js -->
  <script src="./assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="./assets/js/app-script.js"></script>
  
</body>
</html>
