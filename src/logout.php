<?php
session_start();
// session_unset();

unset($_SESSION['email_user']);
unset($_SESSION['cart_array']);
// session_destroy();
if(isset($_COOKIE['email_user']) && isset($_COOKIE['pass_user'])){
    setcookie("email_user",$cookie_email, time()-1, "/");
    setcookie("pass_user",$cookie_pass, time()-1, "/");
}
header('location: storesignin.php');
?>