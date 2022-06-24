<?php
session_start();
?>
<?php 
if(isset($_COOKIE['email_user']))
$_SESSION['email_user'] = $_COOKIE['email_user'];
if(!isset($_SESSION['email_user']))
header('location: storesignin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include 'headfiles.php'; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body> 
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>

<?php include 'header.php'; ?>

<!-- Page Header Start -->

<div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown" id="username">Users</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <div style="display:flex; justify-content:space-evenly; align-items:center;">

    <button class="rounded-pill py-4 bg-primary" id="recent_orders">your orders</button>
    <button class="rounded-pill py-4 bg-danger"><a href="logout.php">Log out</a></button>
    </div>

    <div id="res" class="my-5" style="margin-left: 100px;">
        
    </div>

    <!-- <div height="50px">

    </div> -->

<?php include 'bottomfiles.php'; ?>

<script src="users.js"></script>
</body>
</html>