<?php
session_start();
error_reporting(E_ALL);

class Redirect{
    public static function to($location=null){
		if($location){
			exit(header('Location: ' .$location));
			//exit();
		}
	}
}

class Input {
	public static function get($item){
		if(isset($_POST[$item])){
			return $_POST[$item];
		}else if(isset($_GET[$item])){
			return $_GET[$item];
		}
	}
}


class Session{
    private $_username;
    
    public static function setUsername($username){
        if(!isset($_SESSION['username'])){
            $_SESSION['username'] = $username;
            return true;
        } return false;
    }
    public static function getUsername(){
        if(isset($_SESSION['username'])) return $_SESSION['username'];
        return false;
    }
    public function existUsername(){        
        return (isset($_SESSION['username'])) ? true : false;
    }
    
    public static function setIP($ip){
        if(!isset($_SESSION['ip'])){
            $_SESSION['ip'] = $ip;
            return true;
        } return false;
    }
    
    public static function setIP2($ip2){
        if(!isset($_SESSION['ip2'])){
            $_SESSION['ip2'] = $ip2;
            return true;
        } return false;
    }
    
    public static function getIP(){
        if(isset($_SESSION['ip'])) return $_SESSION['ip'];
        return false;
    }
    
    public static function getIP2(){
        if(isset($_SESSION['ip2'])) return $_SESSION['ip2'];
        return false;
    }
    
}

class DB{
    private static $_instance = null;
    private $_pdo, $_query;
    public  function __construct(){
        try{
            //$this->_pdo = new PDO('mysql:host=localhost;dbname=c9','root','');
        }catch(PDOException $e){
            echo "Problem with connecting to database!!";
        }
    }
    public function getId(){
        return $this->_pdo->lastInsertId();
    }

    public static function getInstance(){
        if(!isset(self::$_instance)){
            self::$_instance = new DB();
        }
        return self::$_instance;
    }
    
    public function query($table){
        return $this->_pdo ->query("SELECT * FROM ". $table); 
    }
    public function querySpecific($table, $id){
        return $this->_pdo ->query("SELECT * FROM ". $table." WHERE id = ".$id); 
    }
    public function DESCquery($table){
        return $this->_pdo ->query("SELECT * FROM ". $table." ORDER BY ID DESC"); 
    }
    public function DESCCustonQuery($table, $order){
        return $this->_pdo ->query("SELECT * FROM ". $table." ORDER BY ".$order." DESC");
    }
    public function insert($insert){
        $this->_pdo->query($insert);
    }

    public function action($action){
        $this->_pdo->query($action);
        $var = $this->_pdo -> errorInfo();
        //print_r($var);
    }
}