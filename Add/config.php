<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$server="localhost";
$user="root";
$password="rootvm@kms";
$database="parthisri";
try{
$db =new PDO("mysql:host=$server;dbname=$database",$user,$password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
	echo "Error :".$e->getMessage();	
}
?>