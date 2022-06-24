$(document).ready(function(){
    admin_dashboard();

    $('#customer').on('click',function(){
        loadAdmin();
    });


    $('#product').on('click',function(){
        add_product_admin();
        // alert("hello");
    });

    
    function add_product_admin(){
        $('#product').addClass('active');
        $('#customer').removeClass('active');
        $('#order').removeClass('active');
        $.ajax({
            url:'adminserver.php',
            type:'post',
            data:{
                product_info: 'admin_pro'
            },
            success:function(result){
                $('#res').html(result);
                $('main').css('overflow-y','hidden');
                // alert(result);
            }
        });
    }


    $('input[value=Edit_Product]').on('click',function(){
        // alert("first");
        // $('input[value=Edit_product]').val('Add_Product');
        var prodId = $('#editprod_id').val();
        var prodName = $('#editprod_name').val();
        var prodPrice = $('#editprod_price').val();
        var prodOrigin = $('#editprod_origin').val();
        var prodImage = $('#editprod_image').val();
        if(prodId=="" || prodName=="" || prodImage=="" || prodOrigin==""){
            alert("enter all values");
            return;
        }
        if(isNaN(prodId)){
            alert("enter correct product id");
            return;
        }
        if(isNaN(prodPrice)){
            alert("enter correct product price");
            return;
        }
        if(!isNaN(prodName)){
            alert("enter coreect product name");
            return;
        }
        $.ajax({
            url:'adminserver.php',
            type:'post',
            data:{
                edit_product_info: 'admin_edit_pro',
                edit_product_id: prodId,
                edit_product_name: prodName,
                edit_product_price: prodPrice,
                edit_product_origin: prodOrigin,
                edit_product_image: prodImage
            },
            success:function(result){
                add_product_admin();
                alert("updated successfully");
            }
        });
        var myModalEditProduct = document.getElementById('my-modal-edit-product');
        var overlay = document.getElementById('overlay');
        myModalEditProduct.classList.remove('activate');
        overlay.classList.remove('activate');
    });


    $(document).on('click','.delete-product',function(){
        var id = $(this).parent().parent().children().eq(0).text();
        $.ajax({
            url:'adminserver.php',
            type:'post',
            data:{
                delete_prod: 'admin',
                prod_id: id
            },
            success:function(result){
                add_product_admin();
                $('main').css('overflow-y','hidden');
                // alert(result);
            }
        });
    })


    $('input[value=Add_Product]').on('click',function(){
        var prodId = $('#prod_id').val();
        var prodName = $('#prod_name').val();
        var prodPrice = $('#prod_price').val();
        var prodOrigin = $('#prod_origin').val();
        var prodImage = $('#prod_image').val();
        if(prodId=="" || prodName=="" || prodImage=="" || prodOrigin==""){
            alert("enter all values");
            return;
        }
        if(isNaN(prodId)){
            alert("enter correct product id");
            return;
        }
        if(isNaN(prodPrice)){
            alert("enter correct product price");
            return;
        }
        if(!isNaN(prodName)){
            alert("enter coreect product name");
            return;
        }
        $.ajax({
            url:'adminserver.php',
            type:'post',
            data:{
                add_product_info: 'admin_add_pro',
                add_product_id: prodId,
                add_product_name: prodName,
                add_product_price: prodPrice,
                add_product_origin: prodOrigin,
                add_product_image: prodImage
            },
            success:function(result){
                // alert(result);
                add_product_admin();
                alert("product added successfully");
                $('main').css('overflow-y','hidden');
            }
        });
        var myModalAddProduct = document.getElementById('my-modal-add-product');
        var overlay = document.getElementById('overlay');
        myModalAddProduct.classList.remove('activate');
        overlay.classList.remove('activate');
    });


    $(document).on('click','.product_pagination',function(){
        var allbutton = document.querySelectorAll('.product_pagination');
        // console.log(allbutton);
        // currentButton(allbutton);
        var thisbutton = $(this).val();
        // console.log(thisbutton);
        $(this).css('margin','2%');
        var button_value = $(this).val();
        $.ajax({
            url:'adminserver.php',
            type:'post',
            data:{
                product_info: 'admin_pro',
                buttonValue: button_value
            },
            success:function(result){
                $('#res').html(result);
                $('input[value= '+thisbutton+']').addClass('bg-info');
                $('main').css('overflow-y','hidden');
            }
        });
    });

    function currentButton(value){
        // console.log(value[1]);
        for(var i=0;i<value.length;i++){
            value[i].classList.remove('active');
        }
    }

    
    function loadAdmin(){
        $('#product').removeClass('active');
        $('#order').removeClass('active');
        $('#customer').addClass('active');
        $.ajax({
            url:'adminserver.php',
            type:'post',
            data:{
                info: 'admin'
            },
            success:function(result){
                $('#res').html(result);
                $('main').css('overflow-y','hidden');
            }
        });
    }


    $(document).on('click','.link_call',function(){
        // $(this).css('background-color','yellow');
        var button_value = $(this).val();
        $.ajax({
            url:'adminserver.php',
            type:'post',
            data:{
                info: 'admin',
                bvalue: button_value
            },
            success:function(result){
                $('#res').html(result);
                $('input[value= '+button_value+']').addClass('bg-info');
                $('main').css('overflow-y','hidden');
            }
        });
    });


    $('input[value=Update]').on('click',function(){
        var changename = $('#namechange').val();
        var changestatus = $('#statuschange').val();
        var usedinemail = $('#useremail').val();
        $.ajax({
            url:'adminserver.php',
            type:'post',
            data:{
                used_email: usedinemail,
                user_name: changename,
                user_status: changestatus
            },
            success:function(result){
                loadAdmin();
            }
        });
        var mymodal = document.getElementById('my-modal');
        var overlay = document.getElementById('overlay');
        mymodal.classList.remove('activate');
        overlay.classList.remove('activate');
    });


    $(document).on('click','.delete-data',function(){
        var email = $(this).parent().parent().children().eq(2).text();
        $.ajax({
            url:'adminserver.php',
            type:'post',
            data:{
                delete: 'admin',
                user_email: email
            },
            success:function(result){
                loadAdmin();
                // alert(result);
            }
        });
    });
    $('#order').on('click',function(){
        // alert('order');
        $('#product').removeClass('active');
        $('#customer').removeClass('active');
        $('#order').addClass('active');
        admin_order_detail();
        
    });


    $(document).on('click','.order-detail',function(){
        // alert('detail');
        var order_id = Number($(this).closest('tr').children().eq(0).text());
        // alert(order_id);
        $.ajax({
            url:'adminserver.php',
            type:'post',
            data:{
                order_detail_by_admin:'admin_detail',
                id:order_id
            },
            success:function(result){
                // alert(result);
                $('#res').html(result);
                $('main').css('overflow-y','hidden');
            }
        });        
    });


    function admin_order_detail(){
        $.ajax({
            url:'adminserver.php',
            type:'post',
            data:{
                userorders:'recent'
            },
            success:function(result){
                // alert(result);
                $('#res').html(result);
                $('main').css('overflow-y','hidden');
            }
        });
    }

    $(document).on('click','.Go-back',function(e){
        // e.preventDefault();
        admin_order_detail();
    });

    $('input[value=change_order_status]').on('click',function(){
        // alert('change');
        var order_status_id = Number($('#order-detail-id').val());
        var order_status = $('#order-detail-status').val();
        $.ajax({
            url:'adminserver.php',
            type:'post',
            data:{
                change_order_status_admin:'change',
                id:order_status_id,
                status:order_status
            },
            success:function(result){
                // alert(result);
                admin_order_detail();
                $('main').css('overflow-y','hidden');
                // $('#res').html(result);
            }
        });
        var mymodal1 = $('#my-edit-order-modal');
        var overlay = $('#overlay');
        mymodal1.removeClass('activate');
        overlay.removeClass('activate');
    });
var button_number;
    $(document).on('click','.order_pagination',function(){
        var button_number = $(this).val();
        order_pagination(button_number);
    })
    function order_pagination(value){
        // alert(button_number);
        $.ajax({
            url:'adminserver.php',
            type:'post',
            data:{
                userorders:'recent',
                bvalue:value
            },
            success:function(result){
                // alert(result);
                $('#res').html(result);
                $('input[value= '+value+']').addClass('bg-info');
                $('main').css('overflow-y','hidden');
                // admin_order_detail();
            }
        });
    }

    $(document).on('click','.delete-order-detail',function(){
        // alert('delete');
        var order_id= Number($(this).closest('tr').children().eq(0).text());
        // alert(order_id);
        $.ajax({
            url:'adminserver.php',
            type:'post',
            data:{
                delete_order_detail:'delete',
                id:order_id
            },
            success:function(result){
                // alert(result);
                order_pagination(button_number);
                $('main').css('overflow-y','hidden');

                // admin_order_detail();
            }
        })
    });
    function admin_dashboard(){
        // $('#res').append('<p></p>').append('ddsbd');
        $.ajax({
            url:'adminserver.php',
            type:'post',
            data:{
                dash: 'admin'

            },
            success:function(result){
                $('#res').html(result);
                $('#main').css('overflow-y','auto');
            }
        });
    }

});

