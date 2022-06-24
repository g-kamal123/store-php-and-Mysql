<?php
include 'storeconnection.php';
if(isset($_POST['info'])){
    customer_info();
}

function customer_info(){
include 'storeconnection.php';
    try{
        $total_number_of_data = $conn->query('SELECT COUNT(*) FROM users')->fetchColumn();
        $number_of_data_per_page = 5;
        $total_number_of_page = ceil($total_number_of_data/$number_of_data_per_page);

        $page = $_POST['bvalue'];
        if($page>=1)
        $start_limit_of_pages = ($page-1) * $number_of_data_per_page;
        else
        $start_limit_of_pages =0;

        $sql = "SELECT * from users limit $start_limit_of_pages, $number_of_data_per_page";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $r = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        $text = "<h2>Customer Details</h2>";
       $text .= "<table id='customer_table'>";
       $text .= "<tr><th>username</th><th>email</th><th>user_password</th><th>user_status</th><th colspan=2>Action</th>";
       $count = count($result);
       for($i=0;$i<$count;$i++){
           if($result[$i]['email']!= 'Admin@mail.com'){
           $text .= "<tr>";
           $text .= "<td>".$result[$i]['username']."</td><td>".$result[$i]['email']."</td><td>".$result[$i]['user_password']."<td>".$result[$i]['user_status']."</td><td><button class='open-modal rounded-pill bg-info'>Edit</button></td><td><button class='delete-data rounded-pill bg-danger'>Delete</button></td>";
           $text .= "</tr>";
           }
       }
       $text .= "</table>";
       echo $text;

        for($page=1;$page<=$total_number_of_page;$page++){
            echo "<input class='link_call' type='button' value= '$page'>";
        }
    }
 catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
    
}

