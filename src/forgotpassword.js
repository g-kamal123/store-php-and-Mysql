$(document).ready(function(){
    $('#currentemail').on('keyup',checkemail);
    $('#newpass').on('keyup',checkpass);
    $('#cnfpass').on('keyup',checkConfirmPassword);
    $('input[type=button]').on('click',createnewpass);
});
function createnewpass(){
    if(!$('#newpass').val()){
        $('#passstrength').html("enter password");
        $('#passstrength').css('color','red');
        }
    else
        if(!$('#cnfpass').val()){
        $('#passsspan').html("confirm password");
        $('#passsspan').css('color','red');
        }
    else
        if($('#newpass').val() != $('#cnfpass').val());
    else{
        var email = $('#currentemail').val();
        var pass = $('#newpass').val();
        $.ajax({
            url: 'forgotpassword.php',
            type: 'post',
            data: {
                entered_email:email,
                entered_password: pass
            },
            success:function(result){
                alert(result);
            }
        });
    }
}
function checkemail(){
    var emailid = $('#currentemail').val();
    var pattern = validateEmail(emailid);
    if(pattern == true){
        $('#emailcheck').html("valid email");
        $('#emailcheck').css("color","green");
    }
    else{
        $('#emailcheck').html("invalid email");
        $('#emailcheck').css("color","red");

    }
    if(!$('#currentemail').val())
    $('#emailcheck').html("");
}
function validateEmail(emailid){
    return /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(emailid); //email ceck
}
function checkpass(){
    var pass = $("#newpass").val();
    var pass_length = pass.length;
    if(pass_length<8){
        $('#passstrength').html("invalid password");
        $('#passstrength').css("color","red");

    }
    else{
    var pattern = validatePassword(pass);
    if(pattern == true){
    $('#passstrength').html("strong password");
    $('#passstrength').css("color","green");
    }
    else{
    $('#passstrength').html("weak password");
    $('#passstrength').css("color","blue");
    }
    }
    var cnfpass = $('#cnfpass').val();
    if(pass == cnfpass){
        $('#passsspan').html("password matched");
        $('#passsspan').css("color","green");
    }
    else{
        $('#passsspan').html("password does not matched");
        $('#passsspan').css("color","red");
    }
}
function checkConfirmPassword(){
    var pass = $("#newpass").val();
    var cnfpass = $('#cnfpass').val();
    if(pass.length<8){
        $('#passsspan').html("invalid password");
        $('#passsspan').css("color","red");
    }
    else{
    if(pass == cnfpass){
        $('#passsspan').html("password matched");
        $('#passsspan').css("color","green");
    }
    else{
        $('#passsspan').html("password does not matched");
        $('#passsspan').css("color","red");
    }
}
   if(!$('#newpass').val()){
    $('#passsspan').html("invalid password");
   }
}
function validatePassword(pass){
    return /^[A-Za-z0-9\d=!\-@._*]*$/.test(pass) // consists of only these
    && /[a-z]/.test(pass) // has a lowercase letter
    && /\d/.test(pass) // has a digit
}