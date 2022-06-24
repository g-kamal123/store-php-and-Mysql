<?php
session_start();
if(isset($_COOKIE['admin_user']))
$_SESSION['admin_user'] = $_COOKIE['admin_user'];
if(!isset($_SESSION['admin_user']))
header('location:storesignin.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Sidebars · Bootstrap v5.1</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sidebars/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="admin.css">
<link rel="stylesheet" href="modal.css">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <!-- <link href="sidebars.css" rel="stylesheet"> -->
  </head>
  <body>
  <div id="overlay"></div>

    
<main id="main">
  <h1 class="visually-hidden">Sidebars examples</h1>
  <div class="d-flex">
  <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 220px; height: 200vh;">
    <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">Dashboard</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li>
        <a href="#" class="nav-link text-white" id="order">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Orders
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white" id="product">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
          Products
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white" id="customer">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
          Customers
        </a>
      </li>
      <li>
        <a href="signout.php" class="nav-link text-white" id="sign_out">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
          Sign Out
        </a>
      </li>
    </ul>
    <hr>
  </div>
  <div id="res" style="background-image:url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS25u8CsvpckJPD8iEfrpX7OJLONiNK6TOfeg&usqp=CAU')" class="">
</div>
  </div>
</main>
<div class="my-modal" id="my-modal">
              <div class="modal-header">

                <div class="title"><h3>make changes</h3></div>
                <button id="close-modal">&times</button>
              </div>

              <div class="modal-body">

              <div class="form-outline mb-4">
            <input type="text" id="useremail" class="form-control form-control-lg"
              placeholder="Enter a valid email address" />
            <label class="form-label" >Email address <span id="emailcheck"></span></label>
          </div>

              <div class="form-outline mb-4">
            <input type="text" id="namechange" class="form-control form-control-lg"
              placeholder="change user name" />
            <label class="form-label" >username<span id="emailcheck"></span></label>
          </div>

              <div class="form-outline mb-3">
            <select name="" id="statuschange">
              <option value="select-status">--</option>
              <option value="inactive">inactive</option>
              <option value="active">active</option>
            </select>
          </div>
    
          <div class="text-center text-lg-start mt-4 pt-2">
            <input type="button" value="Update" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">
              </div>
            
            </div>
</div>
<div class="my-modal" id="my-modal-add-product">
              <div class="modal-header">

                <div class="title"><h3>ADD PRODUCT</h3></div>
                <button id="close-modal-add-product">&times</button>
              </div>

              <div class="modal-body">

              <div class="form-outline mb-4">
            <input type="text" id="prod_id" class="form-control form-control-lg"
              placeholder="Enter product id" />
            <label class="form-label" >prod_id<span id="emailcheck"></span></label>
          </div>

              <div class="form-outline mb-4">
            <input type="text" id="prod_name" class="form-control form-control-lg"
              placeholder="enter product name" />
            <label class="form-label" >prod_name<span id="emailcheck"></span></label>
          </div>

              <div class="form-outline mb-3">
            <input type="text" id="prod_price" class="form-control form-control-lg"
              placeholder="add product price" />
            <label class="form-label" >prod_price<span id="passstrength"></span></label>
          </div>

          <div class="form-outline mb-3">
            <input type="text" id="prod_origin" class="form-control form-control-lg"
              placeholder="enter country" />
            <label class="form-label" >prod_origin<span id="passstrength"></span></label>
          </div>


          <div class="form-outline mb-3">
            <input type="text" id="prod_image" class="form-control form-control-lg"
              placeholder="image link" />
            <label class="form-label" >prod_img<span id="passstrength"></span></label>
          </div>
    
          <div class="text-center text-lg-start mt-4 pt-2">
            <input type="button" value="Add_Product" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">
              </div>
            
            </div>
</div>
<div class="my-modal" id="my-modal-edit-product">
              <div class="modal-header">

                <div class="title"><h3>ADD PRODUCT</h3></div>
                <button id="close-modal-edit-product">&times</button>
              </div>

              <div class="modal-body">

              <div class="form-outline mb-4">
            <input type="text" id="editprod_id" class="form-control form-control-lg"
              placeholder="Enter product id" />
            <label class="form-label" >prod_id<span id="emailcheck"></span></label>
          </div>

              <div class="form-outline mb-4">
            <input type="text" id="editprod_name" class="form-control form-control-lg"
              placeholder="enter product name" />
            <label class="form-label" >prod_name<span id="emailcheck"></span></label>
          </div>

              <div class="form-outline mb-3">
            <input type="text" id="editprod_price" class="form-control form-control-lg"
              placeholder="add product price" />
            <label class="form-label" >prod_price<span id="passstrength"></span></label>
          </div>

          <div class="form-outline mb-3">
            <input type="text" id="editprod_origin" class="form-control form-control-lg"
              placeholder="enter country" />
            <label class="form-label" >prod_origin<span id="passstrength"></span></label>
          </div>


          <div class="form-outline mb-3">
            <input type="text" id="editprod_image" class="form-control form-control-lg"
              placeholder="image link" />
            <label class="form-label" >prod_img<span id="passstrength"></span></label>
          </div>
    
          <div class="text-center text-lg-start mt-4 pt-2">
            <input type="button" value="Edit_Product" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">
              </div>
            
            </div>
</div>


<div class="my-edit-order-modal" id="my-edit-order-modal">
              <div class="modal-header">

                <div class="title"><h3>Edit order status</h3></div>
                <button id="close-edit-order-modal">&times</button>
              </div>

              <div class="modal-body">

              <div class="form-outline mb-4">
            <input type="text" id="order-detail-id" class="form-control form-control-lg" />
            <label class="form-label" >order_id<span id=""></span></label>
          </div>

              <div class="form-outline mb-4">
            <select name="" id="order-detail-status">
            <option value="">select-status</option>
              <option value="in transit">In Transit</option>
              <option value="approved">Approved</option>
              <option value="delivered">Delivered</option>
            </select>
          </div>

    
          <div class="text-center text-lg-start mt-4 pt-2">
            <input type="button" value="change_order_status" class="btn btn-primary btn-lg"
              style="padding-left: 1.5rem; padding-right: 1.5rem;">
              </div>
            
            </div>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

     
      <script src="admin.js"></script>
      <script src="editmodal.js"></script>
  </body>
</html>