if(isset($_POST['user_name'])){
    try{
        $used_email = $_POST['used_email'];
        $user_name = $_POST['user_name'];
        $user_status = $_POST['user_status'];
        $sql = "UPDATE `users` set username = '$user_name', user_status = '$user_status'  where email = '$used_email'";
        $conn->exec($sql);
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
if(isset($_POST['delete'])){
    try{
        $user_email = $_POST['user_email'];
        $sql = "DELETE from `users` where email = '$user_email'";
        $conn->exec($sql);

    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
if(isset($_POST['product_info'])){
    try{
    $total_number_of_data = $conn->query('SELECT COUNT(*) FROM products')->fetchColumn();
        $number_of_data_per_page = 4;
        $total_number_of_page = ceil($total_number_of_data/$number_of_data_per_page);

        $page = $_POST['buttonValue'];
        if($page>=1)
        $start_limit_of_pages = ($page-1) * $number_of_data_per_page;
        else
        $start_limit_of_pages =0;

        $sql = "SELECT * from products limit $start_limit_of_pages, $number_of_data_per_page";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $r = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
    $text = "<input type='button' value='add_Product' id='abc' class='open-modal-add-product'>";
    $text .= "<table id='product_table'>";
       $text .= "<tr><th>prod_id</th><th>prod_name</th><th>prod_price(&#8377;/kg)</th><th>prod_origin</th><th>prod_image</th><th colspan=2>Action</th>";
       for($i=0;$i<$number_of_data_per_page;$i++){
           if($result[$i]['prod_id']){
           $text .= "<tr>";
           $text .= "<td>".$result[$i]['prod_id']."</td><td>".$result[$i]['prod_name']."</td><td>".$result[$i]['prod_price']."</td><td>".$result[$i]['prod_origin']."<td><img src =".$result[$i]['prod_image']."></td><td><button class='open-modal-edit-product rounded-pill bg-info'>Edit</button></td><td><button class='delete-product rounded-pill bg-danger'>Delete</button></td>";
           $text .= "</tr>";
           }
       }
       $text .= "</table>";
    echo $text;
    for($page=1;$page<=$total_number_of_page;$page++){
        echo "<input class='product_pagination' type='button' value= '$page' style='margin:0.4%;'>";
    }
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
if(isset($_POST['add_product_info'])){
    try{
        $id = $_POST['add_product_id'];
        $name = $_POST['add_product_name'];
        $price = $_POST['add_product_price'];
        $origin = $_POST['add_product_origin'];
        $image = $_POST['add_product_image'];
        
        $sql = "INSERT INTO `products`(`prod_id`, `prod_name`, `prod_price`, `prod_origin`, `prod_image`) VALUES ('$id','$name','$price','$origin','$image')";
        $conn->exec($sql);
        echo "product added successfully";
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
if(isset($_POST['edit_product_info'])){
    try{
        $id = $_POST['edit_product_id'];
        $name = $_POST['edit_product_name'];
        $price = $_POST['edit_product_price'];
        $origin = $_POST['edit_product_origin'];
        $image = $_POST['edit_product_image'];
        $sql = "UPDATE `products` set prod_name = '$name', prod_price = '$price', prod_origin = '$origin' , prod_image = '$image'  where prod_id = '$id'";
        $conn->exec($sql);
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
if(isset($_POST['delete_prod'])){
    // echo $_POST['prod_id'];
    try{
        $id = $_POST['prod_id'];
        $sql = "DELETE from products where prod_id = '$id'";
        $conn->exec($sql);
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

if(isset($_POST['userorders'])){
    // echo 'connected';
    $total_number_of_data = $conn->query('SELECT COUNT(*) FROM orders')->fetchColumn();
    $number_of_data_per_page = 5;
    $total_number_of_page = ceil($total_number_of_data/$number_of_data_per_page);

    $page = $_POST['bvalue'];
    if($page>=1)
    $start_limit_of_pages = ($page-1) * $number_of_data_per_page;
    else
    $start_limit_of_pages =0;

    $result = $conn->query("SELECT * from orders limit $start_limit_of_pages, $number_of_data_per_page")->fetchAll(PDO::FETCH_ASSOC);
    // print_r($result);

    $text = "<table id='user_orders' class='table container'>";
    $text .= "<tr><th>order_id</th><th>email</th><th>order_status</th><th>order_amount</th><th>shipping_amount</th><th>total_amount</th><th>city</th><th>pincode</th><th>order_date</th><th>delivery_date</th><th colspan='3'>Actions</th>";
    $text .= "</tr>";
    $count = count($result);
    for($i=0;$i<$count;$i++){
        $text .= "<tr>";
        $text .= "<td>".$result[$i]['order_id']."</td><td>".$result[$i]['email']."</td><td>".$result[$i]['order_status']."</td><td>&#8377;".$result[$i]['order_amount']."</td><td>&#8377;".$result[$i]['shipping_amount']."</td><td>&#8377;".$result[$i]['total_amount']."</td><td>".$result[$i]['city']."</td><td>".$result[$i]['pincode']."</td><td>".$result[$i]['order_date']."</td><td>".$result[$i]['delivery_date']."</td><td><button class='order-detail rounded-pill bg-secondary'>Detail</button></td><td><button class='edit-order-detail rounded-pill bg-info'>Edit</button></td><td><button class='delete-order-detail rounded-pill bg-danger'>Delete</button></td>";
        $text .= "</tr>";
    }
    $text .= "</table>";
    echo $text;

    for($page=1;$page<=$total_number_of_page;$page++){
        echo "<input class='order_pagination' type='button' value= '$page'>";
    }
}

if(isset($_POST['order_detail_by_admin'])){
    // echo 'connected';
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
       $text .= "<button class='Go-back my-2 bg-secondary rounded-pill'>Go Back</button>";
       echo $text;
}

if(isset($_POST['change_order_status_admin'])){
    // echo 'connected';
    try{
    $status = $_POST['status'];
    $id = $_POST['id'];
    $sql = "UPDATE orders set order_status='$status' where order_id = '$id'";
    $conn->exec($sql);

    $time = strtotime(date('Y-m-d h:i:s'));
    $endTime = date('Y-m-d h:i:s', strtotime('+45 minutes', $time));
    

    if($status=='approved')
    $sql1 = "UPDATE orders set delivery_date= '$endTime' where order_id = '$id'";
    else 
    $sql1 = "UPDATE orders set delivery_date= null where order_id = '$id'";
    $conn->exec($sql1);
    }

    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

if(isset($_POST['delete_order_detail'])){
    // echo 'connected';
    $id = $_POST['id'];
    // echo $id;
    $sql = "DELETE from orders where order_id = '$id'";
    $conn->exec($sql);
}

if(isset($_POST['dash'])){
    // echo 'connected';
    $total_number_of_data = $conn->query('SELECT COUNT(*) FROM users')->fetchColumn();
    if($total_number_of_data>=5){
    $start_limit_of_pages = $total_number_of_data-5;
    $number_of_data_per_page = 5;
    }
    else{
    $start_limit_of_pages = 0;
    $number_of_data_per_page = $total_number_of_data;
    }
    $sql = "SELECT * from users limit $start_limit_of_pages, $number_of_data_per_page";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $r = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
    $text = '';
    $text .= '<div>';
       $text .= "<table>";
       $text .= "<tr><th>username</th><th>email</th><th>user_password</th><th>user_status</th>";
       $count = count($result);
       for($i=0;$i<$number_of_data_per_page;$i++){
           $text .= "<tr>";
           $text .= "<td>".$result[$i]['username']."</td><td>".$result[$i]['email']."</td><td>".$result[$i]['user_password']."<td>".$result[$i]['user_status']."</td>";
           $text .= "</tr>";
       }
       $text .= "</table>";
    $text .= '</div>';
    $text .= '<hr>';
    $text .= '<hr>';

    $text .= '<div>';


    $total_number_of_data = $conn->query('SELECT COUNT(*) FROM products')->fetchColumn();
    if($total_number_of_data>=5){
    $start_limit_of_pages = $total_number_of_data-5;
    $number_of_data_per_page = 5;
    }
    else{
    $start_limit_of_pages = 0;
    $number_of_data_per_page = $total_number_of_data;
    }
    $sql = "SELECT * from products limit $start_limit_of_pages, $number_of_data_per_page";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $r = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

    $text .= '<div>';


    $text .= "<table>";
    $text .= "<tr><th>prod_id</th><th>prod_name</th><th>prod_price(&#8377;/kg)</th><th>prod_origin</th><th>prod_image</th>";
    for($i=0;$i<$number_of_data_per_page;$i++){
        if($result[$i]['prod_id']){
        $text .= "<tr>";
        $text .= "<td>".$result[$i]['prod_id']."</td><td>".$result[$i]['prod_name']."</td><td>".$result[$i]['prod_price']."</td><td>".$result[$i]['prod_origin']."<td><img src =".$result[$i]['prod_image']."></td>";
        $text .= "</tr>";
        }
    }
    $text .= "</table>";
    $text .= '</div>';

    $text .= '<hr>';
    $text .= '<hr>';
    $text .= '<div>';
    $total_number_of_data = $conn->query('SELECT COUNT(*) FROM orders')->fetchColumn();
    if($total_number_of_data>=5){
    $start_limit_of_pages = $total_number_of_data-5;
    $number_of_data_per_page = 5;
    }
    else{
    $start_limit_of_pages = 0;
    $number_of_data_per_page = $total_number_of_data;
    }
    $sql = "SELECT * from orders limit $start_limit_of_pages, $number_of_data_per_page";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $r = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        $text .= "<table class='shadow-lg p-3 mb-5 bg-white rounded'>";
    $text .= "<tr><th>order_id</th><th>email</th><th>order_status</th><th>order_amount</th><th>shipping_amount</th><th>total_amount</th><th>city</th><th>pincode</th><th>order_date</th><th>delivery_date</th>";
    $text .= "</tr>";
    $count = count($result);
    for($i=0;$i<$count;$i++){
        $text .= "<tr>";
        $text .= "<td>".$result[$i]['order_id']."</td><td>".$result[$i]['email']."</td><td>".$result[$i]['order_status']."</td><td>&#8377;".$result[$i]['order_amount']."</td><td>&#8377;".$result[$i]['shipping_amount']."</td><td>&#8377;".$result[$i]['total_amount']."</td><td>".$result[$i]['city']."</td><td>".$result[$i]['pincode']."</td><td>".$result[$i]['order_date']."</td><td>".$result[$i]['delivery_date']."</td>";
        $text .= "</tr>";
    }
    $text .= "</table>";
    $text .= '</div>';
    echo $text;
}
?>