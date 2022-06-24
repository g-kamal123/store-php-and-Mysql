<?php
session_start();
unset($_SESSION['admin_user']);
if(isset($_COOKIE['admin_user']))
setcookie("admin_user",$cookie_email, time()-1, "/");
header('location:storesignin.php');
?>