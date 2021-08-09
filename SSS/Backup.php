<?php
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);
class Backup  {
    private $conn;
    private $dsn = 'mysql:dbname=SSS;host=localhost';
    private $user = 'root';
    private $password = '';
    public function __construct() {
        try {
            $this->conn = new PDO($this->dsn, $this->user, $this->password);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "";
            die();
        }
        return $this->conn;
    }
    public  function getTables($tableName){
        $sql ="SHOW TABLES FROM $tableName";
       // echo "SQL :".$sql;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
           $table[]=$row;
        }
      // echo  json_encode($table);
      return $table;
    }
    public function checkbackupdir($dirname){
        if(!file_exists($dirname)){
            $created = mkdir($dirname);
            system("chmod a+rwx '".$dirname."'");
            return true;
        }else {
            //echo "Directory ", $dirname, " already exists";
            return false;
        }
    }
    public function getBackup($table_name,$backup_path){
    // echo "Table Name :".$table_name."File Path :".$backup_path;
    $bsql = "SELECT * FROM $table_name INTO OUTFILE '$backup_path' FIELDS TERMINATED BY ',' ENCLOSED BY '' LINES TERMINATED BY '\n' ";
    //echo "Backup SQL :".$bsql;
    $stmt= $this->conn->prepare($bsql);
    $stmt->execute();
    $result =$stmt->fetch();
    }
    }
    $newtest = new Backup();
    $databaseName ="SSS";
    $dirname=__DIR__.'/Backup/'.date("d-m-Y");
    $tables=$newtest->getTables($databaseName);
    $check =$newtest->checkbackupdir($dirname);
    if($check==true){
    //echo "File Not Exist";
    foreach($tables as $table){   
        $backup_file  =$dirname.'/'.implode  (",", $table).'.csv';
        $newtest->getBackup(implode  (",", $table),$backup_file);
        }
    }else{
   // echo "File Exits";
    foreach($tables as $table){   
        $backup_file  =$dirname.'/'.implode  (",", $table).'.csv';
        $newtest->getBackup(implode  (",", $table),$backup_file);
        }
    }
?>