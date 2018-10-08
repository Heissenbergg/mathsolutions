<?php 
include '../class/db.php';
include '../class/user.php';

$username = $_POST['username'];
$password = $_POST['password'];

$user = new User();
echo $user->login($username, $password);