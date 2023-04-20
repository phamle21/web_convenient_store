function search_product(){
    var keyword = $('#input_product').val();
    if(keyword.length <1){
        $('#input_product').attr("placeholder",'Hãy nhập từ khóa muốn tìm kiếm vào đây!');
    }else{
        $.ajax({
            type: "POST",
            url: './xuly_admin/xuly_search_product.php',
            data: {
                keyword: keyword,
            }, 
            success: function(result){
                $('#show_product').html(result);
            }
        });
    }
    return false;
}

function close_notify(){
    $('.notify').css({"display":"none"});
}

$('.sidebar-item a').each(function (){
    if(this.href == location.href){
        $(this).addClass("active_admin");
    }
});
function edit_product(mshh){
    $.ajax({
        type: "POST",
        url: './xuly_admin/edit_product.php',
        data: {
            mshh: mshh,
        }, 
        success: function(result){
            $('#edit_show_ajax').html(result);
        }
    });
}

$('#giasp').on('keyup', function(){
    var x = parseFloat($('#giasp').val());
    x = x.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
    $('#price_demo').html(x);
});
function format_price(number){
    // var x = parseFloat($('#giasp').val());
    x = parseFloat(number).toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
    $('#price_demo_edit').html(x);
}

function edit_productType(maloai){
    $.ajax({
        type: "POST",
        url: './xuly_admin/edit_productType.php',
        data: {
            maloai: maloai,
        }, 
        success: function(result){
            $('#edit_show_ajax_loai').html(result);
        }
    });
}

function search_productType(){
    var keyword = $('#input_productType').val();
    if(keyword.length <1){
        $('#input_productType').attr("placeholder",'Hãy nhập từ khóa muốn tìm kiếm vào đây!');
    }else{
        $.ajax({
            type: "POST",
            url: './xuly_admin/xuly_search_productType.php',
            data: {
                keyword: keyword,
            }, 
            success: function(result){
                $('#show_productType').html(result);
            }
        });
    }
    return false;
}

function viewOrder(sodondh){
    $.ajax({
        type: "POST",
        url: './xuly_admin/order_details.php',
        data: {
            sodondh: sodondh,
        }, 
        success: function(result){
            $('#edit_show_ajax_order').html(result);
        }
    });
}
function viewProductDetails(mshh){
    $.ajax({
        type: "POST",
        url: './xuly_admin/product_details.php',
        data: {
            mshh: mshh,
        }, 
        success: function(result){
            $('#edit_show_ajax_product').html(result);
        }
    });
}

function search_staff(){
    var keyword = $('#input_staff').val();
    if(keyword.length <1){
        $('#input_staff').attr("placeholder",'Hãy nhập từ khóa muốn tìm kiếm vào đây!');
    }else{
        $.ajax({
            type: "POST",
            url: './xuly_admin/xuly_search_staff.php',
            data: {
                keyword: keyword,
            }, 
            success: function(result){
                $('#show_staff').html(result);
            }
        });
    }
    return false;
}

$('#inputSdt_staff').on("keyup", function() {
    var sdt = $('#inputSdt_staff').val();
    $.ajax({
        type: "post",
        url: "./xuly_admin/xacnhan_sdt.php",
        data: {
            sdt: sdt,
        },
        success: function(result){
            $('#check_sdt_staff').html(result);
        }
    });
    
});

$('#register_staff').submit(function() {
    var check_submit = true;
    
    if($('#pass_staff').val() != $('#repass_staff').val()){
        $('#error_repass_staff').html('Mật khẩu xác nhận chưa đúng!');
        check_submit = false;
    }

    if($('#comfirm_sdt_staff').html() != 'Số điện thoại có thể sử dụng'){
        check_submit = false;
    }

    return check_submit;
});

function edit_staff(msnv){
    $.ajax({
        type: "POST",
        url: './xuly_admin/edit_staff.php',
        data: {
            msnv: msnv,
        }, 
        success: function(result){
            $('#edit_show_ajax_staff').html(result);
        }
    });
}

function duyetlan1(sodon){
    $('#sodh_duyetlan1').attr("value", sodon);
}
function show_duyetlan2(sodon){
    $('#show_form_duyet'+sodon).toggle("show");
}

$('input').attr("autocomplete","off");
