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
                        <form class="search-bar" onsubmit="return search_product()">
                            <input type="text" name="keyword" id="input_product" class="form-control" placeholder="Tìm kiếm hàng hóa">
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
	                <div class="card-header">Danh sách hàng hóa
		                <div class="card-action">
                        <button type="button" class="btn btn-light btn-block" data-toggle="modal" data-target="#modalAddProduct">Add product</button>
                        </div>
		            </div>
                    
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush table-borderless">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product Type</th>
                                    <th>Photo</th>
                                    <th style="max-width: 100px">Product</th>
                                    <th>Price (VNĐ)</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                            <tbody id="show_product">
                                <?php   
                                    $result_hh = $con->query("SELECT a.*,b.TenLoaiHang 
                                                            FROM hanghoa as a 
                                                            LEFT JOIN loaihanghoa as b ON a.MaLoaiHang=b.MaLoaiHang 
                                                            ORDER BY MSHH DESC");
                                    if($result_hh->num_rows >0):
                                        while($row = $result_hh->fetch_assoc()):
                                        ?>
                                            <tr>
                                                <td><?=$row['MSHH']?></td>
                                                <td><?=$row['TenLoaiHang']?></td>
                                                <td><img src="../img/product/<?=$row['HinhMoTa']?>" class="product-img" alt="product img"></td>
                                                <td style="width:300px;white-space:break-spaces"><?=$row['TenHH']?></td>
                                                <td><?=number_format($row['Gia'])?></td>
                                                <td style="text-align:center"><?=$row['SoLuongHang']?></td>
                                                <td class="action_icon">
                                                    <a href="javasript:void();" onclick="viewProductDetails(<?=$row['MSHH']?>)" data-toggle="modal" data-target="#modalViewProductDetails"><i class="fa fa-eye" aria-hidden="true"></i> View</a> 
                                                    <a href="javasript:void();" onclick="edit_product(<?=$row['MSHH']?>)" data-toggle="modal" data-target="#modalEditProduct"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a> 
                                                    <a href="./xuly_admin/xuly_delete_product.php?mshh=<?=$row['MSHH']?>"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                                </td>
                                            </tr>
                                        <?php 
                                        endwhile;
                                    else:
                                        echo "<tr><td colspan='7' style='text-align:center'>Không có hàng hóa!</td></tr>";
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
</style>
<!-- Modal Add Product -->
<div class="modal fade" id="modalAddProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">New Product</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="./xuly_admin/xuly_addProduct.php" id="addProductForm" method="post" enctype="multipart/form-data">
            <div>
                <label for="">ID:</label>
                <input type="text" class="form-control" disabled placeholder="Auto">
            </div>
            <div>
                <label for="">Product Type:</label>
                <select name="loaihh" class="form-control" id="" required>
                    <?php
                        $result_loaihh = $con->query("SELECT * FROM loaihanghoa");
                        while($row = $result_loaihh->fetch_assoc()){
                            echo "<option value='".$row['MaLoaiHang']."'>".$row['TenLoaiHang']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div>
                <label for="">Product Name:</label>
                <input type="text" name="tenhh" class="form-control" placeholder="Product Name" required>
            </div>
            <div>
                <label for="">Description:</label>
                <textarea type="text" name="mota" class="form-control" placeholder="Desscription" required></textarea>
            </div>
            <div>
                <label for="">Product Price: <a id="price_demo"></a></label>
                <input type="text" name="gia" id="giasp" class="form-control" placeholder="Product Price" required>
            </div>
            <div>
                <label for="">Product Quantity:</label>
                <input type="text" name="soluong" class="form-control" placeholder="Product Quantity" required>
            </div>
            <div>
                <label class="img_product" for="">Product Images:</label>
                <i>Ảnh mô tả: </i><input type="file" name="img1" accept='image/*' required><br>
                <i>Ảnh phụ 1: </i><input type="file" name="img2" accept='image/*' required><br>
                <i>Ảnh phụ 2: </i><input type="file" name="img3" accept='image/*' required>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" form="addProductForm" class="btn btn-primary">Add product</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Product -->
<div class="modal fade" id="modalEditProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Edit Product</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="edit_show_ajax">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" form="editProductForm" class="btn btn-primary">Save</button>
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
<!-- Modal View Product Details-->
<div class="modal fade" id="modalViewProductDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Product Details</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="edit_show_ajax_product">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php
    include('./footer_master.php');
?>