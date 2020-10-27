<?php
//try{
	$connection = new PDO("mysql:host=localhost;dbname=site,'root',''");
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$query = $connection->prepare(
	'SELECT * FROM users where id = ?'
	);
	$query->bindValue('id',1);
	
	print_r($query);
	
//}catch(){
	
	
//	echo "lol";
//}
try {

  $conn = new PDO("mysql:host=localhost;dbname=site",'root','');

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 // echo "Connected successfully";
  
  $query = $connection->prepare(
	'SELECT * FROM users where id = :id'
	);
	$query->bindValue('id',1);
	$query->execute();
	
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}