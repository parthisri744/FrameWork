<?php
require_once 'config.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$alldata = json_decode(file_get_contents("php://input"));
//var_dump($alldata);
$output=[];
foreach($alldata as $key => $value){
	$name=$value->name;
	$price=$value->price;
	$data = array(
            'name'=>$name,
            'price' => $price
     );
        //echo  "ID :-".$value->ID;
     if(isset($value->ID)){
       $output = update_data($db,$data,$value->ID);
     }else{
       $output = insert_data($db,$data);  
     }
}

function update_data($db,$data,$id){
    //print_r($data);
     $sql = "UPDATE items SET name=:name,price=:price WHERE ID=$id";
     echo "SQL :".$sql;
     $stmt=$db->prepare($sql);
     //echo "Array Element :".$data['name'];
     $stmt->bindParam(":name",$data['name']);
     $stmt->bindParam(":price",$data['price']);
     try{
     $result=$stmt->execute();
     
     if($result){
		$output ="Update Successfuly";		
	 }else {
		 $output = "Data is Not Update";
	 }
     } catch (PDOException $e){
         echo "Error".$e->getMessage();
     }
     return $output;
}

function insert_data($db,$data){
    
     $sql = "INSERT INTO items(name,price) VALUES(:name,:price)";
     $stmt=$db->prepare($sql);
     $stmt->bindParam(":name",$data['name']);
     $stmt->bindParam(":price",$data['price']);
     $result=$stmt->execute($data);
     if($result){
		$output ="Inserted Successfuly";		
	 }else {
		 $output = "Data is Not Inserted";
	 }
     return $output;
}

//var_dump($alldata);
?>