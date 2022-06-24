<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="modal.css">
<body>
    <div id="overlay"></div>
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <small><i class="fa fa-map-marker-alt me-2"></i>Cedcoss, Lucknow, India</small>
                <small class="ms-4"><i class="fa fa-envelope me-2"></i>kamalrai@cedcoss.com</small>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <small>Follow us:</small>
                <a class="text-body ms-3" href="error404.php"><i class="fab fa-facebook-f"></i></a>
                <a class="text-body ms-3" href="https://twitter.com/kamalnayanrai3"><i class="fab fa-twitter"></i></a>
                <a class="text-body ms-3" href="error404.php"><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="frontpage.php" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="fw-bold text-primary m-0">Ve<span class="text-secondary">gg</span>ie</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="frontpage.php" class="nav-item nav-link ">Home</a>
                    <a <?php if(isset($_SESSION['email_user'])){?> href="products.php" <?php } else {?> href="#" id="open-modal" <?php }?>  class="nav-item nav-link ">Products</a>
                    <a href="#contact" class="nav-item nav-link">Contact Us</a>
                </div>
                <div class="d-none d-lg-flex ms-2">
                    <a id="sigin_in_symbol" class="btn-sm-square bg-white rounded-circle ms-3" <?php if(isset($_SESSION['email_user'])){?> href="users.php" <?php } else {?> href="storesignin.php"<?php }?>>
                        <small <?php if(!isset($_SESSION['email_user'])){?> class="fa fa-user text-body" <?php } else {?> class="fa fa-user text-info" <?php } ?>></small>
                    </a>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" <?php if(isset($_SESSION['email_user'])){?> href="cart.php" <?php } else {?> href="#" id="open-cart-modal" <?php }?> >
                        <small class="fa fa-shopping-bag text-body"></small><b><span class="counter text-danger counter-lg" id="counter_id"><?php if(isset($_SESSION['cart_array']))echo count($_SESSION['cart_array']); ?></span></b>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <div class="my-modal" id="my-modal">
            <div class="modal-header">

            <div class="title"><h3>Please Login First</h3></div>
            <button id="close-modal">&times</button>

            </div>

            <div class="modal-body">

            <div class="text-center text-lg-start mt-4 pt-2">
            <input type="button" value="OK" class="btn btn-secondary btn-lg"
            style="padding-left: 2.5rem; padding-right: 2.5rem; margin-left: 5.5rem;">
            </div>
            
            </div>
</div>
    <script>
        var modalopenbutton = document.getElementById('open-modal');
var modalclosebutton = document.getElementById('close-modal');
var mymodal = document.getElementById('my-modal');
var overlay = document.getElementById('overlay');

document.getElementById('open-cart-modal').addEventListener('click',(e) =>{
    mymodal.classList.add('activate');
    overlay.classList.add('activate');
    document.style.pointerEvents = 'none';
});

modalopenbutton.addEventListener('click',(e) =>{
    // if(!e.target.classList.contains('open-modal'))
    // return;
    mymodal.classList.add('activate');
    overlay.classList.add('activate');
});
modalclosebutton.addEventListener('click',() =>{
    // if(!e.target.classList.contains('close-modal'))
    // return;
    mymodal.classList.remove('activate');
    overlay.classList.remove('activate');
});
document.querySelector('input[value=OK]').addEventListener('click',() =>{
    mymodal.classList.remove('activate');
    overlay.classList.remove('activate');
    // document.getElementById('sign_in_symbol').style.background-color='red';
})
    </script>
</body>
</html>