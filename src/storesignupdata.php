<?php
include 'storeconnection.php';
if(isset($_POST['uname'])){
    try{
    $uname = $_POST['uname'];
    $uemail = $_POST['umail'];
    $upass = $_POST['upassword'];

    $sql1 = "SELECT * from `users` where email= '$uemail'";
    $stmt = $conn->prepare($sql1);
	$stmt->execute();

	$r = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$result = $stmt->fetchAll();
    if(count($result)==0){
    $sql = "INSERT INTO users (`username`, `email`, `user_password`,`user_status`)
    VALUES ('$uname', '$uemail', '$upass','active')";
// use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
    else
    echo "user email is already registered ";
    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    
}
?>