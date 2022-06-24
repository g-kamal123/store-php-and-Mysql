<?php
    session_start();

include 'storeconnection.php';
if(isset($_POST['entered_email'])){
    if($_POST['entered_email'] == "Admin@mail.com")
    $_SESSION['admin_user'] = $_POST['entered_email'];
    else
    $_SESSION['email_user'] = $_POST['entered_email'];
    if($_POST['rememberme']==1){
        $cookie_email = $_POST['entered_email'];
        $cookie_pass = $_POST['entered_password'];
        if($_POST['entered_email'] == "Admin@mail.com"){
        setcookie("admin_user",$cookie_email, time() + (86400 * 30), "/");
        }
        else{
        setcookie("email_user",$cookie_email, time() + (86400 * 30), "/");
        setcookie("pass_user",$cookie_pass, time() + (86400 * 30), "/");
        }
    }
    try{
        $uemail = $_POST['entered_email'];
        $upass =  $_POST['entered_password'];
        $query = "SELECT email,user_password,user_status FROM `users` WHERE email='$uemail'";
	    $stmt = $conn->prepare($query);

	// EXECUTING THE QUERY
	    $stmt->execute();

	    $r = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	// FETCHING DATA FROM DATABASE
	   $result = $stmt->fetchAll();
	//OUTPUT DATA OF EACH ROW
    if($result[0]['user_status']=='inactive')
    echo "your account is inactive";
    else{
	if(count($result)==0 || $uemail != $result[0]['email'] || $upass != $result[0]['user_password'])
    echo "user_email and password does not match";
    else {if($uemail == "Admin@mail.com")
    echo 1;
    else echo 0;
    }
}
}   catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
}
?>