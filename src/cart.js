$(document).ready(function(){
    // alert("ready");
    loadbilling();
    
    function loadbilling(){
        // var shipping = Number(200);
    $.ajax({
        url:'productserver.php',
        type:'post',
        data:{
            billing_details: 'amount'
        },
        success:function(result){
            // alert(result);
            $('#subtotal').html(result);
            if(Number($('#subtotal').html()))
            $('#shipping').html('200');
            else 
            $('#shipping').html('0');
            $('#total').html(Number(result) + Number($('#shipping').html()));
        }
    });
    }

    $(document).on('click','.minus',function(){
        // alert('minus');
        var corresponding_product_id = $(this).next().text();
        var counting = $(this).next().next();
        // alert(corresponding_product_quantity);
        $.ajax({
            url:'productserver.php',
            type:'post',
            data:{
                decrease_quantity_at_checkout: 'decrease',
                product_id: corresponding_product_id
            },
            success:function(result){
                // alert(result);
                loadbilling();
                $(counting).html(result);
            }
        });
    });

    $(document).on('click','.plus',function(){
        // alert('minus');
        var corresponding_product_id = $(this).next().text();
        var counting = $(this).prev();
        // alert(corresponding_product_quantity);
        $.ajax({
            url:'productserver.php',
            type:'post',
            data:{
                increase_quantity_at_checkout: 'increase',
                product_id: corresponding_product_id
            },
            success:function(result){
                // alert(result);
                loadbilling();
                $(counting).html(result);
            }
        });
    });
    $(document).on('click','.delete_cart_item',function(){
        // alert("delete");
        var corresponding_product_id = $(this).next().text();
        // alert(corresponding_product_id);
        var counting = $(this).parent().parent().parent().parent();
        $.ajax({
            url:'productserver.php',
            type:'post',
            data:{
                delete_cart_item: 'delete',
                product_id: corresponding_product_id
            },
            success:function(result){
                // alert(result);
                loadbilling();
                $(counting).remove();
                $('#counter_id').html(result);
                if(!Number($('#counter_id').html()))
                window.location = 'cart.php';
                $('#you-have-in-cart').html('You have '+result+' items in your cart');
            }
        });
    });
    $('#checkout').on('click',function(){
        // alert('checkout');
        var subtotal = $(this).prev().prev().prev().children().eq(1).text();
        var shipping = $(this).prev().prev().children().eq(1).text();
        var total = $(this).prev().children().eq(1).text();
        if(!Number(subtotal)){
            alert("please Add some product");
            return;
        }
        // alert(shipping);
        var city = $('#city').val();
        var pincode = $('#pincode').val();
        var name = $('#yourName').val();
        var flat = $('yourText').val();
        if(city=="" || pincode==""|| name=="" || flat==""){
            alert("enter complete billing address");
            return;
        }
        if(isNaN(pincode)|| pincode.length<6){
            alert("enter correct pincode");
            return;
        }
        if(!isNaN(name)){
            alert("enter correct name");
            return;
        }
        if(!isNaN(city)){
            alert("enter correct name");
            return;
        }
        // alert(city);
        $.ajax({
            url:'productserver.php',
            type:'post',
            data:{
                checkout: 'checkout',
                cart_subtotal:subtotal,
                cart_shipping:shipping,
                cart_total:total,
                cart_city:city,
                cart_pincode:Number(pincode)
            },
            success:function(result){
                // alert(result);
                $('#counter_id').html(result);
                $('#open-checkout-modal').trigger('click');
                $('#you-have-in-cart').html('You have '+result+' items in your cart');          
             }
        });
    });
});