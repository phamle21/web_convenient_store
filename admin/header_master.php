<?php 
  if(!isset($_COOKIE['login_nv'])){
    header('Location: ./login_admin.php');
  }
  require_once('../database/config.php'); 
  $msnv = $_COOKIE['login_nv'];
  $info_nv = $con->query("SELECT * FROM nhanvien WHERE MSNV='$msnv'")->fetch_assoc();
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
  <link rel="icon" type="image/png" href="../img/system/icons/favicon.png"/>
  <!-- Vector CSS -->
  <link href="./assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
  <!-- simplebar CSS-->
  <link href="./assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="./assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="./assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="./assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="./assets/css/app-style.css" rel="stylesheet"/>
  <!-- My Style-->
  <link href="./assets/css/my-style.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <script src="../build/js/jquery-3.6.0.js"></script>
</head>

<body class="bg-theme bg-theme1">
 
<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="index.php">
       <img src="./img/CIcon.png" class="logo-icon" alt="logo icon">
       <h5 class="logo-text">CRIS STORE Admin</h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">MANAGE</li>
      
      <li class="sidebar-item">
        <a href="./sanpham.php">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Product</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a href="./loaihang.php">
        <i class="zmdi zmdi-collection-plus"></i> <span>Product Type</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a href="./donhang.php">
        <i class="zmdi zmdi-shopping-cart"></i> <span>Orders</span>
        </a>
      </li>
      <?php if($msnv == 1):?>
        <li class="sidebar-item">
          <a href="./staff.php"">
            <i class="zmdi zmdi-account-circle"></i> <span>Staff</span>
          </a>
        </li>
      <?php endif; ?>
    </ul>
    <div class="go_shop"><a href="../">Đến trang mua hàng (Client)</a></div>
   </div>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
    <!-- Search -->
    <!-- <li class="nav-item">
      <form class="search-bar">
        <input type="text" class="form-control" placeholder="Enter keywords">
         <a href="javascript:void();"><i class="icon-magnifier"></i></a>
      </form>
    </li> -->
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
      <i class="fa fa-bell-o"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="../img/system/logo-admin.png" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right" style="margin-right: 25px">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="../img/system/logo-admin.png" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title"><?=$info_nv['HoTenNV']?></h6>
            <p class="user-subtitle"><?=$info_nv['ChucVu']?></p>
            </div>
           </div>
          </a>
        </li>
        
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><a href="javascript:void();" data-toggle="modal" data-target="#modalEditProfile"><i class="fa fa-user-circle"></i> Profile</a></li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><a href="./xuly_admin/logout.php"><i class="icon-power mr-2"></i> Logout</a></li>
      </ul>
    </li>
  </ul>
</nav>
</header>
<!--End topbar header-->

<!-- MODAL -->
<div class="modal fade" id="modalEditProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Edit Profile</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="width: 400px" >
              <?php
            $msnv = $_COOKIE['login_nv'];
            $result = $con->query("SELECT * FROM nhanvien WHERE MSNV='$msnv'");
            $row = $result->fetch_assoc();

            $hoten = $row['HoTenNV'];
            $chucvu = $row['ChucVu'];
            $diachi = $row['DiaChi'];
            $sdt = $row['SoDienThoai'];
        ?>
        <style>
            form{
                color:white;
            }
        </style>
        <form action="./xuly_admin/xuly_editStaff.php" id="edit_me" method="post" onsubmit="return check_submit_edit()">
            <input type="hidden" name='msnv' value="<?=$msnv?>">
            <div class="form-group">
                <label for="exampleInputName" class="sr-only">Name</label>
                <div class="position-relative has-icon-right">
                    <input type="text" id="exampleInputName" value="<?=$hoten?>" name="hoten" class="form-control input-shadow" placeholder="Enter Your Name" required>
                    <div class="form-control-position">
                        <i class="icon-user"></i>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName" class="sr-only">Chức vụ</label>
                <div class="position-relative has-icon-right">
                    <input type="text" id="exampleInputChucVu" value="<?=$chucvu?>" readonly name="chucvu" class="form-control input-shadow" placeholder="Enter Your Chức vụ" required>
                    <div class="form-control-position">
                        <i class="fa fa-layer-group"></i>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName" class="sr-only">Địa Chỉ</label>
                <div class="position-relative has-icon-right">
                    <input type="text" id="exampleInputDiaChi" value="<?=$diachi?>" name="diachi" class="form-control input-shadow" placeholder="Enter Your Địa Chỉ" required>
                    <div class="form-control-position">
                        <i class="fa fa-map-marker-alt"></i>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName" class="sr-only">Số điện thoại</label>
                <div class="position-relative has-icon-right">
                    <input type="text" id="inputSdt" name="sdt" disabled value="<?=$sdt?>" class="form-control input-shadow" placeholder="Enter Your Phone" required>
                    <div class="form-control-position">
                        <i class="icon-phone"></i>
                    </div>
                </div>
                <div id="check_sdt"></div>
            </div>
            <p>Bỏ trống nếu không cần đổi mật khẩu</p>
            <div class="form-group">
                <label for="exampleInputPassword" class="sr-only">Password</label>
                <div class="position-relative has-icon-right">
                    <input type="password" id="pass_me" name="matkhau_moi" value="" class="form-control input-shadow" placeholder="Choose Password">
                    <div class="form-control-position">
                        <i class="icon-lock"></i>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword" class="sr-only">Confirm Password</label>
                <div class="position-relative has-icon-right">
                    <input type="password" id="repass_me" class="form-control input-shadow" placeholder="Confirm Your Password">
                    <div class="form-control-position">
                        <i class="icon-lock"></i>
                    </div>
                </div>
                <p id="error_repass_me" style="color:#fff700;"></p>
            </div>
        </form>

        <script>
          
            function check_submit_edit(){
                var pass = document.getElementById('pass_me').value;
                var repass = document.getElementById('repass_me').value;
                if(pass.length>0){
                    if(pass != repass){
                        document.getElementById('error_repass_me').innerHTML = "Mật khẩu xác nhận sai";
                        return false;
                    }else{
                        return true;
                    }
                }else{
                    return true;
                }
            }
        </script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" form="edit_me" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- END MODAL -->

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
    
