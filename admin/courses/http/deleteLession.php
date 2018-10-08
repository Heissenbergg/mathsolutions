<?php
require '../../../class/db.php';
$db = new DB();

$id = $_POST['id'];
$db->action("DELETE FROM `lessons` WHERE id = $id");
