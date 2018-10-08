<?php
require '../../../class/db.php';
$db = new DB();

$course = $_POST['courseName'];
$db->action("INSERT into `courses` (`name_of_course`) VALUES ('{$course}')");
