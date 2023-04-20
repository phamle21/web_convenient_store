<?php
    include('./header_master.php');
    require_once('../database/config.php');
?>

    <div class="container-fluid">
        <div class="row">
	        <div class="col-12 col-lg-12">
	            <div class="card">
                    <div>
                        <!-- Search -->
                        <form class="search-bar" onsubmit="return search_staff()">
                            <input style="display:inline" type="text" name="keyword" id="input_staff" class="form-control" placeholder="Tìm kiếm theo tên nhân viên">
                            <button class="btn_search" type="submit"><i class="icon-magnifier"></i></button>
                        </form>
                    </div>
                    <?php 
                        if(isset($_COOKIE['thongbao_success'])){
                            echo "<div class='notify_success notify'>".$_COOKIE['thongbao_success']." <i class='fa fa-times' onclick='close_notify()'></i></div>";
                        }
                        if(isset($_COOKIE['thongbao_fail'])){
                            echo "<div class='notify_fail notify'>".$_COOKIE['thongbao_fail']." <i class='fa fa-times' onclick='close_notify()'></i></div>";
                        }
                    ?>
	                <div class="card-header">Danh sách nhân viên
		                <div class="card-action">
                        <button type="button" class="btn btn-light btn-block" data-toggle="modal" data-target="#modalAddStaff">Add staff</button>
                      </div>
		            </div>
                    
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush table-borderless">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Position</th>
                                    <th style="max-width: 100px">Address</th>
                                    <th>Phone Number</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                            <tbody id="show_staff">
                                <?php   
                                    $result = $con->query("SELECT * FROM nhanvien WHERE MSNV<>1");
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
                                        echo "<tr><td colspan='6' style='text-align:center'>Không có nhân viên nào!</td></tr>";
                                    endif;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    h5, label, .modal-content{
        color: black;
    }
    .form-control{
        background-color: rgba(0,0,0,.2);
        color: black;
    }
    .form-control:focus{
        border:1px solid gray;
    }
    .img_product{
        display: block;
    }
    select option{
        background-color: white;
        color: black;
    }
    ::placeholder{
        color: black;
    }
    .modal-dialog{
        max-width: max-content !important;
    }
    .modal-content{
        background-image: linear-gradient(357deg, #b800ff, #0cb4f77d);
    }
</style>
<!-- Modal Add Product -->
<div class="modal fade" id="modalAddStaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">New Staff</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="width:400px"><!--Body Modal Content-->
        <form action="./xuly_admin/xuly_addStaff.php" id="register_staff" method="post" >
            <div class="form-group">
                <label for="exampleInputName" class="sr-only">Name</label>
                <div class="position-relative has-icon-right">
                    <input type="text" id="exampleInputName" name="hoten" class="form-control input-shadow" placeholder="Enter Your Name" required>
                    <div class="form-control-position">
                        <i class="icon-user"></i>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName" class="sr-only">Chức vụ</label>
                <div class="position-relative has-icon-right">
                    <input type="text" id="exampleInputChucVu" name="chucvu" class="form-control input-shadow" placeholder="Enter Your Chức vụ" required>
                    <div class="form-control-position">
                        <i class="fa fa-layer-group"></i>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName" class="sr-only">Địa Chỉ</label>
                <div class="position-relative has-icon-right">
                    <input type="text" id="exampleInputDiaChi" name="diachi" class="form-control input-shadow" placeholder="Enter Your Địa Chỉ" required>
                    <div class="form-control-position">
                        <i class="fa fa-map-marker-alt"></i>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName" class="sr-only">Số điện thoại</label>
                <div class="position-relative has-icon-right">
                    <input type="text" id="inputSdt_staff" name="sdt" autocomplete="off" minlength="10" maxlength="12" value="" class="form-control input-shadow" placeholder="Enter Your Phone" required>
                    <div class="form-control-position">
                        <i class="icon-phone"></i>
                    </div>
                </div>
                <div id="check_sdt_staff"></div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword" class="sr-only">Password</label>
                <div class="position-relative has-icon-right">
                    <input type="password" id="pass_staff" name="matkhau" autocomplete="off" class="form-control input-shadow" value="" placeholder="Choose Password" required>
                    <div class="form-control-position">
                        <i class="icon-lock"></i>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword" class="sr-only">Confirm Password</label>
                <div class="position-relative has-icon-right">
                    <input type="password" id="repass_staff" class="form-control input-shadow" placeholder="Confirm Your Password" required>
                    <div class="form-control-position">
                        <i class="icon-lock"></i>
                    </div>
                </div>
                <p id="error_repass_staff" style="color:red"></p>
            </div>
            <button type="submit" form="register_staff" class="btn btn-light btn-block waves-effect waves-light">Sign Up</button>
        </form>
      </div><!--//END Body Modal Content-->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Edit Staff -->
<div class="modal fade" id="modalEditStaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Edit Staff</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="width: 400px" id="edit_show_ajax_staff">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" form="edit_staff" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
<?php
    include('./footer_master.php');
?>