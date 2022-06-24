<?php
include 'storeconnection.php';
if(isset($_POST['entered_password'])){
    try{
        $upass =  $_POST['entered_password'];
        $uemail = $_POST['entered_email'];
        $sql = "SELECT email,user_password FROM `users` WHERE email='$uemail'";
        $stmt = $conn->prepare($sql);

        // EXECUTING THE QUERY
            $stmt->execute();
    
            $r = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        // FETCHING DATA FROM DATABASE
           $result = $stmt->fetchAll();
           if(count($result)==0)
           echo "entered email is incorrect";
           else{
               $sql1 = "UPDATE `users` set user_password = '$upass' where email = '$uemail'";
               $conn->exec($sql1);
               echo "new password created successfully";
           }
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
}
?>