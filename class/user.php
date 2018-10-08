<?php

class User{
    private $_pdo, $_query;
    private $_id, $_mail, $_username,$_password, $_name, $_phone, $_parent_name, $_adress, $_category, $_future_school;
    public function __construct($id = null){
        $this->_pdo = DB::getInstance();
		$this->_query = $this->_pdo -> query("users");
		
		if($id){
		    while($user = $this->_query -> fetch()){
		        if($user['id'] == $id){
		            $this->_id = $user['id'];
		            $this->_mail = $user['mail'];
		            $this->_password = $user['password'];
		            $this->_name = $user['name'];
		            $this->_phone = $user['phone'];
		            $this->_parent_name = $user['parent_name'];
		            $this->_adress = $user['adress'];
		            $this->_category = $user['category'];
		            $this->_future_school = $user['futureSchool'];
		        }
		    }
		}
    }
    public function getID(){return $this->_id; }
    public function getName(){return $this->_name; }
    public function getMail(){return $this->_mail; }
    public function getPassword(){return $this->_password; }
    public function getPhone(){return $this->_phone; }
    public function getParent(){return $this->_parent_name; }
    public function getAdress(){return $this->_adress; }
    public function getCategory(){return $this->_category; }
    public function getSchool(){return $this->_future_school; }
    
    public function checkSpam($time, $ip, $ip2){
        $this->_query = $this->_pdo -> DESCquery("users");
        while($user = $this->_query -> fetch()){
            if($user['ip'] == $ip || $user['ip2'] == $ip || $user['ip'] == $ip2 || $user['ip2'] == $ip2){
                if($time - $user['time'] < 3){
                    return true;
                }
            }
            return false;
        }
    }
    
    public function insert($mail, $name, $phone, $parent_name, $adress, $futureSchool){
        $ip = Session::getIP();
        $ip2 = Session::getIP2();
        $time = time();
        $psw = 'sad0adsa022'; $cat = 0;
        if(!$this->checkSpam($time, $ip, $ip2)){
            $this->_pdo -> action("INSERT into `users` (`mail`,`password`,`name`,`phone`,`parent_name`,`adress`,`futureSchool`,`ip`,`ip2`,`time`,`category`) VALUES ('{$mail}','{$psw}','{$name}','{$phone}','{$parent_name}','{$adress}','{$futureSchool}','{$ip}','{$ip2}','{$time}','{$cat}') ");
            return 7;
        }else return 12;
        //$this->_pdo -> action("INSERT into `users` (`mail`) VALUES ('{$mail}')");
    }
    
    public function login($mail, $password){
        $this->_query = $this->_pdo -> query("users");
        while($user = $this->_query -> fetch()){
            if($user['mail'] == $mail){
                if($user['password'] == $password and $user['category'] == 6) {
                    $this->_mail = $mail;
				    Session::setUsername($mail);
				    return true;
                }
                else return 2;
            }
        }
    }
    
    public function lastID(){
        $this->_query = $this->_pdo -> DESCquery("users");
        while($user = $this->_query->fetch()){
            return $user['id'];
        }
    }
    
}