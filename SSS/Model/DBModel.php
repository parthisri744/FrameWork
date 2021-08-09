<?php
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);
spl_autoload_register(function($className) {
    require_once $className.".php";
}); 

class DBModel {
    private $db;
    private $dsn = 'mysql:dbname=SSS;host=localhost';
    private $user = 'root';
    private $password = '';
    public function __construct() {
    try {
        $this->db = new PDO($this->dsn, $this->user, $this->password);
        //echo "Connected Successfully";
        
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "";
        die();
    }
    return $this->db;
}  

    public function post_method($param){
        $param = isset($_POST[$param]) ? trim($_POST[$param]) : "";
        //echo "Parameter :".$param."<br/>";
        return $param;
    }
    public  function login_username($username,$password){
       // $username="admin";
        //echo "Username :".$username;
        $err_msg=[];
        $sql = "SELECT id,username,password FROM users WHERE username = :username";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->execute();
       // var_dump($stmt);
        if($stmt->rowCount() == 1){ 
            if($row = $stmt->fetch()){
                $id = $row["id"];
                $username = $row["username"];
                $hashed_password = $row["password"];
               // echo "ID :".$id."Username :".$username."Password :".$hashed_password;
                if(password_verify($password, $hashed_password)){
                    session_start();
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $id;
                    $_SESSION["username"] = $username;     
                    $url="../index.php?temp=".md5(dashboard);                   
                    header("location: ".$url);
                  // echo "Username And Password Matches SESSION VARIABLE :".$_SESSION['username'];
                }else{
                    $err_msg[]="The password you entered was not valid";
                }
            }
        }else{
            $err_msg[]="No account found with that username.";
        }
        return $err_msg;
       // echo json_encode($err_msg);
   }
   public function username_check($username){
        $sql = "SELECT id FROM users WHERE username = :username"; 
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->execute();
        $result=$stmt->rowCount();
        return $result;
   }
   public function registration($username,$password,$confirm_password){
       $err_msg[]="";
        if($this->username_check($username)== 1){
            $err_msg[]="This username is already Exist";
        }else{
            if(strlen($password) < 8){
                $err_msg[].="Password must have atleast 8 characters";
            }else{
                if($password != $confirm_password){
                  $err_msg[].="Password did not match";
                }else{
                    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
                    $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
                    $param_password = password_hash($password, PASSWORD_DEFAULT);                 
                    if($stmt->execute()){
                    header("location: login.php");
                    }
                }
             }
        }
        return $err_msg;
   }
   public function fetch_data_datatable(){
        $data=[];
        $sql = "SELECT * FROM students";
        $stmt=$this->db->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
	            $data[] = $row;
        }
        return  $data;
        
   }
   public function fetch_purchasedata_datatable(){
    $data=[];
    $sql = "SELECT * FROM adminstock";
    $stmt=$this->db->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
            $data[] = $row;
    }
    return  $data;
    
}
   public function decrypt($ivHashCiphertext, $password) {
    $method = "AES-256-CBC";
    $iv = substr($ivHashCiphertext, 0, 16);
    $hash = substr($ivHashCiphertext, 16, 32);
    $ciphertext = substr($ivHashCiphertext, 48);
    $key = hash('sha256', $password, true);  
    if (!hash_equals(hash_hmac('sha256', $ciphertext . $iv, $key, true), $hash)) return null;
    //echo " jhjkhj".openssl_decrypt($ciphertext, $method, $key, OPENSSL_RAW_DATA, $iv);
    return openssl_decrypt($ciphertext, $method, $key, OPENSSL_RAW_DATA, $iv);
  }
  public function fetch_deliveryhistory(){
    $data=[];
    $sql = "SELECT * FROM purchase WHERE status='Delivered Successfully'";
    $stmt=$this->db->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
            $data[] = $row;
    }
    return  $data;  
} 
public function fetch_waitingdelivery(){
    $data=[];
    $sql = "SELECT * FROM purchase WHERE status='Waiting For Delivery'";
    $stmt=$this->db->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
            $data[] = $row;
    }
    return  $data;  
}
}
?>