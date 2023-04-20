<?php
    include('./header_master.php');
    
    if(isset($_COOKIE['thongbao_success'])){
        echo "<div class='notify_success notify'>".$_COOKIE['thongbao_success']." <i class='fa fa-times' onclick='close_notify()'></i></div>";
    }
    if(isset($_COOKIE['thongbao_fail'])){
        echo "<div class='notify_fail notify'>".$_COOKIE['thongbao_fail']." <i class='fa fa-times' onclick='close_notify()'></i></div>";
    }
    $count_tongdh = $con->query("SELECT COUNT(SoDonDH) as total FROM dathang")->fetch_assoc();
    $count_dangiao = $con->query("SELECT COUNT(SoDonDH) as total FROM dathang WHERE TrangThaiDH='Đang giao hàng'")->fetch_assoc();
    $count_chuaduyet = $con->query("SELECT COUNT(SoDonDH) as total FROM dathang WHERE TrangThaiDH='Chưa duyệt'")->fetch_assoc();
    $count_hoanthanh = $con->query("SELECT COUNT(SoDonDH) as total FROM dathang WHERE TrangThaiDH='Đã hoàn thành'")->fetch_assoc();
    $count_thatbai = $con->query("SELECT COUNT(SoDonDH) as total FROM dathang WHERE TrangThaiDH='Thất bại'")->fetch_assoc();
    if($count_tongdh['total'] == 0){
        $tongdh = 1;
    }else{
        $tongdh = $count_tongdh['total'];
    }
?>

<p>Tổng số đơn hàng: <?=$count_tongdh['total']?></p>
<div class="card mt-3">
    <div class="card-content">
        <div class="row row-group m-0">
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0"><?=$count_dangiao['total']?> <span class="float-right"><i class="fa fa-truck"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:<?=$count_dangiao['total']/$tongdh*100?>%"></div>
                    </div>
                  <a href="./donhang.php" class="mb-0 text-white small-font">Số đơn đang giao</a>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0"><?=$count_hoanthanh['total']?> <span class="float-right"><i class="fa fa-flag"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:<?=$count_hoanthanh['total']/$tongdh*100?>%"></div>
                    </div>
                  <a href="javascript:void();" class="mb-0 text-white small-font">Số đơn hoàn thành</a>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0"><?=$count_thatbai['total']?> <span class="float-right"><i class="fa fa-frown"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:<?=$count_thatbai['total']/$tongdh*100?>%"></div>
                    </div>
                  <a href="javascript:void();" class="mb-0 text-white small-font">Số đơn thất bại</a>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0"><?=$count_chuaduyet['total']?> <span class="float-right"><i class="fa fa-hourglass-start"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:<?=$count_chuaduyet['total']/$tongdh*100?>%"></div>
                    </div>
                  <a href="javascript:void();" class="mb-0 text-white small-font">Số đơn chưa duyệt</a>
                </div>
            </div>
        </div>
    </div>
 </div>  

 <div class="container-fluid">
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">Danh sách đơn hàng
                </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush table-borderless">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>CLIENT</th>
                                <th>STAFF</th>
                                <th>ORDER DATE</th>
                                <th>DELIVERY DATE</th>
                                <th>DELIVERY ADDRESS</th>
                                <th>STATUS</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php   
                                    $msnv_login = $_COOKIE['login_nv'];
                                    $nv = $con->query("SELECT HoTenNV FROM nhanvien WHERE MSNV='$msnv_login'")->fetch_assoc();
                                    $hotennv_login = $nv['HoTenNV'];
                                    $result_dh = $con->query("SELECT a.*, b.HoTenKH, c.HoTenNV 
                                                            FROM dathang as a
                                                            LEFT JOIN khachhang as b ON a.MSKH=b.MSKH
                                                            LEFT JOIN nhanvien as c ON a.MSNV=c.MSNV");
                                    if($result_dh->num_rows >0):
                                        while($row = $result_dh->fetch_assoc()):
                                        ?>
                                            <tr>
                                                <td><?=$row['SoDonDH']?></td>
                                                <td><?=$row['HoTenKH']?></td>
                                                <td><?=$row['HoTenNV']?></td>
                                                <td><?=date("d-m-Y",strtotime($row['NgayDH']))?></td>
                                                <td><?php if($row['NgayGH'] != null) echo date("d-m-Y",strtotime($row['NgayGH']))?></td>
                                                <td><?=$row['DiaChiGH']?></td>
                                                <td style="text-align: center">
                                                    <?php
                                                        if($row['TrangThaiDH'] == 'Chưa duyệt'){
                                                            echo "<a href='javasript:void();' onclick='duyetlan1(".$row['SoDonDH'].")' data-toggle='modal' data-target='#modalDuyetDH'>".$row['TrangThaiDH']." </a><i class='fa fa-hand-pointer'></i>";
                                                        }else{
                                                            if($row['TrangThaiDH'] == 'Đang giao hàng' && $row['HoTenNV'] == $hotennv_login){
                                                                echo "<a href='javasript:void();' onclick='show_duyetlan2(".$row['SoDonDH'].")'>".$row['TrangThaiDH']." </a><i class='fa fa-caret-down'></i>";
                                                            }else{
                                                                echo $row['TrangThaiDH'];
                                                            }
                                                        }
                                                    ?>
                                                    <div class="show_form_duyet" id="show_form_duyet<?=$row['SoDonDH']?>">
                                                        <form action="./xuly_admin/xuly_duyetDH.php" id="duyetlan2Form" method="post">
                                                            <input type="hidden" name="sodonDH" value="<?=$row['SoDonDH']?>">
                                                            <select name="trangthai" class="form-control" id="" style="display: inline-block">
                                                                <option value="Đã hoàn thành">Đã hoàn thành</option>
                                                                <option value="Thất bại">Thất bại</option>
                                                            </select>
                                                            <button type="submit" name="duyetlan2" id="btn_duyetlan2"><i class="fa fa-check"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td class="action_icon">
                                                    <a href="javasript:void();" onclick="viewOrder(<?=$row['SoDonDH']?>)" data-toggle="modal" data-target="#modalViewOrderDetails"><i class="fa fa-eye" aria-hidden="true"></i> View</a> 
                                                    <a href="./xuly_admin/xuly_delete_order.php?sodonDH=<?=$row['SoDonDH']?>"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                                    
                                                </td>
                                            </tr>
                                        <?php 
                                        endwhile;
                                    else:
                                        echo "<tr><td colspan='8' style='text-align:center'>Không có đơn hàng nào!</td></tr>";
                                    endif;
                                ?>
                            </tbody>
                        </table>
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
        color: white;
    }
</style>
<!-- Modal View Order Details-->
<div class="modal fade" id="modalViewOrderDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Order Details</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="edit_show_ajax_order">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Duyet DH-->
<div class="modal fade" id="modalDuyetDH" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLongTitle">Duyệt Đơn Hàng</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="./xuly_admin/xuly_duyetDH.php" id="duyetdhForm" method="post">
                <input type="hidden" id="sodh_duyetlan1" name="sodondh">
                <div>
                    <label for="">Chọn ngày giao hàng:</label><br>
                    <input type="date" class="form-control" name="ngayGH" id="ngayGH" min="<?=date('Y-m-d')?>" value="<?=date('Y-m-d')?>">
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="duyetlan1" form="duyetdhForm" class="btn btn-primary">Save</button>
        </div>
    </div>
  </div>
</div>
<?php
    include('./footer_master.php');
?>