<?php
require_once 'class/db.php';
require_once 'class/user.php';

error_reporting(E_ALL); // or E_STRICT
//ini_set('max_execution_time', 30);
ini_set("display_errors",1);

$user = new User();
$a = $user->insert('mail', 'name','phone', 'parent', 'adress','schoolname');