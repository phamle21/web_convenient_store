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
                        <form class="search-bar" onsubmit="return search_productType()">
                            <input style="display:inline" type="text" name="keyword" id="input_productType" class="form-control" placeholder="Tìm kiếm loại hàng hóa">
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
	                <div class="card-header">Danh sách loại hàng hóa
		                <div class="card-action">
                            <button type="button" class="btn btn-light btn-block" data-toggle="modal" data-target="#modalAddProductType">Add product type</button>
                        </div>
		            </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush table-borderless">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Type Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="show_productType">
                                    <?php   
                                        $result_loaihh = $con->query("SELECT * FROM loaihanghoa");
                                        if($result_loaihh->num_rows >0):
                                            while($row = $result_loaihh->fetch_assoc()):
                                            ?>
                                                <tr>
                                                    <td><?=$row['MaLoaiHang']?></td>
                                                    <td><?=$row['TenLoaiHang']?></td>
                                                    <td class="action_icon">
                                                        <a href="javasript:void();" onclick="edit_productType(<?=$row['MaLoaiHang']?>)" data-toggle="modal" data-target="#modalEditProductType"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a> 
                                                        <a href="./xuly_admin/xuly_delete_productType.php?maloai=<?=$row['MaLoaiHang']?>"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                                        
                                                    </td>
                                                </tr>
                                            <?php 
                                            endwhile;
                                        else:
                                            echo "<tr><td colspan='3' style='text-align:center'>Không có loại hàng hóa nào!</td></tr>";
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
</style>
<!-- Modal Add Product Type -->
<div class="modal fade" id="modalAddProductType" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">New Product Type</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="./xuly_admin/xuly_addProductType.php" id="addProductTypeForm" method="post" >
            <div>
                <label for="">ID:</label>
                <input type="text" class="form-control" disabled placeholder="Auto">
            </div>
            <div>
                <label for="">Product Type Name:</label>
                <input type="text" name="tenloaihh" class="form-control" placeholder="Product Name" required>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" form="addProductTypeForm" class="btn btn-primary">Add product type</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Product Type-->
<div class="modal fade" id="modalEditProductType" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Edit Product Type</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="edit_show_ajax_loai">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" form="editProductTypeForm" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
<?php
    include('./footer_master.php');
?>