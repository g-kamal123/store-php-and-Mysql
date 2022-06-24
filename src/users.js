$(document).ready(function(){
    // alert('ready');

    $.ajax({
        url:'productserver.php',
        type:'post',
        data:{
            user:'user_name'
        },
        success:function(result){
            // alert(result);
            $('#username').html(result);
        }
    });
    $('#recent_orders').on('click',recentorders);
    $(document).on('click','.detail',order_details);
    $(document).on('click','.go-back',go_back);
});
function recentorders(){
    // alert('click');
    $.ajax({
        url:'productserver.php',
        type:'post',
        data:{
            recentorders:'recent'
        },
        success:function(result){
            // alert(result);
            $('#res').html(result);
        }
    });
}
function order_details(){
    // alert('detail');
    var order_id = Number($(this).closest('tr').children().eq(0).text());
    // alert(order_id);
    $.ajax({
        url:'productserver.php',
        type:'post',
        data:{
            order_detail:'detail',
            id:order_id
        },
        success:function(result){
            // alert(result);
            $('#res').html(result);
        }
    });
}

function go_back(){
    recentorders();
}