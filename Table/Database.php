<?php
$logfile ='log/'. date('Y-m-d').'.txt';
ini_set("error_log",$logfile);
class Database {
    private $db;
    private $dsn = 'mysql:dbname=Hospital;host=localhost';
    private $user = 'root';
    private $password = '';
    public  function config() {
    try {
        $conn = new PDO("mysql:dbname=Hospital;host=localhost", "root", "");
     //   echo "Connected Successfully";
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "";
        error_log($e->getMessage());
    }
    return $conn;
  }
}
?>