<?php
/*
require_once 'config.php';
ini_set('dispaly_errors',1);
ini_set();
error_reporting(E_ALL);
$itemid=$_GET['id'];
echo "itemid :".$itemid;
$sql="SELECT * FROM items WHERE ID=:ID ";
$stmt = $db->prepare($sql);
$stmt->bindParam(':ID', $itemid);
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    $data[]=$row;
}
echo json_encode($data); */
require_once 'config.php';
ini_set('dispaly_errors',1);
ini_set();
error_reporting(E_ALL);

$itemid=$_GET['id'];
$sql="SELECT * FROM items";
$stmt=$db->prepare($sql);
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    $data[]=$row;
    //var_dump($data);
}
print_r($data);
echo json.encode($data);

?>