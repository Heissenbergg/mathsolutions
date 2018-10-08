<?php
require '../../../class/db.php';
$db = new DB();

$id = $_POST['id'];
$what = $_POST['what'];

if($what == 'courses'){
    $db->action("DELETE FROM `courseRequest` WHERE user_id = $id");   
}else if($what == 'lessons'){
    $db->action("DELETE FROM `lessonsRequest` WHERE user_id = $id");   
}
