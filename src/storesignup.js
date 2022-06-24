$(document).ready(function(){
    $('#form3Example4cg').on('keyup',checkpass);
    $('#form3Example4cdg').on('keyup',checkConfirmPassword);
    $('input[type="email"]').on('keyup',checkEmail);
    $('button').on('click',register);
});
function register(){
    if($('input[type="text"]').val())
    $('#text_check').html("");
    if(!$('input[type="text"]').val()){
    $('#text_check').html("enter name");
    $('#text_check').css('color','red');
    }
    else 
    if(!$('input[type="email"]').val()){
    $('#email_check').html("enter email");
    $('#email_check').css('color','red');
    }
    else
    if(!$('#form3Example4cg').val()){
    $('#pass_strength').html("enter password");
    $('#pass_strength').css('color','red');
    }
    else
    if(!$('#form3Example4cdg').val()){
    $('#passspan').html("confirm password");
    $('#passspan').css('color','red');
    }
    else
    if($('#form3Example4cg').val() != $('#form3Example4cdg').val());
    else
    if(!$('input[type="checkbox"]').is(":checked")){
    $('#ischeck').html("agree with terms");
    $('#ischeck').css('color','red');
    }
    else
    if(!validatePassword($('#form3Example4cg').val()));
    else
    if(!validateEmail($('input[type="email"]').val()));
    else{
        var name = $('input[type=text]').val();
        var email = $('input[type=email]').val();
        var password = $('#form3Example4cg').val();
        $.ajax({
            url:'storesignupdata.php',
            type: 'post',
            data:{
                uname: name,
                umail: email,
                upassword: password
            },
            success:function(result){
                window.location = 'storesignin.php';
                alert(result);
            }
        });
    }
}
function checkEmail(){
    var emailid = $('input[type=email]').val(); 
    var pattern = validateEmail(emailid);
    if(pattern == true){
        $('#email_check').html("valid email");
        $('#email_check').css("color","green");
    }
    else{
        $('#email_check').html("invalid email");
        $('#email_check').css("color","red");

    }
}
function checkpass(){
    var pass = $("#form3Example4cg").val();
    var pass_length = pass.length;
    if(pass_length<8){
        $('#pass_strength').html("invalid password");
        $('#pass_strength').css("color","red");

    }
    else{
    var pattern = validatePassword(pass);
    if(pattern == true){
    $('#pass_strength').html("strong password");
    $('#pass_strength').css("color","green");
    }
    else{
    $('#pass_strength').html("weak password");
    $('#pass_strength').css("color","blue");
    }
    }
    var cnfpass = $('#form3Example4cdg').val();
    if(pass == cnfpass){
        $('#passspan').html("password matched");
        $('#passspan').css("color","green");
    }
    else{
        $('#passspan').html("password does not matched");
        $('#passspan').css("color","red");
    }
}
function checkConfirmPassword(){
    var pass = $("#form3Example4cg").val();
    var cnfpass = $('#form3Example4cdg').val();
    if(pass.length<8){
        $('#passspan').html("invalid password");
        $('#passspan').css("color","red");
    }
    else{
    if(pass == cnfpass){
        $('#passspan').html("password matched");
        $('#passspan').css("color","green");
    }
    else{
        $('#passspan').html("password does not matched");
        $('#passspan').css("color","red");
    }
}
}
function validatePassword(pass){
    return /^[A-Za-z0-9\d=!\-@._*]*$/.test(pass) // consists of only these
    && /[a-z]/.test(pass) // has a lowercase letter
    && /\d/.test(pass) // has a digit
}
function validateEmail(emailid){
    return /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(emailid); //email ceck
}