$(document).ready(function(){
    $('input[type="email"]').on('keyup',checkEmail);
    $('button').on('click',loggedin);
});
function loggedin(){
    if(!validateEmail($('input[type="email"]').val()));
    else
    if(!$('input[type=password]').val()){
        $('#check_password').html("enter password");
        $('#check_password').css('color','red');
    }
    else{
        if(!$('input[type="checkbox"]').is(":checked")){
            var chkbox = 0;
        }
        else chkbox = 1;
        var email = $('input[type=email]').val();
        var pass = $('input[type=password]').val();
        $.ajax({
            url: 'loginserver.php',
            type: 'post',
            data: {
                rememberme:chkbox,
                entered_email:email,
                entered_password: pass
            },
            success:function(result){
                if(result==0)
                window.location = 'frontpage.php';
                else if(result==1)
                window.location = 'admin.php';
                else alert(result);
            }
        });
    }
}
function checkEmail(){
    var emailid = $('input[type="email"]').val();
    var pattern = validateEmail(emailid);
    if(pattern == true){
        $('#email_check').html("valid email");
        $('#email_check').css("color","green");
    }
    else{
        $('#email_check').html("invalid email");
        $('#email_check').css("color","red");

    }
    if(!$('input[type="email"]').val())
    $('#email_check').html("");
}
function validateEmail(emailid){
    return /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(emailid); //email ceck
}