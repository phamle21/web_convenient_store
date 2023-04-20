//Chi tiết sản phẩm
function show_chitiet(mshh){
    $.ajax({
        url : "./xuly/xuly_showchitiet_img_hh.php",
        type : "post",
        dataType:"text",
        data : {
            mshh : mshh
        },
        success : function (result){
            $('#showchitiet_img').html(result);
        }
        
    });
    $.ajax({
        url : "./xuly/xuly_showchitiet_info_hh.php",
        type : "post",
        dataType:"text",
        data : {
            mshh : mshh
        },
        success : function (result){
            $('#showchitiet_info').html(result);
        }
        
    });
}

function pick_img(newsrc){
    $('#img_show_main').attr("src", newsrc);
}

$('#btn_dropdown').on('click', function(){
    $('#user_dropdown').toggle("show");
});

//Thêm vào giỏ hàng
function add_cart(mshh) {
    var dataForm = $("#addCartForm").serialize();
    $.ajax({
        type: "POST",
        url: './xuly/xuly_giohang.php?'+dataForm,
        data: {
            mshh: mshh,
            themsp_cart: "true",
        }, 
        success: function(result){
            $('#showcart').html(result);
        }
    });
    // $.ajax({
    //     type: "POST",
    //     url: './xuly/xuly_giohang.php?',
    //     data: {
    //         count_cart: "true",
    //     }, 
    //     success: function(result){
    //         $('#number_cart').attr('data-notify',result);
    //     }
    // });
    alert('Đã thêm sản phẩm vào giỏ hàng');
    // location.href = location.href;
    return false;
    
}

function show_loai(maloai){
    $.ajax({
        type: "POST",
        url: './xuly/xuly_ajax_danhmuc.php?',
        data: {
            maloai: maloai,
        }, 
        success: function(result){
            $('#show_hanghoa').html(result);
        }
    });
}

function delete_cart(magh){
    $.ajax({
        type: "POST",
        url: './xuly/xuly_giohang.php?',
        data: {
            delete_spcart: "true",
            magh: magh,
        }, 
        success: function(result){
            $('#showcart').html(result);
        }
    });
    // $.ajax({
    //     type: "POST",
    //     url: './xuly/xuly_giohang.php?',
    //     data: {
    //         count_cart: "true",
    //     }, 
    //     success: function(result){
    //         $('#number_cart').attr('data-notify',result);
    //     }
    // });
}

$('.menu-header a').each(function (){
    if(this.href == location.href){
        $(this).parent().addClass('active-menu');
    }
});

function plus_product(magh, sl_kho, sl_mua){
    if(sl_mua+1 <= sl_kho){
        $.ajax({
            type: "POST",
            url: './xuly/xuly_giohang.php?',
            data: {
                plus_cart: "true",
                magh: magh,
            }, 
            success: function(result){
                $('#show_product_payment').html(result);
            }
        });
        $.ajax({
            type: "POST",
            url: './xuly/xuly_giohang.php?',
            data: {
                tongtien: "true",
            }, 
            success: function(result){
                // $('#show_tongtien').html(result);
            }
        });
        location.href = location.href;
    }
    
}

function minus_product(magh, sl_mua){
    if(sl_mua-1 >0){
        $.ajax({
            type: "POST",
            url: './xuly/xuly_giohang.php?',
            data: {
                tongtien: "true",
            }, 
            success: function(result){
                $('#show_tongtien').html(result);
            }
        });
        $.ajax({
            type: "POST",
            url: './xuly/xuly_giohang.php?',
            data: {
                minus_cart: "true",
                magh: magh,
            }, 
            success: function(result){
                // $('#show_product_payment').html(result);
            }
        });
        location.href = location.href;        
    }
    
}

$('#btn_diachi_cu').on('click', function(){
    $('#diachi_cu').attr('disabled', true);
    $('#diachi_moi').attr('disabled', false);
    $('#diachi_cu').css({'display':'none'});
    $('#diachi_moi').css({'display':'block'});
    $('#btn_diachi_cu').css({'display':'none'});
    $('#btn_diachi_moi').css({'display':'block'});
});

$('#btn_diachi_moi').on('click', function(){
    $('#diachi_moi').attr('disabled', true);
    $('#diachi_cu').attr('disabled', false);
    $('#diachi_moi').css({'display':'none'});
    $('#diachi_cu').css({'display':'block'});
    $('#btn_diachi_moi').css({'display':'none'});
    $('#btn_diachi_cu').css({'display':'block'});
});

function check_dathang(count_cart){
    if(count_cart >0){
        return true;
    }else{
        alert('Giỏ hàng trống, không thể đặt hàng!');
        return false;
    }
}

function check_dky(){
    if($('#password').val() != $('#repassword').val()){
        $('#error_repass').html('Mật khẩu xác nhận sai!');
        return false;
    }else{
        return true;
    }
}