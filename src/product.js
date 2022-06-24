$(document).ready(function(){
    // alert("ready");
    $('')
    $.ajax({
        url:'productserver.php',
        type:'post',
        data:{
            fetch_product: 'fetch'
        },
        success:function(result){
            $('#product-item').html(result);
            // alert(result);
        }
    });

    $(document).on('click','.add_to_cart',function(e){
        // alert("add_to_cart");
        e.preventDefault();
        var prod_id = $(this).next().text();
        // alert(prod_id);
        $.ajax({
            url:'productserver.php',
            type:'post',
            data:{
                add_to_cart: 'add_to_cart',
                prod_element:prod_id
            },
            success:function(result){
                // $('#product-item').html(result);
                // alert(result);
                // loadCounter();
                $('#counter_id').html(result);
                // $('#you-have-in-cart').html(result);
            }
        });
    })
})
function loadCounter(){
    // document.preventDefault();
    // $(document).load('header.php');
    // $('#counter_id').load('#counter_id');
    
}