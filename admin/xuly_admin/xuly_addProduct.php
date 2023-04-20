<?php
    include('../../database/config.php');

    $ten_sp = $_POST['tenhh'];
    $mota = $_POST['mota'];
    $gia_sp = $_POST['gia'];
    $soluong = $_POST['soluong'];
    $loaihh = $_POST['loaihh'];

    if ($_FILES['img1']['name'] != NULL) {//Lưu ảnh 1/ảnh mô tả
        
        $path = "../../img/product/"; // Ảnh sẽ lưu vào thư mục img/product
        $tmp_name = $_FILES['img1']['tmp_name'];
        $name_img = time()."-img1-".$_FILES['img1']['name'];//Đặt tên file

        // Move hình ảnh vào thư mục img/product
        move_uploaded_file($tmp_name, $path . $name_img);

        $hinhmota = $name_img;

    } else {
        alert("Bạn chưa chọn ảnh sản phẩm");
    }
    if ($_FILES['img2']['name'] != NULL) {//Lưu ảnh 2 nếu có
        
        $path = "../../img/product/"; // Ảnh sẽ lưu vào thư mục img/product
        $tmp_name2 = $_FILES['img2']['tmp_name'];
        $name_img2 = time()."-img2-".$_FILES['img2']['name'];//Đặt tên file

        // Move hình ảnh vào thư mục img/product
        move_uploaded_file($tmp_name2, $path . $name_img2);
    }
    if ($_FILES['img3']['name'] != NULL) {//Lưu ảnh 3 nếu có
        
        $path = "../../img/product/"; // Ảnh sẽ lưu vào thư mục img/product
        $tmp_name3 = $_FILES['img3']['tmp_name'];
        $name_img3 = time()."-img3-".$_FILES['img3']['name'];//Đặt tên file

        // Move hình ảnh vào thư mục img/product
        move_uploaded_file($tmp_name3, $path . $name_img3);
    }
      

    

    $sql = "INSERT INTO hanghoa(tenHH, MoTa, Gia, SoLuongHang, HinhMoTa, MaLoaiHang)
            VALUES ('$ten_sp', '$mota', '$gia_sp', '$soluong', '$hinhmota', '$loaihh')";
    if($con->query($sql) === TRUE){
        $last_mshh = $con->insert_id;
        $sql_hinhanhsp = "INSERT INTO hinhhanghoa(TenHinh, MSHH)
                          VALUES ('$hinhmota', '$last_mshh')";
        $con->query($sql_hinhanhsp);

        if ($_FILES['img2']['name'] != NULL){
            $con->query("INSERT INTO hinhhanghoa(TenHinh, MSHH)
                        VALUES ('$name_img2', '$last_mshh')");
        }
        if ($_FILES['img3']['name'] != NULL){
            $con->query("INSERT INTO hinhhanghoa(TenHinh, MSHH)
                        VALUES ('$name_img3', '$last_mshh')");
        }

        setcookie('thongbao_success','Thêm sản phẩm thành công', time() + 3, '/');
        header('Location: ../sanpham.php');
    }else{
        setcookie('thongbao_fail','Thêm sản phẩm thất bại', time() + 3, '/');
        header('Location: ../sanpham.php');
    }

?>