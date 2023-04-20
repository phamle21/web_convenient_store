<?php
    include('../../database/config.php');

    $mshh = $_POST['mshh'];
    $ten_sp = $_POST['tenhh'];
    $mota = $_POST['mota'];
    $gia_sp = $_POST['gia'];
    $soluong = $_POST['soluong'];
    $loaihh = $_POST['loaihh'];

    if ($_FILES['img1']['name'] != NULL) {//Lưu ảnh 1/ảnh mô tả
        
        $path = "../../img/product/"; // Ảnh sẽ lưu vào thư mục img/product
        $tmp_name = $_FILES['img1']['tmp_name'];
        $name_img = time()."-img1-".$_FILES['img1']['name'];//Đặt tên file

        //Xóa ảnh cũ
        $result_img1 = $con->query("SELECT * FROM hinhhanghoa WHERE MSHH='$mshh' LIMIT 0,1");
        $row_img1 = $result_img1->fetch_assoc();
        $mahinh1 = $row_img1['MaHinh'];
        $tenhinh1 = $row_img1['TenHinh'];
        unlink($path.$tenhinh1);

        //Move hình ảnh vào thư mục img/product
        move_uploaded_file($tmp_name, $path . $name_img);

        $hinhmota = $name_img;

    }
    
    if ($_FILES['img2']['name'] != NULL) {//Lưu ảnh 2 nếu có
        
        $path = "../../img/product/"; // Ảnh sẽ lưu vào thư mục img/product
        $tmp_name2 = $_FILES['img2']['tmp_name'];
        $name_img2 = time()."-img2-".$_FILES['img2']['name'];//Đặt tên file
        
        $check_img2 = false;//Trước đó chưa có hình rồi=>create
        //Xóa ảnh phụ 1 cũ nếu có
        $result_img2 = $con->query("SELECT * FROM hinhhanghoa WHERE MSHH='$mshh' LIMIT 1,1");
        if($result_img2->num_rows >0){//Nếu trước đó có ảnh phụ 1
            $row_img2 = $result_img2->fetch_assoc();
            $tenhinh2 = $row_img2['TenHinh'];
            unlink($path.$tenhinh2);
            $check_img2 = true;//Trước đó có hình rồi=>update
            $mahinh2 = $row_img2['MaHinh'];
        }

        // Move hình ảnh vào thư mục img/product
        move_uploaded_file($tmp_name2, $path . $name_img2);
    }
    
    if ($_FILES['img3']['name'] != NULL) {//Lưu ảnh 3 nếu có
        
        $path = "../../img/product/"; // Ảnh sẽ lưu vào thư mục img/product
        $tmp_name3 = $_FILES['img3']['tmp_name'];
        $name_img3 = time()."-img3-".$_FILES['img3']['name'];//Đặt tên file

        $check_img3 = false;//Trước đó chưa có hình rồi=>create
        //Xóa ảnh phụ 2 cũ nếu có
        $result_img3 = $con->query("SELECT * FROM hinhhanghoa WHERE MSHH='$mshh' LIMIT 2,1");
        if($result_img3->num_rows >0){//Nếu trước đó có ảnh phụ 2
            $row_img3 = $result_img3->fetch_assoc();
            $tenhinh3 = $row_img3['TenHinh'];
            unlink($path.$tenhinh3);
            $check_img3 = true;//Trước đó có hình rồi=>update
            $mahinh3 = $row_img3['MaHinh'];
        }
        // Move hình ảnh vào thư mục img/product
        move_uploaded_file($tmp_name3, $path . $name_img3);
    }

    if ($_FILES['img1']['name'] != NULL){
        $sql = "UPDATE hanghoa
                SET TenHH='$ten_sp', MoTa='$mota', HinhMoTa='$hinhmota', Gia='$gia_sp', SoLuongHang='$soluong', MaLoaiHang='$loaihh'
                WHERE MSHH='$mshh'";
    }else{
        $sql = "UPDATE hanghoa
                SET TenHH='$ten_sp', MoTa='$mota', Gia='$gia_sp', SoLuongHang='$soluong', MaLoaiHang='$loaihh'
                WHERE MSHH='$mshh'";
    }
    

    if($con->query($sql) === TRUE){
        //Update ảnh chính
        if ($_FILES['img1']['name'] != NULL){
            $con->query("UPDATE hinhhanghoa SET TenHinh='$hinhmota' WHERE MaHinh='$mahinh1'");
        }
        //Update OR Create ảnh phụ 1
        if ($_FILES['img2']['name'] != NULL){
            if($check_img2 == true){// Update
                $con->query("UPDATE hinhhanghoa SET TenHinh='$name_img2' WHERE MaHinh='$mahinh2'");
            }else{//Create
                $con->query("INSERT INTO hinhhanghoa(TenHinh, MSHH) VALUES ('$name_img2','$mshh')");
            }
        }

        //Update OR Create ảnh phụ 2
        if ($_FILES['img3']['name'] != NULL){
            if($check_img3 == true){// Update
                $con->query("UPDATE hinhhanghoa SET TenHinh='$name_img3' WHERE MaHinh='$mahinh3'");
            }else{//Create
                $con->query("CALL admin_add_image('$name_img3','$mshh')");
            }
        }

        setcookie('thongbao_success','Chỉnh sửa sản phẩm thành công', time() + 3, '/');
        header('Location: ../sanpham.php');
    }else{
        setcookie('thongbao_fail','Chỉnh sửa sản phẩm thất bại', time() + 3, '/');
        header('Location: ../sanpham.php');
    }
