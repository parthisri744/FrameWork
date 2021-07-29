<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$server="localhost";
$user="root";
$password="rootvm@kms";
$database="parthisri";
try{
$db =new PDO("mysql:host=$server;dbname=$database",$user,$password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$alldata = json_decode(file_get_contents("php://input"));
//var_dump($alldata);
foreach($alldata as $key => $value){
	$name=$value->name;
	$price=$value->price;
	//echo "Name :".$name."Price :".$price;	
	$data = array(
            ':name'=>$name,
            ':price' => $price
     );
	//echo "Data value".var_dump($data);
	 $sql = "INSERT INTO items(name,price) VALUES(:name,:price)";
	 echo "Sql   :".$sql;
	 $stmt=$db->prepare($sql);
	 $stmt->execute($data);
	// if($stmt->execute($data)){
	//	$message "Inserted Successfuly";		
	// }else {
	//	 $message= "Data is Not Inserted";
	// }
	// $output = array('message'=>$message);
	 //echo json_encode($output);
}
var_dump($alldata);
}catch (PDOException $e){
	echo "Error :".$e->getMessage();	
}
?>