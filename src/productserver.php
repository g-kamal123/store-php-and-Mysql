<?php
// echo "sever";
include 'storeconnection.php';
if(isset($_POST['fetch_product'])){
    // echo 'product';
    try{
        $sql = $conn->query("SELECT * from products ")->fetchAll(PDO::FETCH_ASSOC);
        // print_r($sql);
        // echo $sql[0]['prod_image'];
        $text = '';
        for($i= 0; $i<count($sql);$i++){
        $text .= '<div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">';
        $text .= '<div class= "product-item my-2">';
        $text .= '<div class="position-relative bg-light overflow-hidden">';
        $text .= '<img class="w-100" src="'.$sql[$i]['prod_image'].'" alt="" height="350px" >';
        $text .= '<div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">Fresh</div>';
        $text .= '</div>';
        $text .= '<div class="text-center p-4">';
        $text .= '<a class="d-block h5 mb-2" href="">'.$sql[$i]['prod_name'].'</a>';
        $text .= '<span class="text-primary me-1">Rs.'.$sql[$i]['prod_price'].'/kg</span>';
        $text .= '<span class="text-body">origin:'.$sql[$i]['prod_origin'].'</span>';
        $text .= '</div>';
        $text .= '<div class="d-flex border-top">';
        $text .= '<small class="w-100 text-center py-2">';
        $text .= '<a class="text-body add_to_cart" href="#"><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>';
        $text .= '<p hidden>'.$sql[$i]['prod_id'].'</p>';
        $text .= '</small>';
        $text .= '</div>';
        $text .= '</div>';
        $text .= '</div>';
        $text .= '</div>';
        }
        echo $text;
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
if(isset($_POST['prod_element'])){
    // echo "connect";
    session_start();
    // $_SESSION['cart_array'] = array();
    try{
        $product_cart_id = $_POST['prod_element'];
        $sql = $conn->query("SELECT * from products where prod_id = '$product_cart_id'")->fetchAll(PDO::FETCH_ASSOC);
        // print_r($sql);
        $count = find_count($_POST['prod_element']);
        // echo $count;
        if($count==1)
        $_SESSION['cart_array'][$_POST['prod_element']]['quantity'] += 1;
        else{
        $_SESSION['cart_array'][$_POST['prod_element']] = array(
            'id'=>$sql[0]['prod_id'],
            'name'=>$sql[0]['prod_name'],
            'price'=>$sql[0]['prod_price'],
            'origin'=>$sql[0]['prod_origin'],
            'image'=>$sql[0]['prod_image'],
            'quantity'=> 1
        );
    }
        // print_r($_SESSION['cart_array']);
         echo count($_SESSION['cart_array']);

    }
    
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
}
function find_count($value){
        if($_SESSION['cart_array'][$value]['id']== $value)
            return 1;
        else  return 0;
}

if(isset($_POST['billing_details'])){
    // echo 'connected';
    session_start();
    $total_amount = 0;
    foreach($_SESSION['cart_array'] as $key=>$val){
        $total_amount += $val['quantity'] * $val['price'];
    }
    echo $total_amount;
}

if(isset($_POST['decrease_quantity_at_checkout'])){
    // echo "connected";
    session_start();
    // echo count($_SESSION['cart_array']);
    $prod_id = $_POST['product_id'];
    if($_SESSION['cart_array'][$prod_id]['quantity']>1)
    $_SESSION['cart_array'][$prod_id]['quantity'] -= 1;
    echo $_SESSION['cart_array'][$prod_id]['quantity'];
}

if(isset($_POST['increase_quantity_at_checkout'])){
    // echo "connected";
    session_start();
    // echo count($_SESSION['cart_array']);
    $prod_id = $_POST['product_id'];
    if($_SESSION['cart_array'][$prod_id]['quantity']>=1)
    $_SESSION['cart_array'][$prod_id]['quantity'] += 1;
    echo $_SESSION['cart_array'][$prod_id]['quantity'];
}

if(isset($_POST['delete_cart_item'])){
    // echo "connected";
    session_start();
    $prod_id = $_POST['product_id'];
    unset($_SESSION['cart_array'][$prod_id]);
    echo count($_SESSION['cart_array']);
}

if(isset($_POST['checkout'])){
    // echo 'connected';
    session_start();
    try{
    $subtotal = $_POST['cart_subtotal'];
    $shipping = $_POST['cart_shipping'];
    $total = $_POST['cart_total'];
    $city = $_POST['cart_city'];
    $pincode = $_POST['cart_pincode'];
    $uemail = $_SESSION['email_user'];
    // echo $_SESSION['email_user'];
    $date = date('Y-m-d h:i:s');
    $sql = "INSERT INTO orders (`order_id`, `email`, `order_status`,`order_amount`,`shipping_amount`,`total_amount`,`city`,`pincode`,`order_date`,`delivery_date`)
    VALUES (DEFAULT, '$uemail', 'in transit','$subtotal','$shipping','$total','$city','$pincode','$date',null)";

    $conn->exec($sql);

    $ordersid = $conn->lastInsertId();
    
    foreach($_SESSION['cart_array'] as $key=>$val){
        $pid = $val['id'];
        $pquantity = $val['quantity'];
        $sql1 = "INSERT INTO order_items (`order_id`,`prod_id`,`quantity`)
        VALUES ('$ordersid','$pid','$pquantity')";

        $conn->exec($sql1);
    }
    $_SESSION['cart_array'] = array();
    echo count($_SESSION['cart_array']);
}
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

if(isset($_POST['recentorders'])){
    // echo 'connected';
    session_start();
    $email = $_SESSION['email_user'];
    $result = $conn->query("SELECT order_id,order_status,order_amount,shipping_amount,total_amount,delivery_date from orders where email = '$email' ")->fetchAll(PDO::FETCH_ASSOC);
    // print_r($sql);
    // $text = "";
       $text = "<table id='user_orders'>";
       $text .= "<tr><th>order_id</th><th>order_status</th><th>order_amount</th><th>shipping_amount</th><th>total_amount</th><th>delivery_date</th><th>see details</th>";
       $text .= "</tr>";
       $count = count($result);
       for($i=0;$i<$count;$i++){
           $text .= "<tr>";
           $text .= "<td>".$result[$i]['order_id']."</td><td>".$result[$i]['order_status']."</td><td>".$result[$i]['order_amount']."</td><td>".$result[$i]['shipping_amount']."</td><td>".$result[$i]['total_amount']."</td><td>".$result[$i]['delivery_date']."</td><td><button class='detail rounded-pill bg-danger'>Detail</button></td>";
           $text .= "</tr>";
       }
       $text .= "</table>";
       if(count($result))
       echo $text;
       else echo "You have not made any orders yet";
}

if(isset($_POST['order_detail'])){
    // echo 'connected';
    session_start();
    $id = $_POST['id'];
    // echo $id;
    $result = $conn->query("SELECT products.prod_name,products.prod_price,products.prod_image,order_items.quantity from products left join order_items on products.prod_id = order_items.prod_id where order_items.order_id = '$id'")->fetchAll(PDO::FETCH_ASSOC);
    // print_r($result);

    $text = "<table id='order_details'>";
       $text .= "<tr><th>Name</th><th>Price</th><th>Product</th><th>Quantity</th>";
       $text .= "</tr>";
       $count = count($result);
       for($i=0;$i<$count;$i++){
           $text .= "<tr>";
           $text .= "<td>".$result[$i]['prod_name']."</td><td>&#8377;".$result[$i]['prod_price']."/kg</td><td><image src='".$result[$i]['prod_image']."'></image></td><td>".$result[$i]['quantity']."</td>";
           $text .= "</tr>";
       }
       $text .= "</table>";
       $text .= "<button class='go-back my-2 bg-secondary rounded-pill'>Go Back</button>";
       echo $text;
}

if(isset($_POST['user'])){
    // echo 'connected';
    session_start();
    $email = $_SESSION['email_user'];
    $result = $conn->query("SELECT username from users where email='$email'")->fetchAll(PDO::FETCH_ASSOC);
    // print_r($result);
    echo $result[0]['username'];
}
?>