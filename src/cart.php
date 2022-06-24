<?php 

session_start();
if(isset($_COOKIE['email_user']))
$_SESSION['email_user'] = $_COOKIE['email_user'];
// $count = 0;
// foreach($_SESSION['cart_array'] as $key=>$val){
//     $count += $_SESSION['cart_array'][$key]['quantity'];
// }
if(!isset($_SESSION['email_user'])){
  header('location:frontpage.php');
}
if(isset($_SESSION['cart_array'])){
  $count = count($_SESSION['cart_array']);
}
// if(!count($_SESSION['cart_array'])){
//   echo 'YOUR CART IS EMPTY';
//   die;
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include 'headfiles.php'; ?>
   <style>
       @media (min-width: 1025px) {
        .h-custom {
        height: 100vh !important;
    }
   }
   #minus,#plus{
    /* background-color: rgb(9, 255, 0); */
   }
   </style>
   <link rel="stylesheet" href="modal.css">
</head>
<body>
  <div id="overlay"></div>
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <?php include 'header.php'; ?>
    <!-- Page Header Start -->

    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown">Checkout</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <div>
    <section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">

              <div class="col-lg-7">
                <h5 class="mb-3"><a href="products.php" class="text-body"><i
                      class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1 text-danger"><b>Shopping cart</b></p>
                    <p class="mb-0" id="you-have-in-cart">You have <?php echo $count;  ?> items in your cart</p>
                  </div>
                </div>
        <?php foreach($_SESSION['cart_array'] as $key=>$val) {?>
                <div class="card mb-3 mb-lg-0">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div class="refresh_cart">
                          <img
                            src="<?php echo $_SESSION['cart_array'][$key]['image']; ?>"
                            class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                        </div>
                        <div class="ms-3">
                          <h5><?php echo $_SESSION['cart_array'][$key]['name']; ?></h5>
                          <p class="small mb-0"><?php echo $_SESSION['cart_array'][$key]['orign']; ?></p>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                        <div class="d-flex flex-row mx-5"style="width: 50px;"><button id= "minus" class="rounded-circle text-light bg-primary h4 mx-1 minus">-</button ><p hidden><?php echo $_SESSION['cart_array'][$key]['id']; ?></p>
                          <h5 class="fw-normal mb-0"><?php echo $_SESSION['cart_array'][$key]['quantity']; ?></h5><button class="rounded-circle text-light bg-primary h4 mx-1 plus">+</button><p hidden><?php echo $_SESSION['cart_array'][$key]['id']; ?></p>
                        </div>
                        <div style="width: 80px;">
                          <h5 class="mb-0 ">&#8377;<?php echo $_SESSION['cart_array'][$key]['price']; ?>/kg</h5>
                        </div>
                        <a class="mx-2 text-danger delete_cart_item" href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                        <p hidden><?php echo $_SESSION['cart_array'][$key]['id']; ?></p>
                      </div>
                    </div>
                  </div>
                </div>

                <?php } ?>
                <?php if(count($_SESSION['cart_array'])){?>
                  
                <div class="card mb-3 mb-lg-0">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
            
                      </div>
                    </div>
                  </div>
                </div>

              </div>
               <div class="col-lg-5">

                <div class="card bg-primary text-white rounded-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0">Billing Address</h5>
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp"
                        class="img-fluid rounded-3" style="width: 45px;" alt="Avatar">
                    </div>

                    <p class="small mb-2"><?php echo $_SESSION['email_user']; ?></p>
                    <!-- <a href="#!" type="submit" class="text-white"><i
                        class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                    <a href="#!" type="submit" class="text-white"><i
                        class="fab fa-cc-visa fa-2x me-2"></i></a>
                    <a href="#!" type="submit" class="text-white"><i
                        class="fab fa-cc-amex fa-2x me-2"></i></a>
                    <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a> -->

                    <!-- <form class="mt-4"> -->
                      <div class="form-outline form-white mb-4">
                        <input type="text" id="yourName" class="form-control form-control-lg" siez="17"
                          placeholder="" />
                        <label class="form-label" for="typeName">your name</label>
                      </div>

                      <div class="form-outline form-white mb-4">
                        <input type="text" id="yourText" class="form-control form-control-lg" siez="17"
                          placeholder="flat no." minlength="19" maxlength="19" />
                        <label class="form-label" for="typeText">flat name / locality</label>
                      </div>

                      <div class="row mb-4">
                        <div class="col-md-6">
                          <div class="form-outline form-white">
                            <input type="text" id="city" class="form-control form-control-lg"
                              placeholder="city" size="20" id="exp" minlength="18" maxlength="18" />
                            <label class="form-label" for="city">City Nmae</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-outline form-white">
                            <input type="text" id="pincode" class="form-control form-control-lg"
                              placeholder="6 digits" size="1" minlength="6" maxlength="6" />
                            <label class="form-label" for="pincode">Pincode</label>
                          </div>
                        </div>
                      </div>

                    <!-- </form>  -->

                    <hr class="my-4">

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Subtotal</p>
                      <p class="mb-2" id="subtotal">$4798.00</p>
                    </div>

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Shipping</p>
                      <p class="mb-2" id="shipping">$20.00</p>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                      <p class="mb-2">Total(Incl. taxes)</p>
                      <p class="mb-2" id="total">$4818.00</p>
                    </div>
                  
                    <button type="button" class="btn btn-info btn-block btn-lg " id="checkout">
                      <div class="d-flex justify-content-between">
                        <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                      </div>
                    </button>
                    <button id="open-checkout-modal" hidden>modal</button>
                   <?php } ?>

                  </div>
                </div>

              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>

<!-- modal -->

<div class="my-checkout-modal" id="my-checkout-modal">
            <div class="modal-header">

            <div class="title"><h3>Order Placed Successfully!</h3></div>
            <button id="close-checkout-modal">&times</button>

            </div>

            <div class="modal-body">

            <div class="text-center text-lg-start mt-4 pt-2">
            <input type="button" value="Thanks!" class="btn btn-secondary btn-lg" id="close"
            style="padding-left: 2.5rem; padding-right: 2.5rem; margin-left: 5.5rem;">
            </div>
            
            </div>
</div>

<!-- modal -->

    <!-- <?php print_r($_SESSION['cart_array']); ?> -->
   <?php include 'bottomfiles.php'; ?>
   <script src="cart.js"></script>

  <script>
  // var modalopenbutton = document.getElementById('open-checkout-modal');
  var modalclosebutton = document.getElementById('close-checkout-modal');
  var mymodal = document.getElementById('my-checkout-modal');
  var overlay = document.getElementById('overlay');

  document.getElementById('open-checkout-modal').addEventListener('click',(e) =>{
    // alert('hello');
    mymodal.classList.add('activate');
    overlay.classList.add('activate');
    // document.style.pointerEvents = 'none';
});

modalclosebutton.addEventListener('click',() =>{
    // if(!e.target.classList.contains('close-modal'))
    // return;
    mymodal.classList.remove('activate');
    overlay.classList.remove('activate');
    window.location = 'cart.php';
});
document.querySelector('#close').addEventListener('click',() =>{
    mymodal.classList.remove('activate');
    overlay.classList.remove('activate');
    window.location = 'frontpage.php';

    // document.getElementById('sign_in_symbol').style.background-color='red';
});

   </script>

</body>
</html>