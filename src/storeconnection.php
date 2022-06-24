<?php
$servername = "mysql-server";
$username = "root";
$password = "secret";
$dbname = "ecomm";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//   // sql to create table
//   $sql = "CREATE TABLE if not exists users (
//   user_number int(32),
//   username VARCHAR(30) NOT NULL,
//   email VARCHAR(50) PRIMARY KEY,
//   user_password varchar(50),
//   user_status varchar(10)
//   )";

//   // use exec() because no results are returned
//   $conn->exec($sql);
//   echo "Table user created successfully";
} catch(PDOException $e) {
echo $sql . "<br>" . $e->getMessage();
}

?>